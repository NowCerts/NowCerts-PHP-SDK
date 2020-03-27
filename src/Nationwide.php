<?php

namespace NowCerts;

class Nationwide {

  /**
   * @see https://api.nowcerts.com/Help/Api/POST-api-Nationwide-CallbackURL
   */
  public static function callbackUrl() {
    $results = HttpClient::post('/Nationwide/CallbackURL');
    return $results;
  }

}
