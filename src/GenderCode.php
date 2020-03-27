<?php

namespace NowCerts;

/**
 * Represents a GenderCode.
 *
 * @see https://api.nowcerts.com/Help/ResourceModel?modelName=GenderCode
 */
class GenderCode {

  const M = 0;
  const F = 1;

  /**
   * @var int
   */
  public $value;

  /**
   * Sets the value of the GenderCode.
   *
   * @param int $value
   *   The integer corresponding to the GenderCode.
   */
  public function __construct($value) {
    $this->value = $value;
  }

}
