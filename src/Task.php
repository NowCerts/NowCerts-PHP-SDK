<?php

namespace NowCerts;

/**
 * Represents a Task.
 */
class Task {

  /**
   * @var string
   */
  public $database_id;

  /**
   * @var string
   */
  public $title;

  /**
   * @var string
   */
  public $description;

  /**
   * @var string
   */
  public $category_name;

  /**
   * @var string
   */
  public $stage_name;

  /**
   * @var string
   */
  public $status;

  /**
   * @var string
   */
  public $priority;

  /**
   * @var string
   */
  public $due_date;

  /**
   * @var string
   */
  public $completion;

  /**
   * @var string
   */
  public $supervisor_name;

  /**
   * @var string
   */
  public $assigned_to;

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
  public $policy_number;

  /**
   * Constructs a Task object.
   *
   * @param array $properties
   *   An associative array of properties and values.
   *
   * @see https://api.nowcerts.com/Help/ResourceModel?modelName=TaskIntegrationModel
   */
  public function __construct(array $properties) {
    foreach ($properties as $property => $value) {
      switch ($property) {
        // Strings.
        case 'database_id':
        case 'title':
        case 'description':
        case 'category_name':
        case 'stage_name':
        case 'status':
        case 'priority':
        case 'supervisor_name':
        case 'insured_database_id':
        case 'insured_email':
        case 'insured_first_name':
        case 'insured_last_name':
        case 'insured_commercial_name':
        case 'policy_number':
          $this->$property = $value;
          break;

        // String arrays.
        case 'assigned_to':
          foreach ($value as $item) {
            $this->{$property}[] = $item;
          }
          break;

        // Integers.
        case 'completion':
          $this->$property = $value;
          break;

        // Date objects.
        case 'due_date':
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
   * Gets a list of tasks.
   *
   * @return \NowCerts\Task[]
   *   An array of tasks where each element is an object of the type
   *   NowCerts\Task.
   *
   * @see https://api.nowcerts.com/Help/Api/GET-api-Zapier-GetTasks
   */
  public static function getTasks() {
    $tasks = array();
    $response = HttpClient::get("/Zapier/GetTasks");
    foreach ($response as $item) {
      $tasks[] = new Task($item);
    }
    return $tasks;
  }

  /**
   * Creates a new task.
   *
   * @see https://api.nowcerts.com/Help/Api/POST-api-Zapier-InsertTask
   */
  public function insert() {
    $response = HttpClient::post('/Zapier/InsertTask', (array) $this);
    return $response;
  }

}
