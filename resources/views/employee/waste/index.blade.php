@extends('layout.layout')
@section('css')
    <link rel="stylesheet" href="{{ asset('assets-mazer/vendors/jquery-datatables/jquery.dataTables.bootstrap5.min.css') }}">
@endsection
@section('page-heading')
    <div class="d-flex justify-content-between">
        <h3>Sampah</h3>
        <div>
            <a href="{{ route('waste.create') }}" class="btn btn-success">Create</a>
        </div>
    </div>
@endsection
@section('page-content')
    <section>
        <div class="card h-100">
            <div class="card-content">
                <div class="card-body">
                    @component('components.datatable',['datas' => ['nama', 'point', 'type','dibuat','aksi']])
                        @slot('id')
                            waste
                        @endslot
                    @endcomponent
                </div>
            </div>
        </div>
        @component('components.modal-form',['id_modal' => 'modal-delete-waste', 'text_title' => 'Delete Waste','action' => ''])
            @slot('content_modal')
                Apakah anda yakin mengahapus Waste : <span id="name_waste_delete"></span>
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
    var table_waste = $('#waste').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('waste.datatable') }}",
            },
            columns: [
                {
                    data: 'name',
                    name: 'name',
                    // orderable: false
                },
                {
                    data: 'point',
                    name: 'point',
                    // orderable: false
                },
                {
                    data: 'type',
                    name: 'type',
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
        $(document).on('click','.btn-delete-waste',function(){
            let myModal = new bootstrap.Modal(document.getElementById('modal-delete-waste'), {
                keyboard: false
            })
            myModal.toggle();
            let data = table_waste.rows($(this).parents("tr")).data()[0];
            let nama = data.name
            let url = "{{ route('waste.index') }}"
            $('#modal-delete-waste form').attr('action', url + "/" + data.id + "/delete")
            $('#modal-delete-waste #name_waste_delete').text(nama)
        })
</script>
@endsection