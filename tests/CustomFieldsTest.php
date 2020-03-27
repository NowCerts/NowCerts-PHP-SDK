<?php

declare(strict_types=1);

namespace NowCerts\Test;

final class CustomFieldsTest extends NowCertsTestCase {

  public function testGetCustomFields(): void {
    $custom_fields = \NowCerts\CustomFields::getCustomFields();
    $this->assertNotEmpty($custom_fields);
  }

}
