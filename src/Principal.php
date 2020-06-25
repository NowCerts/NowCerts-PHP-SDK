<?php

namespace NowCerts;

class Principal {

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
   * @var string
   */
  public $description;

  /**
   * @var string
   */
  public $type;

  /**
   * @var string
   */
  public $personal_email;

  /**
   * @var string
   */
  public $business_email;

  /**
   * @var string
   */
  public $home_phone;

  /**
   * @var string
   */
  public $office_phone;

  /**
   * @var string
   */
  public $cell_phone;

  /**
   * @var string
   */
  public $personal_fax;

  /**
   * @var string
   */
  public $business_fax;

  /**
   * @var string
   */
  public $ssn;

  /**
   * @var \NowCerts\DateTime
   */
  public $birthday;

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
   * Constructs a Principal object.
   *
   * @param array $properties
   *   An associative array of properties and values.
   *
   * @see https://api.nowcerts.com/Help/ResourceModel?modelName=PrincipalIntegrationModel
   */
  public function __construct(array $properties) {
    foreach ($properties as $property => $value) {
      switch ($property) {
        // Strings.
        case 'database_id':
        case 'first_name':
        case 'middle_name':
        case 'last_name':
        case 'description':
        case 'type':
        case 'personal_email':
        case 'business_email':
        case 'home_phone':
        case 'office_phone':
        case 'cell_phone':
        case 'personal_fax':
        case 'business_fax':
        case 'ssn':
        case 'insured_database_id':
        case 'insured_email':
        case 'insured_first_name':
        case 'insured_last_name':
        case 'insured_commercial_name':
          $this->$property = $value;
          break;

        // Date objects.
        case 'birthday':
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
   * Gets a list of principals.
   *
   * @param string $key
   *
   * @return \NowCerts\Principal[]
   *   An indexed array of Principal objects.
   *
   * @see https://api.nowcerts.com/Help/Api/GET-api-PrincipalList_key
   */
  public static function getList($key = NULL) {
    $results = HttpClient::get("/PrincipalList()", array('key' => $key));
    $principals = array();
    foreach ($results['value'] as $result) {
      $principals[] = new Principal(Util::camelToSnake($result));
    }
    return $principals;
  }

  /**
   * Gets a list of principals.
   *
   * @see https://api.nowcerts.com/Help/Api/GET-api-Zapier-GetPrincipals
   */
  public static function getPrincipals() {
    $results = HttpClient::get('/Zapier/GetPrincipals');
    $principals = array();
    foreach ($results as $result) {
      $principals[] = new Principal($result);
    }
    return $principals;
  }

  /**
   * Inserts a principal.
   *
   * @see https://api.nowcerts.com/Help/Api/POST-api-Zapier-InsertPrincipal
   */
  public function insert() {
    $arguments = array();
    foreach ((array) $this as $field_name => $value) {
      if (!is_null($value)) {
        $arguments[$field_name] = $value;
      }
    }
    $results = HttpClient::post('/Zapier/InsertPrincipal', $arguments);
    return $results;
  }

}
