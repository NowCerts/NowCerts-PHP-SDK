<?php

declare(strict_types=1);

namespace NowCerts\Test;

final class SmsTest extends NowCertsTestCase {

  public function testGetSmss(): void {
    $smses = \NowCerts\Sms::getSmses();
    $this->assertNotEmpty($smses);
    $this->assertSame(\NowCerts\Sms::class, get_class($smses[0]));
  }

  public function testInsertSms(): void {
    $fields = array(
      "date_and_time" => "2020-03-26T13:40:22.8903202-05:00",
      "from_number" => "sample string 2",
      "to_number" => "sample string 3",
      "subject" => "sample string 4",
      "from_name" => "sample string 5",
      "to_name" => "sample string 6",
      "conversation_id" => "sample string 7",
      "message_id" => "sample string 8",
      "is_read" => TRUE,
      "system_type" => "sample string 10",
      "insured_database_id" => "da4f81c5-482f-4960-85bc-eb26c067dae7",
      "insured_email" => "sample string 11",
      "insured_first_name" => "sample string 12",
      "insured_last_name" => "sample string 13",
      "insured_commercial_name" => "sample string 14",
    );
    $sms = new \NowCerts\Sms($fields);
    $results = $sms->insert();
  }

  /**
   * Nothing to test. Just make sure there are no errors.
   */
  public function testSmsTwilio(): void {
    $fields = array(
      "smsSid" => "sample string 1",
      "body" => "sample string 2",
      "messageStatus" => "sample string 3",
      "accountSid" => "sample string 4",
      "from" => "sample string 5",
      "to" => "sample string 6",
      "fromCity" => "sample string 7",
      "fromState" => "sample string 8",
      "fromZip" => "sample string 9",
      "fromCountry" => "sample string 10",
      "toCity" => "sample string 11",
      "toState" => "sample string 12",
      "toZip" => "sample string 13",
      "toCountry" => "sample string 14",
    );
    $results = \NowCerts\Sms::twilio($fields);
  }

}
