@extends('layout.layout')
@section('css')
    <link rel="stylesheet" href="{{ asset('assets-mazer/vendors/jquery-datatables/jquery.dataTables.bootstrap5.min.css') }}">
@endsection
@section('page-heading')
    <div class="d-flex justify-content-between">
        <h3>Transaksi</h3>
        <div>
            <a href="{{ route('transaction.create') }}" class="btn btn-success">Create</a>
        </div>
    </div>
@endsection
@section('page-content')
    <section>
        <div class="card h-100">
            <div class="card-content">
                <div class="card-body">
                    @component('components.datatable',['datas' => ['Pengguna', 'Total Sampah', 'Total Point', 'Petugas','dibuat','aksi']])
                        @slot('id')
                            transaction
                        @endslot
                    @endcomponent
                </div>
            </div>
        </div>
        @component('components.modal-form',['id_modal' => 'modal-delete-transaction', 'text_title' => 'Delete transaction','action' => ''])
            @slot('content_modal')
                Apakah anda yakin mengahapus transaction : <span id="name_transaction_delete"></span>
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
    var table_transaction = $('#transaction').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('transaction.datatable') }}",
            },
            columns: [
                {
                    data: 'client_username',
                    name: 'client_username',
                    // orderable: false
                },
                {
                    data: 'total_waste',
                    name: 'total_waste',
                    // orderable: false
                },
                {
                    data: 'total_point',
                    name: 'total_point',
                    // orderable: false
                },
                {
                    data: 'employees_username',
                    name: 'employees_username',
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
        $(document).on('click','.btn-delete-transaction',function(){
            let myModal = new bootstrap.Modal(document.getElementById('modal-delete-transaction'), {
                keyboard: false
            })
            myModal.toggle();
            let data = table_transaction.rows($(this).parents("tr")).data()[0];
            let nama = data.client_username
            let url = "{{ route('transaction.index') }}"
            $('#modal-delete-transaction form').attr('action', url + "/" + data.id + "/delete")
            $('#modal-delete-transaction #name_transaction_delete').text(nama)
        })
</script>
@endsection