<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-6 mt-5">
                <div class="card">
                    <div class="card-header">
                        <h1>User Form</h1>

                        <a href="{{ route('users.index') }}" class="btn btn-info">Back To List</a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('users.store') }}" method="POST">
                            @csrf
                            <label for=""><strong>Name:</strong></label>
                            <input type="text" class="mb-3 ms-4 rounded" name="name" placeholder="Enter User Name">
                            <br>

                            <label for=""><strong>Email:</strong></label>
                            <input type="email" class="mb-3 ms-4 rounded" name="email" placeholder="Enter Email">
                            <br>

                            <label for=""><strong>Password:</strong></label>
                            <input type="password" class="mb-3 rounded" name="password" placeholder="Enter Password">
                            <br>

                            <label for=""><strong>Roles:</strong></label>
                            <select name="role" class="rounded mb-3">
                                @foreach ($roles as $role)
                                    <option value="{{ $role->name }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                            <br>

                            <label for=""><strong>Permissions:</strong></label>
                            <select name="permission" class="rounded mb-3">
                                @foreach ($permissions as $permission)
                                    <option value="{{ $permission->name }}">{{ $permission->name }}</option>
                                @endforeach
                            </select>
                            <br>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>