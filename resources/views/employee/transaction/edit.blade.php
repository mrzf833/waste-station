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
                        <li class="breadcrumb-item"><a href="{{ route('transaction.show', $transaction->id) }}">Show</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Create</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
@endsection
@section('page-content')
    <section>
        <form action="{{ route('transaction.edit', $transaction->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="client_id">Pengguna</label>
                        <select name="client_id" id="client_id" class="form-control w-100">
                            <option value="">-- Pilih --</option>
                            @forelse ($clients as $client)
                                <option value="{{ $client->id }} " {{ $client->id == $transaction->client_id ? 'selected' : '' }}>{{ $client->username }}</option>
                            @empty
                                
                            @endforelse
                        </select>
                    </div>
                </div>
                </div>
                <div class="col-12 mb-5">
                    <button class="btn btn-warning w-100" type="submit">Edit</button>
                </div>
            </div>
        </form>
    </section>
@endsection