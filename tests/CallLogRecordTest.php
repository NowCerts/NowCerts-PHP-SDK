<?php

declare(strict_types=1);

namespace NowCerts\Test;

final class CallLogRecordTest extends NowCertsTestCase {

  public function testGetCallLogRecords(): void {
    $call_log_records = \NowCerts\CallLogRecord::getCallLogRecords();
    $this->assertNotEmpty($call_log_records);
    $this->assertSame(\NowCerts\CallLogRecord::class, get_class($call_log_records[0]));
  }

  public function testInsertCallLogRecord(): void {
    $fields = array(
      "type" => "sample string 1",
      "from_number" => "sample string 2",
      "from_name" => "sample string 3",
      "to_number" => "sample string 4",
      "to_name" => "sample string 5",
      "start_date" => "2020-03-26T13:18:18.0282345-05:00",
      "duration" => 1.0,
      "call_log_id" => "sample string 6",
      "action" => "sample string 7",
      "result" => "sample string 8",
      "insured_database_id" => "a1144c2e-c22a-47e4-8240-f1f83dfcdada",
      "insured_email" => "sample string 14",
      "insured_first_name" => "sample string 15",
      "insured_last_name" => "sample string 16",
      "insured_commercial_name" => "sample string 17",
    );
    $call_log_record = new \NowCerts\CallLogRecord($fields);
    $results = $call_log_record->insert();
  }

}
