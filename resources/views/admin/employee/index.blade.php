@extends('layout.layout')
@section('css')
    <link rel="stylesheet" href="{{ asset('assets-mazer/vendors/jquery-datatables/jquery.dataTables.bootstrap5.min.css') }}">
@endsection
@section('page-heading')
    <div class="d-flex justify-content-between">
        <h3>Karyawan</h3>
        <div>
            <a href="{{ route('employee.create') }}" class="btn btn-success">Create</a>
        </div>
    </div>
@endsection
@section('page-content')
    <section>
        <div class="card h-100">
            <div class="card-content">
                <div class="card-body">
                    @component('components.datatable',['datas' => ['name', 'username', 'email', 'telephone','address', 'status', 'dibuat', 'aksi']])
                        @slot('id')
                            employee
                        @endslot
                    @endcomponent
                </div>
            </div>
        </div>
        @component('components.modal-form',['id_modal' => 'modal-delete-employee', 'text_title' => 'Delete employee','action' => ''])
            @slot('content_modal')
                Apakah anda yakin mengahapus employee : <span id="name_employee_delete"></span>
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
    var table_employee = $('#employee').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('employee.datatable') }}",
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
                },                {
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

        $(document).on('click','.btn-delete-employee',function(){
            let myModal = new bootstrap.Modal(document.getElementById('modal-delete-employee'), {
                keyboard: false
            })
            myModal.toggle();
            let data = table_employee.rows($(this).parents("tr")).data()[0];
            let nama = data.username
            let url = "{{ route('employee.index') }}"
            $('#modal-delete-employee form').attr('action', url + "/" + data.id + "/delete")
            $('#modal-delete-employee #name_employee_delete').text(nama)
        })
</script>
@endsection