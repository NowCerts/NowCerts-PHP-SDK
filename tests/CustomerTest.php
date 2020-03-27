<?php

declare(strict_types=1);

namespace NowCerts\Test;

final class CustomerTest extends NowCertsTestCase {

  public function testGetCustomersNoFilter(): void {
    $this->expectException(\NowCerts\Exception::class);
    \NowCerts\Customer::getCustomers();
  }

  public function testGetCustomers(): void {
    $search_string = "John";
    $per_page = 5;
    $customers = \NowCerts\Customer::getCustomers(array('Name' => $search_string), 0, $per_page);
    $this->assertNotEmpty($customers);
    $this->assertSame(\NowCerts\Customer::class, get_class($customers[0]));
    $this->assertTrue(strpos($customers[0]->commercialName, $search_string) !== FALSE);
    $this->assertTrue(count($customers) <= $per_page);
  }

}
