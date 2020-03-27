<?php

declare(strict_types=1);

namespace NowCerts\Test;

final class VehicleTest extends NowCertsTestCase {

  protected function setUp(): void {
    // Set some values that will be useful to multiple methods.
    $this->vehicleFields = array(
      "database_id" => "83929f81-e33b-4678-8d7f-9b1315cc785c",
      "type" => "Truck_Tractor",
      "year" => 2012,
      "make" => "Freightliner",
      "model" => "FR2",
      "vin" => "FRGHT67890AAA4567",
      "description" => "sample string 6",
      "type_of_use" => "Commercial",
      "typeOfUseAsFlag" => 1,
      "value" => "45001",
      "deductible_comprehensive" => 1,
      "deductible_collision" => 1,
      "visible" => TRUE,
      "policy_numbers" => array(
        "sample string 1",
        "sample string 2",
      ),
      "insured_database_id" => "1485c783-6dba-4fad-ad7a-0083eb683971",
      "insured_email" => "testUWinfo2@nctest.com",
      "insured_first_name" => "sample string 11",
      "insured_last_name" => "sample string 12",
      "insured_commercial_name" => "Peter NowCerts Test",
    );
    parent::setUp();
  }

  public function testGetVehicles(): void {
    $vehicles = \NowCerts\Vehicle::getVehicles();
    $this->assertNotEmpty($vehicles);
    $this->assertSame(\NowCerts\Vehicle::class, get_class($vehicles[0]));
  }

  /**
   * @todo Expand test scope.
   */
  public function testInsertVehicle(): void {
    $vehicle = new \NowCerts\Vehicle($this->vehicleFields);
    $result = $vehicle->insert();
  }

  public function testVehicleBulkInsert(): void {
    $fields = array(
      $this->vehicleFields,
      $this->vehicleFields,
    );
    $results = \NowCerts\Vehicle::bulkInsert($fields);

    $vehicle = new \NowCerts\Vehicle($fields[0]);
    $this->assertSame(\NowCerts\VehicleTypeOfUse::class, get_class($vehicle->typeOfUseAsFlag));
  }

}
