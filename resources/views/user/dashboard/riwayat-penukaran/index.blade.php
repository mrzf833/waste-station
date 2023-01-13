@extends('user.layout.dashboard.layout')
@inject('PointExchange', 'App\Models\PointExchange')

@section('content')
<div class="mx-8">
    <div class="container mx-auto pt-72">
        <div class="flex">
            @include('user.layout.dashboard.sidebar')
            <div class="lg:ml-16 w-full flex flex-col">
                <div class="w-full bg-[#F6F6F6] rounded h-full px-4 md:px-14 py-16">
                    <div class="mb-16 flex justify-between flex-wrap gap-4">
                        <h4 class="text-3xl hidden lg:block">Riwayat Penukaran</h4>
                        <div class="flex items-center py-4 lg:hidden">
                            <i class="fa-solid fa-cart-shopping fa-2xl"></i>
                            <div class="flex flex-col ml-4">
                                <span class="text-3xl">Riwayat Penukaran</span>
                                <span class="text-sm text-[#7D7D7D]">{{ $riwayatPenukaranTotal }} Transaksi</span>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-row flex-wrap">
                        @forelse ($riwayatPenukarans as $riwayatPenukaran)
                            <a href="{{ route('user.riwayat_penukaran.detail', $riwayatPenukaran->id) }}" class="px-4 py-4 max-w-[434px] w-full">
                                <div class="border w-full px-8 py-4 shadow hover:shadow-lg duration-300 rounded-lg">
                                    <div class="border-bottom flex sm:justify-between sm:flex-row flex-col mb-8">
                                        <div class="flex items-center justify-between sm:justify-start">
                                            <i class="fa-solid fa-bag-shopping fa-2xl"></i>
                                            <div class="ml-4">
                                                <h5 class="text-sm">Belanja</h5>
                                                <span class="md:text-base text-[#A8A8A8]">{{ $riwayatPenukaran->created_at?->format('d M Y') }}</span>
                                            </div>
                                        </div>
                                        <div class="flex mt-2 sm:mt-0">
                                            @if ($riwayatPenukaran->status == $PointExchange::PROCESS)
                                                <div class="text-sm sm:text-base w-f py-2 px-4 rounded-lg bg-[#67C2FF] text-[#005C99]">
                                                    DiProses 
                                                </div>
                                            @elseif ($riwayatPenukaran->status == $PointExchange::SENT)
                                                <div class="text-sm sm:text-base w-f py-2 px-4 rounded-lg bg-[#FDD948] text-[#B66F00]">
                                                    DiKirim
                                                </div>
                                            @elseif ($riwayatPenukaran->status == $PointExchange::ACCEPT)
                                                <div class="text-sm sm:text-base w-f py-2 px-4 rounded-lg bg-[#53FF9C] text-[#137D40]">
                                                    DiTerima
                                                </div>
                                            @elseif ($riwayatPenukaran->status == $PointExchange::REJECT)
                                                <div class="text-sm sm:text-base w-f py-2 px-4 rounded-lg bg-[#F56758] text-[#9C190B]">
                                                    DiTolak
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <hr class="mb-8 border-2">
                                    <div class="flex">
                                        <img src="{{ asset($riwayatPenukaran->itemPoint->image) }}" class="max-w-[80px] sm:max-w-[100px] w-full" alt="">
                                        <div class="ml-4">
                                            <h4 class="text-base sm:text-lg font-bold">{{ $riwayatPenukaran->itemPoint->title }}</h4>
                                            <span class="text-sm text-[#A8A8A8]">1 Barang</span>
                                        </div>
                                    </div>
                                    <div class="flex flex-col mt-8">
                                        <span class="text-sm sm:text-base">Total Point</span>
                                        <div class="flex pt-2 items-center">
                                            <i class="fa-solid fa-coins  text-[#F6B93B]"></i>
                                            <span class="font-semibold text-base sm:text-lg ml-2">{{ $riwayatPenukaran->point_price }}</span>
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