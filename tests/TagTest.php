<?php

declare(strict_types=1);

namespace NowCerts\Test;

final class TagTest extends NowCertsTestCase {

  public function testGetTags(): void {
    $tags = \NowCerts\Tag::getTags();
    $this->assertNotEmpty($tags);
    $this->assertSame(\NowCerts\Tag::class, get_class($tags[0]));
  }

  public function testInsertTag(): void {
    $fields = array(
      "database_id" => "6ea03150-d100-4574-81df-98f1b9470295",
      "tag_name" => "sample string 2",
      "tag_description" => "sample string 3",
      "insured_database_id" => "b969e9c2-786d-4113-b6e5-25ac785332bb",
      "insured_email" => "sample string 4",
      "insured_first_name" => "sample string 5",
      "insured_last_name" => "sample string 6",
      "insured_commercial_name" => "sample string 7",
      "insured_greeting_name" => "sample string 8",
      "insured_address_line_1" => "sample string 9",
      "insured_address_Line_2" => "sample string 10",
      "insured_insured_id" => "sample string 11",
      "insured_customer_id" => "sample string 12",
      "insured_city" => "sample string 13",
      "insured_state" => "sample string 14",
      "insured_zip_code" => "sample string 15",
      "insured_phone_number" => "sample string 16",
      "insured_cell_phone" => "sample string 17",
      "insured_sms_phone" => "sample string 18",
      "insured_website" => "sample string 19",
      "insured_type" => "sample string 20",
    );
    $tag = new \NowCerts\Tag($fields);
    $results = $tag->insert();
  }

}
