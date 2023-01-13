@extends('user.layout.dashboard.layout')

@section('content')
<div class="mx-8 md:mx-24 lg:mx-44 z-40 relative">
    <div class="container mx-auto pt-64">
        <!-- content -->
        <div class="mb-4">
            <a href="{{ route('user.transaction.index') }}" class="inline-block rounded border px-4 z-50 py-2 hover:bg-[#c0392b] hover:text-white duration-300">
                <i class="fa-solid fa-arrow-left fa-2x"></i>
            </a>
        </div>
        <div class="flex lg:flex-row flex-col">
            <div class="flex justify-center mb-8 lg:mb-0 lg:block">
                <img class="max-w-[256px] w-full block" src="{{ asset($itemPoint->image) }}" alt="">
            </div>
            <div class="inline-block lg:ml-16 lg:max-w-[588px] w-full">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-2xl">
                        {{ $itemPoint->title }}
                    </h3>
                </div>
                <div class="flex items-center">
                    <i class="fa-solid fa-coins fa-2xl text-[#F6B93B]"></i>
                    <span class="text-3xl font-bold ml-4">{{ $itemPoint->point }}</span>
                </div>
                <div>
                    <h4 class="text-[#137D40] text-2xl mt-6 mb-2">DETAIL</h4>
                    <hr>
                </div>
                <div>
                    <span>{{ $itemPoint->description1 }}</span>
                    <br>
                    <br>
                </div>
                <div>
                    <span>Deskripsi : </span>
                    <br>
                    <span class="text-base">
                        {{ $itemPoint->description2 }}
                    </span>
                </div>
                <div class="mt-24">
                    <a href="{{ route('user.transaction.checkout', $itemPoint->id) }}" class="bg-[#2ecc71] px-16 py-4 rounded text-white ml-28 font-semibold hover:bg-[#27ae60] duration-300">CheckOut</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection