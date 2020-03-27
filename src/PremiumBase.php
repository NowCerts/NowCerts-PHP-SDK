<?php

namespace NowCerts;

/**
 * @see https://api.nowcerts.com/Help/ResourceModel?modelName=PremiumBase
 */
class PremiumBase {

  /**
   * 1000 Cubic Meters.
   */
  const _1000CubicMeters = 0;

  /**
   * 1000 Liters.
   */
  const _1000Liters = 1;

  /**
   * Admissions.
   */
  const ADMIS = 2;

  /**
   * Alley.
   */
  const Alley = 3;

  /**
   * Animal.
   */
  const Animal = 4;

  /**
   * Area.
   */
  const AREA = 5;

  /**
   * Bond Amount.
   */
  const BA = 6;

  /**
   * Basic.
   */
  const Basic = 7;

  /**
   * Boat.
   */
  const Boat = 8;

  /**
   * Building.
   */
  const Building = 9;

  /**
   * Cubic Feet.
   */
  const C = 10;

  /**
   * Cabin or Rental Space.
   */
  const CabinRentSpace = 11;

  /**
   * Cam.
   */
  const Cam = 12;

  /**
   * Completed Value.
   */
  const CompletedValue = 13;

  /**
   * Vehicles Under Contract - Cost.
   */
  const ContractVehs = 14;

  /**
   * Cost of Work Done or Contracts.
   */
  const COST = 15;

  /**
   * Court.
   */
  const Court = 16;

  /**
   * Contract Price.
   */
  const CP = 17;

  /**
   * Device.
   */
  const Device = 18;

  /**
   * Display.
   */
  const Display = 19;

  /**
   * Dwelling.
   */
  const Dwelling = 20;

  /**
   * Number of Employees.
   */
  const E = 21;

  /**
   * Each.
   */
  const Each = 22;

  /**
   * Each Job.
   */
  const EachJob = 23;

  /**
   * Event.
   */
  const Event = 24;

  /**
   * Expenditures.
   */
  const Expenditures = 25;

  /**
   * Flat.
   */
  const Flat = 26;

  /**
   * Frontage.
   */
  const FRONT = 27;

  /**
   * Gross Sales.
   */
  const GrSales = 28;

  /**
   * Hectare.
   */
  const Hectare = 29;

  /**
   * Home.
   */
  const Home = 30;

  /**
   * Horse.
   */
  const Horse = 31;

  /**
   * Inmate.
   */
  const Inmate = 32;

  /**
   * Item.
   */
  const Item = 33;

  /**
   * Job.
   */
  const Job = 34;

  /**
   * Kennel.
   */
  const Kennel = 35;

  /**
   * Kilometer.
   */
  const Kilometer = 36;

  /**
   * Location.
   */
  const Location = 37;

  /**
   * Location For Season or Year.
   */
  const LocForSeasYr = 38;

  /**
   * Locker.
   */
  const Locker = 39;

  /**
   * Machine.
   */
  const Machine = 40;

  /**
   * Member.
   */
  const Member = 41;

  /**
   * Meter Frontage.
   */
  const MeterFrontage = 42;

  /**
   * Minimum.
   */
  const Min = 43;

  /**
   * Number of Cows Milked.
   */
  const NUMCM = 44;

  /**
   * Number of Contracts.
   */
  const NUMCT = 45;

  /**
   * Number of Landings (Escalators).
   */
  const NUMLA = 46;

  /**
   * Number of Seats.
   */
  const NumSe = 47;

  /**
   * Number of Students.
   */
  const NumStudents = 48;

  /**
   * Office.
   */
  const Office = 49;

  /**
   * Other.
   */
  const OT = 50;

  /**
   * Population.
   */
  const P = 51;

  /**
   * Payroll.
   */
  const PAYRL = 52;

  /**
   * Person Months.
   */
  const PersonMonths = 53;

  /**
   * Premise.
   */
  const Premise = 54;

  /**
   * Pupil.
   */
  const Pupil = 55;

  /**
   * Remuneration.
   */
  const R = 56;

  /**
   * Raft.
   */
  const Raft = 57;

  /**
   * Range.
   */
  const Range = 58;

  /**
   * Receipts.
   */
  const RECEI = 59;

  /**
   * Liquor Receipts.
   */
  const RECEILIQ = 60;

  /**
   * Revenue.
   */
  const Revenue = 61;

  /**
   * Rink.
   */
  const Rink = 62;

  /**
   * Seat.
   */
  const Seat = 63;

  /**
   * Shipment.
   */
  const Shipment = 64;

  /**
   * Sliding.
   */
  const Sliding = 65;

  /**
   * Studio.
   */
  const Studio = 66;

  /**
   * Subscriber.
   */
  const Subscriber = 67;

  /**
   * Suite.
   */
  const Suite = 68;

  /**
   * Table.
   */
  const Table = 69;

  /**
   * Team.
   */
  const Team = 70;

  /**
   * Tool.
   */
  const Tool = 71;

  /**
   * Total Cost.
   */
  const TotCost = 72;

  /**
   * Unit.
   */
  const Unit = 73;

  /**
   * Unit Over Six.
   */
  const UnitOverSix = 74;

  /**
   * Upset Payroll - per cord.
   */
  const UpsetPayroll = 75;

  /**
   * Values at risk.
   */
  const ValuesAtRisk = 76;

  /**
   * Vehicle.
   */
  const Vehicle = 77;

  /**
   * Volunteer.
   */
  const Volunteer = 78;

  /**
   * Sets the value of the PremiumBase object.
   *
   * @param int $value
   */
  public function __construct($value) {
    $this->value = $value;
  }

}
