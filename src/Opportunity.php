<?php

namespace NowCerts;

/**
 * Represents an Opportunity.
 */
class Opportunity {

  /**
   * @var string
   */
  public $database_id;

  /**
   * @var string
   */
  public $line_of_business_name;

  /**
   * @var \NowCerts\DateTime
   */
  public $needed_by;

  /**
   * @var string
   */
  public $opportunity_stage_name;

  /**
   * @var \NowCerts\DateTime
   */
  public $current_stage_due_date;

  /**
   * @var string
   */
  public $referral_source_name;

  /**
   * @var string
   */
  public $referral_source_contact_name;

  /**
   * @var string
   */
  public $win_probability;

  /**
   * @var float
   */
  public $agency_commission;

  /**
   * @var string[]
   */
  public $assigned_to;

  /**
   * @var string
   */
  public $description;

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
   * @var string[]
   */
  public $policy_numbers;

  /**
   * Constructs an Opportunity object.
   *
   * @param array $properties
   *   An associative array of properties and values.
   *
   * @see https://api.nowcerts.com/Help/ResourceModel?modelName=OpportunityIntegrationModel
   */
  public function __construct(array $properties) {
    foreach ($properties as $property => $value) {
      switch ($property) {
        // Strings.
        case 'database_id':
        case 'line_of_business_name':
        case 'opportunity_stage_name':
        case 'referral_source_name':
        case 'referral_source_contact_name':
        case 'win_probability':
        case 'description':
        case 'insured_database_id':
        case 'insured_email':
        case 'insured_first_name':
        case 'insured_last_name':
        case 'insured_commercial_name':
          $this->$property = $value;
          break;

        // Arrays of strings.
        case 'assigned_to':
        case 'policy_numbers':
          $this->$property = $value;
          break;

        // Floats.
        case 'agency_commission':
          $this->$property = $value;
          break;

        // Dates.
        case 'needed_by':
        case 'current_stage_due_date':
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
   * Gets a list of opportunities.
   *
   * @return \NowCerts\Opportunity[]
   *   An array of opportunities where each element is an object of the type
   *   NowCerts\Opportunity.
   *
   * @see https://api.nowcerts.com/Help/Api/GET-api-Zapier-GetOpportunities
   */
  public static function getOpportunities() {
    $opportunities = array();
    $response = HttpClient::get("/Zapier/GetOpportunities");
    foreach ($response as $item) {
      $opportunities[] = new Opportunity($item);
    }
    return $opportunities;
  }

  /**
   * Creates a new opportunity.
   *
   * @see https://api.nowcerts.com/Help/Api/POST-api-Zapier-InsertOpportunity
   */
  public function insert() {
    $response = HttpClient::post('/Zapier/InsertOpportunity', (array) $this);
    return $response;
  }

}
