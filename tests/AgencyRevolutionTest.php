<?php

declare(strict_types=1);

namespace NowCerts\Test;

final class AgencyRevolutionTest extends NowCertsTestCase {

  public function testProcessData(): void {
    $results = \NowCerts\AgencyRevolution::activities();
    $this->assertSame(\NowCerts\ApiStatus::Success, $results['status']);
  }

}
