<?php

declare(strict_types=1);

namespace NowCerts\Test;

final class DriverTest extends NowCertsTestCase {

  /**
   * {@inheritdoc}
   */
  public function setUp(): void {
    $this->driverFields = array(
      "database_id" => "1b41c45b-5c6b-46f1-8bfd-4e3e3c771d13",
      "first_name" => "sample string 2",
      "middle_name" => "sample string 3",
      "last_name" => "sample string 4",
      "date_of_birth" => "2020-03-26T12:36:15.032274-05:00",
      "ssn" => "sample string 5",
      "excluded" => TRUE,
      "license_number" => "sample string 7",
      "license_state" => "sample string 8",
      "license_year" => 1,
      "hire_date" => "2020-03-26T12:36:15.032274-05:00",
      "termination_date" => "2020-03-26T12:36:15.032274-05:00",
      "policy_numbers" => array(
      "sample string 1",
      "sample string 2",
      ),
      "insured_database_id" => "a222a424-b5ed-468e-8dc2-c29379b26e11",
      "insured_email" => "sample string 9",
      "insured_first_name" => "sample string 10",
      "insured_last_name" => "sample string 11",
      "insured_commercial_name" => "sample string 12",
    );
    parent::setUp();
  }

  public function testGetDrivers(): void {
    $drivers = \NowCerts\Driver::getDrivers();
    $this->assertNotEmpty($drivers);
    $this->assertSame(\NowCerts\Driver::class, get_class($drivers[0]));
  }

  public function testInsertDriver(): void {
    $fields = $this->driverFields;
    $driver = new \NowCerts\Driver($fields);
    $results = $driver->insert();
  }

  public function testBulkInsertDriver(): void {
    $fields = $this->driverFields;
    $driver = new \NowCerts\Driver($fields);
    $arguments = array($driver, $driver);
    $results = \NowCerts\Driver::bulkInsert($arguments);
  }

}
