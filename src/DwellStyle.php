<?php

namespace NowCerts;

/**
 * @see https://api.nowcerts.com/Help/ResourceModel?modelName=DwellStyle
 */
class DwellStyle {

  /**
   * One and Three Quarter Stories.
   */
  const _13Q = 0;

  /**
   * Two and Three Quarter Stories.
   */
  const _23Q = 1;

  /**
   * Three and Three Quarter Stories.
   */
  const _33Q = 2;

  /**
   * Three and One Half Stories.
   */
  const _3H = 3;

  /**
   * Back Split.
   */
  const BACKSPLIT = 4;

  /**
   * Bungalow.
   */
  const BUNGALOW = 5;

  /**
   * Cape Cod.
   */
  const CAPECOD = 6;

  /**
   * Colonial.
   */
  const COLONIAL = 7;

  /**
   * Contemporary.
   */
  const CONTEMP = 8;

  /**
   * Cottage.
   */
  const COTTAGE = 9;

  /**
   * Craftsman.
   */
  const CRAFT = 10;

  /**
   * Dome.
   */
  const DOME = 11;

  /**
   * Duplex/Semi-attached.
   */
  const DUPLEXSA = 12;

  /**
   * Earth Home.
   */
  const EARTH = 13;

  /**
   * Envelope.
   */
  const ENVELOPE = 14;

  /**
   * Federal Colonial.
   */
  const FEDCOL = 15;

  /**
   * Log.
   */
  const L = 16;

  /**
   * Manufactured.
   */
  const MANU = 17;

  /**
   * Mediterranean.
   */
  const MEDITERR = 18;

  /**
   * Mobile.
   */
  const MOBILE = 19;

  /**
   * Ornate Victorian.
   */
  const ORNVICT = 20;

  /**
   * Queen Anne.
   */
  const QUEENANNE = 21;

  /**
   * Raised Ranch.
   */
  const RAISRANCH = 22;

  /**
   * Rambler.
   */
  const RAMBLER = 23;

  /**
   * Row House Center Unit.
   */
  const RHCTRUNIT = 24;

  /**
   * Row House End Unit.
   */
  const RHENDUNIT = 25;

  /**
   * Split Foyer.
   */
  const SPLITFOVER = 26;

  /**
   * Split Level.
   */
  const SPLITLVL = 27;

  /**
   * Steel Frame.
   */
  const STEELF = 28;

  /**
   * Sub Standard.
   */
  const SUBSTD = 29;

  /**
   * Southwest Adobe.
   */
  const SWADOBE = 30;

  /**
   * Town House Center Unit.
   */
  const THCTRUNIT = 31;

  /**
   * Town House End Unit.
   */
  const THENDUNIT = 32;

  /**
   * Timber Frame.
   */
  const TIMBER = 33;

  /**
   * Victorian.
   */
  const VICT = 34;

  /**
   * Apartment Building.
   */
  const APT = 35;

  /**
   * @var int
   */
  public $value;

  /**
   * Sets the value of the object.
   *
   * @param int $value
   */
  public function __construct($value) {
    $this->value = $value;
  }

}
