<?php

namespace NowCerts;

class QuoteApplication {

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
  public $email;

  /**
   * @var string
   */
  public $phone;

  /**
   * @var string
   */
  public $state;

  /**
   * @var string
   */
  public $source;

  /**
   * @var string
   */
  public $status;

  /**
   * @var string
   */
  public $type;

  /**
   * Constructs a QuoteApplication object.
   *
   * @param array $properties
   *   An associative array of properties and values.
   *
   * @see https://api.nowcerts.com/Help/ResourceModel?modelName=QuoteRequestIntegrationModel
   */
  public function __construct(array $properties) {
    foreach ($properties as $property => $value) {
      switch ($property) {
        // Strings.
        case 'first_name':
        case 'last_name':
        case 'email':
        case 'phone':
        case 'state':
        case 'source':
        case 'status':
        case 'type':
          $this->$property = $value;
          break;
      }
    }
  }

  /**
   * Gets a list of quote applications.
   *
   * @see https://api.nowcerts.com/Help/Api/GET-api-Zapier-GetQuoteApplications
   */
  public static function getQuoteApplications() {
    $results = HttpClient::get('/Zapier/GetQuoteApplications');
    $quote_applications = array();
    foreach ($results as $result) {
      $quote_applications[] = new QuoteApplication($result);
    }
    return $quote_applications;
  }

  /**
   * @see https://api.nowcerts.com/Help/Api/POST-api-PushQuoteApplications
   */
  public static function pushQuoteApplications() {
    $results = HttpClient::post('/PushQuoteApplications');
    return $results;
  }

  /**
   * @see https://api.nowcerts.com/Help/Api/POST-api-QuoteRush-PushQuoteApplications
   */
  public static function quoteRushPushQuoteApplications() {
    $results = HttpClient::post('/QuoteRush/PushQuoteApplications');
    return $results;
  }

}
