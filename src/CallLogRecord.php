<?php

namespace NowCerts;

class CallLogRecord {

  /**
   * @var string
   */
  public $type;

  /**
   * @var string
   */
  public $from_number;

  /**
   * @var string
   */
  public $from_name;

  /**
   * @var string
   */
  public $to_number;

  /**
   * @var string
   */
  public $to_name;

  /**
   * @var \NowCerts\DateTime
   */
  public $start_date;

  /**
   * @var float
   */
  public $duration;

  /**
   * @var string
   */
  public $call_log_id;

  /**
   * @var string
   */
  public $action;

  /**
   * @var string
   */
  public $result;

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
   * Constructs a CallLogRecord object.
   *
   * @param array $properties
   *   An associative array of properties and values.
   *
   * @see https://api.nowcerts.com/Help/ResourceModel?modelName=CallLogRecordIntegrationModel
   */
  public function __construct(array $properties) {
    foreach ($properties as $property => $value) {
      switch ($property) {
        // Strings.
        case 'type':
        case 'from_number':
        case 'from_name':
        case 'to_number':
        case 'to_name':
        case 'call_log_id':
        case 'action':
        case 'result':
        case 'insured_database_id':
        case 'insured_email':
        case 'insured_first_name':
        case 'insured_last_name':
        case 'insured_commercial_name':
          $this->$property = $value;
          break;

        // Date objects.
        case 'start_date':
          $this->$property = new DateTime($value);
          break;

        // Floats.
        case 'duration':
          $this->$property = $value;
          break;
      }
    }
  }

  /**
   * Gets a list of call_log_records.
   *
   * @see https://api.nowcerts.com/Help/Api/GET-api-Zapier-GetCallLogRecords
   */
  public static function getCallLogRecords() {
    $results = HttpClient::get('/Zapier/GetCallLogRecords');
    $call_log_records = array();
    foreach ($results as $result) {
      $call_log_records[] = new CallLogRecord($result);
    }
    return $call_log_records;
  }

  /**
   * Inserts a call log record.
   *
   * @see https://api.nowcerts.com/Help/Api/POST-api-Zapier-InsertCallLogRecord
   */
  public function insert() {
    $arguments = array();
    foreach ((array) $this as $field_name => $value) {
      if (!is_null($value)) {
        $arguments[$field_name] = $value;
      }
    }
    $results = HttpClient::post('/Zapier/InsertCallLogRecord', $arguments);
    return $results;
  }

}
