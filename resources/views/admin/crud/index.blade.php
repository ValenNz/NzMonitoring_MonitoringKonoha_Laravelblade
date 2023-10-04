@extends('home')

@section('content')
    <div class="row">
        <div class="col-6">
            <h4>
                Laporan Pemesanan vehicle
            </h4>
            <div class="card">
                <div class="content">
                    <div class="card-body">
                        @if (Auth::user()->role == 'admin')
                            <a href="{{ route('manage.create') }}" class="btn btn-success mb-3 ">add data</a>
                        @endif
                        <a href="{{ route('export') }}" class="btn btn-secondary mb-3 ">Export </a>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>vehicle </th>
                                    <th>Driver</th>
                                    <th>Approval</th>
                                    <th>Status</th>
                                    <th>action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->vehicle }}</td>
                                        <td>{{ $item->driver }}</td>
                                        <td>{{ $item->approval_id }}</td>
                                        <td>
                                            @if ($item->approved)
                                                <span
                                                    style="color: white;background-color:rgb(116, 205, 116);padding:10px;border-radius:45px;font-size:14px">Disetujui</span>
                                            @else
                                                <span
                                                    style="color: black;background-color:wheat;padding:10px;border-radius:45px;font-size:14px">Pending</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if (Auth::user()->role == 'approval' && Auth::user()->id == $item->approval_id)
                                                @if ($item->approved == 1)
                                                    <form action="{{ route('setStatus', $item->id) }}" method="POST">
                                                        @csrf
                                                        <button type="submit" class="btn btn-danger" <i
                                                            class="fa fa-times"></i>
                                                            Cancel
                                                        </button>
                                                    </form>
                                                @else
                                                    <form action="{{ route('setStatus', $item->id) }}" method="POST">
                                                        @csrf
                                                        <button type="submit" class="btn btn-success" <i
                                                            class="fa fa-check"></i>
                                                            Approve
                                                        </button>
                                                    </form>
                                                @endif
                                            @else
                                                @if ($item->approved == 1)
                                                    <form action="{{ route('setStatus', $item->id) }}" method="POST">
                                                        @csrf
                                                        <button type="submit" class="btn btn-danger" <i class="fa fa-times"
                                                            disabled></i>
                                                            Cancel
                                                        </button>
                                                    </form>
                                                @else
                                                    <form action="{{ route('setStatus', $item->id) }}" method="POST">
                                                        @csrf
                                                        <button type="submit" class="btn btn-success" <i
                                                            class="fa fa-check" disabled></i>
                                                            Approve
                                                        </button>
                                                    </form>
                                                @endif
                                            @endif


                                        </td>


                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6">
            <h4>
                Log History
            </h4>
            <div class="card">
                <div class="content">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th># </th>
                                    <th>Activity</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($history as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td> {{ $item->username }} {{ $item->activity_name }} pada
                                            {{ $item->created_at }}
                                        </td>
                                        <td>
                                            <form action="{{ route('manage.destroy', $item->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-link text-danger">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <td colspan="3" class="text-center">Data kosong</td>
                                @endforelse


                            </tbody>


                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
@endpush
