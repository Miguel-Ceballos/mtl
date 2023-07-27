<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Status;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(Page $page)
    {
        return view('admin.tasks.index', [
            'page' => $page,
            'tasks' => $page->tasks,
            'statuses' => Status::all()
        ]);
    }

    public function create(Page $page)
    {
        return view('admin.tasks.create', [
            'page' => $page,
            'statuses' => Status::all()
        ]);
    }

    public function store(Request $request, Page $page)
    {
//        ddd($request);
        $this->validate($request, [
            'description' => 'required|min:3|max:100',
            'status_id' => 'required|numeric'
        ]);

        Task::create([
            'description' => $request->description,
            'user_id' => auth()->user()->id,
            'status_id' => $request->status_id,
            'page_id' => $page->id
        ]);

        return redirect()->route('tasks', $page->slug)->with('success', 'The task has been created');
    }

    public function update(Request $request, Page $page, Task $task)
    {
        $attributes = $this->validate($request, [
            'description' => 'required|min:3|max:100',
            'status_id' => 'required|numeric'
        ]);

        $task->update($attributes);

        return redirect()->route('tasks', $page->slug)->with('success', 'The task has been updated');

    }

    public function destroy(Page $page, Task $task)
    {
		$task->delete();
        return redirect()->route('tasks', $page->slug)->with('success', 'The task has been deleted');
    }

}
