<?php

namespace NowCerts;

class WorkCompensationLocationInfoModel {

  /**
   * @var string
   */
  public $locationNumber;

  /**
   * @var int
   */
  public $order;

  /**
   * @var string
   */
  public $naics;

  /**
   * @var \NowCerts\WorkCompensationRateClassModel[]
   */
  public $rateClass;

  /**
   * Constructs a WorkCompensationLocationInfoModel object.
   *
   * @param array $properties
   *   An associative array of properties and values.
   *
   * @see https://api.nowcerts.com/Help/ResourceModel?modelName=WorkCompensationLocationInfoModel
   */
  public function __construct(array $properties) {
    foreach ($properties as $property => $value) {
      switch ($property) {
        // Strings.
        case 'locationNumber':
        case 'naics':
          $this->$property = $value;
          break;

        // Integers.
        case 'order':
          $this->$property = $value;
          break;

        // WorkCompensationRateClassModel object arrays.
        case 'rateClass':
          foreach ($value as $item) {
            $this->{$property}[] = new WorkCompensationRateClassModel($item);
          }
          break;
      }
    }
  }

}
