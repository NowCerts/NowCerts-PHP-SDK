<?php

namespace NowCerts;

/**
 * @see https://api.nowcerts.com/Help/ResourceModel?modelName=GarageType
 */
class GarageType {


  /**
   * Attached.
   */
  const A = 0;

  /**
   * Built-In.
   */
  const B = 1;

  /**
   * Carport.
   */
  const C = 2;

  /**
   * Detached.
   */
  const D = 3;

  /**
   * Basement.
   */
  const E = 4;

  /**
   * Subterranean / Underground.
   */
  const Subterranean_Underground = 5;

  /**
   * 1st floor Subterranean style.
   */
  const First_floor_Subterranean_style = 6;

  /**
   * Habitational over garage.
   */
  const Habitational_over_garage = 7;

  /**
   * Tuck Under.
   */
  const Tuck_Under = 8;

  /**
   * Open Lot.
   */
  const Open_Lot = 9;

  /**
   * Other.
   */
  const Other = 10;

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
