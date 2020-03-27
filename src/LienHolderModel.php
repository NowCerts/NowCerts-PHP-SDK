<?php

namespace NowCerts;

class LienHolderModel {

  /**
   * @var string
   */
  public $name;

  /**
   * @var \NowCerts\CertificateHolderNatureOfInterest
   */
  public $natureOfInterest;

  /**
   * Constructs a LienHolderModel object.
   *
   * @param array $properties
   *   An associative array of properties and values.
   *
   * @see https://api.nowcerts.com/Help/ResourceModel?modelName=LienHolderModel
   */
  public function __construct(array $properties) {
    foreach ($properties as $property => $value) {
      switch ($property) {
        // Strings.
        case 'name':
          $this->$property = $value;
          break;

        case 'natureOfInterest':
          $this->$property = new CertificateHolderNatureOfInterest($value);
          break;
      }
    }
  }

}
