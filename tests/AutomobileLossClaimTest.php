<?php

declare(strict_types=1);

namespace NowCerts\Test;

final class AutomobileLossClaimTest extends NowCertsTestCase {

  public function testGetAutomobileLossClaims(): void {
    $automobile_loss_claims = \NowCerts\AutomobileLossClaim::getAutomobileLossClaims();
    $this->assertNotEmpty($automobile_loss_claims);
    $this->assertSame(\NowCerts\AutomobileLossClaim::class, get_class($automobile_loss_claims[0]));
  }

  public function testInsertAutomobileLossClaim(): void {
    $fields = array(
      //"database_id" => "5d9a3585-afdc-43aa-a46e-8b8e4b2cab2c",
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
      "description_of_accident" => "sample string 1",
      "vin_number" => "sample string 2",
      "driver_first_name" => "sample string 3",
      "driver_last_name" => "sample string 4",
      "driver_dl_number" => "sample string 5",
      "describe_damage" => "sample string 6",
      "other_vin_number" => "sample string 7",
      "other_driver_first_name" => "sample string 8",
      "other_driver_last_name" => "sample string 9",
      "other_driver_dl_number" => "sample string 10",
      "other_describe_damage" => "sample string 11",
      "child_seat" => TRUE,
      "child_seat_installed" => TRUE,
      "child_seat_sustain" => TRUE,
      "estimate_amount" => "sample string 15",
      "where_vehicle_can_be_seen" => "sample string 16",
      "when_vehicle_can_be_seen" => "sample string 17",
    );
    $automobile_loss_claim = new \NowCerts\AutomobileLossClaim($fields);
    $results = $automobile_loss_claim->insert();
  }

}
