<?php

namespace NowCerts;

/**
 * @see https://api.nowcerts.com/Help/ResourceModel?modelName=ConstructionType
 */
class ConstructionType {

  /**
   * Non-Combustible.
   */
  const _1 = 0;

  /**
   * Masonry Non-Combustible.
   */
  const _2 = 1;

  /**
   * Modified Fire Resistive.
   */
  const _3 = 2;

  /**
   * Superior Non-Combustible.
   */
  const _4 = 3;

  /**
   * Superior Masonry Non-Combustible.
   */
  const _5 = 4;

  /**
   * Poured Concrete.
   */
  const _6 = 5;

  /**
   * Concrete Tilt-up.
   */
  const _7 = 6;

  /**
   * Asbestos Stucco.
   */
  const A = 7;

  /**
   * Concrete Block.
   */
  const B = 8;

  /**
   * Steel.
   */
  const C = 9;

  /**
   * Earth Shelter.
   */
  const E = 10;

  /**
   * Frame.
   */
  const F = 11;

  /**
   * Adobe.
   */
  const G = 12;

  /**
   * Heavy Timbered Joisted Masonry.
   */
  const H = 13;

  /**
   * Plastic/Vinyl Siding.
   */
  const I = 14;

  /**
   * Joisted Masonry.
   */
  const J = 15;

  /**
   * Log.
   */
  const L = 16;

  /**
   * Masonry.
   */
  const M = 17;

  /**
   * Metal.
   */
  const N = 18;

  /**
   * Other.
   */
  const O = 19;

  /**
   * Pre-Fabricated.
   */
  const P = 20;

  /**
   * Fire Resistive/Superior.
   */
  const R = 21;

  /**
   * Metal/Plastic Siding.
   */
  const S = 22;

  /**
   * Trailer (Mobile Home).
   */
  const T = 23;

  /**
   * Masonry Veneer.
   */
  const V = 24;

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
