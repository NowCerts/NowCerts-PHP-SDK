<?php

namespace NowCerts;

class Quote {

  /**
   * @var string
   */
  public $database_id;

  /**
   * @var string
   */
  public $number;

  /**
   * @var \NowCerts\DateTime
   */
  public $effective_date;

  /**
   * @var \NowCerts\DateTime
   */
  public $expiration_date;

  /**
   * @var \NowCerts\DateTime
   */
  public $bind_date;

  /**
   * @var \NowCerts\PolicyBusinessType
   */
  public $business_type;

  /**
   * @var \NowCerts\PolicyBusinessSubType
   */
  public $business_sub_type;

  /**
   * @var string
   */
  public $description;

  /**
   * @var \NowCerts\PolicyBillingType
   */
  public $billing_type;

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
  public $line_of_business_name;

  /**
   * @var string
   */
  public $carrier_name;

  /**
   * @var string
   */
  public $mga_name;

  /**
   * @var float
   */
  public $premium;

  /**
   * @var float
   */
  public $agency_commission_percent;

  /**
   * @var float
   */
  public $agency_commission_value;

  /**
   * @var float
   */
  public $agency_fee;

  /**
   * @var float
   */
  public $taxes;

  /**
   * @var string[]
   */
  public $agents;

  /**
   * @var string[]
   */
  public $csrs;

  /**
   * @var string
   */
  public $insured_greeting_name;

  /**
   * @var string
   */
  public $insured_insured_id;

  /**
   * @var string
   */
  public $insured_customer_id;

  /**
   * @var string
   */
  public $insured_address_line_1;

  /**
   * @var string
   */
  public $insured_address_Line_2;

  /**
   * @var string
   */
  public $insured_city;

  /**
   * @var string
   */
  public $insured_state;

  /**
   * @var string
   */
  public $insured_zip_code;

  /**
   * @var string
   */
  public $insured_phone_number;

  /**
   * @var string
   */
  public $insured_cell_phone;

  /**
   * @var string
   */
  public $insured_sms_phone;

  /**
   * @var string
   */
  public $insured_website;

  /**
   * @var string
   */
  public $insured_type;

  /**
   * Constructs a Quote object.
   *
   * @param array $properties
   *   An associative array of properties and values.
   */
  public function __construct(array $properties) {
    foreach ($properties as $property => $value) {
      switch ($property) {
        // Strings.
        case 'database_id':
        case 'number':
        case 'description':
        case 'insured_database_id':
        case 'insured_email':
        case 'insured_first_name':
        case 'insured_last_name':
        case 'insured_commercial_name':
        case 'line_of_business_name':
        case 'carrier_name':
        case 'mga_name':
        case 'insured_greeting_name':
        case 'insured_insured_id':
        case 'insured_customer_id':
        case 'insured_address_line_1':
        case 'insured_address_Line_2':
        case 'insured_city':
        case 'insured_state':
        case 'insured_zip_code':
        case 'insured_phone_number':
        case 'insured_cell_phone':
        case 'insured_sms_phone':
        case 'insured_website':
        case 'insured_type':
          $this->$property = $value;
          break;

        // Floats.
        case 'premium':
        case 'agency_commission_percent':
        case 'agency_commission_value':
        case 'agency_fee':
        case 'taxes':
          $this->$property = $value;
          break;

        // String arrays.
        case 'agents':
        case 'csrs':
          $this->$property = $value;
          break;

        // DateTime objects.
        case 'effective_date':
        case 'expiration_date':
        case 'bind_date':
          $this->$property = new DateTime($value);
          break;

        // PolicyBusinessType objects.
        case 'business_type':
          $this->$property = new PolicyBusinessType($value);
          break;

        // PolicyBusinessSubType objects.
        case 'business_sub_type':
          $this->$property = new PolicyBusinessSubType($value);
          break;

        // PolicyBillingType objects.
        case 'billing_type':
          $this->$property = new PolicyBillingType($value);
          break;
      }
    }
  }

  /**
   * Gets a list of quotes.
   *
   * @return \NowCerts\Quote[]
   *   An array of Quote objects.
   *
   * @see https://api.nowcerts.com/Help/Api/GET-api-Zapier-GetQuotes
   */
  public static function getQuotes() {
    $results = HttpClient::get('/Zapier/GetQuotes');
    $quotes = array();
    foreach ($results as $result) {
      $quotes[] = new Quote($result);
    }
    return $quotes;
  }

  /**
   * Inserts a quote.
   *
   * @see https://api.nowcerts.com/Help/Api/POST-api-Zapier-InsertQuote
   */
  public function insert() {
    $results = HttpClient::post('/Zapier/InsertQuote', (array) $this);
    return $results;
  }

}
