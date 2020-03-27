<?php

namespace NowCerts;

class CoverageDeductibleWithPremiumModel {

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
   * @param float $premium
   * @param float $deductible
   * @param float $deductiblePct
   *
   * @see https://api.nowcerts.com/Help/ResourceModel?modelName=CoverageDeductibleWithPremiumModel
   */
  public function __construct($premium, $deductible, $deductiblePct) {
    $this->premium = $premium;
    $this->deductible = $deductible;
    $this->deductiblePct = $deductiblePct;
  }

}
