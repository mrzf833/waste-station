@extends('layout.layout')
@section('css')
    <link rel="stylesheet" href="{{ asset('assets-mazer/vendors/jquery-datatables/jquery.dataTables.bootstrap5.min.css') }}">
@endsection
@section('page-heading')
    <div class="d-flex justify-content-between">
        <h3>Penukaran Point</h3>
        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('point_exchanger.index') }}">Penukaran Point</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Semua</li>
                </ol>
            </nav>
        </div>
    </div>
@endsection
@section('page-content')
    <section>
        <div class="card h-100">
            <div class="card-content">
                <div class="card-body">
                    @component('components.datatable',['datas' => ['Client', 'Penerima', 'Barang', 'point price', 'alamat', 'kode pos','diterima','status']])
                        @slot('id')
                            point_exchanger
                        @endslot
                    @endcomponent
                </div>
            </div>
        </div>
        @component('components.modal-form',['id_modal' => 'modal-delete-point_exchanger', 'text_title' => 'Delete point_exchanger','action' => ''])
            @slot('content_modal')
                Apakah anda yakin mengahapus point_exchanger : <span id="name_point_exchanger_delete"></span>
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
    var table_point_exchanger = $('#point_exchanger').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('point_exchanger.datatable') }}",
            },
            columns: [
                {
                    data: 'email',
                    name: 'email',
                    // orderable: false
                },
                {
                    data: 'recipient',
                    name: 'recipient',
                    // orderable: false
                },
                {
                    data: 'item',
                    name: 'item',
                    // orderable: false
                },
                {
                    data: 'point_price',
                    name: 'point_price',
                    // orderable: false
                },
                {
                    data: 'address',
                    name: 'address',
                    // orderable: false
                },
                {
                    data: 'postal_code',
                    name: 'postal_code',
                    // orderable: false
                },
                {
                    data: 'accepted',
                    name: 'accepted',
                },
                {
                    data: 'status',
                    name: 'status',
                    orderable: false
                }
            ]
        });

        $(document).on('click','.btn-delete-point_exchanger',function(){
            let myModal = new bootstrap.Modal(document.getElementById('modal-delete-point_exchanger'), {
                keyboard: false
            })
            myModal.toggle();
            let data = table_point_exchanger.rows($(this).parents("tr")).data()[0];
            let nama = data.title
            let url = "{{ route('point_exchanger.index') }}"
            $('#modal-delete-point_exchanger form').attr('action', url + "/" + data.id + "/delete")
            $('#modal-delete-point_exchanger #name_point_exchanger_delete').text(nama)
        })
</script>
@endsection