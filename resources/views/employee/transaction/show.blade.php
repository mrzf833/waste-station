@extends('layout.layout')
@section('css')
    <link rel="stylesheet" href="{{ asset('assets-mazer/vendors/jquery-datatables/jquery.dataTables.bootstrap5.min.css') }}">
@endsection
@section('page-heading')
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Detail Transaksi</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('transaction.index') }}">Transaksi</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Detail</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
@endsection
@section('page-content')
    <section class="row">
        <div class="col-12 col-md-6 col-xl-4">
            <div class="card">
                <div class="card-body py-4 px-5">
                    <div class="d-flex justify-content-between">
                        <div class="d-flex align-items-center">
                            <div class="d-flex justify-content-center align-items-center">
                                <i class="fas fa-user fa-2x"></i>
                                <div class="ms-4">
                                    <div>
                                        <h4 class="">
                                            {{ $transaction->client->username }}
                                        </h4>
                                    </div>
                                    <div>
                                        <span class="fs-6 text-danger">Pengguna</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-xl-4">
            <div class="card">
                <div class="card-body py-4 px-5">
                    <div class="d-flex justify-content-between">
                        <div class="d-flex align-items-center">
                            <div class="d-flex justify-content-center align-items-center">
                                <i class="fa-solid fa-coins fa-2x"></i>
                                <div class="ms-4">
                                    <div>
                                        <h4 class="">
                                            {{ $transaction->total_point }}
                                        </h4>
                                    </div>
                                    <div>
                                        <span class="fs-6 text-danger">Point</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-xl-4">
            <div class="card">
                <div class="card-body py-4 px-5">
                    <div class="d-flex justify-content-between">
                        <div class="d-flex align-items-center">
                            <div class="d-flex justify-content-center align-items-center">
                                <i class="fa-solid fa-calendar-days fa-2x"></i>
                                <div class="ms-4">
                                    <div>
                                        <h4 class="">
                                            {{ $transaction->created_at }}
                                        </h4>
                                    </div>
                                    <div>
                                        <span class="fs-6 text-danger">Dibuat Pada</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6">
            <div class="card">
                <div class="card-body py-4 px-5">
                    <div class="d-flex justify-content-between">
                        <div class="d-flex align-items-center">
                            <div class="d-flex justify-content-center align-items-center">
                                <i class="fa-solid fa-user-gear fa-2x"></i>
                                <div class="ms-4">
                                    <div>
                                        <h4 class="">
                                            {{ $transaction->employee->username }}
                                        </h4>
                                    </div>
                                    <div>
                                        <span class="fs-6 text-danger">Petugas</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6">
            <div class="card">
                <div class="card-body py-4 px-5">
                    <div class="d-flex justify-content-between">
                        <div class="d-flex align-items-center">
                            <div class="d-flex justify-content-center align-items-center">
                                <div class="ms-4">
                                    <div>
                                        <h4 class="">
                                            {{ $transaction->status == 1 ? 'Ditolak' : 'diterima' }}
                                        </h4>
                                    </div>
                                    <div>
                                        <span class="fs-6 text-danger">Status</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 mb-4 d-flex">
            <a href="{{ route('transaction_detail.create', $transaction->id) }}" class="btn btn-primary w-100 me-2">Tambah Sampah</a>
            <a href="{{ route('transaction.edit', $transaction->id) }}" class="btn btn-warning w-100">Edit</a>
        </div>

        <div class="col-12">
            <div class="card w-100">
                <div class="card-content">
                    <div class="card-body">
                        @component('components.datatable',['datas' => ['Sampah', 'Total Sampah', 'Total Point','dibuat','aksi']])
                            @slot('id')
                                transaction_detail
                            @endslot
                        @endcomponent
                    </div>
                </div>
            </div>
            @component('components.modal-form',['id_modal' => 'modal-delete-transaction_detail', 'text_title' => 'Delete transaction detail','action' => ''])
            @slot('content_modal')
                Apakah anda yakin mengahapus transaksi detail : <span id="name_waste"></span>
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
        </div>
    </section>
@endsection
@section('script')
<script src="{{ asset('assets-mazer/vendors/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets-mazer/vendors/jquery-datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets-mazer/vendors/jquery-datatables/custom.jquery.dataTables.bootstrap5.min.js') }}"></script>
<script>
    var table_transaction_detail = $('#transaction_detail').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('transaction_detail.datatable', $transaction->id) }}",
            },
            columns: [
                {
                    data: 'waste_name',
                    name: 'waste_name',
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
        $(document).on('click','.btn-delete-transaction_detail',function(){
            let myModal = new bootstrap.Modal(document.getElementById('modal-delete-transaction_detail'), {
                keyboard: false
            })
            myModal.toggle();
            let data = table_transaction_detail.rows($(this).parents("tr")).data()[0];
            let nama = data.waste_name
            let url = "{{ route('transaction_detail.store', $transaction->id) }}"
            $('#modal-delete-transaction_detail form').attr('action', url + "/" + data.transaction_detail_id + "/delete")
            $('#modal-delete-transaction_detail #name_waste').text(nama)
        })
</script>
@endsection