@extends('user.layout.landing-page.layout')

@section('content')
<div class="pt-72">
    <div class="flex justify-center">
        <div class="flex flex-col">
            <div class="flex justify-center">
                <img class="w-[500px]" src="{{ asset('assets-user/logo.png') }}" alt="">
            </div>
            <div class="flex justify-center">
                <p class="w-[400px] text-center mt-6 text-[#666666]">
                    Waste Station merupakan website yang menyediakan layanan edukasi dan tempat pengumpulan sampah yang dapat didaur ulang.
                </p>
            </div>
        </div>
        
        <!-- <img src="" alt=""> -->
    </div>
</div>

<div class="pt-32">
    <img src="{{ asset('assets-user/bawah.png') }}" class="w-full" alt="">
    <div class="bg-[#54953A] pb-32">
        <div class="flex justify-center">
            <div class="flex flex-col">
                <div class="flex justify-center">
                    <h2 class="text-center text-4xl font-semibold text-[#FBFBFB]">Kenapa Harus Kami</h2>
                </div>
                <div class="flex mt-44 flex-col md:flex-row">
                    <div class="mb-8">
                        <div class="flex justify-center">
                            <img class="mx-16 w-[200px]" src="{{ asset('assets-user/money.png') }}" alt="">
                        </div>
                        <span class="text-center w-full block text-2xl text-[#FFFFFF] mt-8">Point Bisa Ditukar</span>
                    </div>
                    <div class="mb-8">
                        <div class="flex justify-center">
                            <img class="mx-16 w-[200px]" src="{{ asset('assets-user/car.png') }}" alt="">
                        </div>
                        <span class="text-center w-full block text-2xl text-[#FFFFFF] mt-8">Layanan Pengumpulan</span>
                    </div>
                    <div class="mb-8">
                        <div class="flex justify-center">
                            <img class="mx-16 w-[200px]" src="{{ asset('assets-user/time.png') }}" alt="">
                        </div>
                        <span class="text-center w-full block text-2xl text-[#FFFFFF] mt-8">Cepat</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection