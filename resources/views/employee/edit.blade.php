<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $pageTitle }}</title>
    @vite('resources/sass/app.scss')
</head>
<body>

    <div class="container-sm mt-5">
        <div class="row justify-content-center">
            <div class="col-xl-6">
                <div class="p-5 bg-light rounded-3 border">
                    <h1 class="mb-4 text-center">{{ $pageTitle }}</h1>
                    <hr class="mb-4">

                    <form action="{{ route('employees.update', ['employee' => $employee->id]) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="firstName" class="form-label">First Name</label>
                            <input type="text" id="firstName" name="firstName" class="form-control" value="{{ $employee->firstname }}">
                        </div>

                        <div class="mb-3">
                            <label for="lastName" class="form-label">Last Name</label>
                            <input type="text" id="lastName" name="lastName" class="form-control" value="{{ $employee->lastname }}">
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" id="email" name="email" class="form-control" value="{{ $employee->email }}">
                        </div>

                        <div class="mb-3">
                            <label for="age" class="form-label">Age</label>
                            <input type="number" id="age" name="age" class="form-control" value="{{ $employee->age }}">
                        </div>

                        <div class="mb-3">
                            <label for="position" class="form-label">Position</label>
                            <select id="position" name="position" class="form-select">
                                @foreach($positions as $position)
                                    <option value="{{ $position->id }}" @if($position->id == $employee->position_id) selected @endif>{{ $position->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn btn-dark">Update Employee</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @vite('resources/js/app.js')
</body>
</html>

