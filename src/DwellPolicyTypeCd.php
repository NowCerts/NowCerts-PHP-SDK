<?php

namespace NowCerts;

/**
 * @see https://api.nowcerts.com/Help/ResourceModel?modelName=DwellPolicyTypeCd
 */
class DwellPolicyTypeCd {

  /**
   * Homeowners Form 1 (HO-1).
   */
  const _01 = 0;

  /**
   * Homeowners Form 2 (HO-2).
   */
  const _02 = 1;

  /**
   * Homeowners Form 3 (HO-3).
   */
  const _03 = 2;

  /**
   * Tenants/Renters (HO-4).
   */
  const _04 = 3;

  /**
   * Homeowners Form 5 (HO-5).
   */
  const _05 = 4;

  /**
   * Condominium Tenants Homeowners (HO-6).
   */
  const _06 = 5;

  /**
   * Homeowners Form 7 (HO-7).
   */
  const _07 = 6;

  /**
   * Modified/Limited Coverage Form (HO-8).
   */
  const _08 = 7;

  /**
   * All Risks Tenants Homeowners.
   */
  const _4A = 8;

  /**
   * All Risks Condominium Tenants Homeowners.
   */
  const _6A = 9;

  /**
   * Dwelling Fire-Basic Fire (DP-1).
   */
  const BA = 10;

  /**
   * Dwelling Fire-Broad (DP-2).
   */
  const BR = 11;

  /**
   * Dwelling Fire-Fire and Extended Coverage.
   */
  const EC = 12;

  /**
   * Earthquake Policy.
   */
  const EQ = 13;

  /**
   * Hurricane Relief Policy.
   */
  const HR = 14;

  /**
   * Mobile Homeowners.
   */
  const MH = 15;

  /**
   * Dwelling Fire - Special with Additional Extended.
   */
  const SE = 16;

  /**
   * Dwelling Fire-Special.
   */
  const SP = 17;

  /**
   * Texas Homeowners Form A.
   */
  const T1 = 18;

  /**
   * Texas Homeowners Form B.
   */
  const T2 = 19;

  /**
   * Texas Homeowners Form C.
   */
  const T3 = 20;

  /**
   * Texas Tenant Form B.
   */
  const T4 = 21;

  /**
   * Texas Tenant Form C.
   */
  const T5 = 22;

  /**
   * Texas Condominium Form B.
   */
  const T6 = 23;

  /**
   * Texas Condominium Form C.
   */
  const T7 = 24;

  /**
   * Dwelling Fire-Fire, Extended Coverage VMM.
   */
  const VM = 25;

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
