<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-4 mt-4">
                <div class="card">
                    <div class="card-header">
                        <h2>Role Edit Form</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('roles.update' ,$role->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <label for=""><strong>Role Name:</strong></label>
                            <input type="text" name="name" class="rounded" value="{{ $role->name }}" placeholder="Enter Role">
                            <br>

                            <label for=""><strong>Guard Name:</strong></label>
                            <input type="text" name="guard_name" class="rounded mt-3" value="{{ $role->guard_name }}" placeholder="Enter Guard">
                            <br>

                            <button type="submit" class="btn btn-primary mt-4">Submit</button>
                        </form>

                        <a href="{{ route('roles.index') }}" class="btn btn-primary mt-4">Back To List</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>