<?php

namespace App\Models;

//use Faker\Provider\DateTime;

class TaskList
{
    private $taskList = [];

    public function __construct()
    {
        $this->generateTaskList();
    }

    public function getTaskList()
    {
        return $this->taskList;
    }

    public function getTaskById($id)
    {
        if (key_exists($id,$this->taskList)) {
            return $this->taskList[$id];
        }
        return null;
    }

    private function generateTaskList()
    {
        $date = new \DateTime();
        for ($i = 1; $i <= 30; $i++) {
            $date->modify('+1 hour');
            $this->taskList[$i] = [
                'id' => $i,
                'title' => 'Задача ' . $i,
                'date' => $date->format('Y-m-d h:m'),
            ];
        }
    }


}
