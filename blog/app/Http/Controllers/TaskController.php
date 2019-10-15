<?php


namespace App\Http\Controllers;

use App\Models\TaskList;
use Illuminate\Http\Request;
use App\Models\Messages;

class TaskController extends Controller
{

    /**
     * Список задач
     *
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function index()
    {
        $taskList = new TaskList();
        return view('tasks', [
            'tasks' => $taskList->getTaskList(),
        ]);
    }

    public function ident(Request $request)
    {
        $taskList = new TaskList();
        $task=$taskList->getTaskById($request->route('id'));
        if ($task){
            return view('task', [
                'task' => $taskList->getTaskById($request->route('id')),
            ]);
        }
        abort(404);
    }
}
