<?php

declare(strict_types=1);

namespace NowCerts\Test;

final class NationwideTest extends NowCertsTestCase {

  public function testProcessData(): void {
    $results = \NowCerts\Nationwide::callbackUrl();
    $this->assertSame(\NowCerts\ApiStatus::Success, $results['status']);
  }

}
