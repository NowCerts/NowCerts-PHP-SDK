<?php

namespace NowCerts;

/**
 * @see https://api.nowcerts.com/Help/ResourceModel?modelName=ResidenceType
 */
class ResidenceType {

  /**
   * Apartment.
   */
  const AP = 0;

  /**
   * Condo
   */
  const CD = 1;

  /**
   * Co-op.
   */
  const CO = 2;

  /**
   * Dwelling-Insured Residence (non-farm).
   */
  const DW = 3;

  /**
   * Mobile Home.
   */
  const MH = 4;

  /**
   * Other.
   */
  const OT = 5;

  /**
   * Row House.
   */
  const RH = 6;

  /**
   * Townhouse.
   */
  const TH = 7;

  /**
   * Mixed-Use.
   */
  const MU = 8;

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
