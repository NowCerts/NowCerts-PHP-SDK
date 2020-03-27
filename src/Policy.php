<?php

namespace NowCerts;

class Policy {

  /**
   * @var string
   */
  public $databaseId;

  /**
   * @var string
   */
  public $number;

  /**
   * @var bool
   */
  public $isQuote;

  /**
   * @var \NowCerts\DateTime
   */
  public $effectiveDate;

  /**
   * @var \NowCerts\DateTime
   */
  public $expirationDate;

  /**
   * @var \NowCerts\DateTime
   */
  public $bindDate;

  /**
   * @var \NowCerts\PolicyBusinessType
   */
  public $businessType;

  /**
   * @var \NowCerts\PolicyBusinessSubType
   */
  public $businessSubType;

  /**
   * @var string
   */
  public $description;

  /**
   * @var \NowCerts\PolicyBillingType
   */
  public $billingType;

  /**
   * @var string
   */
  public $insuredDatabaseId;

  /**
   * @var string
   */
  public $insuredEmail;

  /**
   * @var string
   */
  public $insuredName;

  /**
   * @var string
   */
  public $insuredFirstName;

  /**
   * @var string
   */
  public $insuredLastName;

  /**
   * @var string
   */
  public $insuredCommercialName;

  /**
   * @var string[]
   */
  public $linesOfBusiness;

  /**
   * @var string
   */
  public $carrierName;

  /**
   * @var string
   */
  public $mgaName;

  /**
   * @var float
   */
  public $totalPremium;

  /**
   * @var float
   */
  public $totalNonPremium;

  /**
   * @var float
   */
  public $totalAgencyCommission;

  /**
   * @var \NowCerts\DateTime
   */
  public $changeDate;

  /**
   * @var \NowCerts\DateTime
   */
  public $cancellationDate;

  /**
   * @var \NowCerts\DateTime
   */
  public $reinstatementDate;

  /**
   * @var bool
   */
  public $active;

  /**
   * @var string
   */
  public $status;

  /**
   * @var \NowCerts\Agent[]
   */
  public $agents;

  /**
   * @var \NowCerts\Agent[]
   */
  public $csRs;

  /**
   * @var \NowCerts\DateTime
   */
  public $inceptionDate;

  /**
   * @var \NowCerts\DateTime
   */
  public $createDate;

  /**
   * @var \NowCerts\AgencyAddress
   */
  public $agencyLocation;

  /**
   * @var string
   */
  public $lineOfBusinessName;

  /**
   * @var float
   */
  public $premium;

  /**
   * @var float
   */
  public $agencyCommissionPercent;

  /**
   * @var float
   */
  public $agencyCommissionValue;

  /**
   * @var float
   */
  public $agencyFee;

  /**
   * @var float
   */
  public $taxes;

  /**
   * Constructs a Policy object.
   *
   * @param array $properties
   *   An associative array of properties and values.
   */
  public function __construct(array $properties) {
    foreach ($properties as $property => $value) {
      switch ($property) {
        // Strings.
        case 'databaseId':
        case 'number':
        case 'description':
        case 'insuredDatabaseId':
        case 'insuredEmail':
        case 'insuredName':
        case 'insuredFirstName':
        case 'insuredLastName':
        case 'insuredCommercialName':
        case 'carrierName':
        case 'mgaName':
        case 'status':
        case 'lineOfBusinessName':
          $this->$property = $value;
          break;

        // String arrays.
        case 'linesOfBusiness':
          $this->$property = $value;
          break;

        // Booleans.
        case 'isQuote':
        case 'active':
          $this->$property = (bool) $value;
          break;

        // Floats.
        case 'totalPremium':
        case 'totalNonPremium':
        case 'totalAgencyCommission':
        case 'premium':
        case 'agencyCommissionPercent':
        case 'agencyCommissionValue':
        case 'agencyFee':
        case 'taxes':
          $this->$property = $value;
          break;

        // Dates.
        case 'effectiveDate':
        case 'expirationDate':
        case 'bindDate':
        case 'changeDate':
        case 'cancellationDate':
        case 'reinstatementDate':
        case 'inceptionDate':
        case 'createDate':
          $this->$property = new DateTime($value);
          break;

        // PolicyBusinessType objects.
        case 'businessType':
          $this->$property = new PolicyBusinessType($value);
          break;

        // PolicyBusinessSubType objects.
        case 'businessSubType':
          $this->$property = new PolicyBusinessSubType($value);
          break;

        // PolicyBillingType objects.
        case 'billingType':
          $this->$property = new PolicyBillingType($value);
          break;

        // Agent objects.
        case 'agents':
        case 'csRs':
          foreach ($value as $item) {
            $item += array('order' => NULL);
            $this->{$property}[] = new Agent($item['databaseId'], $item['firstName'], $item['lastName'], $item['order']);
          }
          break;

        // AgencyAddress objects.
        case 'agencyLocation':
          if ($value) {
            $this->$property = new AgencyAddress($value);
          }
          break;
      }
    }
  }

