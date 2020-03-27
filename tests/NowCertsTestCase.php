<?php

declare(strict_types=1);

namespace NowCerts\Test;

use PHPUnit\Framework\TestCase;

abstract class NowCertsTestCase extends TestCase {

  /**
   * Connects to the NowCerts API with credentials from a bootstrap file.
   */
  protected function setUp(): void {
    // See the readme for setting $api_username and $api_password.
    global $api_username, $api_password;
    if (!isset($api_username) || !isset($api_password)) {
      throw new \Exception('$api_username and $api_password must both be set to run most of the tests. See README.md for more information.');
    }
    \NowCerts\HttpClient::setup();
    \NowCerts\HttpClient::authenticateWithPassword($api_username, $api_password);
  }

}
