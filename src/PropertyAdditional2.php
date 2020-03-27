<?php

namespace NowCerts;

class PropertyAdditional2 {

  /**
   * @var \NowCerts\DwellStyle
   */
  public $dwellStyleCd;

  /**
   * @var float
   */
  public $estimatedReplCostAmt;

  /**
   * @var string
   */
  public $numberOfUnits;

  /**
   * @var \NowCerts\HeatSource
   */
  public $heatSourcePrimaryCd;

  /**
   * @var int
   */
  public $numFamilies;

  /**
   * @var int
   */
  public $fireplaceInfoNumHearths;

  /**
   * @var string
   */
  public $numberOfPools;

  /**
   * @var int
   */
  public $fireplaceInfoNumChimneys;

  /**
   * @var \NowCerts\GarageType
   */
  public $garageTypeCd;

  /**
   * @var string
   */
  public $parkingArea;

  /**
   * @var int
   */
  public $garageNumVehs;

  /**
   * Constructs a PropertyAdditional2 object.
   *
   * @param array $properties
   *   An associative array of properties and values.
   *
   * @see https://api.nowcerts.com/Help/ResourceModel?modelName=PropertyAdditional2
   */
  public function __construct(array $properties) {
    foreach ($properties as $property => $value) {
      switch ($property) {
        // Strings.
        case 'numberOfUnits':
        case 'numberOfPools':
        case 'parkingArea':
          $this->$property = $value;
          break;

        // Integers.
        case 'numFamilies':
        case 'fireplaceInfoNumHearths':
        case 'fireplaceInfoNumChimneys':
        case 'garageNumVehs':
          $this->$property = $value;
          break;

        // Floats.
        case 'estimatedReplCostAmt':
          $this->$property = $value;
          break;

        // DwellStyle objects.
        case 'dwellStyleCd':
          $this->$property = new DwellStyle($value);
          break;

        // HeatSource objects.
        case 'heatSourcePrimaryCd':
          $this->$property = new HeatSource($value);
          break;

        // GarageType objects.
        case 'garageTypeCd':
          $this->$property = new GarageType($value);
          break;
      }
    }
  }

}
