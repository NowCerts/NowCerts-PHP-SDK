<?php

namespace NowCerts;

/**
 * Represents a GroupHealthMemberCoverageTier.
 *
 * @see https://api.nowcerts.com/Help/ResourceModel?modelName=GroupHealthMemberCoverageTier
 */
class GroupHealthMemberCoverageTier {

  const Employee = 1;
  const Spouse = 2;
  const Child = 3;
  const Family = 4;

  /**
   * @var int
   */
  public $value;

  /**
   * Sets the value of the GroupHealthMemberCoverageTier.
   *
   * @param int $value
   *   The integer corresponding to the GroupHealthMemberCoverageTier.
   */
  public function __construct($value) {
    $this->value = $value;
  }

}
