<?php

namespace NowCerts;

class IncludeExcludeStateDataModel {

  /**
   * @var \NowCerts\IncludedExcludedCode
   */
  public $includedExcludedCode;

  /**
   * @var string[]
   */
  public $states;

  /**
   * Constructs a IncludeExcludeStateDataModel object.
   *
   * @param array $properties
   *   An associative array of properties and values.
   *
   * @see https://api.nowcerts.com/Help/ResourceModel?modelName=IncludeExcludeStateDataModel
   */
  public function __construct(array $properties) {
    foreach ($properties as $property => $value) {
      switch ($property) {
        // String arrays.
        case 'states':
          $this->$property = $value;
          break;

        // IncludedExcludedCode objects.
        case 'includedExcludedCode':
          $this->$property = new IncludedExcludedCode($value);
          break;
      }
    }
  }

}
