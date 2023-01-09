@extends('layout.layout')
@section('css')
    <link rel="stylesheet" href="{{ asset('assets-mazer/vendors/jquery-datatables/jquery.dataTables.bootstrap5.min.css') }}">
@endsection
@section('page-heading')
    <div class="d-flex justify-content-between">
        <h3>Waste Category</h3>
        <div>
            <a href="{{ route('waste_category.create') }}" class="btn btn-success">Create</a>
        </div>
    </div>
@endsection
@section('page-content')
    <section>
        <div class="card h-100">
            <div class="card-content">
                <div class="card-body">
                    @component('components.datatable',['datas' => ['name', 'code', 'image', 'description','dibuat','aksi']])
                        @slot('id')
                            waste_category
                        @endslot
                    @endcomponent
                </div>
            </div>
        </div>
        @component('components.modal-form',['id_modal' => 'modal-delete-waste_category', 'text_title' => 'Delete waste_category','action' => ''])
            @slot('content_modal')
                Apakah anda yakin mengahapus waste_category : <span id="name_waste_category_delete"></span>
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
    var table_waste_category = $('#waste_category').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('waste_category.datatable') }}",
            },
            columns: [
                {
                    data: 'name',
                    name: 'name',
                    // orderable: false
                },
                {
                    data: 'code',
                    name: 'code',
                    // orderable: false
                },
                {
                    data: 'image',
                    name: 'image',
                    // orderable: false
                },
                {
                    data: 'description',
                    name: 'description',
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
        $(document).on('click','.btn-delete-waste_category',function(){
            let myModal = new bootstrap.Modal(document.getElementById('modal-delete-waste_category'), {
                keyboard: false
            })
            myModal.toggle();
            let data = table_waste_category.rows($(this).parents("tr")).data()[0];
            let nama = data.title
            let url = "{{ route('waste_category.index') }}"
            $('#modal-delete-waste_category form').attr('action', url + "/" + data.id + "/delete")
            $('#modal-delete-waste_category #name_waste_category_delete').text(nama)
        })
</script>
@endsection