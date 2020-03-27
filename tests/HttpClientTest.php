<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class HttpClientTest extends TestCase {

  public function testNoSetupRequest(): void {
    $this->expectException(\NowCerts\Exception::class);
    \NowCerts\HttpClient::request('POST', '/whatever');
  }

  public function testConvertArrayToHeaders(): void {
    $input_headers = array(
      "Accept" => "application/json",
      "Authorization" => "bearer example",
    );
    $output_headers = array(
      "Accept:application/json",
      "Authorization:bearer example",
    );
    $this->assertEquals($output_headers, \NowCerts\HttpClient::convertArrayToHeaders($input_headers));
  }

  public function testAuthenticateWithPasswordWrongPassword(): void {
    $this->expectException(\NowCerts\HttpError\BadRequest::class);
    \NowCerts\HttpClient::setup();
    \NowCerts\HttpClient::authenticateWithPassword("wrongusername", "wrongpassword");
  }

  public function testAuthenticateWithPassword() {
    \NowCerts\HttpClient::authenticateWithPassword("test", "test");
    $this->assertInstanceOf('\NowCerts\OAuth', \NowCerts\HttpClient::getOAuth());
  }

}
