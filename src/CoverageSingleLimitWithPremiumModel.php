<?php

namespace NowCerts;

class CoverageSingleLimitWithPremiumModel {

  /**
   * @var float
   */
  public $limit;

  /**
   * @var float
   */
  public $premium;

  /**
   * Sets the properties of the object.
   *
   * @param float $limit
   * @param float $premium
   *
   * @see https://api.nowcerts.com/Help/ResourceModel?modelName=CoverageSingleLimitWithPremiumModel
   */
  public function __construct($limit, $premium) {
    $this->limit = $limit;
    $this->premium = $premium;
  }

}
