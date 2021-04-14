<?php

namespace NowCerts;

/**
 * Overrides the \DateTime class to control serialization for JSON.
 */
class DateTime extends \DateTime implements \JsonSerializable {

  /**
   * Creates a new DateTime object, accounting for the mm-dd-yyyy pattern.
   */
  public function __construct($datetime = "now" , $timezone = NULL) {
    // The NowCerts API returns dates in the format mm-dd-yyyy. Change the
    // order to something more standard so \DateTime can handle it. 
    if (preg_match("/\d\d-\d\d-\d\d\d\d/", $datetime)) {
      $parts = explode("-", $datetime);
      $datetime = implode("-", array($parts[1], $parts[0], $parts[2]));
    }
    return parent::__construct($datetime, $timezone);
  }

  /**
   * Represents the date in the format the NowCerts API is expecting.
   *
   * @return string
   *   The DateTime string formatted the way the NowCerts API is expecting.
   */
  public function jsonSerialize() {
    return $this->format("c");
  }

}
