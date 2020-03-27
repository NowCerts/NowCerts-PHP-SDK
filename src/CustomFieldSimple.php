<?php

namespace NowCerts;

/**
 * Represents a simple custom field name and value pair.
 *
 * @see https://api.nowcerts.com/Help/ResourceModel?modelName=CustomFieldSimple
 */
class CustomFieldSimple {

  /**
   * @var string
   */
  public $text;

  /**
   * @var string
   */
  public $value;

  /**
   * Sets the properties of the CustomFieldSimple object.
   *
   * @param string $text
   *   The label for the simple custom field.
   * @param string $value
   *   The value for the simple custom field.
   */
  public function __construct($text, $value) {
    $this->text = $text;
    $this->value = $value;
  }

}
