<?php

namespace NowCerts;

/**
 * @see https://api.nowcerts.com/Help/ResourceModel?modelName=RoofMaterialType
 */
class RoofMaterialType {

  /**
   * Composition (Fiberglass, Asphalt, etc.).
   */
  const A = 0;

  /**
   * Asbestos Shakes.
   */
  const B = 1;

  /**
   * Copper.
   */
  const C = 2;

  /**
   * Cedar Shakes.
   */
  const D = 3;

  /**
   * Steel/Porcelain Shingles.
   */
  const E = 4;

  /**
   * Plastic.
   */
  const F = 5;

  /**
   * Recycled Roofing Products.
   */
  const G = 6;

  /**
   * Roll Roofing.
   */
  const H = 7;

  /**
   * Single Ply Membrane Systems.
   */
  const I = 8;

  /**
   * Tar Gravel (Built-Up).
   */
  const J = 9;

  /**
   * Cedar Shingles.
   */
  const L = 10;

  /**
   * Metal.
   */
  const M = 11;

  /**
   * Concrete Tile.
   */
  const N = 12;

  /**
   * Other.
   */
  const O = 13;

  /**
   * Poured.
   */
  const P = 14;

  /**
   * Rock.
   */
  const R = 15;

  /**
   * Slate.
   */
  const S = 16;

  /**
   * Tile.
   */
  const T = 17;

  /**
   * Aluminum Shingles.
   */
  const U = 18;

  /**
   * Wood Shake/Shingle.
   */
  const W = 19;

  /**
   * Clay Tile.
   */
  const Y = 20;

  /**
   * Plywood.
   */
  const Z = 21;

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
