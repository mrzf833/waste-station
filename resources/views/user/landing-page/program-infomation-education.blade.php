@extends('user.layout.landing-page.layout')

@section('content')
<div class="pt-72">
    <h3 class="mx-8 text-4xl font-medium text-[#666666] mb-4 text-center lg:hidden">{{ $informationEducation->title }}
    </h3>
    <div class="flex justify-center flex-col lg:flex-row">
        <div class="flex justify-center lg:items-center lg:w-full lg:max-w-[400px]">
            <div class="inline-block mx-8">
                <img class="w-full" src="{{ asset($informationEducation->image) }}" alt="">
            </div>
        </div>
        <div class="ml-16 mr-36 mb-8">
            <h3 class="text-4xl font-medium text-[#666666] mb-4 hidden lg:inline-block">{{ $informationEducation->title }}
            </h3>
            <p class="lg:max-w-[400px] w-full text-[#303030] ml-4 mt-4">
                {{ $informationEducation->description }}
            </p>
        </div>
    </div>
</div>

<div class="pt-32">
    <img class="w-full" src="{{ asset('assets-user/bawah.png') }}" alt="">
    <div class="bg-[#54953A] pb-32">
        
    </div>
</div>
@endsection