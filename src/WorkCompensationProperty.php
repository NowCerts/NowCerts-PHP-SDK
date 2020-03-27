<?php

namespace NowCerts;

class WorkCompensationProperty {

  /**
   * @var string
   */
  public $databaseId;

  /**
   * @var string
   */
  public $propertyUse;

  /**
   * @var string
   */
  public $locationNumber;

  /**
   * @var string
   */
  public $buildingNumber;

  /**
   * @var string
   */
  public $addressLine1;

  /**
   * @var string
   */
  public $addressLine2;

  /**
   * @var string
   */
  public $city;

  /**
   * @var string
   */
  public $county;

  /**
   * @var string
   */
  public $zip;

  /**
   * @var string
   */
  public $descriptionOfOperations;

  /**
   * @var string
   */
  public $description;

  /**
   * @var string
   */
  public $state;

  /**
   * Constructs a WorkCompensationProperty object.
   *
   * @param array $properties
   *   An associative array of properties and values.
   *
   * @see https://api.nowcerts.com/Help/ResourceModel?modelName=WorkCompensationProperty
   */
  public function __construct(array $properties) {
    foreach ($properties as $property => $value) {
      switch ($property) {
        // Strings.
        case 'databaseId':
        case 'propertyUse':
        case 'locationNumber':
        case 'locationNumber':
        case 'addressLine1':
        case 'addressLine2':
        case 'city':
        case 'county':
        case 'zip':
        case 'descriptionOfOperations':
        case 'description':
        case 'state':
          $this->$property = $value;
          break;
      }
    }
  }

}
