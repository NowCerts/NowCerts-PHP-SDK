<?php

declare(strict_types=1);

namespace NowCerts\Test;

final class PrincipalTest extends NowCertsTestCase {

  public function testGetPrincipalsList(): void {
    $database_id = 'e35b4373-c78d-470b-8cb8-f31c0a54136b';
    $principals = \NowCerts\Principal::getList($database_id);
    $this->assertSame($principals[0]->database_id, $database_id);
  }

  public function testGetPrincipals(): void {
    $principals = \NowCerts\Principal::getPrincipals();
    $this->assertNotEmpty($principals);
    $this->assertSame(\NowCerts\Principal::class, get_class($principals[0]));
  }

  public function testInsertPrincipal(): void {
    $fields = array(
      "database_id" => "20b1199c-1801-4a88-a325-99aa526fbec4",
      "first_name" => "sample string 2",
      "middle_name" => "sample string 3",
      "last_name" => "sample string 4",
      "description" => "sample string 5",
      "type" => "sample string 6",
      "personal_email" => "sample string 7",
      "business_email" => "sample string 8",
      "home_phone" => "sample string 9",
      "office_phone" => "sample string 10",
      "cell_phone" => "sample string 11",
      "personal_fax" => "sample string 12",
      "business_fax" => "sample string 13",
      "ssn" => "sample string 14",
      "birthday" => "2020-03-26T13:00:54.8476727-05:00",
      "insured_database_id" => "310f0755-aa5f-43e2-8112-51b31808472b",
      "insured_email" => "sample string 15",
      "insured_first_name" => "sample string 16",
      "insured_last_name" => "sample string 17",
      "insured_commercial_name" => "sample string 18",
    );
    $principal = new \NowCerts\Principal($fields);
    $results = $principal->insert();
  }

}
