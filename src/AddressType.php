<?php

namespace NowCerts;

/**
 * Represents an address type.
 *
 * @see https://api.nowcerts.com/Help/ResourceModel?modelName=AddressType
 */
class AddressType {

  const Office = 0;
  const Home = 1;
  const Other = 2;
  const Shipping = 3;
  const Billing = 4;
  const Garage = 5;

  /**
   * @var int
   */
  public $value;

  /**
   * Sets the value of the address type.
   *
   * @param int $value
   *   The integer corresponding to the address type.
   */
  public function __construct($value) {
    $this->value = $value;
  }

}
