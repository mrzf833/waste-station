@extends('user.layout.dashboard.layout')
@inject('PointExchange', 'App\Models\PointExchange')

@section('content')
<div class="mx-8 md:mx-24 lg:mx-44 z-40 relative">
    <div class="container mx-auto pt-64">
        <!-- content -->
        <div class="flex lg:flex-row flex-col">
            <div class="flex justify-center mb-8 lg:mb-0 lg:block">
                <img class="max-w-[256px] w-full block" src="{{ asset('assets-user/sapu.png') }}" alt="">
            </div>
            <div class="inline-block lg:ml-16 lg:max-w-[588px] w-full">
                <div class="flex justify-between items-center">
                    <h3 class="text-2xl">
                        {{ $pointExchange->itemPoint->title }}
                    </h3>
                    @if ($pointExchange->status == $PointExchange::PROCESS)
                        <div class="py-2 px-4 rounded-lg bg-[#67C2FF] text-[#005C99]">
                            DiProses 
                        </div>
                    @elseif ($pointExchange->status == $PointExchange::SENT)
                        <div class="py-2 px-4 rounded-lg bg-[#FDD948] text-[#B66F00]">
                            DiKirim
                        </div>
                    @elseif ($pointExchange->status == $PointExchange::ACCEPT)
                        <div class="py-2 px-4 rounded-lg bg-[#53FF9C] text-[#137D40]">
                            DiTerima
                        </div>
                    @elseif ($pointExchange->status == $PointExchange::REJECT)
                        <div class="py-2 px-4 rounded-lg bg-[#F56758] text-[#9C190B]">
                            DiTolak
                        </div>
                    @endif
                </div>
                <div class="flex items-center">
                    <i class="fa-solid fa-coins fa-2xl text-[#F6B93B]"></i>
                    <span class="text-3xl font-bold ml-4">{{ $pointExchange->itemPoint->point }}</span>
                </div>
                <div>
                    <h4 class="text-[#137D40] text-2xl mt-6 mb-2">DETAIL</h4>
                    <hr>
                </div>
                <div>
                    <span>{{ $pointExchange->itemPoint->description1 }}</span>
                    <br>
                    <br>
                </div>
                <div>
                    <span>Deskripsi : </span>
                    <br>
                    <span class="text-base">
                        {{ $pointExchange->itemPoint->description2 }}
                    </span>
                </div>
                <div class="mt-24 flex justify-center">
                    @if ($pointExchange->status == $PointExchange::SENT)
                        <form action="{{ route('user.riwayat_penukaran.accepted', $pointExchange->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="bg-[#2ecc71] px-16 py-4 rounded text-white ml-4 font-semibold">Di Terima</button>
                        </form>
                    @endif
                    <a href="{{ route('user.riwayat_penukaran.index') }}" class="bg-[#3498db] hover:bg-[#2980b9] duration-300 px-16 py-4 rounded text-white ml-4 font-semibold">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection