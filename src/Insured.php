<?php

namespace NowCerts;

/**
 * Represents an Insured.
 */
class Insured {

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
  public $last_name;

  /**
   * @var string
   */
  public $commercial_name;

  /**
   * @var string
   */
  public $greeting_name;

  /**
   * @var string
   */
  public $email;

  /**
   * @var string
   */
  public $eMail2;

  /**
   * @var string
   */
  public $eMail3;

  /**
   * @var string
   */
  public $description;

  /**
   * @var string
   */
  public $address_line_1;

  /**
   * @var string
   */
  public $address_Line_2;

  /**
   * @var string
   */
  public $insured_id;

  /**
   * @var string
   */
  public $customer_id;

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
  public $zip_code;

  /**
   * @var string
   */
  public $phone_number;

  /**
   * @var string
   */
  public $cell_phone;

  /**
   * @var string
   */
  public $sms_phone;

  /**
   * @var string
   */
  public $website;

  /**
   * @var string
   */
  public $tag_name;

  /**
   * @var string
   */
  public $tag_description;

  /**
   * @var \NowCerts\InsuredType
   */
  public $type;

  /**
   * @var string[]
   */
  public $agents;

  /**
   * @var string[]
   */
  public $csrs;

  /**
   * @var NowCerts\Agent[]
   */
  public $AgentsModel;

  /**
   * @var NowCerts\Agent[]
   */
  public $CSRsModel;

  /**
   * @var string
   */
  public $middle_name;

  /**
   * @var \NowCerts\DateTime
   */
  public $date_of_birth;

  /**
   * @var string
   */
  public $co_insured_first_name;

  /**
   * @var string
   */
  public $co_insured_middle_name;

  /**
   * @var string
   */
  public $co_insured_last_name;

  /**
   * @var \NowCerts\DateTime
   */
  public $co_insured_date_of_birth;

  /**
   * @var \NowCerts\CustomFields[]
   */
  public $customFields;

  /**
   * @var \NowCerts\CustomFieldSimple[]
   */
  public $customFieldsSimple;

  /**
   * Constructs an Insured object.
   *
   * @param array $properties
   *   An associative array of properties and values.
   *
   * @see https://api.nowcerts.com/Help/ResourceModel?modelName=InsuredIntegrationModel
   */
  public function __construct(array $properties) {
    foreach ($properties as $property => $value) {
      switch ($property) {
        // Strings.
        case 'database_id':
        case 'first_name':
        case 'last_name':
        case 'commercial_name':
        case 'greeting_name':
        case 'email':
        case 'email2':
        case 'email3':
        case 'description':
        case 'address_line_1':
        case 'address_Line_2':
        case 'insured_id':
        case 'customer_id':
        case 'city':
        case 'state':
        case 'zip_code':
        case 'phone_number':
        case 'cell_phone':
        case 'sms_phone':
        case 'website':
        case 'tag_name':
        case 'tag_description':
        case 'middle_name':
        case 'co_insured_first_name':
        case 'co_insured_middle_name':
        case 'co_insured_last_name':
          $this->$property = $value;
          break;

        // Arrays of strings.
        case 'agents':
        case 'csrs':
          $this->$property = $value;
          break;

        // InsuredType objects.
        case 'type':
          $this->$property = new InsuredType($value);
          break;

        // Arrays of NowCerts\Agent objects.
        case 'AgentsModel':
        case 'CSRsModel':
          foreach ($value as $item) {
            if (is_array($item)) {
              $this->{$property}[] = new Agent($item['databaseId'], $item['firstName'], $item['lastName'], $item['order']);
            }
            else {
              $this->{$property}[] = $item;
            }
          }
          break;

        // Dates.
        case 'date_of_birth':
        case 'co_insured_date_of_birth':
          if (is_string($value)) {
            $this->$property = new DateTime($value);
          }
          else {
            $this->$property = $value;
          }
          break;

        // Simple custom fields.
        case 'customFieldsSimple':
          foreach ($value as $item) {
            if (is_array($item)) {
              $this->{$property}[] = new CustomFieldSimple($item['text'], $item['value']);
            }
            else {
              $this->{$property}[] = $item;
            }
          }
          break;

        // Custom fields.
        case 'customFields':
          foreach ($value as $item) {
            if (is_array($item)) {
              $this->{$property}[] = new CustomFields($item['customPanelName'], $item['customFields']);
            }
            else {
              $this->{$property}[] = $item;
            }
          }
          break;

        // XDateAndLineOfBusiness objects.
        case 'xDatesAndLinesOfBusiness':
          foreach ($value as $item) {
            if (is_array($item)) {
              $this->{$property}[] = new XDateAndLineOfBusiness($item['xDate'], $item['lineOfBusinessName']);
            }
            else {
              $this->{$property}[] = $item;
            }
          }
          break;
      }
    }
  }

