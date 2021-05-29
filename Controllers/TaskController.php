<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;



use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // This will get all the tasks created in the database
        $allTasks = Task::orderBy('created_at', 'asc')->get();
        // this gets the task that is assigned by the user who is signed in
        $usersTasks = Task::where('user_id', '=', auth()->user()->id)->orderBy('created_at', 'asc')->get();

        // returns the tasks view which is the main page. Accepts 2 aruguments, which the second one is an array
        return view('tasks', [
            // this is used in the taks.blade.php to show the data. creates the $alltasks and userTasks variable the equals the Task order
            'allTasks' => $allTasks,
            'usersTasks' => $usersTasks
        ]);

        /* this works as well
        // gets all tasks in desending order
        $tasks = Task::latest()->get();
        return view('tasks', ['tasks' => $tasks]);
        */
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // adds a new task and saves to the database


        // must include the Validator to use the Validator variable. variable name can be anything
        $validator = Validator::make($request->all(), [
            // makes the name field required for the users.
            // makes the user nopt able ot duplicate tasks
            'name' => 'required|max:255|unique:tasks',
        ]);

        // if the vaiable fails, it will redirerct to the home page
        if ($validator->fails()) {
            return redirect('/')
                // will still show the users input if an error comes up
                ->withInput()
                // will show the errors
                ->withErrors($validator);
        }

        // Task comes from the name of the controller Taskcontroller
        $task = new Task;
        // looks at the name of the task and makes sure its validated.
        $task->name = $request->name;
        //dd($request->name);
        //dd($task);
        // sets the user is of task to the current user whos logged in by the users id number.
        $task->user_id = auth()->user()->id;
        //dd($task);
        // saves the new task
        $task->save();

        return redirect('/');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        /* I dont know why this was added. Dont think its nessesary
        //get the requested task. 'Task' is the name of the controller
        $task = Task::query()
            ->where('is_published', true)
            ->where('slug', $slug)
            ->firstOrFail();

        //return the data to the corresponding view
        return view('post', [
            'task' => $task,
        ]);
        */
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Task is the name of the controller
        Task::findOrFail($id)->delete();
        // will redirect to the webpage after it is deleted.
        return redirect('/');
    }
}
