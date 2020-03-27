<?php

namespace NowCerts;

/**
 * Represents insured types for customers.
 *
 * @see https://api.nowcerts.com/Help/ResourceModel?modelName=InsuredType
 */
class InsuredType {

  const Insured = 0;
  const Prospect = 1;

  /**
   * @var int
   */
  public $value;

  /**
   * Sets the value of the insured type.
   *
   * @param int $value
   *   The integer corresponding to the insured type.
   */
  public function __construct($value) {
    $this->value = $value;
  }

}
