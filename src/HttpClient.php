<?php

namespace NowCerts;

/**
 * Represents a client for connecting to the NowCerts API.
 */
class HttpClient {

  /**
   * The domain name of the API.
   *
   * @var string
   */
  protected static $api_domain = 'https://api.nowcerts.com';

  /**
   * The base path to use for the API.
   *
   * @var string
   */
  protected static $api_base_path = '/api';

  /**
   * The username for connecting to the API.
   *
   * @var string
   */
  protected static $username;

  /**
   * The password for connecting to the API.
   *
   * @var string
   */
  protected static $password;

  /**
   * The curl handle.
   *
   * @var curl
   */
  protected static $ch;

  /**
   * Headers for curl.
   *
   * @var array
   */
  protected static $headers;

  /**
   * An OAuth object for holding authentication details.
   *
   * @var \NowCerts\OAuth
   */
  protected static $oauth;

  /**
   * The PHP SDK version.
   */
  const VERSION = '0.0.1';

  /**
   * Sets up the connection to NowCerts.
   */
  public static function setup() {
    self::$ch = curl_init();
    self::$headers = array(
      'Accept' => 'application/json',
    );
    curl_setopt(self::$ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt(self::$ch, CURLOPT_SSL_VERIFYPEER, 1);
    curl_setopt(self::$ch, CURLOPT_SSL_VERIFYHOST, 2);
    curl_setopt(self::$ch, CURLOPT_USERAGENT, 'NowCerts PHP SDK/' . self::VERSION);
    curl_setopt(self::$ch, CURLOPT_HEADER, TRUE);
    curl_setopt(self::$ch, CURLINFO_HEADER_OUT, TRUE);
  }

  /**
   * Authenticates to the API using OAuth.
   *
   * @param string $grant_type
   *   The OAuth grant type. Currently only "password" is supported.
   * @param array $attributes
   *   An associative array of details necessary for authentication. When the
   *   the grant type is:
   *   - "password": The following values are needed:
   *     - (string) username: The username for conneting to the API.
   *     - (string) password: The password for connecting to the API.
   */
  public static function authenticate($grant_type, array $attributes) {
    $data = array();

    switch ($grant_type) {
      case 'password':
        $data['grant_type'] = $grant_type;
        $data['client_id'] = 'ngAuthApp';
        $data['username'] = $attributes['username'];
        $data['password'] = $attributes['password'];
        break;

      case 'refresh_token':
        $data['grant_type'] = $grant_type;
        $data['client_id'] = 'ngAuthApp';
        $data['refresh_token'] = $attributes['refresh_token'];
        break;
    }
    $body = static::request('POST', '/token', $data);
    self::$oauth = new OAuth($body);
  }

  /**
   * Authenticates to the API using the "password" grant type.
   *
   * @param string $username
   *   The username for connecting to the API.
   * @param string $password
   *   The password for connecting to the API.
   */
  public static function authenticateWithPassword($username, $password) {
    static::authenticate('password', array(
      'username' => $username,
      'password' => $password,
    ));
  }

  /**
   * Checks if authentication has occurred.
   *
   * @return bool
   *   TRUE if self::$oauth->access_token has been set, FALSE otherwise.
   */
  public static function isAuthenticated() {
    return self::$oauth && self::$oauth->access_token;
  }

  /**
   * Refreshes the OAuth token.
   *
   * @see http://test.api.nowcerts.com/RefreshToken
   */
  public static function refreshAccessToken() {
    static::authenticate('refresh_token', array(
      'refresh_token' => self::$oauth->refresh_token,
    ));
  }

  /**
   * Sends a web request.
   *
   * @param string $method
   *   A standard REST API method such as "POST" or "GET".
   * @param string $endpoint
   *   The path to hit including a leading slash.
   * @param array $arguments
   *   An associative array of arguments to send in the request where each key
   *   is the name of the argument and each value is the value to send.
   * @param array $options
   *   An associative array of additional options. Currently the following are
   *   supported:
   *   - (bool) raw_arguments: Indicates if the argument names and values
   *     should be passed through urlencode(). Default is FALSE meaning
   *     arguments are passed through urlencode().
   */
  public static function request($method, $endpoint, array $arguments = array(), array $options = array()) {
    $options += array(
      'raw_arguments' => TRUE,
    );

    if (!self::$ch) {
      throw new Exception('HTTP client has not been setup yet.');
    }

    curl_setopt(self::$ch, CURLOPT_POSTFIELDS, NULL);

    $url = self::$api_domain . self::$api_base_path . $endpoint;

    switch ($method) {
      case 'GET':
        curl_setopt(self::$ch, CURLOPT_HTTPGET, TRUE);
        $assembled_arguments = array();
        foreach ($arguments as $key => $argument) {
          if ($options['raw_arguments']) {
            $assembled_arguments[] = $key . "=" . $argument;
          }
          else {
            $assembled_arguments[] = urlencode($key) . "=" . urlencode($argument);
          }
        }
        if ($assembled_arguments) {
          $url .= "?" . implode("&", $assembled_arguments);
        }
        break;

      case 'POST':
        curl_setopt(self::$ch, CURLOPT_POST, TRUE);
        curl_setopt(self::$ch, CURLOPT_POSTFIELDS, http_build_query($arguments));
        break;
    }

    if (isset(self::$oauth) && !empty(self::$oauth->access_token)) {
      self::$headers['Authorization'] = 'bearer ' . self::$oauth->access_token;
    }
    else {
      unset(self::$headers['Authorization']);
    }

    curl_setopt(self::$ch, CURLOPT_HTTPHEADER, static::convertArrayToHeaders(self::$headers));
    curl_setopt(self::$ch, CURLOPT_URL, $url);
    $curl_response = curl_exec(self::$ch);

    if ($curl_response === FALSE) {
      throw new Exception('Connection to NowCerts API failed. cURL error number: ' . curl_errno(self::$ch) . ' with error "' . curl_error(self::$ch) . '"', curl_errno(self::$ch));
    }

    $raw_headers_size = curl_getinfo(self::$ch, CURLINFO_HEADER_SIZE);
    $status_code = curl_getinfo(self::$ch, CURLINFO_HTTP_CODE);
    $raw_headers = mb_substr($curl_response, 0, $raw_headers_size);
    $raw_body = mb_substr($curl_response, $raw_headers_size);

    $response = new HttpResponse($raw_headers, $raw_body, $status_code);

    switch ($response->status_code) {
      case 200:
      case 201:
      case 204:
        $body = $response->jsonBody();
        if (isset($body['status']) && $body['status'] == ApiStatus::Error) {
          throw new Exception($body['message'], $body['status']);
        }
        return $body;

      case 400:
        throw new HttpError\BadRequest($response->body, $response->status_code);

      case 401:
        throw new HttpError\Authorization($response->body, $response->status_code);

      case 403:
        throw new HttpError\Forbidden($response->body, $response->status_code);

      case 404:
        throw new HttpError\NotFound($response->body, $response->status_code);

      case 405:
        throw new HttpError\MethodNotAllowed($response->body, $response->status_code);

      case 500:
        throw new HttpError\Server($response->body, $response->status_code);

      default:
        throw new HttpError("Unexpected HTTP error: " . $response->status_code, $response->status_code);
    }
  }

  /**
   * Sends a GET request.
   *
   * @param string $endpoint
   *   The path to hit including a leading slash.
   * @param array $arguments
   *   An associative array of arguments to send in the request where each key
   *   is the name of the argument and each value is the value to send.
   * @param array $options
   *   An associative array of additional options. See request() for supported
   *   options.
   *
   * @see \NowCerts\HttpClient::request()
   */
  public static function get($endpoint, array $arguments = array(), array $options = array()) {
    return static::request("GET", $endpoint, $arguments, $options);
  }

  /**
   * Sends a POST request.
   *
   * @param string $endpoint
   *   The path to hit including a leading slash.
   * @param array $arguments
   *   An associative array of arguments to send in the request where each key
   *   is the name of the argument and each value is the value to send.
   * @param array $options
   *   An associative array of additional options. See request() for supported
   *   options.
   *
   * @see \NowCerts\HttpClient::request()
   */
  public static function post($endpoint, array $arguments = array(), array $options = array()) {
    return static::request("POST", $endpoint, $arguments, $options);
  }

  /**
   * Converts an associative array of headers into an indexed array for curl.
   *
   * @param string[] $input_headers
   *   An associative array where each key is the name of a header and each
   *   value is the value.
   *
   * @return array
   *   The indexed array of headers ready for curl.
   */
  public static function convertArrayToHeaders(array $input_headers) {
    $headers = array();
    foreach ($input_headers as $header => $value) {
      $headers[] = $header . ":" . $value;
    }
    return $headers;
  }

  /**
   * Returns the client's OAuth object.
   *
   * @return \NowCerts\OAuth|null
   *   The OAuth object or NULL if not yet set.
   */
  public static function getOAuth() {
    return self::$oauth;
  }

}
