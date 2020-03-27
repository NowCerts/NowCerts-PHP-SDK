<?php

declare(strict_types=1);

namespace NowCerts\Test;

final class NoteTest extends NowCertsTestCase {

  public function testGetNotes(): void {
    $notes = \NowCerts\Note::getNotes();
    $this->assertNotEmpty($notes);
    $this->assertSame(\NowCerts\Note::class, get_class($notes[0]));
  }

  public function testInsertNote(): void {
    $fields = array(
      "database_id" => "5d9a3585-afdc-43aa-a46e-8b8e4b2cab2c",
      "subject" => "sample string 2",
      "insured_database_id" => "a1144c2e-c22a-47e4-8240-f1f83dfcdada",
      "insured_email" => "sample string 14",
      "insured_first_name" => "sample string 15",
      "insured_last_name" => "sample string 16",
      "insured_commercial_name" => "sample string 17",
    );
    $note = new \NowCerts\Note($fields);
    $results = $note->insert();
  }

}
