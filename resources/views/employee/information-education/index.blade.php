@extends('layout.layout')
@section('css')
    <link rel="stylesheet" href="{{ asset('assets-mazer/vendors/jquery-datatables/jquery.dataTables.bootstrap5.min.css') }}">
@endsection
@section('page-heading')
    <div class="d-flex justify-content-between">
        <h3>Information Education</h3>
        <div>
            <a href="{{ route('information_education.create') }}" class="btn btn-success">Create</a>
        </div>
    </div>
@endsection
@section('page-content')
    <section>
        <div class="card h-100">
            <div class="card-content">
                <div class="card-body">
                    @component('components.datatable',['datas' => ['title', 'description','dibuat','aksi']])
                        @slot('id')
                            information_education
                        @endslot
                    @endcomponent
                </div>
            </div>
        </div>
        @component('components.modal-form',['id_modal' => 'modal-delete-information_education', 'text_title' => 'Delete information_education','action' => ''])
            @slot('content_modal')
                Apakah anda yakin mengahapus information_education : <span id="name_information_education_delete"></span>
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
    var table_information_education = $('#information_education').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('information_education.datatable') }}",
            },
            columns: [
                {
                    data: 'title',
                    name: 'title',
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
        $(document).on('click','.btn-delete-information_education',function(){
            let myModal = new bootstrap.Modal(document.getElementById('modal-delete-information_education'), {
                keyboard: false
            })
            myModal.toggle();
            let data = table_information_education.rows($(this).parents("tr")).data()[0];
            let nama = data.title
            let url = "{{ route('information_education.index') }}"
            $('#modal-delete-information_education form').attr('action', url + "/" + data.id + "/delete")
            $('#modal-delete-information_education #name_information_education_delete').text(nama)
        })
</script>
@endsection