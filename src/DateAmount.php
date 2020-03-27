<?php

namespace NowCerts;

/**
 * Represents a date and amount pair.
 *
 * @see https://api.nowcerts.com/Help/ResourceModel?modelName=DateAmount
 */
class DateAmount {

  /**
   * @var \NowCerts\DateTime
   */
  public $date;

  /**
   * @var float
   */
  public $amount;

  /**
   * Sets the properties of the DateAmount object.
   *
   * @param string $date
   * @param string $amount
   */
  public function __construct($date, $amount) {
    $this->date = $date;
    $this->amount = $amount;
  }

}
