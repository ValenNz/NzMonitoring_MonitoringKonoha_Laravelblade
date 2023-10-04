@extends('home')
@section('content')
    <div class="card p-3" style="margin-top: 10px">
        <form action="{{ route('manage.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="vehicle" class="form-label">vehicle</label>
                <select name="vehicle" id="vehicle" class="form-select">
                    @foreach ($vehicle as $item)
                        <option value="{{ @$item->merk }}">{{ @$item->merk }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="driver" class="form-label">Driver</label>
                <input type="text" class="form-control" id="driver" aria-describedby="emailHelp" name="driver">
                <div id="emailHelp" class="form-text"></div>
            </div>
            <div class="mb-3">
                <label for="approval_id" class="form-label">Ditujukan kepada</label>
                <select name="approval_id" id="approval_id" class="form-select">
                    @foreach ($data as $item)
                        <option value="{{ @$item->id }}">{{ @$item->username }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
@include('select2.setup')
@push('js')
    <script>
        $(document).ready(function() {
            $(function() {
                $('#approval_id').select2({
                    width: '100%',
                    multiple: false,
                });
            });
        });
        $(document).ready(function() {
            $(function() {
                $('#vehicle').select2({
                    width: '100%',
                    multiple: false,
                });
            });
        });
    </script>
@endpush
