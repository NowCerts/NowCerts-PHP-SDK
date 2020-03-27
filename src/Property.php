<?php

namespace NowCerts;

class Property {

  /**
   * @var string
   */
  public $database_id;

  /**
   * @var string
   */
  public $property_use;

  /**
   * @var string
   */
  public $location_number;

  /**
   * @var string
   */
  public $building_number;

  /**
   * @var string
   */
  public $address_line_1;

  /**
   * @var string
   */
  public $address_line_2;

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
  public $description_of_Operations;

  /**
   * @var string
   */
  public $description;

  /**
   * @var string
   */
  public $state;

  /**
   * @var string
   */
  public $insured_database_id;

  /**
   * @var string
   */
  public $insured_email;

  /**
   * @var string
   */
  public $insured_first_name;

  /**
   * @var string
   */
  public $insured_last_name;

  /**
   * @var string
   */
  public $insured_commercial_name;

  /**
   * @var string
   */
  public $AttachToPolicyNumber;

  /**
   * @var \NowCerts\PropertyCoverage
   */
  public $coverage;

  /**
   * @var \NowCerts\PropertyAdditional
   */
  public $additional;

  /**
   * @var \NowCerts\PropertyAdditional1
   */
  public $additional1;

  /**
   * @var \NowCerts\PropertyAdditional2
   */
  public $additional2;

  /**
   * Constructs a Property object.
   *
   * @param array $properties
   *   An associative array of properties and values.
   *
   * @see https://api.nowcerts.com/Help/ResourceModel?modelName=PropertyModel
   */
  public function __construct(array $properties) {
    foreach ($properties as $property => $value) {
      switch ($property) {
        // Strings.
        case 'database_id':
        case 'property_use':
        case 'location_number':
        case 'building_number':
        case 'address_line_1':
        case 'address_line_2':
        case 'city':
        case 'county':
        case 'zip':
        case 'description_of_Operations':
        case 'description':
        case 'state':
        case 'insured_database_id':
        case 'insured_email':
        case 'insured_first_name':
        case 'insured_last_name':
        case 'insured_commercial_name':
        case 'AttachToPolicyNumber':
          $this->$property = $value;
          break;

        // PropertyCoverage objects.
        case 'coverage':
          $this->$property = new PropertyCoverage($value);
          break;

        // PropertyAdditional objects.
        case 'additional':
          $this->$property = new PropertyAdditional($value);
          break;

        // PropertyAdditional1 objects.
        case 'additional1':
          $this->$property = new PropertyAdditional1($value);
          break;

        // PropertyAdditional2 objects.
        case 'additional2':
          $this->$property = new PropertyAdditional2($value);
          break;
      }
    }
  }

  /**
   * Gets a list of properties.
   *
   * @return \NowCerts\Property[]
   *   A list of all properties.
   */
  public static function getProperties() {
    $results = HttpClient::get('/Zapier/GetProperties');
    $properties = array();
    foreach ($results as $result) {
      $properties[] = new Property($result);
    }
    return $properties;
  }

  /**
   * Inserts a property.
   *
   * @see https://api.nowcerts.com/Help/Api/POST-api-Zapier-InsertProperty
   */
  public function insert() {
    $arguments = Util::snakeToCamel((array) $this);
    $results = HttpClient::post('/Zapier/InsertProperty', $arguments);
    return $results;
  }

  /**
   * Inserts or updates a property.
   *
   * @see https://api.nowcerts.com/Help/Api/POST-api-Property-InsertOrUpdate
   */
  public function insertOrUpdate() {
    $arguments = Util::snakeToCamel((array) $this);
    $results = HttpClient::post('/Property/InsertOrUpdate', $arguments);
    return $results;
  }

}
