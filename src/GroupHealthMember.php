<?php

namespace NowCerts;

class GroupHealthMember {

  /**
   * @var string
   */
  public $insuredDatabaseId;

  /**
   * @var string
   */
  public $insuredEmail;

  /**
   * @var string
   */
  public $insuredFirstName;

  /**
   * @var string
   */
  public $insuredLastName;

  /**
   * @var string
   */
  public $insuredCommercialName;

  /**
   * @var string[]
   */
  public $policyNumbers;

  /**
   * @var string
   */
  public $locationDatabaseId;

  /**
   * @var string
   */
  public $locationId;

  /**
   * @var string
   */
  public $locationAddressLine1;

  /**
   * @var string
   */
  public $locationCity;

  /**
   * @var \NowCerts\AddressType
   */
  public $locationType;

  /**
   * @var string
   */
  public $groupName;

  /**
   * @var \NowCerts\DateTime
   */
  public $effectiveDate;

  /**
   * @var \NowCerts\DateTime
   */
  public $expirationDate;

  /**
   * @var string
   */
  public $description;

  /**
   * @var string
   */
  public $addressLine1;

  /**
   * @var string
   */
  public $addressLine2;

  /**
   * @var string
   */
  public $state;

  /**
   * @var string
   */
  public $city;

  /**
   * @var string
   */
  public $zipCode;

  /**
   * @var \NowCerts\DateTime
   */
  public $hireDate;

  /**
   * @var \NowCerts\DateTime
   */
  public $terminationDate;

  /**
   * @var string
   */
  public $medicalInsuranceId;

  /**
   * @var string
   */
  public $dentalInsuranceId;

  /**
   * @var string
   */
  public $visionInsuranceId;

  /**
   * @var \NowCerts\GroupHealthMemberType
   */
  public $memberTypeId;

  /**
   * @var \NowCerts\GroupHealthMemberCoverageTier
   */
  public $medicalCoverageTierId;

  /**
   * @var \NowCerts\GroupHealthMemberCoverageTier
   */
  public $dentalCoverageTierId;

  /**
   * @var \NowCerts\GroupHealthMemberCoverageTier
   */
  public $visionCoverageTierId;

  /**
   * @var \NowCerts\GroupHealthMemberEmployeeType
   */
  public $employeeTypeId;

  /**
   * @var \NowCerts\GroupHealthMemberStatus
   */
  public $statusId;

  /**
   * @var string
   */
  public $compensationType;

  /**
   * @var string
   */
  public $jobTitle;

  /**
   * @var string
   */
  public $payCycle;

  /**
   * @var float
   */
  public $carrierTotalRate;

  /**
   * @var float
   */
  public $employeeRate;

  /**
   * @var float
   */
  public $spouseRate;

  /**
   * @var float
   */
  public $childrenRate;

  /**
   * @var float
   */
  public $employeeContribution;

  /**
   * @var float
   */
  public $employeePreTaxCost;

  /**
   * @var float
   */
  public $employeePostTaxCost;

  /**
   * @var int
   */
  public $employeeCostPerDeductionPeriodDays;

  /**
   * @var int
   */
  public $deductionPeriodsDays;

  /**
   * @var \NowCerts\DateTime
   */
  public $planDetailEffectiveDate;

  /**
   * @var \NowCerts\DateTime
   */
  public $lastModifiedDate;

  /**
   * @var \NowCerts\DateTime
   */
  public $eSignDate;

  /**
   * @var \NowCerts\GroupHealthMemberSimple
   */
  public $spouse;

  /**
   * @var \NowCerts\GroupHealthMemberSimple[]
   */
  public $children;

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
   * Constructs a GroupHealthMember object.
   *
   * @param array $properties
   *   An associative array of properties and values.
   *
   * @see https://api.nowcerts.com/Help/ResourceModel?modelName=GroupHealthMemberExtendedEdit
   */
  public function __construct(array $properties) {
    foreach ($properties as $property => $value) {
      switch ($property) {
        // Strings.
        case 'insuredDatabaseId':
        case 'insuredEmail':
        case 'insuredFirstName':
        case 'insuredLastName':
        case 'insuredCommercialName':
        case 'locationDatabaseId':
        case 'locationId':
        case 'locationAddressLine1':
        case 'locationCity':
        case 'groupName':
        case 'description':
        case 'addressLine1':
        case 'addressLine2':
        case 'state':
        case 'city':
        case 'zipCode':
        case 'medicalInsuranceId':
        case 'dentalInsuranceId':
        case 'visionInsuranceId':
        case 'compensationType':
        case 'jobTitle':
        case 'payCycle':
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

        // Floats.
        case 'carrierTotalRate':
        case 'employeeRate':
        case 'spouseRate':
        case 'childrenRate':
        case 'employeeContribution':
        case 'employeePreTaxCost':
        case 'employeePostTaxCost':
          $this->$property = $value;
          break;

        // Integers.
        case 'employeeCostPerDeductionPeriodDays':
        case 'deductionPeriodsDays':
          $this->$property = $value;
          break;

        // String arrays.
        case 'policyNumbers':
          $this->$property = $value;
          break;

        // DateTime objects.
        case 'effectiveDate':
        case 'expirationDate':
        case 'hireDate':
        case 'terminationDate':
        case 'planDetailEffectiveDate':
        case 'lastModifiedDate':
        case 'eSignDate':
        case 'dateOfBirth':
          if (is_string($value)) {
            $this->$property = new DateTime($value);
          }
          else {
            $this->$property = $value;
          }
          break;

        // LocationType objects.
        case 'locationType':
          $this->$property = new AddressType($value);
          break;

        // GroupHealthMemberType objects.
        case 'memberTypeId':
          $this->$property = new GroupHealthMemberType($value);
          break;

        // GroupHealthMemberCoverageTier objects.
        case 'medicalCoverageTierId':
        case 'dentalCoverageTierId':
        case 'visionCoverageTierId':
          $this->$property = new GroupHealthMemberCoverageTier($value);
          break;

        // GroupHealthMemberEmployeeType objects.
        case 'employeeTypeId':
          $this->$property = new GroupHealthMemberEmployeeType($value);
          break;

        // GroupHealthMemberStatus objects.
        case 'statusId':
          $this->$property = new GroupHealthMemberStatus($value);
          break;

        // GroupHealthMemberSimple objects.
        case 'spouse':
          $this->$property = new GroupHealthMemberSimple($value);
          break;

        // Arrays of GroupHealthMemberSimple objects.
        case 'children':
          foreach ($value as $item) {
            $this->{$property}[] = new GroupHealthMemberSimple($item);
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

  /**
   * Inserts or updates a collection of GroupHealthMember objects.
   *
   * The documentation appears to be incorrect in that no value is returned on
   * success instead of the member details as expected.
   *
   * @param \NowCerts\GroupHealthMember[] $members
   *   An array of GroupHealthMember objects to insert or update.
   *
   * @see https://api.nowcerts.com/Help/Api/POST-api-Zapier-InsertGroupHealthMember
   */
  public static function bulkInsertOrUpdate(array $members) {
    $arguments = array();
    foreach ($members as $member) {
      if (is_array($member)) {
        $arguments[] = new GroupHealthMember($member);
      }
      else {
        $arguments[] = $member;
      }
    }
    $results = HttpClient::post('/GroupHealthMember/BulkInsertOrUpdateGroupHealthMember', $arguments);
    return $results;
  }

}
