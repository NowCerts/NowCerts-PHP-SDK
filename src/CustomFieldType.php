<?php

namespace NowCerts;

/**
 * Represents a custom field type.
 *
 * @see https://api.nowcerts.com/Help/ResourceModel?modelName=CustomFieldType
 */
class CustomFieldType {

  const Text = 0;
  const Number = 1;
  const Money = 2;
  const Percent = 3;
  const Date = 4;
  const DateTime = 5;
  const YesNo = 6;
  const Checkbox = 7;

  /**
   * @var int
   */
  public $value;

  /**
   * Sets the value of the custom field type.
   *
   * @param int $value
   *   The integer corresponding to the custom field type.
   */
  public function __construct($value) {
    $this->value = $value;
  }

}
