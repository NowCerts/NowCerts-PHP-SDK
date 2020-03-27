<?php

namespace NowCerts;

class CustomPanel {

  /**
   * @var string
   */
  public $name;

  /**
   * @var string
   */
  public $description;

  /**
   * @var \NowCerts\CustomFieldModel[]
   */
  public $customFields;

  /**
   * @var int
   */
  public $order;

  /**
   * Constructs a CustomPanel object.
   *
   * @param array $properties
   *   An associative array of properties and values.
   *
   * @see https://api.nowcerts.com/Help/ResourceModel?modelName=CustomPanelModel
   */
  public function __construct(array $properties) {
    foreach ($properties as $property => $value) {
      switch ($property) {
        // Strings.
        case 'name':
        case 'description':
          $this->$property = $value;
          break;

        // Integers.
        case 'order':
          $this->$property = $value;
          break;

        // Arrays of CustomFieldModel objects.
        case 'customFields':
          foreach ($value as $item) {
            $this->{$property}[] = new CustomFieldModel($item['name'], $item['description'], new CustomFieldType($item['type']), $item['order']);
          }
          break;

      }
    }
  }

  /**
   * Gets a list of CustomPanel objects.
   *
   * @return \NowCerts\CustomPanel[]
   *   An array of CustomPanel objects.
   *
   * @see https://api.nowcerts.com/Help/Api/GET-api-CustomPanel-GetStructure
   */
  public static function getCustomPanels() {
    $results = HttpClient::get('/CustomPanel/GetStructure');
    $custom_panels = array();
    foreach ($results as $result) {
      $custom_panels[] = new CustomPanel($result);
    }
    return $custom_panels;
  }

  /**
   * Inserts a CustomPanel object.
   *
   * @see https://api.nowcerts.com/Help/Api/POST-api-CustomPanel-Insert
   */
  public function insert() {
    try {
      $results = HttpClient::post('/CustomPanel/Insert', (array) $this);
      // This may never happen.
      return $results;
    }
    catch (Exception $e) {
      if ($e->getMessage() == "") {
        // No error message so maybe no error.
        // @todo: Figure out if ApiStatus::Error in this case really is an
        // error even when there is no error message.
      }
      else {
        throw $e;
      }
    }
  }

}
