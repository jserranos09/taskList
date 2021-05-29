@extends('layouts.app')

<!-- this will be put in the app view-->
@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    New Task
                </div>

                <div class="panel-body">
                    <!-- Display Validation Errors -->
                    @include('common.errors')

                    <!-- New Task Form -->
                    <!-- redirects to the same page after submitted-->
                    <form action="{{ url('task')}}" method="POST" class="form-horizontal">
                        <!-- used when theres a form so that the request is verified-->
                        {{ csrf_field() }}

                        <!-- Task Name -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Name</label>

                            <!-- adds the task field to input new task-->
                            <div class="col-sm-6">
                                <input type="text" name="name" id="task-name" class="form-control" value="{{ old('task') }}">
                            </div>
                        </div>

                        <!-- Add Task Button -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-btn fa-plus"></i>Add Task
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Current Tasks -->

            <!-- $userTasks comes from the Taskcontroller. -->
            @if (count($usersTasks) > 0)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Your Tasks
                    </div>

                    <div class="panel-body">
                        <table class="table table-striped task-table">
                            <thead>
                                <th>Task</th>
                                <th>&nbsp;</th>
                            </thead>
                            <tbody>
                                @foreach ($usersTasks as $task)
                                    <tr>
                                        <!-- gets the task name from the database-->
                                        <td class="table-text"><div>{{ $task->name }}</div></td>

                                        <!-- Task Delete Button -->
                                        <td>
                                            <!--method is POST even though were responding to the request using Route::delete -->
                                            <form action="{{ url('task/'.$task->id) }}" method="POST">
                                                {{ csrf_field() }}
                                                <!-- this is used to delete because we used the POST method-->
                                                <!-- generates a hidden form input that Laravel recognizes and will use to override the actual HTTP request method.-->
                                                {{ method_field('DELETE') }}

                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fa fa-btn fa-trash"></i>Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>


                </div>

            @endif

                        <!-- $tasks comes from -->
                        @if (count($allTasks) > 0)
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                All Tasks in Database
                            </div>

                            <div class="panel-body">
                                <table class="table table-striped task-table">
                                    <thead>
                                        <th>Task</th>
                                        <th>&nbsp;</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($allTasks as $task)
                                            <tr>
                                                <!-- gets the task name from the database-->
                                                <td class="table-text"><div>{{ $task->name }}</div></td>

                                                <!-- Task Delete Button -->
                                                <td>
                                                    <!--method is POST even though were responding to the request using Route::delete -->
                                                    <form action="{{ url('task/'.$task->id) }}" method="POST">
                                                        {{ csrf_field() }}
                                                        <!-- this is used to delete because we used the POST method-->
                                                        <!-- generates a hidden form input that Laravel recognizes and will use to override the actual HTTP request method.-->
                                                        {{ method_field('DELETE') }}

                                                        <button type="submit" class="btn btn-danger">
                                                            <i class="fa fa-btn fa-trash"></i>Delete
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>


                        </div>

                    @endif

        </div>

    </div>
@endsection
