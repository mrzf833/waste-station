@extends('layout.layout')
@section('css')
    <link rel="stylesheet" href="{{ asset('assets-mazer/vendors/jquery-datatables/jquery.dataTables.bootstrap5.min.css') }}">
@endsection
@section('page-heading')
    <div class="d-flex justify-content-between">
        <h3>Nasabah</h3>
    </div>
@endsection
@section('page-content')
    <section>
        <div class="card h-100">
            <div class="card-content">
                <div class="card-body">
                    @component('components.datatable',['datas' => ['name', 'username', 'email', 'point', 'telephone', 'address', 'status','dibuat','aksi']])
                        @slot('id')
                            client
                        @endslot
                    @endcomponent
                </div>
            </div>
        </div>
        @component('components.modal-form',['id_modal' => 'modal-delete-client', 'text_title' => 'Delete client','action' => ''])
            @slot('content_modal')
                Apakah anda yakin mengahapus client : <span id="name_client_delete"></span>
            @endslot
            @slot('method')
                @method('DELETE')
            @endslot
            @slot('content_footer')
                <button type="button" class="btn" data-bs-dismiss="modal">
                    <i class="bx bx-x d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Close</span>
                </button>
                <button type="submit" class="btn btn-danger">Delete</button>
            @endslot
        @endcomponent
    </section>
@endsection
@section('script')
<script src="{{ asset('assets-mazer/vendors/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets-mazer/vendors/jquery-datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets-mazer/vendors/jquery-datatables/custom.jquery.dataTables.bootstrap5.min.js') }}"></script>
<script>
    var table_client = $('#client').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('client.datatable') }}",
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
                    data: 'telephone',
                    name: 'telephone',
                    // orderable: false
                },
                {
                    data: 'address',
                    name: 'address',
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
        $(document).on('click','.btn-delete-client',function(){
            let myModal = new bootstrap.Modal(document.getElementById('modal-delete-client'), {
                keyboard: false
            })
            myModal.toggle();
            let data = table_client.rows($(this).parents("tr")).data()[0];
            let nama = data.username
            let url = "{{ route('client.index') }}"
            $('#modal-delete-client form').attr('action', url + "/" + data.id + "/delete")
            $('#modal-delete-client #name_client_delete').text(nama)
        })
</script>
@endsection