<?php

namespace NowCerts;

class Sms {

  /**
   * @var \NowCerts\DateTime
   */
  public $date_and_time;

  /**
   * @var string
   */
  public $from_number;

  /**
   * @var string
   */
  public $to_number;

  /**
   * @var string
   */
  public $subject;

  /**
   * @var string
   */
  public $from_name;

  /**
   * @var string
   */
  public $to_name;

  /**
   * @var string
   */
  public $conversation_id;

  /**
   * @var string
   */
  public $message_id;

  /**
   * @var bool
   */
  public $is_read;

  /**
   * @var string
   */
  public $system_type;

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
   * Constructs an Sms object.
   *
   * @param array $properties
   *   An associative array of properties and values.
   *
   * @see https://api.nowcerts.com/Help/ResourceModel?modelName=SMSIntegrationModel
   */
  public function __construct(array $properties) {
    foreach ($properties as $property => $value) {
      switch ($property) {
        // Strings.
        case 'from_number':
        case 'to_number':
        case 'subject':
        case 'from_name':
        case 'to_name':
        case 'conversation_id':
        case 'message_id':
        case 'system_type':
        case 'insured_database_id':
        case 'insured_email':
        case 'insured_first_name':
        case 'insured_last_name':
        case 'insured_commercial_name':
          $this->$property = $value;
          break;

        // Date objects.
        case 'date_and_time':
          if (is_string($value)) {
            $this->$property = new DateTime($value);
          }
          else {
            $this->$property = $value;
          }
          break;

        // Booleans.
        case 'is_read':
          $this->{$property}[] = (bool) $value;
          break;
      }
    }
  }

  /**
   * Gets a list of Sms objects.
   *
   * @see https://api.nowcerts.com/Help/Api/GET-api-Zapier-GetSMSes
   */
  public static function getSmses() {
    $results = HttpClient::get('/Zapier/GetSMSes');
    $smses = array();
    foreach ($results as $result) {
      $smses[] = new Sms($result);
    }
    return $smses;
  }

  /**
   * Inserts a sms.
   *
   * @see https://api.nowcerts.com/Help/Api/POST-api-Zapier-InsertSms
   */
  public function insert() {
    $arguments = array();
    foreach ((array) $this as $field_name => $value) {
      if (!is_null($value)) {
        $arguments[$field_name] = $value;
      }
    }
    $results = HttpClient::post('/Zapier/InsertSMSes', $arguments);
    return $results;
  }

  /**
   * @param array $arguments
   *   An associative array of arguments. The following are supported:
   *   - (string) smsSid
   *   - (string) body
   *   - (string) messageStatus
   *   - (string) accountSid
   *   - (string) from
   *   - (string) to
   *   - (string) fromCity
   *   - (string) fromState
   *   - (string) fromZip
   *   - (string) fromCountry
   *   - (string) toCity
   *   - (string) toState
   *   - (string) toZip
   *   - (string) toCountry
   *
   * @see https://api.nowcerts.com/Help/Api/POST-api-Twilio-Sms
   */
  public static function twilio(array $arguments) {
    $results = HttpClient::post('/Twilio/Sms', $arguments);
    return $results;
  }

}
