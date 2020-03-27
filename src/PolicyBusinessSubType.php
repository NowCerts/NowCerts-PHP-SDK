<?php

namespace NowCerts;

/**
 * Represents business subtypes for policies.
 *
 * @see https://api.nowcerts.com/Help/ResourceModel?modelName=PolicyBusinessSubType
 */
class PolicyBusinessSubType {

  const AgentOfRecord = 0;
  const NewCustomer = 1;
  const NewLOB = 2;
  const ChangedPlan = 3;
  const NewToMedicare = 4;
  const PurchasedBook = 5;

  /**
   * @var int
   */
  public $value;

  /**
   * Sets the value of the business subtype.
   *
   * @param int $value
   *   The integer corresponding to the business subtype.
   */
  public function __construct($value) {
    $this->value = $value;
  }

}
