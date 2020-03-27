<?php

namespace NowCerts;

class ServiceRequest {

  /**
   * @see https://api.nowcerts.com/Help/Api/GET-api-Zapier-GetServiceRequestsAddDriver
   */
  public static function getServiceRequestsAddDriver() {
    $response = HttpClient::get('/Zapier/GetServiceRequestsAddDriver');
    return $response;
  }

  /**
   * @see https://api.nowcerts.com/Help/Api/GET-api-Zapier-GetServiceRequestsAddressChanges
   */
  public static function getServiceRequestsAddressChanges() {
    $response = HttpClient::get('/Zapier/GetServiceRequestsAddressChanges');
    return $response;
  }

  /**
   * @see https://api.nowcerts.com/Help/Api/GET-api-Zapier-GetServiceRequestsRemoveDriver
   */
  public static function getServiceRequestsRemoveDriver() {
    $response = HttpClient::get('/Zapier/GetServiceRequestsRemoveDriver');
    return $response;
  }

  /**
   * @see https://api.nowcerts.com/Help/Api/GET-api-Zapier-GetServiceRequestsReplaceDriver
   */
  public static function getServiceRequestsReplaceDriver() {
    $response = HttpClient::get('/Zapier/GetServiceRequestsReplaceDriver');
    return $response;
  }

  /**
   * @see https://api.nowcerts.com/Help/Api/GET-api-Zapier-GetServiceRequestsVehicleTransfer
   */
  public static function getServiceRequestsVehicleTransfer() {
    $response = HttpClient::get('/Zapier/GetServiceRequestsVehicleTransfer');
    return $response;
  }

  /**
   * @see https://api.nowcerts.com/Help/Api/GET-api-Zapier-GetServiceRequestsGeneric
   */
  public static function getServiceRequestsGeneric() {
    $response = HttpClient::get('/Zapier/GetServiceRequestsGeneric');
    return $response;
  }

  /**
   * @see https://api.nowcerts.com/Help/Api/POST-api-Zapier-InsertServiceRequestsAddDriver
   */
  public static function insertServiceRequestsAddDriver($arguments) {
    $response = HttpClient::post('/Zapier/InsertServiceRequestsAddDriver', $arguments);
    return $response;
  }

  /**
   * @see https://api.nowcerts.com/Help/Api/POST-api-Zapier-InsertServiceRequestsAddressChanges
   */
  public static function insertServiceRequestsAddressChanges($arguments) {
    $response = HttpClient::post('/Zapier/InsertServiceRequestsAddressChanges', $arguments);
    return $response;
  }

  /**
   * @see https://api.nowcerts.com/Help/Api/POST-api-Zapier-InsertServiceRequestsRemoveDriver
   */
  public static function insertServiceRequestsRemoveDriver($arguments) {
    $response = HttpClient::post('/Zapier/InsertServiceRequestsRemoveDriver', $arguments);
    return $response;
  }

  /**
   * @see https://api.nowcerts.com/Help/Api/POST-api-Zapier-InsertServiceRequestsReplaceDriver
   */
  public static function insertServiceRequestsReplaceDriver($arguments) {
    $response = HttpClient::post('/Zapier/InsertServiceRequestsReplaceDriver', $arguments);
    return $response;
  }

  /**
   * @see https://api.nowcerts.com/Help/Api/POST-api-Zapier-InsertServiceRequestsVehicleTransfer
   */
  public static function insertServiceRequestsVehicleTransfer($arguments) {
    $response = HttpClient::post('/Zapier/InsertServiceRequestsVehicleTransfer', $arguments);
    return $response;
  }

  /**
   * @see https://api.nowcerts.com/Help/Api/POST-api-Zapier-InsertServiceRequestsGeneric
   */
  public static function insertServiceRequestsGeneric($arguments) {
    $response = HttpClient::post('/Zapier/InsertServiceRequestsGeneric', $arguments);
    return $response;
  }

}
