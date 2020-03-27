<?php

namespace NowCerts;

/**
 * Represents a GroupHealthMemberStatus.
 *
 * @see https://api.nowcerts.com/Help/ResourceModel?modelName=GroupHealthMemberStatus
 */
class GroupHealthMemberStatus {

  const Active = 1;
  const Terminated = 2;
  const OnLeave = 3;
  const Retire = 4;

  /**
   * @var int
   */
  public $value;

  /**
   * Sets the value of the GroupHealthMemberStatus.
   *
   * @param int $value
   *   The integer corresponding to the GroupHealthMemberStatus.
   */
  public function __construct($value) {
    $this->value = $value;
  }

}
