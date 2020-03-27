<?php

namespace NowCerts;

/**
 * Represents billing types for policies.
 *
 * @see https://api.nowcerts.com/Help/ResourceModel?modelName=PolicyBillingType
 */
class PolicyBillingType {

  const Direct_Bill_100 = 0;
  const Direct_Bill_with_agency_down_payment = 1;
  const Agency_Bill_100 = 2;
  const Agency_Bill_with_Outside_Financing = 3;
  const Agency_Bill_Paid_In_Full = 4;
  const Direct_Bill_Autopay = 5;

  /**
   * @var int
   */
  public $value;

  /**
   * Sets the value of the billing type.
   *
   * @param int $value
   *   The integer corresponding to the billing type.
   */
  public function __construct($value) {
    $this->value = $value;
  }

}
