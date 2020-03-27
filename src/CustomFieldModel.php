<?php

namespace NowCerts;

/**
 * Represents a custom field model.
 *
 * @see https://api.nowcerts.com/Help/ResourceModel?modelName=CustomFieldModel
 */
class CustomFieldModel {

  /**
   * @var string
   */
  public $name;

  /**
   * @var string
   */
  public $description;

  /**
   * @var \NowCerts\CustomFieldType
   */
  public $type;

  /**
   * @var int
   */
  public $order;

  /**
   * Sets the properties of the CustomFieldModel object.
   *
   * @param string $name
   *   (required) String length: inclusive between 0 and 512.
   * @param string $description
   *   A description of the custom field.
   * @param \NowCerts\CustomFieldType $type
   *   A field type.
   * @param int $order
   *   The sort order for the field when appearing with others.
   */
  public function __construct($name, $description, CustomFieldType $type, $order) {
    $this->name = $name;
    $this->description = $description;
    if (is_object($type)) {
      $this->type = $type;
    }
    else {
      $this->type = new CustomFieldType($type);
    }
    $this->order = $order;
  }

}
