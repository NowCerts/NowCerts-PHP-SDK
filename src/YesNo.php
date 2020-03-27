<?php

namespace NowCerts;

/**
 * Represents a YesNo value.
 *
 * @see https://api.nowcerts.com/Help/ResourceModel?modelName=YesNo
 */
class YesNo {

  const No = 0;
  const Yes = 1;

  /**
   * @var int
   */
  public $value;

  /**
   * Sets the value of the YesNo object.
   *
   * @param int $value
   *   The integer corresponding to the YesNo object.
   */
  public function __construct($value) {
    $this->value = $value;
  }

}
