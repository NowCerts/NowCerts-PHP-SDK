<?php

declare(strict_types=1);

namespace NowCerts\Test;

final class CloudItTest extends NowCertsTestCase {

  public function testProcessData(): void {
    $results = \NowCerts\CloudIt::processData();
  }

}
