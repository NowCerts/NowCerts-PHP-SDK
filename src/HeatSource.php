<?php

namespace NowCerts;

/**
 * @see https://api.nowcerts.com/Help/ResourceModel?modelName=HeatSource
 */
class HeatSource {

  /**
   * Commercial Solid Fuel Installation.
   */
  const A = 0;

  /**
   * Commercial Boiler Installation.
   */
  const B = 1;

  /**
   * Coal Professionally Installed.
   */
  const C = 2;

  /**
   * Coal Non-Professionally Installed.
   */
  const D = 3;

  /**
   * Electric.
   */
  const E = 4;

  /**
   * Electric Portable Heater.
   */
  const F = 5;

  /**
   * Natural Gas.
   */
  const G = 6;

  /**
   * Kerosene Portable Heater.
   */
  const H = 7;

  /**
   * Kerosene.
   */
  const K = 8;

  /**
   * Liquid Propane Gas.
   */
  const L = 9;

  /**
   * Liquid Propane Portable Heater.
   */
  const M = 10;

  /**
   * None.
   */
  const N = 11;

  /**
   * Oil.
   */
  const O = 12;

  /**
   * Electric - Heat Pump.
   */
  const P = 13;

  /**
   * Other.
   */
  const R = 14;

  /**
   * Solar Professionally Installed.
   */
  const S = 15;

  /**
   * Solar Non-Professionally Installed.
   */
  const T = 16;

  /**
   * Water - Electrically Heated.
   */
  const U = 17;

  /**
   * Water - Gas Heated.
   */
  const V = 18;

  /**
   * Wood Professionally Installed.
   */
  const W = 19;

  /**
   * Wood Non-Professionally Installed.
   */
  const X = 20;

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
