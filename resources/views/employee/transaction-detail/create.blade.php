@extends('layout.layout')
@section('page-heading')
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Setor Sampah</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('transaction.index') }}">Transaksi</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Create</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
@endsection
@section('page-content')
    <section>
        <div class="row">
            <div class="col-12 col-md-6">
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
            <div class="col-12 col-md-6">
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
        </div>
        <div>
            <form action="{{ route('transaction_detail.store', $transaction->id) }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="title">Total Point</label>
                            <input type="number" class="form-control" disabled name="point" id="point" placeholder="" required value="{{ old('title') }}">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group d-flex justify-content-between">
                            <label for="title">Kumpulan Sampah</label>
                            <button type="button" class="btn btn-success" id="add-waste">Tambah</button>
                        </div>
                    </div>
                    <div class="col-12 row" id="wastes">
                        <div class="col-12 col-md-8">
                            <div class="form-group">
                                <label for="waste_id">Sampah</label>
                                <select name="waste_id[]" id="waste_id" class="form-control w-100">
                                    <option value="">-- Pilih --</option>
                                    @forelse ($wastes as $waste)
                                        <option value="{{ $waste->id }}">{{ $waste->id }} | {{ $waste->name }}</option>
                                    @empty
                                        
                                    @endforelse
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="form-group">
                                <label for="title">Total Sampah (KG)</label>
                                <input type="number" class="form-control" name="waste_total[]" id="sampah" placeholder="" required value="{{ old('title') }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mb-5">
                        <button class="btn btn-primary w-100" type="submit">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
@section('script')
<script src="{{ asset('assets-mazer/vendors/jquery/jquery.min.js') }}"></script>
<script>
    $('#add-waste').click(function(){
        $('#wastes').append(`
        <div class="col-12 col-md-8">
            <div class="form-group">
                <label for="waste_id">Sampah</label>
                <select name="waste_id[]" id="waste_id" class="form-control w-100">
                    <option value="">-- Pilih --</option>
                    @forelse ($wastes as $waste)
                        <option value="{{ $waste->id }}">{{ $waste->id }} | {{ $waste->name }}</option>
                    @empty
                        
                    @endforelse
                </select>
            </div>
        </div>
        <div class="col-12 col-md-4">
            <div class="form-group">
                <label for="title">Total Sampah (KG)</label>
                <input type="number" class="form-control" name="waste_total[]" id="sampah" placeholder="" required value="{{ old('title') }}">
            </div>
        </div>
        `)
    })
</script>
@endsection