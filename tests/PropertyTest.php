<?php

declare(strict_types=1);

namespace NowCerts\Test;

final class PropertyTest extends NowCertsTestCase {

  public function testGetProperties(): void {
    $properties = \NowCerts\Property::getProperties();
    $this->assertNotEmpty($properties);
    $this->assertSame(\NowCerts\Property::class, get_class($properties[0]));
  }

  public function testInsertProperty(): void {
    $fields = array(
      //"database_id" => "845bd9d5-4fdd-4e96-b607-576bb6d90ec0",
      "property_use" => "sample string 2",
      "location_number" => "sample string 3",
      "building_number" => "sample string 4",
      "address_line_1" => "sample string 5",
      "address_line_2" => "sample string 6",
      "city" => "sample string 7",
      "county" => "sample string 8",
      "zip" => "sample string 9",
      "description_of_Operations" => "sample string 10",
      "description" => "sample string 11",
      "state" => "TX",
      "insured_database_id" => "aa9a501f-43c1-4cd4-9db2-b9fcb38ccb1e",
      "insured_email" => "sample string 13",
      "insured_first_name" => "sample string 14",
      "insured_last_name" => "sample string 15",
      "insured_commercial_name" => "sample string 16",
    );
    $property = new \NowCerts\Property($fields);
    $results = $property->insert();
    $this->assertSame(\NowCerts\ApiStatus::Success, $results['status']);
  }

