<?php

declare(strict_types=1);

namespace NowCerts\Test;

final class ServiceRequestTest extends NowCertsTestCase {

  public function testGetInsertServiceRequestsAddDriver() {
    $results = \NowCerts\ServiceRequest::getServiceRequestsAddDriver();
    $service_request = $results[0];
    $service_request['description'] = 'big test';
    \NowCerts\ServiceRequest::insertServiceRequestsAddDriver($service_request);
    $results = \NowCerts\ServiceRequest::getServiceRequestsAddDriver();
    $found_inserted_value = FALSE;
    foreach ($results as $result) {
      if ($result['description'] == 'big test') {
        $found_inserted_value = TRUE;
        break;
      }
    }
    $this->assertTrue($found_inserted_value);
  }

  public function testGetInsertServiceRequestsAddressChanges() {
    $results = \NowCerts\ServiceRequest::getServiceRequestsAddressChanges();
    $service_request = $results[0];
    $service_request['description'] = 'big test';
    \NowCerts\ServiceRequest::insertServiceRequestsAddressChanges($service_request);
    $results = \NowCerts\ServiceRequest::getServiceRequestsAddressChanges();
    $found_inserted_value = FALSE;
    foreach ($results as $result) {
      if ($result['description'] == 'big test') {
        $found_inserted_value = TRUE;
        break;
      }
    }
    $this->assertTrue($found_inserted_value);
  }

  public function testGetInsertServiceRequestsRemoveDriver() {
    $results = \NowCerts\ServiceRequest::getServiceRequestsRemoveDriver();
    $service_request = $results[0];
    $service_request['description'] = 'big test';
    \NowCerts\ServiceRequest::insertServiceRequestsRemoveDriver($service_request);
    $results = \NowCerts\ServiceRequest::getServiceRequestsRemoveDriver();
    $found_inserted_value = FALSE;
    foreach ($results as $result) {
      if ($result['description'] == 'big test') {
        $found_inserted_value = TRUE;
        break;
      }
    }
    $this->assertTrue($found_inserted_value);
  }

  public function testGetInsertServiceRequestsReplaceDriver() {
    $results = \NowCerts\ServiceRequest::getServiceRequestsReplaceDriver();
    $service_request = $results[0];
    $service_request['description'] = 'big test';
    \NowCerts\ServiceRequest::insertServiceRequestsReplaceDriver($service_request);
    $results = \NowCerts\ServiceRequest::getServiceRequestsReplaceDriver();
    $found_inserted_value = FALSE;
    foreach ($results as $result) {
      if ($result['description'] == 'big test') {
        $found_inserted_value = TRUE;
        break;
      }
    }
    $this->assertTrue($found_inserted_value);
  }

  public function testGetInsertServiceRequestsVehicleTransfer() {
    $results = \NowCerts\ServiceRequest::getServiceRequestsVehicleTransfer();
    $service_request = $results[0];
    $service_request['description'] = 'big test';
    \NowCerts\ServiceRequest::insertServiceRequestsVehicleTransfer($service_request);
    $results = \NowCerts\ServiceRequest::getServiceRequestsVehicleTransfer();
    $found_inserted_value = FALSE;
    foreach ($results as $result) {
      if ($result['description'] == 'big test') {
        $found_inserted_value = TRUE;
        break;
      }
    }
    $this->assertTrue($found_inserted_value);
  }

  public function testGetInsertServiceRequestsGeneric() {
    $results = \NowCerts\ServiceRequest::getServiceRequestsGeneric();
    $service_request = $results[0];
    $service_request['description'] = 'big test';
    \NowCerts\ServiceRequest::insertServiceRequestsGeneric($service_request);
    $results = \NowCerts\ServiceRequest::getServiceRequestsGeneric();
    $found_inserted_value = FALSE;
    foreach ($results as $result) {
      if ($result['description'] == 'big test') {
        $found_inserted_value = TRUE;
        break;
      }
    }
    $this->assertTrue($found_inserted_value);
  }

}
