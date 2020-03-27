<?php

declare(strict_types=1);

namespace NowCerts\Test;

final class WorkersCompensationTest extends NowCertsTestCase {

  public function testInsertWorkersCompensation(): void {
    $fields = array(
      "insuredDatabaseId" => "8e836755-0601-4626-a3db-01af0249b21d",
      "insuredEmail" => "sample string 1",
      "insuredFirstName" => "sample string 2",
      "insuredLastName" => "sample string 3",
      "insuredCommercialName" => "sample string 4",
      "property" => array(
        "databaseId" => "25da94d6-e2d0-4e89-b98f-d5732ade9ea7",
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
        "state" => "sample string 12",
      ),
      "policyNumbers" => array(
        "sample string 1",
        "sample string 2",
      ),
      "employersLiability" => array(
        "sicCd" => "sample string 1",
        "controllingState" => "sample string 2",
        "eachAccident" => "sample string 3",
        "diseasePolicyLimit" => "sample string 4",
        "diseaseEachEmployee" => "sample string 5",
      ),
      "workCompIndividuals" => array(
        array(
          "nameInfo" => "sample string 1",
          "includedExcludedCode" => 0,
          "titleRelationship" => "sample string 2",
          "dateOfBirth" => "2020-03-26T16:59:41.5918638-05:00",
          "ownershipPercent" => 1.0,
          "duties" => "sample string 3",
          "classCode" => "sample string 4",
          "remuneration" => 1.0,
        ),
        array(
          "nameInfo" => "sample string 1",
          "includedExcludedCode" => 0,
          "titleRelationship" => "sample string 2",
          "dateOfBirth" => "2020-03-26T16:59:41.5918638-05:00",
          "ownershipPercent" => 1.0,
          "duties" => "sample string 3",
          "classCode" => "sample string 4",
          "remuneration" => 1.0,
        ),
      ),
      "workerCompensationRateStates" => array(
        array(
          "state" => "sample string 1",
          "participatingPlanDescCd" => "sample string 2",
          "totalEstimatedAnnualPremium" => 1.0,
          "totalPayrollAmt" => 1.0,
          "stateLevelPremiums" => array(
            array(
              "ratingClassificationCd" => "sample string 1",
              "currentTermAmt" => 1.0,
              "rate" => 1.0,
              "factor" => 1.0,
              "order" => 2,
            ),
            array(
              "ratingClassificationCd" => "sample string 1",
              "currentTermAmt" => 1.0,
              "rate" => 1.0,
              "factor" => 1.0,
              "order" => 2,
            ),
          ),
          "workCompensationLocationInfos" => array(
            array(
              "locationNumber" => "sample string 1",
              "order" => 2,
              "naics" => "sample string 3",
              "rateClass" => array(
                array(
                  "ifAnyRatingBasisIndicator" => TRUE,
                  "rate" => 1.0,
                  "premiumBasisCode" => 0,
                  "ratingClassificationCode" => "sample string 2",
                  "exposure" => 1.0,
                  "ratingClassificationDesc" => "sample string 3",
                  "amount" => 1.0,
                  "ratingClassificationDescCd" => "sample string 4",
                  "numEmployeesFullTime" => "sample string 5",
                  "numEmployeesPartTime" => "sample string 6",
                ),
                array(
                  "ifAnyRatingBasisIndicator" => TRUE,
                  "rate" => 1.0,
                  "premiumBasisCode" => 0,
                  "ratingClassificationCode" => "sample string 2",
                  "exposure" => 1.0,
                  "ratingClassificationDesc" => "sample string 3",
                  "amount" => 1.0,
                  "ratingClassificationDescCd" => "sample string 4",
                  "numEmployeesFullTime" => "sample string 5",
                  "numEmployeesPartTime" => "sample string 6",
                ),
              ),
            ),
            array(
              "locationNumber" => "sample string 1",
              "order" => 2,
              "naics" => "sample string 3",
              "rateClass" => array(
                array(
                  "ifAnyRatingBasisIndicator" => TRUE,
                  "rate" => 1.0,
                  "premiumBasisCode" => 0,
                  "ratingClassificationCode" => "sample string 2",
                  "exposure" => 1.0,
                  "ratingClassificationDesc" => "sample string 3",
                  "amount" => 1.0,
                  "ratingClassificationDescCd" => "sample string 4",
                  "numEmployeesFullTime" => "sample string 5",
                  "numEmployeesPartTime" => "sample string 6",
                ),
                array(
                  "ifAnyRatingBasisIndicator" => TRUE,
                  "rate" => 1.0,
                  "premiumBasisCode" => 0,
                  "ratingClassificationCode" => "sample string 2",
                  "exposure" => 1.0,
                  "ratingClassificationDesc" => "sample string 3",
                  "amount" => 1.0,
                  "ratingClassificationDescCd" => "sample string 4",
                  "numEmployeesFullTime" => "sample string 5",
                  "numEmployeesPartTime" => "sample string 6",
                ),
              ),
            ),
          ),
        ),
        array(
          "state" => "sample string 1",
          "participatingPlanDescCd" => "sample string 2",
          "totalEstimatedAnnualPremium" => 1.0,
          "totalPayrollAmt" => 1.0,
          "stateLevelPremiums" => array(
            array(
              "ratingClassificationCd" => "sample string 1",
              "currentTermAmt" => 1.0,
              "rate" => 1.0,
              "factor" => 1.0,
              "order" => 2,
            ),
            array(
              "ratingClassificationCd" => "sample string 1",
              "currentTermAmt" => 1.0,
              "rate" => 1.0,
              "factor" => 1.0,
              "order" => 2,
            ),
          ),
          "workCompensationLocationInfos" => array(
            array(
              "locationNumber" => "sample string 1",
              "order" => 2,
              "naics" => "sample string 3",
              "rateClass" => array(
                array(
                  "ifAnyRatingBasisIndicator" => TRUE,
                  "rate" => 1.0,
                  "premiumBasisCode" => 0,
                  "ratingClassificationCode" => "sample string 2",
                  "exposure" => 1.0,
                  "ratingClassificationDesc" => "sample string 3",
                  "amount" => 1.0,
                  "ratingClassificationDescCd" => "sample string 4",
                  "numEmployeesFullTime" => "sample string 5",
                  "numEmployeesPartTime" => "sample string 6",
                ),
                array(
                  "ifAnyRatingBasisIndicator" => TRUE,
                  "rate" => 1.0,
                  "premiumBasisCode" => 0,
                  "ratingClassificationCode" => "sample string 2",
                  "exposure" => 1.0,
                  "ratingClassificationDesc" => "sample string 3",
                  "amount" => 1.0,
                  "ratingClassificationDescCd" => "sample string 4",
                  "numEmployeesFullTime" => "sample string 5",
                  "numEmployeesPartTime" => "sample string 6",
                ),
              ),
            ),
            array(
              "locationNumber" => "sample string 1",
              "order" => 2,
              "naics" => "sample string 3",
              "rateClass" => array(
                array(
                  "ifAnyRatingBasisIndicator" => TRUE,
                  "rate" => 1.0,
                  "premiumBasisCode" => 0,
                  "ratingClassificationCode" => "sample string 2",
                  "exposure" => 1.0,
                  "ratingClassificationDesc" => "sample string 3",
                  "amount" => 1.0,
                  "ratingClassificationDescCd" => "sample string 4",
                  "numEmployeesFullTime" => "sample string 5",
                  "numEmployeesPartTime" => "sample string 6",
                ),
                array(
                  "ifAnyRatingBasisIndicator" => TRUE,
                  "rate" => 1.0,
                  "premiumBasisCode" => 0,
                  "ratingClassificationCode" => "sample string 2",
                  "exposure" => 1.0,
                  "ratingClassificationDesc" => "sample string 3",
                  "amount" => 1.0,
                  "ratingClassificationDescCd" => "sample string 4",
                  "numEmployeesFullTime" => "sample string 5",
                  "numEmployeesPartTime" => "sample string 6",
                ),
              ),
            ),
          ),
        ),
      ),
      "includeExcludeStates" => array(
        array(
          "includedExcludedCode" => 0,
          "states" => array(
            "sample string 1",
            "sample string 2",
          ),
        ),
        array(
          "includedExcludedCode" => 0,
          "states" => array(
            "sample string 1",
            "sample string 2",
          ),
        ),
      ),
      "otherOrPriorPolicy" => array(
        array(
          "policyCode" => "sample string 1",
          "policyNumber" => "sample string 2",
          "naicId" => "sample string 3",
          "effectiveDate" => "2020-03-26T16:59:41.5918638-05:00",
          "expirationDate" => "2020-03-26T16:59:41.5918638-05:00",
        ),
        array(
          "policyCode" => "sample string 1",
          "policyNumber" => "sample string 2",
          "naicId" => "sample string 3",
          "effectiveDate" => "2020-03-26T16:59:41.5918638-05:00",
          "expirationDate" => "2020-03-26T16:59:41.5918638-05:00",
        ),
      ),
      "auditFrequencyCd" => "sample string 5",
      "lienHolders" => array(
        array(
          "name" => "sample string 1",
          "natureOfInterest" => 0,
        ),
        array(
          "name" => "sample string 1",
          "natureOfInterest" => 0,
        ),
      ),
    );
    $workers_compensation = new \NowCerts\WorkersCompensation($fields);
    $results = $workers_compensation->insert();
  }

}
