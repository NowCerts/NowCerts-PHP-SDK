<?php

namespace NowCerts;

class CoverageYesNoLimitWithPremiumModel {

  /**
   * @var \NowCerts\YesNo
   */
  public $yesNo;

  /**
   * @var float
   */
  public $premium;

  /**
   * @param \NowCerts\YesNo $yesNo
   * @param float $premium
   *
   * @see https://api.nowcerts.com/Help/ResourceModel?modelName=CoverageYesNoLimitWithPremiumModel
   */
  public function __construct(YesNo $yesNo, $premium) {
    $this->yesNo = $yesNo;
    $this->premium = $premium;
  }

}
