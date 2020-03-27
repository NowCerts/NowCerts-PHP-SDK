<?php

namespace NowCerts;

/**
 * Represents a custom field.
 */
class CustomFields {

  /**
   * @var string
   */
  public $customPanelName;

  /**
   * @var \NowCerts\CustomFieldAndValue[]
   */
  public $customFields;

  /**
   * Sets the properties of the CustomFields object.
   *
   * @param string $customPanelName
   *   The label for the collection of field values.
   * @param CustomFieldAndValue[]|array $customFields
   *   The values as CustomFieldAndValue objects or associative arrays.
   *
   * @see https://api.nowcerts.com/Help/ResourceModel?modelName=CustomFieldEdit
   */
  public function __construct($customPanelName, array $customFields) {
    $this->customPanelName = $customPanelName;
    foreach ($customFields as $customField) {
      if (is_object($customField)) {
        $this->customFields[] = $customField;
      }
      else {
        $this->customFields[] = new CustomFieldAndValue($customField['customFieldName'], $customField['customFieldValue']);
      }
    }
  }

  /**
   * @return array
   *   An array of custom fields each of which is an associative array
   *   containing:
   *   - (string) key
   *   - (string) label
   *   - (string) type
   *   - (bool) required
   *   - helpText
   *
   * @see https://api.nowcerts.com/Help/Api/GET-api-Zapier-GetCustomFields
   */
  public static function getCustomFields() {
    $results = HttpClient::get('/Zapier/GetCustomFields');
    return $results;
  }

}
