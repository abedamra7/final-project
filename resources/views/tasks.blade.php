<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel Quickstart - Basic</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; font-family: sans-serif; }
        .card { margin-bottom: 20px; box-shadow: 0 2px 4px rgba(0,0,0,0.05); }
        .card-header { font-weight: bold; background-color: #fdfdfd; }
    </style>
</head>
<body>

    <nav class="navbar navbar-light bg-light border-bottom mb-4">
        <div class="container">
            <span class="navbar-brand mb-0 h1">Task List</span>
        </div>
    </nav>

    <div class="container" style="max-width: 800px;">
        
        <div class="card">
            <div class="card-header">New Task</div>
            <div class="card-body">
                <form action="/create" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="task-name" class="form-label text-muted fw-bold small">Task</label>
                        <input type="text" name="name" id="task-name" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm fw-bold px-3">
                        + Add Task
                    </button>
                </form>
            </div>
        </div>

        @if(count($tasks) > 0)
        <div class="card">
            <div class="card-header">Current Tasks</div>
            <div class="card-body p-0">
                <table class="table table-striped mb-0">
                    <thead>
                        <tr>
                            <th class="ps-4 py-3" style="width: 50%;">Task</th>
                            <th class="py-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tasks as $task)
                        <tr>
                            <td class="ps-4 py-3 align-middle">{{ $task->name }}</td>
                            <td class="align-middle">
                                
                                <form action="/delete/{{ $task->id }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm px-3 me-1">
                                        Delete
                                    </button>
                                </form>

                                <form action="/edit/{{ $task->id }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-info text-white btn-sm px-3">
                                        Edit
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

</body>
</html>