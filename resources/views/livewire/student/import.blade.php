<div>
    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
        <div class="container mt-4">
            <li class="list-group-item">
                <!-- <div class="row">
                    <div class="col-md-2">
                        <select name="paginate" class="form-select">
                            <option value="1">1</option>
                            <option value="5">5</option>
                            <option value="10">10</option>
                            <option value="15">15</option>
                        </select>
                    </div>
                    <div class="col-md-10">
                        <button href="" class="btn btn-primary" style="float: right;" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">Import Excel</button>
                    </div>
                </div> -->
                <form action="" wire:submit.prevent="submit">
                    <div class="modal-content">
                        <div class="modal-header bg-primary">
                            <h5 class="modal-title text-white" id="exampleModalLabel">Import Excel</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">File excel</label>
                                <input type="file" class="form-control @error('file') is-invalid @enderror"
                                    wire:model="file">
                                <small>Note <b class="text-danger">*</b> : Type file have xlsl, xls</small>
                                @error('file')
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <a href="{{ route('example') }}" class="btn btn-primary">Example Excel</a>

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

            <div class="card-body">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
            </div>
            <div class="card" style="width:fit-content; float: right">
                <button type="button" class="btn btn-warning" wire:click="export">Export Data</button>
            </div>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Card</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Country</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $student)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->card }}</td>
                        <td>{{ $student->phone }}</td>
                        <th>{{ $student->country }}</th>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
    <!-- Modal -->
    <!-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="" wire:submit.prevent="submit">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <h5 class="modal-title text-white" id="exampleModalLabel">Import Excel</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">File excel</label>
                            <input type="file" class="form-control @error('file') is-invalid @enderror"
                                wire:model="file">
                            <small>Note <b class="text-danger">*</b> : Type file have xlsl, xls</small>
                            @error('file')
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <a href="{{ route('example') }}" class="btn btn-primary">Example Excel</a>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div> -->
</div>