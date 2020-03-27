<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class AgentTest extends TestCase {

  /**
   * {@inheritdoc}
   */
  protected function setUp(): void {
    \NowCerts\HttpClient::setup();
    \NowCerts\HttpClient::authenticateWithPassword("test", "test");
  }

  public function testGetAgentsList(): void {
    $agents = \NowCerts\Agent::getList(array(), array(), 'lastName', 'desc', 0, 2);
    // 2 values were requested.
    $this->assertSame(2, count($agents));
    // Check sort order.
    $this->assertSame(1, strcmp($agents[0]['lastName'], $agents[1]['lastName']));

    $columns = array(
      'id',
      'firstName',
      'lastName',
      'email',
      'assignCommissionIfCSR',
      'isDefaultAgent',
      'useAgentIfNotDefault',
      'phone',
      'cellPhone',
      'fax',
      'primaryOfficeName',
      'active',
    );
    $agents = \NowCerts\Agent::getList(array('firstName' => 'Dimitur'), $columns, 'lastName', 'desc', 0, 2);
    // Columns were specified, so make sure they are present and others are not.
    $this->assertTrue(array_key_exists('email', $agents[0]));
    $this->assertFalse(array_key_exists('primaryRole', $agents[0]));
    // Check that firstName filter worked.
    $this->assertTrue(strpos('Dimitur', $agents[0]['firstName']) !== FALSE);
  }

}
