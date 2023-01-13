@extends('user.layout.landing-page.layout')

@section('content')
<div class="pt-44">
    <h1 class="text-4xl font-medium text-[#666666] mb-2 text-center block">Informasi Edukasi</h3>
    <div class="container mx-auto my-16">
        <div class="flex justify-center">
            <div class="flex flex-row flex-wrap gap-8 lg:flex-row justify-center">
                @forelse ($informationEducations as $informationEducation)
                    <a href="{{ route('landing.information_education.detail', $informationEducation->id) }}" class="inline-block mx-8 mx-w-[214px] border hover:shadow-lg duration-300">
                        <div class="bg-[#fff] flex items-center flex-col rounded-lg py-4 px-8 h-full">
                            <img class="w-[150px]" src="{{ asset($informationEducation->image) }}" alt="">
                            <span class="block text-sm w-[150px] text-center mt-8">{{ $informationEducation->title }}</span>
                        </div>
                    </a>
                @empty
                    
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection