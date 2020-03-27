<?php

declare(strict_types=1);

namespace NowCerts\Test;

final class QuoteApplicationTest extends NowCertsTestCase {

  public function testGetQuoteApplications(): void {
    $quote_applications = \NowCerts\QuoteApplication::getQuoteApplications();
    $this->assertNotEmpty($quote_applications);
    $this->assertSame(\NowCerts\QuoteApplication::class, get_class($quote_applications[0]));
  }

  public function testPushQuoteApplications(): void {
    $results = \NowCerts\QuoteApplication::pushQuoteApplications();
    $this->assertSame(\NowCerts\ApiStatus::Success, $results['status']);
  }

  public function testQuoteRushPushQuoteApplications(): void {
    $results = \NowCerts\QuoteApplication::quoteRushPushQuoteApplications();
    $this->assertSame(\NowCerts\ApiStatus::Success, $results['status']);
  }

}
