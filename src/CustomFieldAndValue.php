<?php

namespace NowCerts;

/**
 * Represents a custom field name and value pair.
 *
 * @see https://api.nowcerts.com/Help/ResourceModel?modelName=CustomFieldAndValue
 */
class CustomFieldAndValue {

  /**
   * @var string
   */
  public $customFieldName;

  /**
   * @var string
   */
  public $customFieldValue;

  /**
   * Sets the properties of the CustomFieldAndValue object.
   *
   * @param string $customFieldName
   *   The label for the custom field.
   * @param string $customFieldValue
   *   The value for the custom field.
   */
  public function __construct($customFieldName, $customFieldValue) {
    $this->customFieldName = $customFieldName;
    $this->customFieldValue = $customFieldValue;
  }

}
