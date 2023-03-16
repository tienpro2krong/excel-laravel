<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <!-- Styles -->
    <style>
        body {
            font-family: 'Nunito';
        }
    </style>
    @livewireStyles
</head>

<body>
    @if ($errors->any())
        <h5 style="color:brown">Xem loi hien thi trong file excel cua ban</h5>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    <div>
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="container mt-4">
                <li class="list-group-item">

                    <form action="/import" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-content">
                            <div class="modal-header bg-primary">
                                <h5 class="modal-title text-white" id="exampleModalLabel">Import Excel</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">File excel</label>
                                    <input type="file" name="diploma_file" accept=".xlsx, .xls, .csv" required
                                        class="form-control @error('file') is-invalid @enderror">
                                    <small>Note <b class="text-danger">*</b> : Type file have xlsl, xls</small>
                                    @error('file')
                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </div>
                    </form>
                </li>

                @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Gender</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Country</th>
                            <th scope="col">Email</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $student)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $student->name }}</td>
                                <td>{{ $student->gender }}</td>
                                <td>{{ $student->phone }}</td>
                                <th>{{ $student->country }}</th>
                                <th>{{ $student->email }}</th>

                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>

    </div>
</body>

</html>
