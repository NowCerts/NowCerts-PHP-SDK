<?php

declare(strict_types=1);

namespace NowCerts\Test;

final class QuoteTest extends NowCertsTestCase {

  public function testGetQuotes(): void {
    $quotes = \NowCerts\Quote::getQuotes();
    $this->assertNotEmpty($quotes);
    $this->assertSame(\NowCerts\Quote::class, get_class($quotes[0]));
  }

  public function testInsertQuote(): void {
    $fields = array(
      "database_id" => "23b50d3a-709d-4ba2-82d5-e4470528f96e",
      "number" => "sample string 2",
      "effective_date" => "2020-03-17T18:04:57.0442171-05:00",
      "expiration_date" => "2020-03-17T18:04:57.0442171-05:00",
      "bind_date" => "2020-03-17T18:04:57.0442171-05:00",
      "business_type" => \NowCerts\PolicyBusinessType::New_Business,
      "business_sub_type" => \NowCerts\PolicyBusinessSubType::AgentOfRecord,
      "description" => "sample string 3",
      "billing_type" => \NowCerts\PolicyBillingType::Direct_Bill_100,
      "insured_database_id" => "b969e9c2-786d-4113-b6e5-25ac785332bb",
      "insured_email" => "sample string 5",
      "insured_first_name" => "sample string 6",
      "insured_last_name" => "sample string 7",
      "insured_commercial_name" => "sample string 8",
      "line_of_business_name" => "sample string 9",
      "carrier_name" => "sample string 10",
      "mga_name" => "sample string 11",
      "premium" => 1.0,
      "agency_commission_percent" => 1.0,
      "agency_commission_value" => 1.0,
      "agency_fee" => 1.0,
      "taxes" => 1.0,
      "agents" => array(
        "sample string 1",
        "sample string 2",
      ),
      "csrs" => array(
        "sample string 1",
        "sample string 2",
      ),
      "insured_greeting_name" => "sample string 12",
      "insured_insured_id" => "sample string 13",
      "insured_customer_id" => "sample string 14",
      "insured_address_line_1" => "sample string 15",
      "insured_address_Line_2" => "sample string 16",
      "insured_city" => "sample string 17",
      "insured_state" => "sample string 18",
      "insured_zip_code" => "sample string 19",
      "insured_phone_number" => "sample string 20",
      "insured_cell_phone" => "sample string 21",
      "insured_sms_phone" => "sample string 22",
      "insured_website" => "sample string 23",
      "insured_type" => "sample string 24",
    );
    $quote = new \NowCerts\Quote($fields);
    $results = $quote->insert();
  }

}
