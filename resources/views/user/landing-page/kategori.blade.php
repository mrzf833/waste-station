@extends('user.layout.landing-page.layout')

@section('content')
<div class="pt-44">
    <h1 class="text-4xl font-medium text-[#666666] mb-2 text-center block">Kategori Sampah</h3>
    <div class="container mx-auto my-16">
        <div class="flex flex-row flex-wrap">
            @forelse ($categoryWastes as $categoryWaste)
                <div class="w-[200px] border rounded ml-8 mt-8">
                    <div class="mx-3 my-4">
                        <div class="flex items-center flex-col">
                            <img class="w-full" src="{{ asset($categoryWaste->image) }}" alt="">
                            <h4 class="text-center font-semibold text-base">{{ $categoryWaste->code }}</h4>
                            <h4 class="text-center font-semibold text-base mb-2">{{ $categoryWaste->name }}</h4>
                            <span class="text-center text-sm">
                                {{ $categoryWaste->description }}
                            </span>
                        </div>
                    </div>
                </div>
            @empty
                
            @endforelse
        </div>
    </div>
</div>
@endsection