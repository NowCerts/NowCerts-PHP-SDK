<?php

namespace NowCerts;

/**
 * Represents an HTTP response.
 */
class HttpResponse {

  /**
   * The response headers.
   *
   * @var array
   */
  public $headers;

  /**
   * The response body.
   *
   * @var string
   */
  public $body;

  /**
   * The response status code.
   *
   * @var int
   */
  public $status_code;

  /**
   * Sets the class properties.
   *
   * @param string $raw_headers
   *   The raw response headers.
   * @param string $body
   *   The raw response body.
   * @param int $status_code
   *   The response status code.
   */
  public function __construct($raw_headers, $body, $status_code) {
    $this->headers = self::parseHeaders($raw_headers);
    $this->body = $body;
    $this->status_code = $status_code;
  }

  /**
   * Converts raw headers into an array.
   *
   * @param string $raw_headers
   *   The raw response headers.
   *
   * @return array
   *   The headers as an associative array.
   */
  public static function parseHeaders($raw_headers) {
    $raw_headers = str_replace("\r", "", $raw_headers);
    $exploded_headers = explode("\n", $raw_headers);
    $headers = array();
    foreach ($exploded_headers as $header) {
      if (strpos($header, ":") !== FALSE) {
        list($key, $value) = explode(":", $header);
        $headers[trim($key)] = trim($value);
      }
    }
    return $headers;
  }

  /**
   * Returns the response converted from JSON.
   *
   * @return mixed
   *   The body as returned by json_decode().
   */
  public function jsonBody() {
    return json_decode($this->body, TRUE);
  }

}
