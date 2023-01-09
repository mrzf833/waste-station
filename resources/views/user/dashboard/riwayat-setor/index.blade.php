@extends('user.layout.dashboard.layout')

@section('content')
<div class="mx-8">
    <div class="container mx-auto pt-72">
        <div class="flex">
            <div class="bg-[#EEEEEE] inline-block px-8 pt-8 rounded">
                <img src="{{ asset('assets-user/profile.png') }}" alt="">

                <span class="font-semibold text-2xl text-center w-full block py-8">
                    Aminu
                </span>

                <hr class=" border-black">

                <div class="mx-2 h-[570px]">
                    <div class="">
                        <a href="{{ route('user.profile.index') }}" class="flex items-center py-4">
                            <i class="fa-solid fa-user fa-2xl"></i>
                            <span class="text-lg ml-4">Profil</span>
                        </a>
                        <hr>
                    </div>
                    <div class="">
                        <div class="flex items-center py-4">
                            <i class="fa-solid fa-cart-shopping fa-2xl"></i>
                            <a href="{{ route('user.riwayat_setor.index') }}" class="flex flex-col ml-4">
                                <span class="text-lg">Riwayat Setor</span>
                                <span class="text-sm text-[#7D7D7D]">{{ $riwayatSetorTotal }} Transaksi</span>
                            </a>
                        </div>
                        <hr>
                    </div>
                    <div class="">
                        <div class="flex items-center py-4">
                            <i class="fa-solid fa-cart-shopping fa-2xl"></i>
                            <a href="{{ route('user.riwayat_penukaran.index') }}" class="flex flex-col ml-4">
                                <span class="text-lg">Riwayat Penukaran</span>
                                <span class="text-sm text-[#7D7D7D]">10 Transaksi</span>
                            </a>
                        </div>
                        <hr>
                    </div>
                </div>

                <div>
                    <div class="py-8 flex justify-center items-center">
                        <i class="fa-solid fa-gear fa-2xl text-[#7D7D7D]"></i>
                        <span class="text-[#7D7D7D] text-lg ml-4">Edit profil</span>
                    </div>
                </div>
            </div>
            <div class="ml-16 w-full flex flex-col">
                <div class="w-full bg-[#F6F6F6] rounded h-full px-14 py-16">
                    <h4 class="text-3xl mb-16">Riwayat Setor</h4>
                    <div class="flex flex-row flex-wrap">
                        <div class="px-4 py-4 w-1/2">
                            <div class="border w-full px-8 py-4 shadow-lg rounded-lg">
                                <div class="border-bottom flex justify-between mb-8">
                                    <div class="flex items-center">
                                        <i class="fa-solid fa-bag-shopping fa-2xl"></i>
                                        <div class="ml-4">
                                            <h5 class="text-sm">Belanja</h5>
                                            <span class="text-[#A8A8A8]">3 Des 2022</span>
                                        </div>
                                    </div>
                                    <div class="flex ">
                                        <div class="py-2 px-4 rounded-lg bg-[#53FF9C] text-[#137D40]">
                                            Selesai
                                        </div>
                                    </div>
                                </div>
                                <hr class="mb-8 border-2">
                                <div class="flex">
                                    <img src="{{ asset('assets-user/sapu.png') }}" class="w-[100px]" alt="">
                                    <div class="ml-4">
                                        <h4 class="text-lg font-bold">Sapu Kebersihan</h4>
                                        <span class="text-sm text-[#A8A8A8]">1 Barang</span>
                                    </div>
                                </div>
                                <div class="flex flex-col mt-8">
                                    <span class="text-base">Total Harga</span>
                                    <span class="font-semibold text-lg">Rp102.750</span>
                                </div>
                            </div>
                        </div>
                        <div class="px-4 py-4 w-1/2">
                            <div class="border w-full px-8 py-4 shadow-lg rounded-lg">
                                <div class="border-bottom flex justify-between mb-8">
                                    <div class="flex items-center">
                                        <i class="fa-solid fa-bag-shopping fa-2xl"></i>
                                        <div class="ml-4">
                                            <h5 class="text-sm">Belanja</h5>
                                            <span class="text-[#A8A8A8]">3 Des 2022</span>
                                        </div>
                                    </div>
                                    <div class="flex ">
                                        <div class="py-2 px-4 rounded-lg bg-[#53FF9C] text-[#137D40]">
                                            Selesai
                                        </div>
                                    </div>
                                </div>
                                <hr class="mb-8 border-2">
                                <div class="flex">
                                    <img src="{{ asset('assets-user/sapu.png') }}" class="w-[100px]" alt="">
                                    <div class="ml-4">
                                        <h4 class="text-lg font-bold">Sapu Kebersihan</h4>
                                        <span class="text-sm text-[#A8A8A8]">1 Barang</span>
                                    </div>
                                </div>
                                <div class="flex flex-col mt-8">
                                    <span class="text-base">Total Harga</span>
                                    <span class="font-semibold text-lg">Rp102.750</span>
                                </div>
                            </div>
                        </div>
                        <div class="px-4 py-4 w-1/2">
                            <div class="border w-full px-8 py-4 shadow-lg rounded-lg">
                                <div class="border-bottom flex justify-between mb-8">
                                    <div class="flex items-center">
                                        <i class="fa-solid fa-bag-shopping fa-2xl"></i>
                                        <div class="ml-4">
                                            <h5 class="text-sm">Belanja</h5>
                                            <span class="text-[#A8A8A8]">3 Des 2022</span>
                                        </div>
                                    </div>
                                    <div class="flex ">
                                        <div class="py-2 px-4 rounded-lg bg-[#53FF9C] text-[#137D40]">
                                            Selesai
                                        </div>
                                    </div>
                                </div>
                                <hr class="mb-8 border-2">
                                <div class="flex">
                                    <img src="{{ asset('assets-user/sapu.png') }}" class="w-[100px]" alt="">
                                    <div class="ml-4">
                                        <h4 class="text-lg font-bold">Sapu Kebersihan</h4>
                                        <span class="text-sm text-[#A8A8A8]">1 Barang</span>
                                    </div>
                                </div>
                                <div class="flex flex-col mt-8">
                                    <span class="text-base">Total Harga</span>
                                    <span class="font-semibold text-lg">Rp102.750</span>
                                </div>
                            </div>
                        </div>
                        <div class="px-4 py-4 w-1/2">
                            <div class="border w-full px-8 py-4 shadow-lg rounded-lg">
                                <div class="border-bottom flex justify-between mb-8">
                                    <div class="flex items-center">
                                        <i class="fa-solid fa-bag-shopping fa-2xl"></i>
                                        <div class="ml-4">
                                            <h5 class="text-sm">Belanja</h5>
                                            <span class="text-[#A8A8A8]">3 Des 2022</span>
                                        </div>
                                    </div>
                                    <div class="flex ">
                                        <div class="py-2 px-4 rounded-lg bg-[#53FF9C] text-[#137D40]">
                                            Selesai
                                        </div>
                                    </div>
                                </div>
                                <hr class="mb-8 border-2">
                                <div class="flex">
                                    <img src="{{ asset('assets-user/sapu.png') }}" class="w-[100px]" alt="">
                                    <div class="ml-4">
                                        <h4 class="text-lg font-bold">Sapu Kebersihan</h4>
                                        <span class="text-sm text-[#A8A8A8]">1 Barang</span>
                                    </div>
                                </div>
                                <div class="flex flex-col mt-8">
                                    <span class="text-base">Total Harga</span>
                                    <span class="font-semibold text-lg">Rp102.750</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection