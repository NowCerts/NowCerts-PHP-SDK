<?php

namespace NowCerts;

/**
 * Overrides the \DateTime class to control serialization for JSON.
 */
class DateTime extends \DateTime implements \JsonSerializable {

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
