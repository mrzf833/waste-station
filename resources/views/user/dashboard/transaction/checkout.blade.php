@extends('user.layout.dashboard.layout')

@section('content')
<div class="mx-44">
    <div class="container mx-auto pt-64">
        <!-- content -->
        <div class="">
            <div class="shadow-lg rounded border py-8 px-16">
                <h3 class="text-3xl font-bold text-center">Pesanan</h3>
                <div>
                    <form action="{{ route('user.transaction.checkout', $itemPoint->id) }}" method="POST">
                        @csrf
                        <div class="flex flex-col mb-4">
                            <label for="penerima" class="font-semibold mb-2">Penerima</label>
                            <input type="text" class="shadow rounded border py-2 px-2" name="penerima" id="penerima">
                        </div>
                        <div class="flex flex-col mb-4">
                            <label for="alamat" class="font-semibold mb-2">Alamat</label>
                            <textarea class="shadow py-2 px-2 rounded-lg border" id="alamat" cols="30" rows="10" name="alamat"></textarea>
                        </div>
                        <div class="mb-8 flex gap-8">
                            <div class="flex flex-col w-1/4">
                                <label for="kode_pos" class="font-semibold mb-2">Kode POS</label>
                                <input type="text" class="shadow rounded py-2 px-2 border" name="kode_pos" id="kode_pos">
                            </div>
                            <div class="flex flex-col w-3/4">
                                <label for="" class="font-semibold mb-2">Point Bayar</label>
                                <input type="text" class="shadow rounded py-2 px-2 border bg-gray-200" value="{{ $itemPoint->point }}" disabled>
                            </div>
                        </div>
                        <div class="flex justify-center">
                            <button type="submit" class="text-white bg-[#27AE60] font-semibold text-lg py-2 px-44 rounded-lg">Pesan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection