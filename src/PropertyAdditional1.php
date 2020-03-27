<?php

namespace NowCerts;

class PropertyAdditional1 {

  /**
   * @var \NowCerts\ConstructionType
   */
  public $constructionCd;

  /**
   * @var int
   */
  public $yearBuilt;

  /**
   * @var float
   */
  public $numStories;

  /**
   * @var \NowCerts\RoofMaterialType
   */
  public $roofMaterialCd;

  /**
   * @var \NowCerts\ResidenceType
   */
  public $residenceTypeCd;

  /**
   * @var \NowCerts\DwellingUse
   */
  public $dwellUseCd;

  /**
   * @var int
   */
  public $fireProtectionClassCd;

  /**
   * @var int
   */
  public $distanceToHydrant;

  /**
   * @var \NowCerts\AirConditioning
   */
  public $airConditioningCd;

  /**
   * @var string
   */
  public $distanceToFireStation;

  /**
   * Constructs a PropertyAdditional1 object.
   *
   * @param array $properties
   *   An associative array of properties and values.
   *
   * @see https://api.nowcerts.com/Help/ResourceModel?modelName=PropertyAdditional1
   */
  public function __construct(array $properties) {
    foreach ($properties as $property => $value) {
      switch ($property) {
        // Strings.
        case 'distanceToFireStation':
          $this->$property = $value;
          break;

        // Integers.
        case 'yearBuilt':
        case 'fireProtectionClassCd':
        case 'distanceToHydrant':
          $this->$property = $value;
          break;

        // Floats.
        case 'numStories':
          $this->$property = $value;
          break;

        // ConstructionType objects.
        case 'constructionCd':
          $this->$property = new ConstructionType($value);
          break;

        // RoofMaterialType objects.
        case 'roofMaterialCd':
          $this->$property = new RoofMaterialType($value);
          break;

        // ResidenceType objects.
        case 'residenceTypeCd':
          $this->$property = new ResidenceType($value);
          break;

        // DwellingUse objects.
        case 'dwellUseCd':
          $this->$property = new DwellingUse($value);
          break;

        // AirConditioning objects.
        case 'airConditioningCd':
          $this->$property = new AirConditioning($value);
          break;
      }
    }
  }

}
