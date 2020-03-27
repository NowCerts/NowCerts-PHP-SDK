<?php

namespace NowCerts;

/**
 * Represents a Zapier event type.
 *
 * @see https://api.nowcerts.com/Help/ResourceModel?modelName=ZapierEventType
 */
class ZapierEventType {

  const CreateInsured = 0;
  const CreatePolicy = 1;
  const CreateQuote = 2;
  const CreateProspect = 3;
  const UpdatePolicy = 4;
  const UpdateQuote = 5;
  const CreateTask = 6;
  const UpdateTask = 7;
  const CreateOpportunity = 8;
  const UpdateOpportunity = 9;
  const CreateServiceRequestsAddDriver = 10;
  const CreateServiceRequestsAddressChanges = 11;
  const CreateServiceRequestsRemoveDriver = 12;
  const CreateServiceRequestsReplaceDriver = 13;
  const CreateServiceRequestsVehicleTransfer = 14;
  const CreateServiceRequests = 15;
  const CreateClaim = 16;
  const CreateAutomobileLossClaim = 17;
  const CreateNote = 18;
  const CreateTagApply = 19;
  const CreateDriver = 20;
  const UpdateDriver = 21;
  const CreateVehicle = 22;
  const UpdateVehicle = 23;
  const CreateProperty = 24;
  const UpdateProperty = 25;
  const CreatePrincipal = 26;
  const UpdatePrincipal = 27;
  const CreateCallLog = 28;
  const CreateSMS = 29;
  const ConvertProspectToInsured = 30;
  const CreateQuoteApplication = 31;
  const UpdateInsured = 32;
  const UpdateProspect = 33;

  /**
   * Sets the value of the Zapier event type.
   *
   * @param int $value
   *   The integer corresponding to the Zapier event type.
   */
  public function __construct($value) {
    $this->value = $value;
  }

}
