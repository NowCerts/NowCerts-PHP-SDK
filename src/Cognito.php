<?php

namespace NowCerts;

class Cognito {

  /**
   * @param array $arguments
   *
   * @see https://api.nowcerts.com/Help/Api/POST-api-CognitoWebHook
   */
  public static function webHook(array $arguments) {
    $results = HttpClient::post('/CognitoWebHook', $arguments);
    return $results;
  }

}
