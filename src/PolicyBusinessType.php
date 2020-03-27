<?php

namespace NowCerts;

/**
 * Represents business types for policies.
 *
 * @see https://api.nowcerts.com/Help/ResourceModel?modelName=PolicyBusinessType
 */
class PolicyBusinessType {

  const New_Business = 0;
  const Renewal = 1;
  const Rewrite = 2;

  /**
   * @var int
   */
  public $value;

  /**
   * Sets the value of the business type.
   *
   * @param int $value
   *   The integer corresponding to the business type.
   */
  public function __construct($value) {
    $this->value = $value;
  }

}
