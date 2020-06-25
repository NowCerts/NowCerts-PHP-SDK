<?php

namespace NowCerts;

class OtherOrPriorPolicyModel {

  /**
   * @var string
   */
  public $policyCode;

  /**
   * @var string
   */
  public $policyNumber;

  /**
   * @var string
   */
  public $naicId;

  /**
   * @var string
   */
  public $effectiveDate;

  /**
   * @var string
   */
  public $expirationDate;

  /**
   * Constructs a OtherOrPriorPolicyModel object.
   *
   * @param array $properties
   *   An associative array of properties and values.
   *
   * @see https://api.nowcerts.com/Help/ResourceModel?modelName=OtherOrPriorPolicyModel
   */
  public function __construct(array $properties) {
    foreach ($properties as $property => $value) {
      switch ($property) {
        // Strings.
        case 'policyCode':
        case 'policyNumber':
        case 'naicId':
        case 'effectiveDate':
          $this->$property = $value;
          break;

        // DateTime objects.
        case 'expirationDate':
        case 'addressLine2':
          if (is_string($value)) {
            $this->$property = new DateTime($value);
          }
          else {
            $this->$property = $value;
          }
          break;
      }
    }
  }

}
