<?php

namespace NowCerts;

/**
 * Represents an API status return value.
 *
 * @see https://api.nowcerts.com/Help/ResourceModel?modelName=ApiStatus
 */
class ApiStatus {

  const Error = 0;
  const Success = 1;

  /**
   * @var int
   */
  public $value;

  /**
   * Sets the value of the ApiStatus object.
   *
   * @param int $value
   *   The integer corresponding to the ApiStatus object.
   */
  public function __construct($value) {
    $this->value = $value;
  }

}
