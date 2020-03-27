<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class PolicyTest extends TestCase {

  /**
   * {@inheritdoc}
   */
  protected function setUp(): void {
    \NowCerts\HttpClient::setup();
    \NowCerts\HttpClient::authenticateWithPassword("test", "test");
  }

  public function testGetPoliciesList(): void {
    $policies = \NowCerts\Policy::getList(array('is_quote' => TRUE));
    $this->assertNotEmpty($policies);
    $this->assertTrue($policies[0]['isQuote']);

    $columns = array(
      'isQuote',
      'databaseId',
      'expirationDate',
      'effectiveDate',
      'bindDate',
      'businessType',
      'description',
      'insuredFirstName',
      'insuredLastName',
      'insuredCommercialName',
    );
    $policies = \NowCerts\Policy::getList(array('is_quote' => FALSE), $columns, 'effectiveDate', 'desc', 0, 2);
    // Columns were specified, so make sure they are present and others are not.
    $this->assertTrue(array_key_exists('description', $policies[0]));
    $this->assertFalse(array_key_exists('insuredEmail', $policies[0]));
    // 2 values were requested.
    $this->assertSame(2, count($policies));
    // Check sort order.
    $this->assertSame(1, strcmp($policies[0]['effectiveDate'], $policies[1]['effectiveDate']));
    // Check that quote filter worked.
    $this->assertFalse($policies[0]['isQuote']);
  }

  public function testGetPolicies(): void {
    $policies = \NowCerts\Policy::getPolicies(array('Carrier' => 'Progressive'));
    $this->assertNotEmpty($policies);
    $this->assertSame(\NowCerts\Policy::class, get_class($policies[0]));
  }

  public function testGetPolicy(): void {
    $policy = \NowCerts\Policy::get("39a7a8e9-8a5c-463b-90ec-c6161a90c17a");
    $this->assertSame(\NowCerts\Policy::class, get_class($policy));
  }

  public function testInsertPolicy(): void {
    $fields = array(
      "insuredDatabaseId" => "77fbf428-9ce0-45f8-9140-bea5185ee6de",
      "insuredEmail" => "sample string 2",
      "insuredFirstName" => "sample string 3",
      "insuredLastName" => "sample string 4",
      "databaseId" => "afe464e3-6866-427d-976d-ba7346bfa61e",
      "number" => "sample string 6",
      "effectiveDate" => "2020-03-19T11:26:18.7555712-05:00",
      "expirationDate" => "2020-03-19T11:26:18.7555712-05:00",
      "bindDate" => "2020-03-19T11:26:18.7555712-05:00",
      "businessType" => 0,
      "businessSubType" => 0,
      "description" => "sample string 7",
      "billingType" => 0,
      "insuredName" => "sample string 8",
      "agents" => array(
        array(
          "databaseId" => "3b6e04da-afed-4348-b766-ede7d17ec68d",
          "firstName" => "sample string 2",
          "lastName" => "sample string 3",
        ),
        array(
          "databaseId" => "3b6e04da-afed-4348-b766-ede7d17ec68d",
          "firstName" => "sample string 2",
          "lastName" => "sample string 3",
        ),
      ),
      "csRs" => array(
        array(
          "databaseId" => "3b6e04da-afed-4348-b766-ede7d17ec68d",
          "firstName" => "sample string 2",
          "lastName" => "sample string 3",
        ),
        array(
          "databaseId" => "3b6e04da-afed-4348-b766-ede7d17ec68d",
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
    );
    $policy = new \NowCerts\Policy($fields);
    $results = $policy->insert();
    $this->assertTrue(array_key_exists('policiesOrQuotes', $results));
  }

}
