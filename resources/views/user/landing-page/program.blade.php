@extends('user.layout.landing-page.layout')

@section('content')
<div class="pt-44">
    <h1 class="text-4xl font-medium text-[#666666] mb-2 text-center block">Program</h3>
    <div class="container mx-auto my-16">
        <div class="flex justify-center">
            <div class="flex flex-row flex-wrap gap-8 lg:flex-row justify-center">
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

                @forelse ($programs as $program)
                    <a href="{{ route('landing.program.detail', $program->id) }}" class="inline-block mx-8 mx-w-[214px]">
                        <div class="bg-[#fff] flex items-center flex-col rounded-lg py-4 px-8 h-full">
                            <img class="w-[150px]" src="{{ asset($program->image) }}" alt="">
                            <span class="block text-sm w-[150px] text-center mt-8">{{ $program->title }}</span>
                        </div>
                    </a>
                @empty
                    
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection