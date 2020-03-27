<?php

declare(strict_types=1);

namespace NowCerts\Test;

final class ZapierTest extends NowCertsTestCase {

  public function testSubscribe(): void {
    $results = \NowCerts\Zapier::subscribe('sample string 1', \NowCerts\ZapierEventType::CreateInsured);
  }

  public function testUnsubscribe(): void {
    $results = \NowCerts\Zapier::unsubscribe('sample string 1', \NowCerts\ZapierEventType::CreateInsured);
  }

}
