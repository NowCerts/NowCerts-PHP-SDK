<?php

namespace NowCerts;

class Customer {

  /**
   * @var string
   */
  public $databaseId;

  /**
   * @var string
   */
  public $commercialName;

  /**
   * @var string
   */
  public $firstName;

  /**
   * @var string
   */
  public $lastName;

  /**
   * @var \NowCerts\InsuredType
   */
  public $type;

  /**
   * @var string
   */
  public $addressLine1;

  /**
   * @var string
   */
  public $addressLine2;

  /**
   * @var string
   */
  public $stateNameOrAbbreviation;

  /**
   * @var string
   */
  public $city;

  /**
   * @var string
   */
  public $zipCode;

  /**
   * @var string
   */
  public $eMail;

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
  public $fax;

  /**
   * @var string
   */
  public $phone;

  /**
   * @var string
   */
  public $cellPhone;

  /**
   * @var string
   */
  public $smsPhone;

  /**
   * @var string
   */
  public $description;

  /**
   * @var bool
   */
  public $active;

  /**
   * @var string
   */
  public $website;

  /**
   * @var string
   */
  public $fein;

  /**
   * @var string
   */
  public $customerId;

  /**
   * @var string
   */
  public $insuredId;

  /**
   * Constructs a Customer object.
   *
   * @param array $properties
   *   An associative array of properties and values.
   *
   * @see https://api.nowcerts.com/Help/ResourceModel?modelName=Customer
   */
  public function __construct(array $properties) {
    foreach ($properties as $property => $value) {
      switch ($property) {
        // Strings.
        case 'databaseId':
        case 'commercialName':
        case 'firstName':
        case 'lastName':
        case 'addressLine1':
        case 'addressLine2':
        case 'stateNameOrAbbreviation':
        case 'city':
        case 'zipCode':
        case 'eMail':
        case 'eMail2':
        case 'eMail3':
        case 'fax':
        case 'phone':
        case 'cellPhone':
        case 'smsPhone':
        case 'description':
        case 'website':
        case 'fein':
        case 'customerId':
        case 'insuredId':
          $this->$property = $value;
          break;

        // Booleans.
        case 'active':
          $this->$property = (bool) $value;
          break;

        // InsuredType objects.
        case 'type':
          $this->$property = new InsuredType($value);
          break;
      }
    }
  }

  /**
   * Gets a list of customers.
   *
   * @param array $search_criteria
   *   An associative array of search criteria, all of which are optional:
   *   - (string) Name
   *   - (string) Address
   *   - (string) Email
   *   - (string) Phone
   *   - (string) InsuredId
   *   - (string) CustomerId
   * @param int $page
   *   (optional) An integer indicating what page of results to return. The
   *   default is the first page.
   * @param int $per_page
   *   (optional) An integer indicating how many results to return per page.
   *   Leave empty to return all results.
   *
   * @return array
   *   An array of customers matching the search criteria and paging arguments.
   *
   * @see https://api.nowcerts.com/Help/Api/GET-api-Customers-GetCustomersList_search-Name_search-Address_search-Email_search-Phone_search-InsuredId_search-CustomerId_paging-PageNumber_paging-PageSize
   * @see https://api.nowcerts.com/Help/ResourceModel?modelName=CustomerList
   */
  public static function getCustomers(array $search_criteria = array(), $page = NULL, $per_page = NULL) {
    $customers = array();
    if (empty($search_criteria)) {
      throw new Exception('At least one filter must be present when getting customers.');
    }
    $arguments = array();
    foreach ($search_criteria as $key => $value) {
      $arguments["search." . $key] = $value;
    }
    if (isset($page) && isset($per_page)) {
      $arguments["paging.PageNumber"] = $page;
      $arguments["paging.PageSize"] = $per_page;
    }
    $results = HttpClient::get("/Customers/GetCustomersList", $arguments);
    foreach ($results['result'] as $result) {
      $customers[] = new Customer($result);
    }
    return $customers;
  }

}
