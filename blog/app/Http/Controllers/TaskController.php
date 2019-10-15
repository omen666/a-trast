<?php


namespace App\Http\Controllers;

use App\Models\TaskList;
use Illuminate\Http\Request;
use App\Models\Messages;
use Illuminate\Pagination\LengthAwarePaginator;

class TaskController extends Controller
{

    /**
     * Список задач
     *
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function index() {
        $taskList = new TaskList();
        return view('tasks', [
            'tasks' => $taskList->getTaskList(),
        ]);
    }

    public function ident(Request $request) {
        $taskList = new TaskList();
        $task = $taskList->getTaskById($request->route('id'));
        if ($task) {
            return view('task', [
                'task' => $taskList->getTaskById($request->route('id')),
            ]);
        }
        abort(404);
    }

    public function main(Request $request) {
        $taskList = new TaskList();
        $data = $request->all();
        if (isset($data['search'])) {
            $tasks = $taskList->searchTaskByField('title', html_entity_decode($data['search']));
        } else {
            $tasks = $taskList->getTaskList();
        }


        return view('main', [
            'tasks' => $this->pagination($request, $tasks),
            'search' => $data['search']??'',
        ]);
    }

    public function pagination(Request $request, $items) {
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $itemCollection = collect($items);
        $perPage = 10;
        $currentPageItems = $itemCollection->slice(($currentPage * $perPage) - $perPage, $perPage)->all();
        $paginatedItems = new LengthAwarePaginator($currentPageItems, count($itemCollection), $perPage);
        $paginatedItems->setPath($request->url());
        return $paginatedItems;
    }

    public function getTask(Request $request) {
        $taskList = new TaskList();
        $data = $request->all();
        $task = $taskList->getTaskById($data['id']);
        $view = view('ajaxTask')->with('task', $task)->render();

        return response()->json(array('html' => $view), 200);
    }
}
