<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Person</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold" href="#">Person</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active fw-semibold" aria-current="page" href="{{ route('welcome') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-semibold" href="{{ route('createPerson') }}">Create</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container py-5">
        <div class="card shadow">
            <div class="card-header bg-primary text-white text-center">
                <h1>Edit Person</h1>
            </div>
            <div class="card-body">
                <form action="{{route('updatePerson',$person->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="mb-3">
                        <label for="" class="form-label fw-bold">Name</label>
                        <input value='{{$person->name}}' type="text" class="form-control" id="" name="name" required>
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label fw-bold">Age</label>
                        <input value="{{$person->age}}" type="text" class="form-control" id="" name="age" required>
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label fw-bold">Job</label>
                        <input value="{{$person->job}}" type="text" class="form-control" id="" name="job" required>
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label fw-bold">Image</label>
                        <input  type="file" class="form-control" id="" name="image">
                    </div>

                     <div class="mb-3">
                        <label for="" class="form-label fw-bold">Gender</label>
                        <select class="form-select" aria-label="Default" name="gender_id" required>
                            <option value="">Select a gender</option>
                            @foreach ($genders as $gender)
                            <option value="{{ $gender->id }}"
                                {{ $person->gender_id == $gender->id ? 'selected' : '' }}>
                                {{ $gender->gender }}
                            @endforeach
                        </select>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary w-100">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
