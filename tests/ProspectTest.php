<?php

declare(strict_types=1);

namespace NowCerts\Test;

final class ProspectTest extends NowCertsTestCase {

  public function testGetProspects(): void {
    $prospects = \NowCerts\Prospect::getProspects();
    $this->assertNotEmpty($prospects);
    $this->assertSame(\NowCerts\Prospect::class, get_class($prospects[0]));
  }

  public function testInsertProspect(): void {
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
    );
    $prospect = new \NowCerts\Prospect($fields);
    $results = $prospect->insert();
  }

  public function testInsertWithCustomFields() {
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
    );
    $prospect = new \NowCerts\Prospect($fields);
    // Nothing to test here. Just make sure there are no errors.
    $prospect->insertWithCustomFields();
  }

  public function testXmlPush() {
    // Nothing to test here. Just make sure there are no errors.
    \NowCerts\Prospect::xmlPush(array('<test></test>'));
  }

  public function testQuoteRequestExternalImportWithProspect() {
    $fields = array(
      array(
        "propertyName" => "sample string 1",
        "displayName" => "sample string 2",
        "value" => new \stdClass(),
        "type" => \NowCerts\CustomFieldType::Text,
        "order" => 4,
      ),
      array(
        "propertyName" => "sample string 1",
        "displayName" => "sample string 2",
        "value" => new \stdClass(),
        "type" => \NowCerts\CustomFieldType::Text,
        "order" => 4,
      ),
    );
    \NowCerts\Prospect::quoteRequestExternalImportWithProspect("adfeb953-3b3e-47d6-94c9-f06a44c4dfd5", "sample string 1", \NowCerts\FieldsOrderBy::FieldOrderAndPropertyName, $fields);
    \NowCerts\Prospect::quoteRequestExternalImport("adfeb953-3b3e-47d6-94c9-f06a44c4dfd5", "sample string 1", \NowCerts\FieldsOrderBy::FieldOrderAndPropertyName, $fields);
  }

}
