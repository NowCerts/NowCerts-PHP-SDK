<?php

namespace NowCerts;

class Tag {

  /**
   * @var string
   */
  public $database_id;

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
  public $insured_greeting_name;

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
  public $insured_insured_id;

  /**
   * @var string
   */
  public $insured_customer_id;

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
   * Constructs a Tag object.
   *
   * @param array $properties
   *   An associative array of properties and values.
   *
   * @see https://api.nowcerts.com/Help/ResourceModel?modelName=TagIntegrationModel
   */
  public function __construct(array $properties) {
    foreach ($properties as $property => $value) {
      switch ($property) {
        // Strings.
        case 'database_id':
        case 'tag_name':
        case 'tag_description':
        case 'insured_database_id':
        case 'insured_email':
        case 'insured_first_name':
        case 'insured_last_name':
        case 'insured_commercial_name':
        case 'insured_greeting_name':
        case 'insured_address_line_1':
        case 'insured_address_Line_2':
        case 'insured_insured_id':
        case 'insured_customer_id':
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
      }
    }
  }

  /**
   * Gets a list of tags.
   *
   * @see https://api.nowcerts.com/Help/Api/GET-api-Zapier-GetTags
   */
  public static function getTags() {
    $results = HttpClient::get('/Zapier/GetTags');
    $tags = array();
    foreach ($results as $result) {
      $tags[] = new Tag($result);
    }
    return $tags;
  }

  /**
   * Inserts a tag.
   *
   * @see https://api.nowcerts.com/Help/Api/POST-api-Zapier-InsertTagApply
   */
  public function insert() {
    $arguments = array();
    foreach ((array) $this as $field_name => $value) {
      if (!is_null($value)) {
        $arguments[$field_name] = $value;
      }
    }
    $results = HttpClient::post('/Zapier/InsertTagApply', $arguments);
    return $results;
  }

}