  /**
   * Gets a list of insureds.
   *
   * @return \NowCerts\Insured[]
   *   An array of insureds where each element is an object of the type
   *   NowCerts\Insured.
   *
   * @see https://api.nowcerts.com/Help/Api/GET-api-Zapier-GetInsureds
   */
  public static function getList() {
    $insureds = array();
    $response = HttpClient::get("/Zapier/GetInsureds");
    foreach ($response as $item) {
      $insureds[] = new Insured($item);
    }
    return $insureds;
  }

  /**
   * Creates a new insured.
   *
   * @return string
   *   The globally-unique database ID of the newly-inserted insured.
   *
   * @see https://api.nowcerts.com/Help/Api/POST-api-Insured-Insert
   * @see https://api.nowcerts.com/Help/Api/POST-api-Insured-OnlyInsertInsured
   * @see https://api.nowcerts.com/Help/Api/POST-api-Insured-InsertNoOverride
   * @see https://api.nowcerts.com/Help/Api/POST-api-Zapier-InsertInsured
   */
  public function insert() {
    $arguments = Util::snakeToCamel((array) $this);
    $response = HttpClient::post('/Insured/Insert', $arguments);
    //$response = HttpClient::post('/Zapier/InsertInsured', $arguments);
    return $response['insuredDatabaseId'];
  }

  /**
   * Creates a new insured, no override.
   *
   * Like insert() but takes policies and quotes arguments.
   *
   * @param \NowCerts\Policy[] $policies
   *   (optional) An array of Policy objects.
   * @param \NowCerts\Quote[] $quotes
   *   (optional) An array of Quote objects.
   *
   * @see https://api.nowcerts.com/Help/Api/POST-api-Insured-InsertNoOverride
   * @see https://api.nowcerts.com/Help/ResourceModel?modelName=NcPolicyMatch
   * @see https://api.nowcerts.com/Help/ResourceModel?modelName=NcQuoteMatch
   */
  public function insertNoOverride(array $policies = array(), array $quotes = array()) {
    $arguments = Util::snakeToCamel((array) $this);
    $response = HttpClient::post('/Insured/InsertNoOverride', $arguments);
    return $response['insuredDatabaseId'];
  }

  /**
   * Inserts a combination of Insured, Policies, and Quotes.
   *
   * @param \NowCerts\Policy[] $policies
   *   An array of Policy objects to insert.
   * @param \NowCerts\Quote[] $quotes
   *   An array of Quote objects to insert.
   *
   * @return array
   *   An associative array of details about the result including the following:
   *   - (array) policiesOrQuotes: An array of results, each corresponding to
   *     an input policy or quote and having the following structure:
   *     - (string) policyOrQuoteId: The globally-unique ID of the policy or
   *       quote.
   *     - (bool) isQuote: A boolean indicating if the ID corresponds to a
   *       quote.
   *     - (int) status: A status code.
   *     - (string) message: A status message.
   *   - (string) insuredDatabaseID: A globally-unique ID of the insured.
   *   - (int) status: A status code.
   *   - (string) message: A status message.
   *
   * @see https://api.nowcerts.com/Help/Api/POST-api-InsuredAndPolicies-Insert
   */
  public function insuredAndPoliciesInsert(array $policies, array $quotes) {
    $arguments = Util::snakeToCamel((array) $this);
    $arguments['policies'] = $policies;
    $arguments['quotes'] = $quotes;
    $response = HttpClient::post('/InsuredAndPolicies/Insert', $arguments);
    return $response;
  }

  /**
   * @param array $arguments
   *
   * @see https://api.nowcerts.com/Help/Api/POST-api-Zapier-InsertInsuredWithCustomFields
   */
  public function insertInsuredWithCustomFields(array $arguments) {
    $arguments += (array) $this;
    $results = HttpClient::post('/Zapier/InsertInsuredWithCustomFields', $arguments);
    return $results;
  }

}