  public function testInsertOrUpdateProperty(): void {
    $fields = array(
      "databaseId" => "05ac3ae4-7b03-4876-b2e4-7fd4d1362bca",
      "propertyUse" => "sample string 2",
      "locationNumber" => "sample string 3",
      "buildingNumber" => "sample string 4",
      "addressLine1" => "sample string 5",
      "addressLine2" => "sample string 6",
      "city" => "sample string 7",
      "county" => "sample string 8",
      "zip" => "sample string 9",
      "descriptionOfOperations" => "sample string 10",
      "description" => "sample string 11",
      "state" => "AZ",
      //"insuredDatabaseId" => "9791db07-8ab3-4e65-a21d-0c2b0022891e",
      "insuredDatabaseId" => "aa9a501f-43c1-4cd4-9db2-b9fcb38ccb1e",
      "insuredEmail" => "sample string 13",
      "insuredFirstName" => "sample string 14",
      "insuredLastName" => "sample string 15",
      "insuredCommercialName" => "sample string 16",
      "attachToPolicyNumber" => "sample string 17",
      "coverage" => array(
        "propertyTypeCd" => 0,
        "dwelling_A" => array(
          "limit" => 1.0,
          "premium" => 1.0,
        ),
        "otherStructures_B" => array(
          "limit" => 1.0,
          "premium" => 1.0,
        ),
        "personalProperty_C" => array(
          "limit" => 1.0,
          "premium" => 1.0,
        ),
        "lossOfUse_D" => array(
          "limit" => 1.0,
          "premium" => 1.0,
        ),
        "personalLiability_E" => array(
          "limit" => 1.0,
          "premium" => 1.0,
        ),
        "medicalPayments_F" => array(
          "limit" => 1.0,
          "premium" => 1.0,
        ),
        "allOtherPerils" => array(
          "deductible" => 1.0,
          "deductiblePct" => 1.0,
        ),
        "hurricane" => array(
          "premium" => 1.0,
          "deductible" => 1.0,
          "deductiblePct" => 1.0,
        ),
        "incOrdinanceOrLaw" => array(
          "yesNo" => 0,
          "premium" => 1.0,
        ),
        "coverageCs" => array(
          array(
            "name" => "sample string 1",
            "description" => "sample string 2",
            "limitCsl" => 1.0,
            "limit1" => 1.0,
            "limit2" => 1.0,
            "premium" => 1.0,
            "deductible" => 1.0,
            "deductiblePct" => 1.0,
          ),
          array(
            "name" => "sample string 1",
            "description" => "sample string 2",
            "limitCsl" => 1.0,
            "limit1" => 1.0,
            "limit2" => 1.0,
            "premium" => 1.0,
            "deductible" => 1.0,
            "deductiblePct" => 1.0,
          ),
        ),
      ),
      "additional" => array(
        "numberOfFullTimeEmployees" => "sample string 1",
        "numberOfPartTimeEmployees" => "sample string 2",
        "annualRevenues" => "sample string 3",
        "occupiedPct" => "sample string 4",
        "occupiedArea" => "sample string 5",
        "openToPublicArea" => "sample string 6",
        "totalBuildingArea" => "sample string 7",
        "anyAreaLeasedToOthers" => "sample string 8",
        "occupancyDesc" => "sample string 9",
      ),
      "additional1" => array(
        "constructionCd" => 0,
        "yearBuilt" => 1,
        "numStories" => 1.0,
        "roofMaterialCd" => 0,
        "residenceTypeCd" => 0,
        "dwellUseCd" => 0,
        "fireProtectionClassCd" => 1,
        "distanceToHydrant" => 1,
        "airConditioningCd" => 0,
        "distanceToFireStation" => "sample string 1",
      ),
      "additional2" => array(
        "dwellStyleCd" => 0,
        "estimatedReplCostAmt" => 1.0,
        "numberOfUnits" => "sample string 1",
        "heatSourcePrimaryCd" => 0,
        "numFamilies" => 1,
        "fireplaceInfoNumHearths" => 1,
        "numberOfPools" => "sample string 2",
        "fireplaceInfoNumChimneys" => 1,
        "garageTypeCd" => 0,
        "parkingArea" => "sample string 3",
        "garageNumVehs" => 1,
      ),
    );
    $fields = \NowCerts\Util::camelToSnake($fields);
    $property = new \NowCerts\Property($fields);
    $results = $property->insertOrUpdate();

    $this->assertSame(\NowCerts\PropertyCoverage::class, get_class($property->coverage));
    $this->assertSame(\NowCerts\PropertyAdditional::class, get_class($property->additional));
    $this->assertSame(\NowCerts\PropertyAdditional1::class, get_class($property->additional1));
    $this->assertSame(\NowCerts\PropertyAdditional2::class, get_class($property->additional2));
    $this->assertSame(\NowCerts\CoverageSingleLimitWithPremiumModel::class, get_class($property->coverage->dwelling_A[0]));
    $this->assertSame(\NowCerts\CoverageDeductibleModel::class, get_class($property->coverage->allOtherPerils));
    $this->assertSame(\NowCerts\CoverageDeductibleWithPremiumModel::class, get_class($property->coverage->hurricane));
    $this->assertSame(\NowCerts\CoverageYesNoLimitWithPremiumModel::class, get_class($property->coverage->incOrdinanceOrLaw));
    $this->assertSame(\NowCerts\CoverageCslLimtWithPremiumModel::class, get_class($property->coverage->coverageCs[0]));
    $this->assertSame(\NowCerts\YesNo::class, get_class($property->coverage->incOrdinanceOrLaw->yesNo));
    $this->assertSame(\NowCerts\ConstructionType::class, get_class($property->additional1->constructionCd));
    $this->assertSame(\NowCerts\RoofMaterialType::class, get_class($property->additional1->roofMaterialCd));
    $this->assertSame(\NowCerts\ResidenceType::class, get_class($property->additional1->residenceTypeCd));
    $this->assertSame(\NowCerts\DwellingUse::class, get_class($property->additional1->dwellUseCd));
    $this->assertSame(\NowCerts\AirConditioning::class, get_class($property->additional1->airConditioningCd));
    $this->assertSame(\NowCerts\DwellStyle::class, get_class($property->additional2->dwellStyleCd));
    $this->assertSame(\NowCerts\HeatSource::class, get_class($property->additional2->heatSourcePrimaryCd));
    $this->assertSame(\NowCerts\GarageType::class, get_class($property->additional2->garageTypeCd));
  }

}
