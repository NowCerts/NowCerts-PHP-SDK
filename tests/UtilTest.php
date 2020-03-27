<?php

declare(strict_types=1);

namespace NowCerts\Test;

use PHPUnit\Framework\TestCase;

final class UtilTest extends TestCase {

  public function testSnakeToCamel(): void {
    $input = array(
      "example_case" => 1,
      "another_example" => 2,
      "alreadyCamel" => 3,
      "mixed_caMel_Case" => 4,
    );
    $expected_output = array(
      "exampleCase" => 1,
      "anotherExample" => 2,
      "alreadyCamel" => 3,
      "mixedCaMelCase" => 4,
    );
    $this->assertSame(\NowCerts\Util::snakeToCamel($input), $expected_output);
  }

  public function testSnakeToCamelString(): void {
    $this->assertSame(\NowCerts\Util::snakeToCamelString("database_id"), "databaseId");
    $this->assertSame(\NowCerts\Util::snakeToCamelString("eMail2"), "eMail2");
  }

  public function testCamelToSnakeString(): void {
    $tests = array(
      'simpleTest' => 'simple_test',
      'easy' => 'easy',
      'HTML' => 'html',
      'simpleXML' => 'simple_xml',
      'PDFLoad' => 'pdf_load',
      'startMIDDLELast' => 'start_middle_last',
      'AString' => 'a_string',
      'Some4Numbers234' => 'some4_numbers234',
      'TEST123String' => 'test123_string',
      // Special cases.
      'addressLine1' => 'address_line_1',
      'addressLine2' => 'address_line_2',
    );

    foreach ($tests as $test => $result) {
      $output = \NowCerts\Util::camelToSnakeString($test);
      $this->assertSame($output, $result);
    }
  }

}
