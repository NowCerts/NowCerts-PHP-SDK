<?php

namespace NowCerts;

class StateLevelPremiumsDataModel {

  /**
   * @var string
   */
  public $ratingClassificationCd;

  /**
   * @var float
   */
  public $currentTermAmt;

  /**
   * @var float
   */
  public $rate;

  /**
   * @var float
   */
  public $factor;

  /**
   * @var int
   */
  public $order;

  /**
   * Constructs a StateLevelPremiumsDataModel object.
   *
   * @param array $properties
   *   An associative array of properties and values.
   *
   * @see https://api.nowcerts.com/Help/ResourceModel?modelName=StateLevelPremiumsDataModel
   */
  public function __construct(array $properties) {
    foreach ($properties as $property => $value) {
      switch ($property) {
        // Strings.
        case 'ratingClassificationCd':
          $this->$property = $value;
          break;

        // Floats.
        case 'currentTermAmt':
        case 'rate':
        case 'factor':
          $this->$property = $value;
          break;

        // Integers.
        case 'order':
          $this->$property = $value;
          break;
      }
    }
  }

}
