<?php

namespace NowCerts;

class AutomobileLossClaim extends Claim {

  /**
   * @var string
   */
  public $description_of_accident;

  /**
   * @var string
   */
  public $vin_number;

  /**
   * @var string
   */
  public $driver_first_name;

  /**
   * @var string
   */
  public $driver_last_name;

  /**
   * @var string
   */
  public $driver_dl_number;

  /**
   * @var string
   */
  public $describe_damage;

  /**
   * @var string
   */
  public $other_vin_number;

  /**
   * @var string
   */
  public $other_driver_first_name;

  /**
   * @var string
   */
  public $other_driver_last_name;

  /**
   * @var string
   */
  public $other_driver_dl_number;

  /**
   * @var string
   */
  public $other_describe_damage;

  /**
   * @var bool
   */
  public $child_seat;

  /**
   * @var bool
   */
  public $child_seat_installed;

  /**
   * @var bool
   */
  public $child_seat_sustain;

  /**
   * @var string
   */
  public $estimate_amount;

  /**
   * @var string
   */
  public $where_vehicle_can_be_seen;

  /**
   * @var string
   */
  public $when_vehicle_can_be_seen;

  /**
   * Constructs an AutomobileLossClaim object.
   *
   * @param array $properties
   *   An associative array of properties and values.
   *
   * @see https://api.nowcerts.com/Help/ResourceModel?modelName=AutomobileLossClaimIntegrationModel
   */
  public function __construct(array $properties) {
    parent::__construct($properties);
    foreach ($properties as $property => $value) {
      switch ($property) {
        // Strings.
        case 'description_of_accident':
        case 'vin_number':
        case 'driver_first_name':
        case 'driver_last_name':
        case 'driver_dl_number':
        case 'describe_damage':
        case 'other_vin_number':
        case 'other_driver_first_name':
        case 'other_driver_last_name':
        case 'other_driver_dl_number':
        case 'other_describe_damage':
        case 'estimate_amount':
        case 'where_vehicle_can_be_seen':
        case 'when_vehicle_can_be_seen':
          $this->$property = $value;
          break;

        // Booleans.
        case 'child_seat':
        case 'child_seat_installed':
        case 'child_seat_sustain':
          $this->$property = (bool) $value;
          break;
      }
    }
  }

  /**
   * Gets a list of claims.
   *
   * @see https://api.nowcerts.com/Help/Api/GET-api-Zapier-GetAutomobileLossClaims
   */
  public static function getAutomobileLossClaims() {
    $results = HttpClient::get('/Zapier/GetAutomobileLossClaims');
    $claims = array();
    foreach ($results as $result) {
      $claims[] = new AutomobileLossClaim($result);
    }
    return $claims;
  }

  /**
   * Inserts a claim.
   *
   * @see https://api.nowcerts.com/Help/Api/POST-api-Zapier-InsertAutomobileLossClaim
   */
  public function insert() {
    $arguments = array();
    foreach ((array) $this as $field_name => $value) {
      if (!is_null($value)) {
        $arguments[$field_name] = $value;
      }
    }
    $results = HttpClient::post('/Zapier/InsertAutomobileLossClaim', $arguments);
    return $results;
  }

}
