<?php

namespace NowCerts;

/**
 * Represents a vehile type of use.
 *
 * @see https://api.nowcerts.com/Help/ResourceModel?modelName=VehicleTypeOfUse
 */
class VehicleTypeOfUse {

  const Commercial = 1;
  const Personal = 2;

  /**
   * @var int
   */
  public $value;

  /**
   * Sets the value of the vehicle type of use.
   *
   * @param int $value
   *   The integer corresponding to the vehicle type of use.
   */
  public function __construct($value) {
    $this->value = $value;
  }

}
