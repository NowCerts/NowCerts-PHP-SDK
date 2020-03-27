<?php

declare(strict_types=1);

namespace NowCerts\Test;

final class CognitoTest extends NowCertsTestCase {

  public function testProcessData(): void {
    $results = \NowCerts\Cognito::webHook(array('test' => 'example'));
    $this->assertSame(\NowCerts\ApiStatus::Success, $results['status']);
  }

}
