@extends('user.layout.landing-page.layout')

@section('content')
<div class="pt-36">
    <div class="flex justify-between flex-col lg:flex-row">
        <div class="ml-8 lg:ml-24 mt-36">
            <div class="text-[#666666]">
                <h1 class="font-semibold text-6xl">Waste Station</h1>
                <div class="ml-4 my-2">
                    <span class="max-w-[380px] block">Waste Station merupakan website yang menyediakan layanan edukasi dan tempat pengumpulan sampah yang dapat didaur ulang.</span>
                    <div class="my-6">
                        <button type="button" data-modal-target="default" data-modal-toggle="registerModal"  class="bg-[#5CB319] text-[#fff] px-3 py-2 rounded-lg text-xl">Ayo Bergabung!</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="lg:mr-14 flex justify-center lg:block">
            <img class="max-w-[600px] w-full" src="{{ asset('assets-user/bank-sampah.svg') }}" alt="">
        </div>
    </div>
</div>

<div>
    <img class="w-full" src="{{ asset('assets-user/bawah.png') }}" alt="">
    <div class="bg-[#54953A]">
        <div class="flex justify-center">
            <div class="flex flex-col lg:flex-row">
                <div class="mx-4 lg:mx-14 relative pt-8">
                    <img src="{{ asset('assets-user/kotak.png') }}" alt="" class="max-w-[400px] h-[140px]">
                    <div class="absolute top-0 w-full h-full">
                        <div class="flex justify-center items-center flex-col w-full h-full">
                            <span class="text-[#5CB319] font-semibold text-[40px] lg:text-[45px]">{{ $nasabahCount }}</span>
                            <div>
                                <span class="text-[#5CB319] text-[23px] lg:text-[28px]">Nasabah</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mx-4 lg:mx-14 relative pt-8">
                    <img src="{{ asset('assets-user/kotak-2.png') }}" alt="" class="max-w-[400px] h-[140px]">
                    <div class="absolute top-0 w-full h-full">
                        <div class="flex justify-center items-center flex-col w-full h-full">
                            <span class="text-[#fff] font-semibold text-[40px] lg:text-[45px]">{{ $sampahCount }}</span>
                            <div>
                                <span class="text-[#fff] text-[23px] lg:text-[28px]">Sampah terkumpul(Kg)</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <h1 class="text-center text-[50px] text-[#fff] py-28">Layanan</h1>
            <div class="flex justify-center">
                <div class="flex items-center flex-col lg:flex-row">
                    <div class="mr-16">
                        <img src="{{ asset('assets-user/buang-sampah.png') }}" alt="" class="w-[500px]">
                    </div>
                    <div>
                        <span class="text-[#fff] w-[340px] block">
                            Dapat melakukan penyetoran sampah yang nantinya akan dikonversi menjadi poin.  <br>Poin - poin tersebut dapat ditukar dengan alat kebersihan yang sudah disediakan.
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="pb-44">
            <h1 class="text-center text-[50px] text-[#fff] py-28">Program</h1>
            <div class="flex justify-center">
                <div class="flex flex-col gap-8 lg:flex-row justify-center">
                    <a href="{{ route('landing.program.organik') }}" class="inline-block mx-8 mx-w-[214px]">
                        <div class="bg-[#fff] flex items-center flex-col rounded-lg py-4 px-8 h-full">
                            <img class="w-[80px]" src="{{ asset('assets-user/organik.png') }}" alt="">
                            <span class="block text-sm w-[150px] text-center mt-8">Penyetoran Sampah Organik</span>
                        </div>
                    </a>
                    <a href="{{ route('landing.program.non_organik') }}" class="inline-block mx-8 mx-w-[214px]">
                        <div class="bg-[#fff] flex items-center flex-col rounded-lg py-4 px-8 h-full">
                            <img class="w-[80px]" src="{{ asset('assets-user/non-organik.png') }}" alt="">
                            <span class="block text-sm w-[150px] text-center mt-8">Penyetoran Sampah Non-Organik</span>
                        </div>
                    </a>
                    <a href="#" class="inline-block mx-8 mx-w-[214px]">
                        <div class="bg-[#fff] flex items-center flex-col rounded-lg py-4 px-8 h-full">
                            <img class="w-[150px]" src="{{ asset('assets-user/book.png') }}" alt="">
                            <span class="block text-sm w-[150px] text-center mt-8">Penyetoran Sampah Organik</span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection