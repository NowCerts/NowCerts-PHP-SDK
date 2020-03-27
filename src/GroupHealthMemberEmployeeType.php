<?php

namespace NowCerts;

/**
 * Represents a GroupHealthMemberEmployeeType.
 *
 * @see https://api.nowcerts.com/Help/ResourceModel?modelName=GroupHealthMemberEmployeeType
 */
class GroupHealthMemberEmployeeType {

  const FullTime = 1;
  const PartTime = 2;
  const Other = 3;

  /**
   * @var int
   */
  public $value;

  /**
   * Sets the value of the GroupHealthMemberEmployeeType.
   *
   * @param int $value
   *   The integer corresponding to the GroupHealthMemberEmployeeType.
   */
  public function __construct($value) {
    $this->value = $value;
  }

}
