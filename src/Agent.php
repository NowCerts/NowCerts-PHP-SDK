<?php

namespace NowCerts;

/**
 * Represents an agent.
 *
 * @see https://api.nowcerts.com/Help/ResourceModel?modelName=AgentEdit
 */
class Agent {

  /**
   * @var string
   */
  public $databaseId;

  /**
   * @var string
   */
  public $firstName;

  /**
   * @var string
   */
  public $lastName;

  /**
   * @var string
   */
  public $order;

  /**
   * Sets the properties of an agent.
   *
   * @param string $databaseId
   *   A globally unique agent identifier.
   * @param string $firstName
   *   The agent's first name.
   * @param string $lastName
   *   The agent's last name.
   * @param int $order
   *   (optional) The sort order.
   */
  public function __construct($databaseId, $firstName, $lastName, $order = NULL) {
    $this->databaseId = $databaseId;
    $this->firstName = $firstName;
    $this->lastName = $lastName;
    $this->order = $order;
  }

  /**
   * Gets a list of agents.
   *
   * @param array $search_criteria
   *   An associative array of filters. The supported filters are:
   *   - (string) firstName: The agent's first name.
   *   - (string) lastName: The agent's last name.
   *   - (string) email: The agent's email address.
   * @param array $columns
   *   The names of the columns to be returned. Use an empty array to avoid
   *   restriction. Supported values include:
   *   - id
   *   - firstName
   *   - lastName
   *   - email
   *   - (broken) nPN_Number
   *   - primaryRole
   *   - assignCommissionIfCSR
   *   - isDefaultAgent
   *   - useAgentIfNotDefault
   *   - phone
   *   - cellPhone
   *   - fax
   *   - primaryOfficeName
   *   - active
   * @param string $order_by
   *   The machine name of the column on which to sort. Supported values
   *   include:
   *   - primaryOfficeName
   *   - firstName
   *   - lastName
   *   - active
   * @param string $order_by_direction
   *   Either "asc" or "desc".
   * @param int $page
   *   The multiple of $per_page to skip.
   * @param int $per_page
   *   The number of items per page.
   *
   * @return array
   *   An indexed array of matching agents where each element is an associative
   *   array of fields and values as specified by the $columns argument.
   *
   * @see http://test.api.nowcerts.com/SearchAgents
   */
  public static function getList(array $search_criteria = array(), array $columns = array(), $order_by = 'primaryOfficeName', $order_by_direction = 'asc', $page = NULL, $per_page = NULL) {
    $arguments = array();
    $filter_parts = array();
    $supported_filters = array(
      'firstName',
      'lastName',
      'email',
    );
    foreach ($supported_filters as $supported_filter) {
      if (!empty($search_criteria[$supported_filter])) {
        $filter_parts[] = "contains(" . $supported_filter . ", '" . $search_criteria[$supported_filter] . "')";
      }
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
      $columns += array('id');
      $arguments['$select'] = implode(",", $columns);
    }
    foreach ($arguments as &$argument) {
      $argument = rawurlencode($argument);
    }

    $result = HttpClient::get("/AgentList()", $arguments, array(
      'raw_arguments' => TRUE,
    ));
    return $result['value'];
  }

}
