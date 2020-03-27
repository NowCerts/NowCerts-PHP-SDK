<?php

namespace NowCerts;

class PropertyAdditional {

  /**
   * @var string
   */
  public $numberOfFullTimeEmployees;

  /**
   * @var string
   */
  public $numberOfPartTimeEmployees;

  /**
   * @var string
   */
  public $annualRevenues;

  /**
   * @var string
   */
  public $occupiedPct;

  /**
   * @var string
   */
  public $occupiedArea;

  /**
   * @var string
   */
  public $openToPublicArea;

  /**
   * @var string
   */
  public $totalBuildingArea;

  /**
   * @var string
   */
  public $anyAreaLeasedToOthers;

  /**
   * @var string
   */
  public $occupancyDesc;

  /**
   * Constructs a PropertyAdditional object.
   *
   * @param array $properties
   *   An associative array of properties and values.
   *
   * @see https://api.nowcerts.com/Help/ResourceModel?modelName=PropertyAdditional
   */
  public function __construct(array $properties) {
    foreach ($properties as $property => $value) {
      switch ($property) {
        // Strings.
        case 'numberOfFullTimeEmployees':
        case 'numberOfPartTimeEmployees':
        case 'annualRevenues':
        case 'occupiedPct':
        case 'occupiedArea':
        case 'openToPublicArea':
        case 'totalBuildingArea':
        case 'anyAreaLeasedToOthers':
        case 'occupancyDesc':
          $this->$property = $value;
      }
    }
  }

}
