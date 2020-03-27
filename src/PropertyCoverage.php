<?php

namespace NowCerts;

class PropertyCoverage {

  /**
   * Constructs a PropertyCoverage object.
   *
   * @param array $properties
   *   An associative array of properties and values.
   *
   * @see https://api.nowcerts.com/Help/ResourceModel?modelName=PropertyCoverage
   */
  public function __construct(array $properties) {
    foreach ($properties as $property => $value) {
      switch ($property) {
        // DwellPolicyTypeCd objects.
        case 'propertyTypeCd':
          break;

        // CoverageSingleLimitWithPremiumModel arrays.
        case 'dwelling_A':
        case 'otherStructures_B':
        case 'personalProperty_C':
        case 'lossOfUse_D':
        case 'personalLiability_E':
        case 'medicalPayments_F':
          $this->{$property}[] = new CoverageSingleLimitWithPremiumModel($value['limit'], $value['premium']);
          break;

        // CoverageDeductibleModel objects.
        case 'allOtherPerils':
          $this->$property = new CoverageDeductibleModel($value['deductible'], $value['deductiblePct']);
          break;

        // CoverageDeductibleWithPremiumModel objects.
        case 'hurricane':
          $this->$property = new CoverageDeductibleWithPremiumModel($value['premium'], $value['deductible'], $value['deductiblePct']);
          break;

        // CoverageYesNoLimitWithPremiumModel objects.
        case 'incOrdinanceOrLaw':
          $this->$property = new CoverageYesNoLimitWithPremiumModel(new YesNo($value['yesNo']), $value['premium']);
          break;

        // CoverageCslLimtWithPremiumModel arrays.
        case 'coverageCs':
          foreach ($value as $item) {
            $this->{$property}[] = new CoverageCslLimtWithPremiumModel($item);
          }
          break;
      }
    }

  }

}
