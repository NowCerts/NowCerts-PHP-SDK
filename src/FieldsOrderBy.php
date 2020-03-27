<?php

namespace NowCerts;

/**
 * @see https://api.nowcerts.com/Help/ResourceModel?modelName=FieldsOrderBy
 */
class FieldsOrderBy {

  const None = -1;
  const FieldOrderAndPropertyName = 0;
  const PropertyName = 1;
  const DisplayName = 2;

  /**
   * @var int
   */
  public $value;

  /**
   * Sets the value of the object.
   *
   * @param int $value
   *   The integer corresponding to the sort order.
   */
  public function __construct($value) {
    $this->value = $value;
  }

}
