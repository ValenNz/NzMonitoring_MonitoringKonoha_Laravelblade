@extends('home')
@section('content')
 <!-- Begin Page Content -->
 <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Manage Vehicle</h1>
            <div class="col-6 p-2  mx-auto">
                <div class="card p-3" style="margin-top: 10px">
                    <form action="{{ route('vehicle.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="merk" class="form-label">Merk Vehicles</label>
                            <input type="text" class="form-control" id="merk" aria-describedby="emailHelp"
                                name="merk">
                            <div id="emailHelp" class="form-text"></div>
                        </div>
                        <div class="mb-3">
                            <label for="nopol" class="form-label">Nopol Vehicles</label>
                            <input type="text" class="form-control" id="nopol" aria-describedby="emailHelp"
                                name="nopol">
                            <div id="emailHelp" class="form-text"></div>
                        </div>
                        <button type="submit" class="btn btn-success">Add</button>
                    </form>
                </div>
            </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Vehicle List</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Merk</th>
                            <th>Nopol</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Nopol</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($data as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->merk }}</td>
                            <td>{{ $item->nopol }}</td>
                            <td>
                                <form method="POST" action="{{ route('vehicle.destroy', $item->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>

                            </td>

                            <td></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

@endsection
