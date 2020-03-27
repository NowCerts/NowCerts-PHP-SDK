<?php

declare(strict_types=1);

namespace NowCerts\Test;

final class TaskTest extends NowCertsTestCase {

  public function testGetTasks(): void {
    $tasks = \NowCerts\Task::getTasks();
    $this->assertNotEmpty($tasks);
    $this->assertSame(\NowCerts\Task::class, get_class($tasks[0]));
  }

  public function testInsertTask(): void {
    $fields = array(
      //"database_id" => "a4542d0d-90d6-47d6-9e32-7af4c9d9a367",
      "title" => "sample string 2",
      "description" => "sample string 3",
      "category_name" => "sample string 4",
      "stage_name" => "sample string 5",
      "status" => "sample string 6",
      "priority" => "sample string 7",
      "due_date" => "2020-03-25T13:23:55.3158207-05:00",
      "completion" => 64,
      "supervisor_name" => "sample string 10",
      "assigned_to" => array(
        "sample string 1",
        "sample string 2",
      ),
      "insured_database_id" => "e7a3b33a-c6a0-458c-b548-3223e98f5a06",
      "insured_email" => "sample string 11",
      "insured_first_name" => "sample string 12",
      "insured_last_name" => "sample string 13",
      "insured_commercial_name" => "sample string 14",
      "policy_number" => "sample string 15",
    );
    $task = new \NowCerts\Task($fields);
    $results = $task->insert();
  }

}
