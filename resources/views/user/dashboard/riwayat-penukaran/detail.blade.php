@extends('user.layout.dashboard.layout')

@section('content')
<div class="mx-44">
    <div class="container mx-auto pt-64">
        <!-- content -->
        <div class="flex ">
            <div class="">
                <img class="w-[256px] block" src="{{ asset('assets-user/sapu.png') }}" alt="">
            </div>
            <div class="inline-block ml-16">
                <div class="flex justify-between items-center">
                    <h3 class="text-2xl">
                        Sapu Kebersihan
                    </h3>
                    <div class="px-6 py-2 bg-[#53FF9C] text-[#137D40] rounded-lg">Selesai</div>
                </div>
                <div class="flex items-center">
                    <i class="fa-solid fa-coins fa-2xl text-[#F6B93B]"></i>
                    <span class="text-3xl font-bold ml-4">80</span>
                </div>
                <div>
                    <h4 class="text-[#137D40] text-2xl mt-6 mb-2">DETAIL</h4>
                    <hr>
                </div>
                <div>
                    <span>Berat : <span>0.2 Kg</span></span>
                    <span>Min. Pesanan <span>1</span></span>
                    <br>
                    <br>
                </div>
                <div>
                    <span>Deskripsi : </span>
                    <br>
                    <span class="text-base">
                        RESELLER dan DROPSHIPER very welcome
                        <br>
                        dapatkan discount spesial dari pabrik langsung
                        <br>
                        <br>
                        *Semua stok dijamin ready <br>
                        *Open order 24 jam <br>
                        *Fast response jam 09.00-16.00 Senin s/d Sabtu <br>
                        *Order diatas jam 09.00 akan di proses pada hari berikutnya <br>
                        *Order pada hari Minggu dan hari libur Nasional, akan kami proses pada hari kerja <br>
                    </span>
                </div>
                <div class="mt-24">
                    <a href="" class="bg-[#2980B9] px-16 py-4 rounded text-white ml-28 font-semibold">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection