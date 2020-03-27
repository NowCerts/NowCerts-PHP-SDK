<?php

declare(strict_types=1);

namespace NowCerts\Test;

final class InsuredTest extends NowCertsTestCase {

  /**
   * {@inheritdoc}
   */
  protected function setUp(): void {
    $agents = array(
      new \NowCerts\Agent("", "sample string 2", "", ""),
      new \NowCerts\Agent("", "sample string 3", "", ""),
    );
    $csrs = array(
      array(
        "databaseId" => "",
        "firstName" => "sample string 2",
        "lastName" => "",
        "order" => "",
      ),
      array(
        "databaseId" => "",
        "firstName" => "sample string 3",
        "lastName" => "",
        "order" => "",
      ),
    );
    $customFields = array(
      array(
        "customPanelName" => "sample string 1",
        "customFields" => array(
          array(
            "customFieldName" => "sample string 1",
            "customFieldValue" => "sample string 2",
          ),
          new \NowCerts\CustomFieldAndValue("sample string 1", "sample string 2"),
        ),
      ),
      new \NowCerts\CustomFields('sample string 1.1', array(
        new \NowCerts\CustomFieldAndValue('sample string 1.11', 'sample string 2.22'),
      )),
    );
    $customFieldsSimple = array(
      array(
        "text" => "sample string 1",
        "value" => "sample string 2",
      ),
      new \NowCerts\CustomFieldSimple("sample string 1.1", "sample string 2.2"),
    );
    $xDatesAndLinesOfBusiness = array(
      array(
        "xDate" => "2020-03-17T12:54:15.4950114-05:00",
        "lineOfBusinessName" => "sample string 2",
      ),
      new \NowCerts\XDateAndLineOfBusiness("2020-03-17T12:54:15.4950114-05:00", "sample string 2"),
    );
    $fields = array(
      //"database_id" => "39cdbfa0-2ac2-46c6-8430-bbfe94999771",
      "first_name" => "sample string 2",
      "last_name" => "sample string 3",
      "commercial_name" => "sample string 4",
      "greeting_name" => "sample string 5",
      "email" => "sample string 6",
      "address_line_1" => "sample string 7",
      "address_Line_2" => "sample string 8",
      "insured_id" => "sample string 9",
      "customer_id" => "sample string 10",
      "city" => "sample string 11",
      "state" => "sample string 12",
      "zip_code" => "12345",
      "phone_number" => "sample string 14",
      "cell_phone" => "sample string 15",
      "sms_phone" => "sample string 16",
      "website" => "sample string 17",
      "tag_name" => "sample string 18",
      "tag_description" => "sample string 19",
      "type" => \NowCerts\InsuredType::Insured,
      //"agents" => array(
        //"sample string 1",
        //"sample string 2",
      //),
      //"csrs" => array(
        //"sample string 1",
        //"sample string 2",
      //),
      // These are objects.
      "agentsModel" => $agents,
      // And these are strings.
      "csRsModel" => $csrs,
      "middle_name" => "sample string 21",
      "date_of_birth" => "2020-03-17T10:32:40.1373224-05:00",
      "co_insured_first_name" => "sample string 22",
      "co_insured_middle_name" => "sample string 23",
      "co_insured_last_name" => "sample string 24",
      "co_insured_date_of_birth" => "2020-03-17T10:32:40.1373224-05:00",
      "customFields" => $customFields,
      "customFieldsSimple" => $customFieldsSimple,
      "xDatesAndLinesOfBusiness" => $xDatesAndLinesOfBusiness,
    );
    $this->insured = new \NowCerts\Insured($fields);
    parent::setUp();
  }

  public function testGetInsureds(): void {
    $insureds = \NowCerts\Insured::getList();
    $this->assertSame(\NowCerts\Insured::class, get_class($insureds[0]));
  }

  public function testInsertInsured(): void {
    $insured = $this->insured;

    $databaseId = $insured->insert();
    // Database ID should be returned on insert.
    $this->assertTrue(is_string($databaseId));
  }

  public function testInsertNoOverride(): void {
    $databaseId = $this->insured->insertNoOverride();
    $this->assertTrue(is_string($databaseId));
  }

  public function testInsertInsuredAndPolicies(): void {
    $policies = $quotes = array();
    $insured = $this->insured;
    $policies_fields = array(
      array(
        "insuredDatabaseId" => "35c17428-8166-494f-9d6c-1ff8c83162f6",
        "insuredEmail" => "sample string 2",
        "insuredFirstName" => "sample string 3",
        "insuredLastName" => "sample string 4",
        "database_id" => "1a278c79-54a6-4cf7-9b11-d3341e9f6ea1",
        "number" => "sample string 6",
        "effectiveDate" => "2020-03-19T13:37:39.3609126-05:00",
        "expirationDate" => "2020-03-19T13:37:39.3609126-05:00",
        "bindDate" => "2020-03-19T13:37:39.3609126-05:00",
        "businessType" => 0,
        "businessSubType" => 0,
        "description" => "sample string 7",
        "billingType" => 0,
        "insuredName" => "sample string 8",
        "agents" => array(
          array(
            "databaseId" => "ba132ac3-75b1-47fa-8ad3-097f1e2abed3",
            "firstName" => "sample string 2",
            "lastName" => "sample string 3",
          ),
          array(
            "databaseId" => "ba132ac3-75b1-47fa-8ad3-097f1e2abed3",
            "firstName" => "sample string 2",
            "lastName" => "sample string 3",
          ),
        ),
        "csRs" => array(
          array(
            "databaseId" => "ba132ac3-75b1-47fa-8ad3-097f1e2abed3",
            "firstName" => "sample string 2",
            "lastName" => "sample string 3",
          ),
          array(
            "databaseId" => "ba132ac3-75b1-47fa-8ad3-097f1e2abed3",
            "firstName" => "sample string 2",
            "lastName" => "sample string 3",
          ),
        ),
        "lineOfBusinessName" => "sample string 9",
        "carrierName" => "sample string 10",
        "mgaName" => "sample string 11",
        "premium" => 1.0,
        "agencyCommissionPercent" => 1.0,
        "agencyCommissionValue" => 1.0,
        "agencyFee" => 1.0,
        "taxes" => 1.0,
      ),
      array(
        "insuredDatabaseId" => "35c17428-8166-494f-9d6c-1ff8c83162f6",
        "insuredEmail" => "sample string 2",
        "insuredFirstName" => "sample string 3",
        "insuredLastName" => "sample string 4",
        "databaseId" => "1a278c79-54a6-4cf7-9b11-d3341e9f6ea1",
        "number" => "sample string 6",
        "effectiveDate" => "2020-03-19T13:37:39.3609126-05:00",
        "expirationDate" => "2020-03-19T13:37:39.3609126-05:00",
        "bindDate" => "2020-03-19T13:37:39.3609126-05:00",
        "businessType" => 0,
        "businessSubType" => 0,
        "description" => "sample string 7",
        "billingType" => 0,
        "insuredName" => "sample string 8",
        "agents" => array(
          array(
            "databaseId" => "ba132ac3-75b1-47fa-8ad3-097f1e2abed3",
            "firstName" => "sample string 2",
            "lastName" => "sample string 3",
          ),
          array(
            "databaseId" => "ba132ac3-75b1-47fa-8ad3-097f1e2abed3",
            "firstName" => "sample string 2",
            "lastName" => "sample string 3",
          ),
        ),
        "csRs" => array(
          array(
            "databaseId" => "ba132ac3-75b1-47fa-8ad3-097f1e2abed3",
            "firstName" => "sample string 2",
            "lastName" => "sample string 3",
          ),
          array(
            "databaseId" => "ba132ac3-75b1-47fa-8ad3-097f1e2abed3",
            "firstName" => "sample string 2",
            "lastName" => "sample string 3",
          ),
        ),
        "lineOfBusinessName" => "sample string 9",
        "carrierName" => "sample string 10",
        "mgaName" => "sample string 11",
        "premium" => 1.0,
        "agencyCommissionPercent" => 1.0,
        "agencyCommissionValue" => 1.0,
        "agencyFee" => 1.0,
        "taxes" => 1.0,
      ),
    );
    $quotes_fields = array(
      array(
        "insuredDatabaseId" => "cc8cd1f8-5f5e-4161-bcfd-ed4415239b0c",
        "insuredEmail" => "sample string 2",
        "insuredFirstName" => "sample string 3",
        "insuredLastName" => "sample string 4",
        "databaseId" => "6c579176-e984-4ff4-af1c-13d31ac9c936",
        "number" => "sample string 6",
        "effectiveDate" => "2020-03-19T13:37:39.3609126-05:00",
        "expirationDate" => "2020-03-19T13:37:39.3609126-05:00",
        "bindDate" => "2020-03-19T13:37:39.3609126-05:00",
        "businessType" => 0,
        "businessSubType" => 0,
        "description" => "sample string 7",
        "billingType" => 0,
        "insuredName" => "sample string 8",
        "agents" => array(
          array(
            "databaseId" => "ba132ac3-75b1-47fa-8ad3-097f1e2abed3",
            "firstName" => "sample string 2",
            "lastName" => "sample string 3",
          ),
          array(
            "databaseId" => "ba132ac3-75b1-47fa-8ad3-097f1e2abed3",
            "firstName" => "sample string 2",
            "lastName" => "sample string 3",
          ),
        ),
        "csRs" => array(
          array(
            "databaseId" => "ba132ac3-75b1-47fa-8ad3-097f1e2abed3",
            "firstName" => "sample string 2",
            "lastName" => "sample string 3",
          ),
          array(
            "databaseId" => "ba132ac3-75b1-47fa-8ad3-097f1e2abed3",
            "firstName" => "sample string 2",
            "lastName" => "sample string 3",
          ),
        ),
        "lineOfBusinessName" => "sample string 9",
        "carrierName" => "sample string 10",
        "mgaName" => "sample string 11",
        "premium" => 1.0,
        "agencyCommissionPercent" => 1.0,
        "agencyCommissionValue" => 1.0,
        "agencyFee" => 1.0,
        "taxes" => 1.0,
      ),
      array(
        "insuredDatabaseId" => "cc8cd1f8-5f5e-4161-bcfd-ed4415239b0c",
        "insuredEmail" => "sample string 2",
        "insuredFirstName" => "sample string 3",
        "insuredLastName" => "sample string 4",
        "databaseId" => "6c579176-e984-4ff4-af1c-13d31ac9c936",
        "number" => "sample string 6",
        "effectiveDate" => "2020-03-19T13:37:39.3609126-05:00",
        "expirationDate" => "2020-03-19T13:37:39.3609126-05:00",
        "bindDate" => "2020-03-19T13:37:39.3609126-05:00",
        "businessType" => 0,
        "businessSubType" => 0,
        "description" => "sample string 7",
        "billingType" => 0,
        "insuredName" => "sample string 8",
        "agents" => array(
          array(
            "databaseId" => "ba132ac3-75b1-47fa-8ad3-097f1e2abed3",
            "firstName" => "sample string 2",
            "lastName" => "sample string 3",
          ),
          array(
            "databaseId" => "ba132ac3-75b1-47fa-8ad3-097f1e2abed3",
            "firstName" => "sample string 2",
            "lastName" => "sample string 3",
          ),
        ),
        "csRs" => array(
          array(
            "databaseId" => "ba132ac3-75b1-47fa-8ad3-097f1e2abed3",
            "firstName" => "sample string 2",
            "lastName" => "sample string 3",
          ),
          array(
            "databaseId" => "ba132ac3-75b1-47fa-8ad3-097f1e2abed3",
            "firstName" => "sample string 2",
            "lastName" => "sample string 3",
          ),
        ),
        "lineOfBusinessName" => "sample string 9",
        "carrierName" => "sample string 10",
        "mgaName" => "sample string 11",
        "premium" => 1.0,
        "agencyCommissionPercent" => 1.0,
        "agencyCommissionValue" => 1.0,
        "agencyFee" => 1.0,
        "taxes" => 1.0,
      ),
    );
    foreach ($policies_fields as $bundle) {
      $policies[] = new \NowCerts\Policy($bundle);
    }
    foreach ($quotes_fields as $bundle) {
      $quotes[] = new \NowCerts\Quote($bundle);
    }
    $results = $insured->insuredAndPoliciesInsert($policies_fields, $quotes_fields);
    $this->assertTrue(array_key_exists('policiesOrQuotes', $results));
  }

  public function testInsertInsuredWithCustomFields(): void {
    $results = $this->insured->insertInsuredWithCustomFields(array());
  }

}
