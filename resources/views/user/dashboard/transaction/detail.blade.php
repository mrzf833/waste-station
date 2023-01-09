@extends('user.layout.dashboard.layout')

@section('content')
<div class="mx-44">
    <div class="container mx-auto pt-64">
        <!-- content -->
        <div class="flex ">
            <div class="">
                <img class="w-[256px] block" src="{{ asset($itemPoint->image) }}" alt="">
            </div>
            <div class="inline-block ml-16">
                <div class="flex justify-between items-center">
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
                    <a href="{{ route('user.transaction.checkout', $itemPoint->id) }}" class="bg-[#27AE60] px-16 py-4 rounded text-white ml-28 font-semibold">CheckOut</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection