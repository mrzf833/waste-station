@extends('layout.layout')
@section('css')
    <link rel="stylesheet" href="{{ asset('assets-mazer/vendors/jquery-datatables/jquery.dataTables.bootstrap5.min.css') }}">
@endsection
@section('page-heading')
    <div class="d-flex justify-content-between">
        <h3>Item Point</h3>
        <div>
            <a href="{{ route('item_point.create') }}" class="btn btn-success">Create</a>
        </div>
    </div>
@endsection
@section('page-content')
    <section>
        <div class="card h-100">
            <div class="card-content">
                <div class="card-body">
                    @component('components.datatable',['datas' => ['title', 'point', 'stock', 'image', 'deskripsi1','deskripsi2','aksi']])
                        @slot('id')
                            item_point
                        @endslot
                    @endcomponent
                </div>
            </div>
        </div>
        @component('components.modal-form',['id_modal' => 'modal-delete-item_point', 'text_title' => 'Delete item_point','action' => ''])
            @slot('content_modal')
                Apakah anda yakin mengahapus item_point : <span id="name_item_point_delete"></span>
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
    var table_item_point = $('#item_point').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('item_point.datatable') }}",
            },
            columns: [
                {
                    data: 'title',
                    name: 'title',
                    // orderable: false
                },
                {
                    data: 'point',
                    name: 'point',
                    // orderable: false
                },
                {
                    data: 'stock',
                    name: 'stock',
                    // orderable: false
                },
                {
                    data: 'image',
                    name: 'image',
                    // orderable: false
                },
                {
                    data: 'description1',
                    name: 'description1',
                    // orderable: false
                },
                {
                    data: 'description2',
                    name: 'description2',
                    // orderable: false
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false
                }
            ]
        });

        $(document).on('click','.btn-delete-item_point',function(){
            let myModal = new bootstrap.Modal(document.getElementById('modal-delete-item_point'), {
                keyboard: false
            })
            myModal.toggle();
            let data = table_item_point.rows($(this).parents("tr")).data()[0];
            let nama = data.title
            let url = "{{ route('item_point.index') }}"
            $('#modal-delete-item_point form').attr('action', url + "/" + data.id + "/delete")
            $('#modal-delete-item_point #name_item_point_delete').text(nama)
        })
</script>
@endsection