<?php

namespace NowCerts;

class EmployersLiabilityDataModel {

  /**
   * @var string
   */
  public $sicCd;

  /**
   * @var string
   */
  public $controllingState;

  /**
   * @var string
   */
  public $eachAccident;

  /**
   * @var string
   */
  public $diseasePolicyLimit;

  /**
   * @var string
   */
  public $diseaseEachEmployee;

  /**
   * Constructs a EmployersLiabilityDataModel object.
   *
   * @param array $properties
   *   An associative array of properties and values.
   *
   * @see https://api.nowcerts.com/Help/ResourceModel?modelName=EmployersLiabilityDataModel
   */
  public function __construct(array $properties) {
    foreach ($properties as $property => $value) {
      switch ($property) {
        // Strings.
        case 'sicCd':
        case 'controllingState':
        case 'eachAccident':
        case 'diseasePolicyLimit':
        case 'diseaseEachEmployee':
          $this->$property = $value;
          break;
      }
    }
  }

}
