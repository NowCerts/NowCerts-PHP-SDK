<?php

namespace NowCerts;

class CoverageCslLimtWithPremiumModel {

  /**
   * @var string
   */
  public $name;

  /**
   * @var string
   */
  public $description;

  /**
   * @var float
   */
  public $limitCsl;

  /**
   * @var float
   */
  public $limit1;

  /**
   * @var float
   */
  public $limit2;

  /**
   * @var float
   */
  public $premium;

  /**
   * @var float
   */
  public $deductible;

  /**
   * @var float
   */
  public $deductiblePct;

  /**
   * Constructs a CoverageCslLimtWithPremiumModel object.
   *
   * @param array $properties
   *   An associative array of properties and values.
   *
   * @see https://api.nowcerts.com/Help/ResourceModel?modelName=CoverageCslLimtWithPremiumModel
   */
  public function __construct(array $properties) {
    foreach ($properties as $property => $value) {
      switch ($property) {
        case 'name':
        case 'description':
        case 'limitCsl':
        case 'limit1':
        case 'limit2':
        case 'premium':
        case 'deductible':
        case 'deductiblePct':
          $this->$property = $value;
          break;
      }
    }
  }

}
