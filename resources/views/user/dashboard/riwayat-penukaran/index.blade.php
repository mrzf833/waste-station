@extends('user.layout.dashboard.layout')
@inject('PointExchange', 'App\Models\PointExchange')

@section('content')
<div class="mx-8">
    <div class="container mx-auto pt-72">
        <div class="flex">
            @include('user.layout.dashboard.sidebar')
            <div class="ml-16 w-full flex flex-col">
                <div class="w-full bg-[#F6F6F6] rounded h-full px-14 py-16">
                    <h4 class="text-3xl mb-16">Riwayat Penukaran</h4>
                    <div class="flex flex-row flex-wrap">
                        @forelse ($riwayatPenukarans as $riwayatPenukaran)
                            <a href="{{ route('user.riwayat_penukaran.detail', $riwayatPenukaran->id) }}" class="px-4 py-4 w-1/2">
                                <div class="border w-full px-8 py-4 shadow-lg rounded-lg">
                                    <div class="border-bottom flex justify-between mb-8">
                                        <div class="flex items-center">
                                            <i class="fa-solid fa-bag-shopping fa-2xl"></i>
                                            <div class="ml-4">
                                                <h5 class="text-sm">Belanja</h5>
                                                <span class="text-[#A8A8A8]">{{ $riwayatPenukaran->created_at?->format('d M Y') }}</span>
                                            </div>
                                        </div>
                                        <div class="flex ">
                                            @if ($riwayatPenukaran->status == $PointExchange::PROCESS)
                                                <div class="py-2 px-4 rounded-lg bg-[#67C2FF] text-[#005C99]">
                                                    DiProses 
                                                </div>
                                            @elseif ($riwayatPenukaran->status == $PointExchange::SENT)
                                                <div class="py-2 px-4 rounded-lg bg-[#FDD948] text-[#B66F00]">
                                                    DiKirim
                                                </div>
                                            @elseif ($riwayatPenukaran->status == $PointExchange::ACCEPT)
                                                <div class="py-2 px-4 rounded-lg bg-[#53FF9C] text-[#137D40]">
                                                    DiTerima
                                                </div>
                                            @elseif ($riwayatPenukaran->status == $PointExchange::REJECT)
                                                <div class="py-2 px-4 rounded-lg bg-[#F56758] text-[#9C190B]">
                                                    DiTolak
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <hr class="mb-8 border-2">
                                    <div class="flex">
                                        <img src="{{ asset($riwayatPenukaran->itemPoint->image) }}" class="w-[100px]" alt="">
                                        <div class="ml-4">
                                            <h4 class="text-lg font-bold">{{ $riwayatPenukaran->itemPoint->title }}</h4>
                                            <span class="text-sm text-[#A8A8A8]">1 Barang</span>
                                        </div>
                                    </div>
                                    <div class="flex flex-col mt-8">
                                        <span class="text-base">Total Point</span>
                                        <div class="flex pt-2 items-center">
                                            <i class="fa-solid fa-coins  text-[#F6B93B]"></i>
                                            <span class="font-semibold text-lg ml-2">{{ $riwayatPenukaran->point_price }}</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        @empty
                            
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection