@extends('user.layout.dashboard.layout')

@section('content')
<div class="mx-8 lg:mt-16 lg:mt-0 lg:mx-32">
    <div class="container mx-auto pt-64">
        <!-- content -->
        <div class="">
            <div class="shadow-lg border rounded-lg py-16 px-8">
                <h2 class="text-center font-semibold text-2xl mb-8">Penukaran Poin</h2>
                <div class="flex flex-row flex-wrap">
                    @forelse ($itemPoints as $itemPoint)
                        <a href="{{ route('user.transaction.detail', $itemPoint->id) }}" class="flex justify-center">
                            <div class="flex flex-row flex-wrap">
                                <div class="max-w-[200px] border rounded mx-4 mt-8 hover:shadow-lg duration-300">
                                    <img src="{{ asset($itemPoint->image) }}" alt="">
                                    <div class="mx-4 my-4">
                                        <h3 class="text-base">{{ $itemPoint->title }}</h3>
                                    </div>
                                    <div class="ml-8 my-4">
                                        <i class="fa-solid fa-coins fa-xl text-[#F6B93B]"></i>
                                        <span class="text-xl font-bold ml-2">{{ $itemPoint->point }}</span>
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
@endsection