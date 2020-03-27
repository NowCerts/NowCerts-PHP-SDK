<?php

namespace NowCerts;

/**
 * @see https://api.nowcerts.com/Help/ResourceModel?modelName=AirConditioning
 */
class AirConditioning {

  /**
   * Uses Heat Ducts.
   */
  const A = 0;

  /**
   * Uses Separate Duct System.
   */
  const B = 1;

  /**
   * Evaporative Cooling.
   */
  const C = 2;

  /**
   * Heat Pump Cooling.
   */
  const D = 3;

  /**
   * Other.
   */
  const O = 4;

  /**
   * @var int
   */
  public $value;

  /**
   * Sets the value of the object.
   *
   * @param int $value
   */
  public function __construct($value) {
    $this->value = $value;
  }

}
