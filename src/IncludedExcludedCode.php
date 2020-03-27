<?php

namespace NowCerts;

/**
 * @see https://api.nowcerts.com/Help/ResourceModel?modelName=IncludedExcludedCode
 */
class IncludedExcludedCode {

  /**
   * Included.
   */
  const I = 0;

  /**
   * Excluded.
   */
  const E = 1;

  /**
   * Not Applicable.
   */
  const N = 2;

  /**
   * @param int $value
   */
  public function __construct($value) {
    $this->value = $value;
  }

}
