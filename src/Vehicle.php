<?php

namespace NowCerts;

class Vehicle {

  /**
   * @var string
   */
  public $database_id;

  /**
   * @var string
   */
  public $type;

  /**
   * @var int
   */
  public $year;

  /**
   * @var string
   */
  public $make;

  /**
   * @var string
   */
  public $model;

  /**
   * @var string
   */
  public $vin;

  /**
   * @var string
   */
  public $description;

  /**
   * @var string
   */
  public $type_of_use;

  /**
   * @var \NowCerts\VehicleTypeOfUse
   */
  public $typeOfUseAsFlag;

  /**
   * @var string
   */
  public $value;

  /**
   * @var int
   */
  public $deductible_comprehensive;

  /**
   * @var int
   */
  public $deductible_collision;

  /**
   * @var bool
   */
  public $visible;

  /**
   * @var string[]
   */
  public $policy_numbers;

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
   * Constructs a Vehicle object.
   *
   * @param array $properties
   *   An associative array of properties and values.
   *
   * @see https://api.nowcerts.com/Help/ResourceModel?modelName=VehicleIntegrationModel
   */
  public function __construct(array $properties) {
    foreach ($properties as $property => $value) {
      switch ($property) {
        // Strings.
        case 'database_id':
        case 'type':
        case 'make':
        case 'model':
        case 'vin':
        case 'description':
        case 'type_of_use':
        case 'value':
        case 'insured_database_id':
        case 'insured_email':
        case 'insured_first_name':
        case 'insured_last_name':
        case 'insured_commercial_name':
          $this->$property = $value;
          break;

        // String arrays.
        case 'policy_numbers':
          $this->$property = $value;
          break;

        // Integers.
        case 'year':
        case 'deductible_comprehensive':
        case 'deductible_collision':
          $this->$property = $value;
          break;

        // Booleans.
        case 'visible':
          $this->$property = (bool) $value;
          break;

        // VehicleTypeOfUse objects.
        case 'typeOfUseAsFlag':
          $this->$property = new VehicleTypeOfUse($value);
          break;
      }
    }
  }

  /**
   * Gets a list of vehicles.
   *
   * @return \NowCerts\Vehicle[]
   *   A list of all vehicles.
   */
  public static function getVehicles() {
    $results = HttpClient::get('/Zapier/GetVehicles');
    $vehicles = array();
    foreach ($results as $result) {
      $vehicles[] = new Vehicle($result);
    }
    return $vehicles;
  }

  /**
   * Inserts a vehicle.
   *
   * @see https://api.nowcerts.com/Help/Api/POST-api-Zapier-InsertVehicle
   */
  public function insert() {
    $arguments = array();
    foreach ((array) $this as $field_name => $value) {
      if (!is_null($value)) {
        $arguments[$field_name] = $value;
      }
    }
    $results = HttpClient::post('/Zapier/InsertVehicle', $arguments);
    return $results;
  }

  /**
   * Inserts a collection of Vehicle objects.
   *
   * The documentation appears to be incorrect in that no value is returned on
   * success instead of the vehicle details as expected.
   *
   * @param \NowCerts\Vehicle[] $vehicles
   *   An array of Vehicle objects to insert or update.
   *
   * @see https://api.nowcerts.com/Help/Api/POST-api-Zapier-InsertVehicle
   */
  public static function bulkInsert(array $vehicles) {
    $vehicles_as_objects = array();
    foreach ($vehicles as $vehicle) {
      if (is_array($vehicle)) {
        $vehicles_as_objects[] = new Vehicle($vehicle);
      }
      else {
        $vehicles_as_objects[] = $vehicle;
      }
    }
    $results = HttpClient::post('/Vehicle/BulkInsertVehicle', $vehicles_as_objects);
    return $results;
  }

}
