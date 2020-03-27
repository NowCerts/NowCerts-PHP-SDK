<?php

namespace NowCerts;

class Zapier {

  /**
   * Subscribes to a Zapier event.
   *
   * @param string $target_url
   *   The Zapier URL.
   * @param \NowCerts\ZapierEventType|int $event
   *   The Zapier event type.
   *
   * @see https://api.nowcerts.com/Help/Api/POST-api-Zapier-Subscribe
   */
  public static function subscribe($target_url, $event) {
    $arguments = array(
      'target_url' => $target_url,
      'event' => $event,
    );
    $results = HttpClient::post("/Zapier/Subscribe", $arguments);
    return $results;
  }

  /**
   * Unsubscribes from a Zapier event.
   *
   * @param string $target_url
   *   The Zapier URL.
   * @param \NowCerts\ZapierEventType|int $event
   *   The Zapier event type.
   *
   * @see https://api.nowcerts.com/Help/Api/POST-api-Zapier-Unsubscribe
   */
  public static function unsubscribe($target_url, $event) {
    $arguments = array(
      'target_url' => $target_url,
      'event' => $event,
    );
    $results = HttpClient::post('/Zapier/Unsubscribe', $arguments);
    return $results;
  }

}
