<?php

namespace NowCerts;

/**
 * @see https://api.nowcerts.com/Help/ResourceModel?modelName=DwellingUse
 */
class DwellingUse {

  /**
   * Primary, (non-seasonal).
   */
  const _1 = 0;

  /**
   * Primary, Seasonal.
   */
  const _2 = 1;

  /**
   * Secondary, (non-seasonal).
   */
  const _3 = 2;

  /**
   * Seasonal, (secondary).
   */
  const _4 = 3;

  /**
   * Other.
   */
  const _5 = 4;

  /**
   * Farm.
   */
  const _6 = 5;

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