  /**
   * Gets a list of policies.
   *
   * For fully-loaded Policy objects see getPolicies().
   *
   * @param array $search_criteria
   *   An associative array of filters. The supported filters are:
   *   - (bool) is_quote
   *   - (string) search_string: Filter on policy number contains.
   * @param array $columns
   *   The names of the columns to be returned. Use an empty array to avoid
   *   restriction. Supported values include:
   *   - databaseId
   *   - expirationDate
   *   - effectiveDate
   *   - bindDate
   *   - businessType
   *   - description
   *   - insuredFirstName
   *   - insuredLastName
   *   - insuredCommercialName
   *   - insuredEmail
   * @param string $order_by
   *   The machine name of the column on which to sort. Supported values
   *   include:
   *   - businessSubType
   *   - effectiveDate
   *   - expirationDate
   * @param string $order_by_direction
   *   Either "asc" or "desc".
   * @param int $page
   *   The multiple of $per_page to skip.
   * @param int $per_page
   *   The number of items per page.
   *
   * @return array
   *   An indexed array of matching policies where each element is an
   *   associative array of fields and values as spcified by the $columns
   *   argument.
   *
   * @see http://test.api.nowcerts.com/SearchPolicies
   */
  public static function getList(array $search_criteria = array(), array $columns = array(), $order_by = 'businessSubType', $order_by_direction = 'asc', $page = NULL, $per_page = NULL) {
    $arguments = array();
    $filter_parts = array();
    if (!empty($search_criteria['is_quote'])) {
      $filter_parts[] = '(isQuote eq true)';
    }
    if (isset($search_criteria['search_string'])) {
      $filter_parts[] = "contains(number, '" . $search_criteria['search_string'] . "')";
    }
    if (!empty($filter_parts)) {
      $arguments['$filter'] = implode(" and ", $filter_parts);
    }
    if (isset($order_by)) {
      $arguments['$orderby'] = $order_by;
      if (isset($order_by_direction)) {
        $arguments['$orderby'] .= " $order_by_direction";
      }
    }
    if (isset($page)) {
      $arguments['$skip'] = $page * $per_page;
    }
    if ($per_page) {
      $arguments['$top'] = $per_page;
    }
    if ($columns) {
      $arguments['$select'] = implode(",", $columns);
    }
    foreach ($arguments as &$argument) {
      $argument = rawurlencode($argument);
    }

    $result = HttpClient::get("/PolicyList()", $arguments, array(
      'raw_arguments' => TRUE,
    ));
    return $result['value'];
  }

  /**
   * Gets a list of policies.
   *
   * This is distinct from getList() in that getList() returns associative
   * arrays of the fields requested, and this method returns fully-loaded
   * NowCerts\Policy objects.
   *
   * @param array $search_criteria
   *   An associative array of search criteria. The following filters are
   *   supported:
   *   - Number
   *   - EffD
   *   - ExpD
   *   - Carrier
   *   - Lob
   *   - IId
   *   - ICommN
   *   - IEmail
   *   - IFN
   *   - ILN
   *
   * @return \NowCerts\Policy[]
   *   An array of matching policies.
   *
   * @see https://api.nowcerts.com/Help/Api/GET-api-Policy-FindPolicies_Number_EffD_ExpD_Carrier_Lob_IId_ICommN_IEmail_IFN_ILN
   */
  public static function getPolicies(array $search_criteria) {
    $results = HttpClient::get('/Policy/FindPolicies', $search_criteria);
    $policies = array();
    foreach ($results as $result) {
      $policies[] = new Policy($result);
    }
    return $policies;
  }

  /**
   * Gets a policy.
   *
   * @param string $id
   *   The globally-unique database ID of the policy.
   *
   * @return \NowCerts\Policy
   *   The matching Policy object.
   *
   * @see https://api.nowcerts.com/Help/Api/GET-api-PolicyList_key
   */
  public static function get($id) {
    $results = HttpClient::get('/PolicyList', array('key' => $id));
    return new Policy($results['value'][0]);
  }

  /**
   * Inserts a policy.
   *
   * @see https://api.nowcerts.com/Help/Api/POST-api-Policy-Insert
   */
  public function insert() {
    $arguments = array();
    foreach ((array) $this as $field_name => $value) {
      if (!is_null($value)) {
        $arguments[$field_name] = $value;
      }
    }
    $results = HttpClient::post('/Policy/Insert', $arguments);
    return $results;
  }

}
