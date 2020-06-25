<?php

namespace NowCerts;

class GroupHealthMemberSimple {

  /**
   * @var string
   */
  public $databaseId;

  /**
   * (Required) String length: inclusive between 0 and 100.
   *
   * @var string
   */
  public $firstName;

  /**
   * String length: inclusive between 0 and 100.
   *
   * @var string
   */
  public $middleName;

  /**
   * (Required) String length: inclusive between 0 and 100.
   *
   * @var string
   */
  public $lastName;

  /**
   * String length: inclusive between 0 and 50.
   *
   * @var string
   */
  public $citizenship;

  /**
   * String length: inclusive between 0 and 50.
   *
   * @var string
   */
  public $race;

  /**
   * @var \NowCerts\GroupHealthMemberMaritalStatus
   */
  public $maritalStatus;

  /**
   * @var \NowCerts\GenderCode
   */
  public $gender;

  /**
   * String length: inclusive between 0 and 50.
   *
   * @var string
   */
  public $ssn;

  /**
   * @var \NowCerts\DateTime
   */
  public $dateOfBirth;

  /**
   * String length: inclusive between 0 and 256.
   *
   * @var string
   */
  public $email;

  /**
   * String length: inclusive between 0 and 50.
   *
   * @var string
   */
  public $phone;

  /**
   * Constructs a GroupHealthMemberSimple object.
   *
   * @param array $properties
   *   An associative array of properties and values.
   *
   * @see https://api.nowcerts.com/Help/ResourceModel?modelName=GroupHealthMemberSimpleEdit
   */
  public function __construct(array $properties) {
    foreach ($properties as $property => $value) {
      switch ($property) {
        // Strings.
        case 'databaseId':
        case 'firstName':
        case 'middleName':
        case 'lastName':
        case 'citizenship':
        case 'race':
        case 'ssn':
        case 'email':
        case 'phone':
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

        // GroupHealthMemberMaritalStatus objects.
        case 'maritalStatus':
          $this->$property = new GroupHealthMemberMaritalStatus($value);
          break;

        // GenderCode objects.
        case 'gender':
          $this->$property = new GenderCode($value);
          break;
      }
    }
  }

}
