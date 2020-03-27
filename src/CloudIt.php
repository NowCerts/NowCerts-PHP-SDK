<?php

namespace NowCerts;

class CloudIt {

  /**
   * @see https://api.nowcerts.com/Help/Api/POST-api-CloudItProcessData
   */
  public static function processData() {
    $results = HttpClient::post('/CloudItProcessData');
    return $results;
  }

}
