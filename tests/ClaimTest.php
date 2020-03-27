<?php

declare(strict_types=1);

namespace NowCerts\Test;

final class ClaimTest extends NowCertsTestCase {

  public function testGetClaimsList(): void {
    $database_id = '8c38ab3d-9cdb-42ce-9a70-d7c34cefb38f';
    $claims = \NowCerts\Claim::getList($database_id);
    $this->assertSame($claims[0]->database_id, $database_id);
  }

  public function testGetClaims(): void {
    $claims = \NowCerts\Claim::getClaims();
    $this->assertNotEmpty($claims);
    $this->assertSame(\NowCerts\Claim::class, get_class($claims[0]));
  }

  public function testInsertClaim(): void {
    $fields = array(
      "database_id" => "5d9a3585-afdc-43aa-a46e-8b8e4b2cab2c",
      "claim_number" => "sample string 2",
      "status" => "sample string 3",
      "date_amount" => array(
        array(
          "date" => "2020-03-25T14:57:50.4022529-05:00",
          "amount" => 1.0,
        ),
        array(
          "date" => "2020-03-25T14:57:50.4022529-05:00",
          "amount" => 1.0,
        ),
      ),
      "street" => "sample string 4",
      "city" => "sample string 5",
      "state" => "sample string 6",
      "zip" => "sample string 7",
      "county" => "sample string 8",
      "date_of_loss" => "2020-03-25T14:57:50.4022529-05:00",
      "describe_location" => "sample string 9",
      "police_or_fire" => "sample string 10",
      "report_number" => "sample string 11",
      "additional_comments" => "sample string 12",
      "description_of_loss" => "sample string 13",
      "insured_database_id" => "a1144c2e-c22a-47e4-8240-f1f83dfcdada",
      "insured_email" => "sample string 14",
      "insured_first_name" => "sample string 15",
      "insured_last_name" => "sample string 16",
      "insured_commercial_name" => "sample string 17",
      "policy_number" => "sample string 18",
    );
    $claim = new \NowCerts\Claim($fields);
    $results = $claim->insert();
  }

}
