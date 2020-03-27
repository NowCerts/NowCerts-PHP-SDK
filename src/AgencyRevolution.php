<?php

namespace NowCerts;

class AgencyRevolution {

  /**
   * @see https://api.nowcerts.com/Help/Api/POST-api-AgencyRevolution-Activities
   */
  public static function activities() {
    $results = HttpClient::post('/AgencyRevolution/Activities');
    return $results;
  }

}
