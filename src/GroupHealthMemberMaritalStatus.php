<?php

namespace NowCerts;

/**
 * Represents a GroupHealthMemberMaritalStatus.
 *
 * @see https://api.nowcerts.com/Help/ResourceModel?modelName=GroupHealthMemberMaritalStatus
 */
class GroupHealthMemberMaritalStatus {

  const Married = 1;
  const Divorced = 2;
  const Widowed = 3;

  /**
   * @var int
   */
  public $value;

  /**
   * Sets the value of the GroupHealthMemberMaritalStatus.
   *
   * @param int $value
   *   The integer corresponding to the GroupHealthMemberMaritalStatus.
   */
  public function __construct($value) {
    $this->value = $value;
  }

}
