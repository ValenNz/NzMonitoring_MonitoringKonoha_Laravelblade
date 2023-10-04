@extends('home')
@section('content')
    <h4>User approval yang aktif</h4>
    <div class="card">
        <div class="content">
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th># </th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Address</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->username }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->phone }}</td>
                                <td>{{ $item->address }}</td>
                            </tr>
                        @endforeach

                    </tbody>


                </table>
            </div>
            {{-- <div class="card-footer">{{ $dtlayanan->links() }}</div> --}}
        </div>
    </div>
@endsection
