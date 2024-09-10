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
            <div class="col-6 mt-5">
                <div class="card">
                    <div class="card-header">
                        <h2>Permission Form</h2>

                        <a href="{{ route('permissions.index') }}" class="btn btn-info">Back To List</a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('permissions.update',$permission->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <label for=""><strong>Permission:</strong></label>
                            <input type="text" name="name" class="mt-4 ms-3 mb-3 rounded" value="{{ $permission->name }}" placeholder="Enter Permission">
                            <br>

                            <label for=""><strong>Guard Name:</strong></label>
                            <input type="text" name="guard_name" class="mb-3 ms-1 rounded" value="{{ $permission->guard_name }}" placeholder="Enter Guard Name">
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