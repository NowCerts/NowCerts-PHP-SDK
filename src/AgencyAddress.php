<?php

namespace NowCerts;

/**
 * Represents an agency address.
 */
class AgencyAddress {

  /**
   * @var string
   */
  public $databaseId;

  /**
   * @var string
   */
  public $locationName;

  /**
   * @var string
   */
  public $locationBusinessName;

  /**
   * Constructs an AgencyAddress object.
   *
   * @param array $properties
   *   An associative array of properties and values.
   *
   * @see https://api.nowcerts.com/Help/ResourceModel?modelName=AgencyAddressEdit
   */
  public function __construct(array $properties) {
    foreach ($properties as $property => $value) {
      switch ($property) {
        case 'databaseId':
        case 'locationName':
        case 'locationBusinessName':
          $this->$property = $value;
      }
    }
  }

}
