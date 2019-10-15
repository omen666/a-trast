<?php

namespace App\Models;

//use Faker\Provider\DateTime;

class TaskList
{
    private $taskList = [];
    private $countTask = 10000;

    public function __construct() {
        $this->generateTaskList();
    }

    public function getTaskList() {
        return $this->taskList;
    }

    public function searchTaskByField($field, $value) {
        $tasks = [];
        foreach ($this->taskList as $key => $task) {
            if (mb_stripos($task[$field], $value) !== false) {
                $tasks[$key] = $task;
            }
        }

        return $tasks;
    }

    public function getTaskById($id) {
        if (key_exists($id, $this->taskList)) {
            return $this->taskList[$id];
        }
        return null;
    }

    private function generateTaskList() {
        $date = new \DateTime();
        for ($i = 1; $i <= $this->countTask; $i++) {
            $date->modify('+1 hour');
            $this->taskList[$i] = [
                'id' => $i,
                'title' => 'Задача ' . $i,
                'date' => $date->format('Y-m-d h:m'),
                'author' => 'Автор ' . $i,
                'status' => 'Статус ' . $i,
                'description' => 'Описание ' . $i,
            ];
        }
    }


}
