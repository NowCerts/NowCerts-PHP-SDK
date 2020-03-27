<?php

namespace NowCerts;

class WorkersCompensation {

  /**
   * @var string
   */
  public $insuredDatabaseId;

  /**
   * @var string
   */
  public $insuredEmail;

  /**
   * @var string
   */
  public $insuredFirstName;

  /**
   * @var string
   */
  public $insuredLastName;

  /**
   * @var string
   */
  public $insuredCommercialName;

  /**
   * @var \NowCerts\WorkCompensationProperty
   */
  public $property;

  /**
   * @var string[]
   */
  public $policyNumbers;

  /**
   * @var \NowCerts\EmployersLiabilityDataModel
   */
  public $employersLiability;

  /**
   * @var \NowCerts\IndividualsDataModel[]
   */
  public $workCompIndividuals;

  /**
   * @var \NowCerts\WorkerCompensationRateStateDataModel[]
   */
  public $workerCompensationRateStates;

  /**
   * @var \NowCerts\IncludeExcludeStateDataModel[]
   */
  public $includeExcludeStates;

  /**
   * @var \NowCerts\OtherOrPriorPolicyModel[]
   */
  public $otherOrPriorPolicy;

  /**
   * @var string
   */
  public $auditFrequencyCd;

  /**
   * @var \NowCerts\LienHolderModel[]
   */
  public $lienHolders;

  /**
   * Constructs a WorkersCompensation object.
   *
   * @param array $properties
   *   An associative array of properties and values.
   *
   * @see https://api.nowcerts.com/Help/ResourceModel?modelName=WorkersCompensationDataModel
   */
  public function __construct(array $properties) {
    foreach ($properties as $property => $value) {
      switch ($property) {
        // Strings.
        case 'insuredEmail':
        case 'insuredFirstName':
        case 'insuredLastName':
        case 'insuredCommercialName':
        case 'auditFrequencyCd':
          $this->$property = $value;
          break;

        // String arrays.
        case 'PolicyNumbers':
          $this->$property = $value;
          break;

        // WorkCompensationProperty objects.
        case 'property':
          $this->$property = new WorkCompensationProperty($value);
          break;

        // EmployersLiabilityDataModel objects.
        case 'employersLiability':
          $this->$property = new EmployersLiabilityDataModel($value);
          break;

        // IndividualsDataModel object arrays.
        case 'workCompIndividuals':
          foreach ($value as $item) {
            $this->{$property}[] = new IndividualsDataModel($item);
          }
          break;

        // WorkerCompensationRateStateDataModel object arrays.
        case 'workerCompensationRateStates':
          foreach ($value as $item) {
            $this->{$property}[] = new WorkerCompensationRateStateDataModel($item);
          }
          break;

        // IncludeExcludeStateDataModel object arrays.
        case 'includeExcludeStates':
          foreach ($value as $item) {
            $this->{$property}[] = new IncludeExcludeStateDataModel($item);
          }
          break;

        // OtherOrPriorPolicyModel object arrays.
        case 'otherOrPriorPolicy':
          foreach ($value as $item) {
            $this->{$property}[] = new OtherOrPriorPolicyModel($item);
          }
          break;

        // LienHolderModel object arrays.
        case 'lienHolders':
          foreach ($value as $item) {
            $this->{$property}[] = new LienHolderModel($item);
          }
          break;
      }
    }
  }

  /**
   * Inserts a WorkersCompensationObject.
   *
   * @see https://api.nowcerts.com/Help/Api/POST-api-WorkersCompensation-Insert
   */
  public function insert() {
    $arguments = array();
    foreach ((array) $this as $field_name => $value) {
      if (!is_null($value)) {
        $arguments[$field_name] = $value;
      }
    }
    $results = HttpClient::post('/WorkersCompensation/Insert', $arguments);
    return $results;
  }

}
