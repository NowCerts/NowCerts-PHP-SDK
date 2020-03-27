<?php

declare(strict_types=1);

namespace NowCerts\Test;

final class CustomPanelTest extends NowCertsTestCase {

  public function testGetCustomPanels(): void {
    $custom_panels = \NowCerts\CustomPanel::getCustomPanels();
    $this->assertNotEmpty($custom_panels);
    $this->assertSame(\NowCerts\CustomPanel::class, get_class($custom_panels[0]));
    $this->assertSame(\NowCerts\CustomFieldModel::class, get_class($custom_panels[0]->customFields[0]));
    $this->assertSame(\NowCerts\CustomFieldType::class, get_class($custom_panels[0]->customFields[0]->type));
  }

  public function testInsertCustomPanel(): void {
    $fields = array(
      array(
        "name" => "sample string 1",
        "description" => "sample string 2",
        "customFields" => array(
          array(
            "name" => "sample string 1",
            "description" => "sample string 2",
            "type" => 0,
            "order" => 3,
          ),
          array(
            "name" => "sample string 2",
            "description" => "sample string 2",
            "type" => 0,
            "order" => 3,
          ),
        ),
        "order" => 3,
      ),
      array(
        "name" => "sample string 2",
        "description" => "sample string 2",
        "customFields" => array(
          array(
            "name" => "sample string 1",
            "description" => "sample string 2",
            "type" => 0,
            "order" => 3,
          ),
          array(
            "name" => "sample string 2",
            "description" => "sample string 2",
            "type" => 0,
            "order" => 3,
          ),
        ),
        "order" => 3,
      ),
    );
    $custom_panel = new \NowCerts\CustomPanel($fields);
    $results = $custom_panel->insert();
    // No assertions to make because no success or error can be determined from
    // the API. Just make sure there are no errors.
  }

}
