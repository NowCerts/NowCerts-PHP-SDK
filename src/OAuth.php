<?php

namespace NowCerts;

/**
 * Contains the OAuth token details.
 */
class OAuth {

  public $access_token;
  public $refresh_token;
  public $expires_in;
  public $scope;
  public $ref;

  /**
   * Fills in the OAuth details.
   *
   * @param array $oauth
   *   The OAuth details.
   */
  public function __construct(array $oauth = array()) {
    $oauth += array(
      'access_token' => NULL,
      'refresh_token' => NULL,
      'expires_in' => NULL,
      'ref' => NULL,
      'scope' => NULL,
    );
    $this->access_token = $oauth['access_token'];
    $this->refresh_token = $oauth['refresh_token'];
    $this->expires_in = $oauth['expires_in'];
    $this->ref = $oauth['ref'];
    $this->scope = $oauth['scope'];
  }

}
