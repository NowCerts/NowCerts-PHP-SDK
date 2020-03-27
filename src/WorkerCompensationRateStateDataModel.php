<?php

namespace NowCerts;

class WorkerCompensationRateStateDataModel {

  /**
   * @var string
   */
  public $state;

  /**
   * @var string
   */
  public $participatingPlanDescCd;

  /**
   * @var float
   */
  public $totalEstimatedAnnualPremium;

  /**
   * @var float
   */
  public $totalPayrollAmt;

  /**
   * @var \NowCerts\StateLevelPremiumsDataModel[]
   */
  public $stateLevelPremiums;

  /**
   * @var \NowCerts\WorkCompensationLocationInfoModel[]
   */
  public $workCompensationLocationInfos;

  /**
   * Constructs a WorkerCompensationRateStateDataModel object.
   *
   * @param array $properties
   *   An associative array of properties and values.
   *
   * @see https://api.nowcerts.com/Help/ResourceModel?modelName=WorkerCompensationRateStateDataModel
   */
  public function __construct(array $properties) {
    foreach ($properties as $property => $value) {
      switch ($property) {
        // Strings.
        case 'state':
        case 'participatingPlanDescCd':
          $this->$property = $value;
          break;

        // Floats.
        case 'totalEstimatedAnnualPremium':
        case 'totalPayrollAmt':
          $this->$property = $value;
          break;

        // StateLevelPremiumsDataModel object arrays.
        case 'stateLevelPremiums':
          $this->$property = new StateLevelPremiumsDataModel($value);
          break;

        // WorkCompensationLocationInfoModel object arrays.
        case 'workCompensationLocationInfos':
          $this->$property = new WorkCompensationLocationInfoModel($value);
          break;
      }
    }
  }

}
