<?php

declare(strict_types=1);

namespace NowCerts\Test;

final class OpportunityTest extends NowCertsTestCase {

  public function testGetOpportunities(): void {
    $opportunities = \NowCerts\Opportunity::getOpportunities();
    $this->assertNotEmpty($opportunities);
    $this->assertSame(\NowCerts\Opportunity::class, get_class($opportunities[0]));
  }

  public function testInsertOpportunity(): void {
    $fields = array(
      "database_id" => "fcb12374-a687-42d4-9099-2db2f0a96618",
      "line_of_business_name" => "sample string 2",
      "needed_by" => "2020-03-25T13:31:39.5434574-05:00",
      "opportunity_stage_name" => "sample string 4",
      "current_stage_due_date" => "2020-03-25T13:31:39.5434574-05:00",
      "referral_source_name" => "sample string 5",
      "referral_source_contact_name" => "sample string 6",
      "win_probability" => "sample string 7",
      "agency_commission" => 8.0,
      "assigned_to" => array(
        "sample string 1",
        "sample string 2",
      ),
      "description" => "sample string 9",
      "insured_database_id" => "37c659bc-1a7f-4ccc-bb64-304cf3a7ddcd",
      "insured_email" => "sample string 10",
      "insured_first_name" => "sample string 11",
      "insured_last_name" => "sample string 12",
      "insured_commercial_name" => "sample string 13",
      "policy_numbers" => array(
        "sample string 1",
        "sample string 2",
      ),
    );
    $opportunity = new \NowCerts\Opportunity($fields);
    $results = $opportunity->insert();
  }

}
