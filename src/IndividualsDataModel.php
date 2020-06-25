<?php

namespace NowCerts;

class IndividualsDataModel {

  /**
   * @var string
   */
  public $nameInfo;

  /**
   * @var \NowCerts\IncludedExcludedCode
   */
  public $includedExcludedCode;

  /**
   * @var string
   */
  public $titleRelationship;

  /**
   * @var \NowCerts\DateTime
   */
  public $dateOfBirth;

  /**
   * @var float
   */
  public $ownershipPercent;

  /**
   * @var string
   */
  public $duties;

  /**
   * @var string
   */
  public $classCode;

  /**
   * @var float
   */
  public $remuneration;

  /**
   * Constructs a IndividualsDataModel object.
   *
   * @param array $properties
   *   An associative array of properties and values.
   *
   * @see https://api.nowcerts.com/Help/ResourceModel?modelName=IndividualsDataModel
   */
  public function __construct(array $properties) {
    foreach ($properties as $property => $value) {
      switch ($property) {
        // Strings.
        case 'nameInfo':
        case 'titleRelationship':
        case 'duties':
        case 'classCode':
          $this->$property = $value;
          break;

        // Floats.
        case 'ownershipPercent':
        case 'remuneration':
          $this->$property = $value;
          break;

        // DateTime objects.
        case 'dateOfBirth':
          if (is_string($value)) {
            $this->$property = new DateTime($value);
          }
          else {
            $this->$property = $value;
          }
          break;

        // IncludedExcludedCode objects.
        case 'includedExcludedCode':
          $this->$property = new IncludedExcludedCode($value);
          break;
      }
    }
  }

}
