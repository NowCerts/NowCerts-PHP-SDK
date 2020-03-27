<?php

namespace NowCerts;

class CoverageDeductibleModel {

  /**
   * @var float
   */
  public $deductible;

  /**
   * @var float
   */
  public $deductiblePct;

  /**
   * @param float $deductible
   * @param float $deductiblePct
   *
   * @see https://api.nowcerts.com/Help/ResourceModel?modelName=CoverageDeductibleModel
   */
  public function __construct($deductible, $deductiblePct) {
    $this->deductible = $deductible;
    $this->deductiblePct = $deductiblePct;
  }

}
