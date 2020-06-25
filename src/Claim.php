<?php

namespace NowCerts;

class Claim {

  /**
   * @var string
   */
  public $database_id;

  /**
   * @var string
   */
  public $claim_number;

  /**
   * @var string
   */
  public $status;

  /**
   * @var \NowCerts\DateAmount[]
   */
  public $date_amount;

  /**
   * @var string
   */
  public $street;

  /**
   * @var string
   */
  public $city;

  /**
   * @var string
   */
  public $state;

  /**
   * @var string
   */
  public $zip;

  /**
   * @var string
   */
  public $county;

  /**
   * @var \NowCerts\DateTime
   */
  public $date_of_loss;

  /**
   * @var string
   */
  public $describe_location;

  /**
   * @var string
   */
  public $police_or_fire;

  /**
   * @var string
   */
  public $report_number;

  /**
   * @var string
   */
  public $additional_comments;

  /**
   * @var string
   */
  public $description_of_loss;

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
  public $policy_number;

  /**
   * Constructs a Claim object.
   *
   * @param array $properties
   *   An associative array of properties and values.
   *
   * @see https://api.nowcerts.com/Help/ResourceModel?modelName=ClaimIntegrationModel
   */
  public function __construct(array $properties) {
    foreach ($properties as $property => $value) {
      switch ($property) {
        // Strings.
        case 'database_id':
        case 'claim_number':
        case 'status':
        case 'street':
        case 'city':
        case 'state':
        case 'zip':
        case 'county':
        case 'describe_location':
        case 'police_or_fire':
        case 'report_number':
        case 'additional_comments':
        case 'description_of_loss':
        case 'insured_database_id':
        case 'insured_email':
        case 'insured_first_name':
        case 'insured_last_name':
        case 'insured_commercial_name':
        case 'policy_number':
          $this->$property = $value;
          break;

        // Date objects.
        case 'date_of_loss':
          if (is_string($value)) {
            $this->$property = new DateTime($value);
          }
          else {
            $this->$property = $value;
          }
          break;

        // DateAmount object arrays.
        case 'date_amount':
          foreach ($value as $item) {
            $this->{$property}[] = new DateAmount(new DateTime($item['date']), $item['amount']);
          }
          break;
      }
    }
  }

  /**
   * Gets a list of claims.
   *
   * For fully-loaded Claim objects see getClaims().
   *
   * @param string $key
   *
   * @return \NowCerts\Claim[]
   *   An indexed array of Claim objects.
   *
   * @see https://api.nowcerts.com/Help/Api/GET-api-ClaimList_key
   */
  public static function getList($key = NULL) {
    $results = HttpClient::get("/ClaimList()", array('key' => $key));
    $claims = array();
    foreach ($results['value'] as $result) {
      $claims[] = new Claim(Util::camelToSnake($result));
    }
    return $claims;
  }

  /**
   * Gets a list of claims.
   *
   * @see https://api.nowcerts.com/Help/Api/GET-api-Zapier-GetClaims
   */
  public static function getClaims() {
    $results = HttpClient::get('/Zapier/GetClaims');
    $claims = array();
    foreach ($results as $result) {
      $claims[] = new Claim($result);
    }
    return $claims;
  }

  /**
   * Inserts a claim.
   *
   * @see https://api.nowcerts.com/Help/Api/POST-api-Zapier-InsertClaim
   */
  public function insert() {
    $arguments = array();
    foreach ((array) $this as $field_name => $value) {
      if (!is_null($value)) {
        $arguments[$field_name] = $value;
      }
    }
    $results = HttpClient::post('/Zapier/InsertClaim', $arguments);
    return $results;
  }

}
