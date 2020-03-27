<?php

namespace NowCerts;

class KeyValueTypeJson {

  /**
   * @var string
   */
  public $propertyName;

  /**
   * @var string
   */
  public $displayName;

  /**
   * @var object
   */
  public $value;

  /**
   * @var \NowCerts\CustomFieldType
   */
  public $type;

  /**
   * @var int
   */
  public $order;

  /**
   * Constructs a KeyValueTypeJson object.
   *
   * @param array $properties
   *   An associative array of properties and values.
   *
   * @see https://api.nowcerts.com/Help/ResourceModel?modelName=KeyValueTypeJson
   */
  public function __construct(array $properties) {
    foreach ($properties as $property => $value) {
      switch ($property) {
        // Strings.
        case 'propertyName':
        case 'displayName':
          $this->$property = $value;
          break;

        // Integers.
        case 'order':
          $this->$property = $value;
          break;

        // Objects.
        case 'value':
          $this->$property = $value;
          break;

        // CustomFieldType objects.
        case 'type':
          $this->$property = is_int($value) ? new CustomFieldType($value) : $value;
          break;

      }
    }
  }

}
