<?php

namespace NowCerts;

/**
 * Represents a XDateAndLineOfBusiness object.
 *
 * @see https://api.nowcerts.com/Help/ResourceModel?modelName=XDateAndLineOfBusiness
 */
class XDateAndLineOfBusiness {

  /**
   * @var \NowCerts\DateTime
   */
  public $xDate;

  /**
   * @var string
   */
  public $lineOfBusinessName;

  /**
   * Sets the properties of the XDateAndLineOfBusiness object.
   *
   * @param string|Datetime $xDate
   * @param string $lineOfBusinessName
   */
  public function __construct($xDate, $lineOfBusinessName) {
    if (is_string($xDate)) {
      $this->xDate = new DateTime($xDate);
    }
    else {
      $this->xDate = $xDate;
    }
    $this->lineOfBusinessName = $lineOfBusinessName;
  }

}
