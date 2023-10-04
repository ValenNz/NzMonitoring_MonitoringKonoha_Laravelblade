@extends('home')
@section('content')
    <h5>Log Aktivitas Semua fitur</h5>
    <div class="card">
        <div class="content">
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th># </th>
                            <th>Activity</th>
                            <th>Time</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($dt as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->username }} {{ $item->activity }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td>
                                    <form action="{{ route('activity.destroy', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-link text-danger">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td class="text-center">Data kosong</td>
                            </tr>
                        @endforelse
                    </tbody>


                </table>
            </div>
            {{-- <div class="card-footer">{{ $dtlayanan->links() }}</div> --}}
        </div>
    </div>
@endsection
