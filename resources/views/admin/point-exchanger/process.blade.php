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
                    <li class="breadcrumb-item active" aria-current="page">Proses</li>
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
                    @component('components.datatable',['datas' => ['Client', 'Penerima', 'Barang', 'point price', 'alamat', 'kode pos','diterima','status', 'aksi']])
                        @slot('id')
                            point_exchanger_process
                        @endslot
                    @endcomponent
                </div>
            </div>
        </div>
        @component('components.modal-form',['id_modal' => 'modal-sent-point_exchanger_process', 'text_title' => 'Dikirim point_exchanger_process','action' => ''])
            @slot('content_modal')
                Apakah anda yakin mengirim point exchanger : <span id="name_point_exchanger_process_sent"></span>
            @endslot
            @slot('method')
                @method('PUT')
            @endslot
            @slot('content_footer')
                <button type="button" class="btn" data-bs-dismiss="modal">
                    <i class="bx bx-x d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Close</span>
                </button>
                <button type="submit" class="btn btn-success">Sent</button>
            @endslot
        @endcomponent
        @component('components.modal-form',['id_modal' => 'modal-rejected-point_exchanger_process', 'text_title' => 'Rejected point_exchanger_rejected','action' => ''])
        @slot('content_modal')
            Apakah anda yakin menolak point exchanger : <span id="name_point_exchanger_process_rejected"></span>
        @endslot
        @slot('method')
            @method('PUT')
        @endslot
        @slot('content_footer')
            <button type="button" class="btn" data-bs-dismiss="modal">
                <i class="bx bx-x d-block d-sm-none"></i>
                <span class="d-none d-sm-block">Close</span>
            </button>
            <button type="submit" class="btn btn-danger">Rejected</button>
        @endslot
    @endcomponent
    </section>
@endsection
@section('script')
<script src="{{ asset('assets-mazer/vendors/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets-mazer/vendors/jquery-datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets-mazer/vendors/jquery-datatables/custom.jquery.dataTables.bootstrap5.min.js') }}"></script>
<script>
    var table_point_exchanger_process = $('#point_exchanger_process').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('point_exchanger.datatable.process') }}",
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
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false
                }
            ]
        });

        $(document).on('click','.btn-sent-point-exchanger',function(){
            let myModal = new bootstrap.Modal(document.getElementById('modal-sent-point_exchanger_process'), {
                keyboard: false
            })
            myModal.toggle();
            let data = table_point_exchanger_process.rows($(this).parents("tr")).data()[0];
            let nama = data.email
            let url = "{{ route('point_exchanger.index') }}"
            $('#modal-sent-point_exchanger_process form').attr('action', url + "/" + data.id + "/sent")
            $('#modal-sent-point_exchanger_process #name_point_exchanger_process_sent').text(nama)
        })

        $(document).on('click','.btn-rejected-point-exchanger',function(){
            let myModal = new bootstrap.Modal(document.getElementById('modal-rejected-point_exchanger_process'), {
                keyboard: false
            })
            myModal.toggle();
            let data = table_point_exchanger_process.rows($(this).parents("tr")).data()[0];
            let nama = data.email
            let url = "{{ route('point_exchanger.index') }}"
            $('#modal-rejected-point_exchanger_process form').attr('action', url + "/" + data.id + "/rejected")
            $('#modal-rejected-point_exchanger_process #name_point_exchanger_process_rejected').text(nama)
        })
</script>
@endsection