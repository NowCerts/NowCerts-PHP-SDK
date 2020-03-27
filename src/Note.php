<?php

namespace NowCerts;

class Note {

  /**
   * @var string
   */
  public $database_id;

  /**
   * @var string
   */
  public $subject;

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
   * Constructs a Note object.
   *
   * @param array $properties
   *   An associative array of properties and values.
   *
   * @see https://api.nowcerts.com/Help/ResourceModel?modelName=NoteIntegrationModel
   */
  public function __construct(array $properties) {
    foreach ($properties as $property => $value) {
      switch ($property) {
        // Strings.
        case 'database_id':
        case 'subject':
        case 'insured_database_id':
        case 'insured_email':
        case 'insured_first_name':
        case 'insured_last_name':
        case 'insured_commercial_name':
          $this->$property = $value;
          break;
      }
    }
  }

  /**
   * Gets a list of notes.
   *
   * @see https://api.nowcerts.com/Help/Api/GET-api-Zapier-GetNotes
   */
  public static function getNotes() {
    $results = HttpClient::get('/Zapier/GetNotes');
    $notes = array();
    foreach ($results as $result) {
      $notes[] = new Note($result);
    }
    return $notes;
  }

  /**
   * Inserts a note.
   *
   * @see https://api.nowcerts.com/Help/Api/POST-api-Zapier-InsertNote
   */
  public function insert() {
    $arguments = array();
    foreach ((array) $this as $field_name => $value) {
      if (!is_null($value)) {
        $arguments[$field_name] = $value;
      }
    }
    $results = HttpClient::post('/Zapier/InsertNote', $arguments);
    return $results;
  }

}
