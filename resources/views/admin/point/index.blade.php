@extends('layout.layout')
@section('css')
    <link rel="stylesheet" href="{{ asset('assets-mazer/vendors/jquery-datatables/jquery.dataTables.bootstrap5.min.css') }}">
@endsection
@section('page-heading')
    <div class="d-flex justify-content-between">
        <h3>Point</h3>
    </div>
@endsection
@section('page-content')
    <section>
        <div class="card h-100">
            <div class="card-content">
                <div class="card-body">
                    @component('components.datatable',['datas' => ['name', 'username', 'email', 'point', 'status','dibuat','aksi']])
                        @slot('id')
                            point
                        @endslot
                    @endcomponent
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')
<script src="{{ asset('assets-mazer/vendors/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets-mazer/vendors/jquery-datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets-mazer/vendors/jquery-datatables/custom.jquery.dataTables.bootstrap5.min.js') }}"></script>
<script>
    var table_point = $('#point').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('point.datatable') }}",
            },
            columns: [
                {
                    data: 'name',
                    name: 'name',
                    // orderable: false
                },
                {
                    data: 'username',
                    name: 'username',
                    // orderable: false
                },
                {
                    data: 'email',
                    name: 'email',
                    // orderable: false
                },
                {
                    data: 'point',
                    name: 'point',
                    // orderable: false
                },
                {
                    data: 'status',
                    name: 'status',
                    // orderable: false
                },
                {
                    data: 'created_at',
                    name: 'created_at',
                    // orderable: false
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false
                }
            ]
        });
</script>
@endsection