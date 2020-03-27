<?php

namespace NowCerts;

/**
 * Represents a GroupHealthMemberType.
 *
 * @see https://api.nowcerts.com/Help/ResourceModel?modelName=GroupHealthMemberType
 */
class GroupHealthMemberType {

  const Employee = 1;
  const Dependent = 2;

  /**
   * @var int
   */
  public $value;

  /**
   * Sets the value of the GroupHealthMemberType.
   *
   * @param int $value
   *   The integer corresponding to the GroupHealthMemberType.
   */
  public function __construct($value) {
    $this->value = $value;
  }

}
