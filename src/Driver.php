<?php

namespace NowCerts;

class Driver {

  /**
   * @var string
   */
  public $database_id;

  /**
   * @var string
   */
  public $first_name;

  /**
   * @var string
   */
  public $middle_name;

  /**
   * @var string
   */
  public $last_name;

  /**
   * @var \NowCerts\DateTime
   */
  public $date_of_birth;

  /**
   * @var string
   */
  public $ssn;

  /**
   * @var bool
   */
  public $excluded;

  /**
   * @var string
   */
  public $license_number;

  /**
   * @var string
   */
  public $license_state;

  /**
   * @var int
   */
  public $license_year;

  /**
   * @var \NowCerts\DateTime
   */
  public $hire_date;

  /**
   * @var \NowCerts\DateTime
   */
  public $termination_date;

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
   * Constructs a Driver object.
   *
   * @param array $properties
   *   An associative array of properties and values.
   *
   * @see https://api.nowcerts.com/Help/ResourceModel?modelName=DriverIntegrationModel
   */
  public function __construct(array $properties) {
    foreach ($properties as $property => $value) {
      switch ($property) {
        // Strings.
        case 'database_id':
        case 'first_name':
        case 'middle_name':
        case 'last_name':
        case 'date_of_birth':
        case 'ssn':
        case 'license_number':
        case 'license_state':
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
        case 'license_year':
          $this->$property = $value;
          break;

        // Booleans.
        case 'excluded':
          $this->{$property}[] = (bool) $value;
          break;

        // DateTime objects.
        case 'hire_date':
        case 'termination_date':
          if (is_string($value)) {
            $this->$property = new DateTime($value);
          }
          else {
            $this->$property = $value;
          }
          break;
      }
    }
  }

  /**
   * Gets a list of drivers.
   *
   * @see https://api.nowcerts.com/Help/Api/GET-api-Zapier-GetDrivers
   */
  public static function getDrivers() {
    $results = HttpClient::get('/Zapier/GetDrivers');
    $drivers = array();
    foreach ($results as $result) {
      $drivers[] = new Driver($result);
    }
    return $drivers;
  }

  /**
   * Inserts a driver.
   *
   * @see https://api.nowcerts.com/Help/Api/POST-api-Zapier-InsertDriver
   */
  public function insert() {
    $arguments = array();
    foreach ((array) $this as $field_name => $value) {
      if (!is_null($value)) {
        $arguments[$field_name] = $value;
      }
    }
    $results = HttpClient::post('/Zapier/InsertDriver', $arguments);
    return $results;
  }

  /**
   * Inserts a collection of drivers.
   *
   * @param \NowCerts\Driver[] $drivers
   *   An array of drivers to insert.
   *
   * @see https://api.nowcerts.com/Help/Api/POST-api-Driver-BulkInsertDriver
   */
  public static function bulkInsert(array $drivers) {
    $results = HttpClient::post('/Driver/BulkInsertDriver', $drivers);
    return $results;
  }

}
