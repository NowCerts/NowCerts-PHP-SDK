<?php

namespace NowCerts;

/**
 * Represents a Prospect.
 */
class Prospect {

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
   * @var string
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
   * Constructs a Prospect object.
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
        case 'type':
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
      }
    }
  }

  /**
   * Gets a list of prospects.
   *
   * @return \NowCerts\Prospect[]
   *   An array of prospects where each element is an object of the type
   *   NowCerts\Prospect.
   *
   * @see https://api.nowcerts.com/Help/Api/GET-api-Zapier-GetProspects
   */
  public static function getProspects() {
    $prospects = array();
    $response = HttpClient::get("/Zapier/GetProspects");
    foreach ($response as $item) {
      $prospects[] = new Prospect($item);
    }
    return $prospects;
  }

  /**
   * Creates a new prospect.
   *
   * @see https://api.nowcerts.com/Help/Api/POST-api-Zapier-InsertProspect
   */
  public function insert() {
    $response = HttpClient::post('/Zapier/InsertProspect', (array) $this);
    return $response;
  }

  /**
   * Creates a new prospect with custom fields.
   *
   * @param array $parameters
   *   (optional) Additional parameters to pass in the request.
   *
   * @see https://api.nowcerts.com/Help/Api/POST-api-Zapier-InsertProspectWithCustomFields
   */
  public function insertWithCustomFields(array $parameters = array()) {
    $arguments = (array) $this + $parameters;
    $response = HttpClient::post('/Zapier/InsertProspectWithCustomFields', $arguments);
    return $response;
  }

  /**
   * @param array $parameters
   *   (optional) Additional parameters to pass in the request.
   *
   * @see https://api.nowcerts.com/Help/Api/POST-api-Xml-PushProspects
   */
  public static function xmlPush(array $parameters = array()) {
    $response = HttpClient::post('/Xml/PushProspects', $parameters);
    return $response;
  }

  /**
   * @param string $agencyId
   * @param string $quoteApplicationName
   * @param \NowCerts\FieldsOrderBy|int $fields_OrderBy
   * @param \NowCerts\KeyValueTypeJson[] $fields
   *
   * @see https://api.nowcerts.com/Help/Api/POST-api-QuoteRequestExternalImportWithProspect
   */
  public static function quoteRequestExternalImportWithProspect($agencyId, $quoteApplicationName, $fields_OrderBy, array $fields) {
    $arguments = array(
      'agencyId' => $agencyId,
      'quoteApplicationName' => $quoteApplicationName,
      'fields_OrderBy' => $fields_OrderBy,
      'fields' => $fields,
    );
    $response = HttpClient::post('/QuoteRequestExternalImportWithProspect', $arguments);
    return $response;
  }

  /**
   * @param string $agencyId
   * @param string $quoteApplicationName
   * @param \NowCerts\FieldsOrderBy|int $fields_OrderBy
   * @param \NowCerts\KeyValueTypeJson[] $fields
   *
   * @see https://api.nowcerts.com/Help/Api/POST-api-QuoteRequestExternalImportWithProspect
   */
  public static function quoteRequestExternalImport($agencyId, $quoteApplicationName, $fields_OrderBy, array $fields) {
    $arguments = array(
      'agencyId' => $agencyId,
      'quoteApplicationName' => $quoteApplicationName,
      'fields_OrderBy' => $fields_OrderBy,
      'fields' => $fields,
    );
    $response = HttpClient::post('/QuoteRequestExternalImport', $arguments);
    return $response;
  }

}
