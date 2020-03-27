<?php

namespace NowCerts;

class WorkCompensationRateClassModel {

  /**
   * @var bool
   */
  public $ifAnyRatingBasisIndicator;

  /**
   * @var float
   */
  public $rate;

  /**
   * @var \NowCerts\PremiumBase
   */
  public $premiumBasisCode;

  /**
   * @var string
   */
  public $ratingClassificationCode;

  /**
   * @var float
   */
  public $exposure;

  /**
   * @var string
   */
  public $ratingClassificationDesc;

  /**
   * @var float
   */
  public $amount;

  /**
   * @var string
   */
  public $ratingClassificationDescCd;

  /**
   * @var string
   */
  public $numEmployeesFullTime;

  /**
   * @var string
   */
  public $numEmployeesPartTime;

  /**
   * Constructs a WorkCompensationRateClassModel object.
   *
   * @param array $properties
   *   An associative array of properties and values.
   *
   * @see https://api.nowcerts.com/Help/ResourceModel?modelName=WorkCompensationRateClassModel
   */
  public function __construct(array $properties) {
    foreach ($properties as $property => $value) {
      switch ($property) {
        // Strings.
        case 'ratingClassificationCode':
        case 'ratingClassificationDesc':
        case 'ratingClassificationDescCd':
        case 'numEmployeesFullTime':
        case 'numEmployeesPartTime':
          $this->$property = $value;
          break;

        // Booleans.
        case 'ifAnyRatingBasisIndicator':
          $this->$property = $value;
          break;

        // Floats.
        case 'rate':
        case 'exposure':
        case 'amount':
          $this->$property = $value;
          break;

        // PremiumBase objects.
        case 'premiumBasisCode':
          $this->$property = new PremiumBase($value);
          break;
      }
    }
  }

}
