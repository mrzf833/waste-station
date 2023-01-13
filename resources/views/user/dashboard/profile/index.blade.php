@extends('user.layout.dashboard.layout')

@section('content')
<div class="mx-8">
    <div class="container mx-auto pt-72">
        <div class="flex">
            @include('user.layout.dashboard.sidebar')
            <div class="lg:ml-16 w-full flex flex-col">
                <div class="flex lg:justify-end w-full">
                    <div class="flex flex-col sm:flex-row sm:justify-between lg:block w-full lg:w-auto">
                        <div>
                            <div class="inline-block sm:block py-4 px-6 bg-[#EEEEEE] rounded-lg shadow-gray-200 shadow ">
                                <i class="fa-solid fa-coins fa-2xl text-[#F6B93B]"></i>
                                <span class="pl-8 text-2xl font-semibold">{{ $user->profileUser->point }}</span>
                            </div>
                        </div>
                        <div>
                            <a href="{{ route('user.transaction.index') }}" class="inline-block sm:block bg-[#EEEEEE] rounded-2xl shadow-gray-200 shadow my-4 px-8 py-2 text-lg">
                                <span class="mr-4">Tukar Poin</span>
                                <i class="fa-solid fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="w-full bg-[#F6F6F6] rounded h-full px-14 py-16">
                    <h4 class="text-3xl">Profil</h4>
                    <div class="flex justify-between mt-4">
                        <div class="w-full">
                            <div class="lg:flex w-full justify-between">
                                <div class="max-w-[250px] xl:max-w-[300px] w-full lg:h-[61px]">
                                    <span class="text-lg lg:py-4 block">Username</span>
                                    <hr class="hidden lg:block">
                                </div>
                                <div class="w-full lg:max-w-[250px] xl:max-w-[300px] w-full lg:h-[61px] flex flex-col justify-between">
                                    <div class="lg:flex justify-end">
                                        <span class="text-base py-3 lg:py-4 block text-[#727272]">{{ $user->username }}</span>
                                    </div>
                                    <hr>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-between mt-4">
                        <div class="w-full">
                            <div class="lg:flex w-full justify-between">
                                <div class="max-w-[250px] xl:max-w-[300px] w-full lg:h-[61px]">
                                    <span class="text-lg lg:py-4 block">Email</span>
                                    <hr class="hidden lg:block">
                                </div>
                                <div class="w-full lg:max-w-[250px] xl:max-w-[300px] w-full lg:h-[61px] flex flex-col justify-between">
                                    <div class="lg:flex justify-end">
                                        <span class="text-base py-3 lg:py-4 block text-[#727272]">{{ $user->email }}</span>
                                    </div>
                                    <hr>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-between mt-4">
                        <div class="w-full">
                            <div class="lg:flex w-full justify-between">
                                <div class="max-w-[250px] xl:max-w-[300px] w-full lg:h-[61px]">
                                    <span class="text-lg lg:py-4 block">Nama</span>
                                    <hr class="hidden lg:block">
                                </div>
                                <div class="w-full lg:max-w-[250px] xl:max-w-[300px] w-full lg:h-[61px] flex flex-col justify-between">
                                    <div class="lg:flex justify-end">
                                        <span class="text-base py-3 lg:py-4 block text-[#727272]">{{ $user->name }}</span>
                                    </div>
                                    <hr>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-between mt-4">
                        <div class="w-full">
                            <div class="lg:flex w-full justify-between">
                                <div class="max-w-[250px] xl:max-w-[300px] w-full lg:h-[61px]">
                                    <span class="text-lg lg:py-4 block">Telepon</span>
                                    <hr class="hidden lg:block">
                                </div>
                                <div class="w-full lg:max-w-[250px] xl:max-w-[300px] w-full lg:h-[61px] flex flex-col justify-between">
                                    <div class="lg:flex justify-end">
                                        <span class="text-base py-3 lg:py-4 block text-[#727272]">{{ $user->profileUser->telephone }}</span>
                                    </div>
                                    <hr>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-between mt-4">
                        <div class="w-full">
                            <div class="lg:flex w-full justify-between">
                                <div class="max-w-[250px] xl:max-w-[300px] w-full lg:h-[61px]">
                                    <span class="text-lg lg:py-4 block">Alamat</span>
                                    <hr class="hidden lg:block">
                                </div>
                                <div class="w-full lg:max-w-[250px] xl:max-w-[300px] w-full lg:h-[61px] flex flex-col justify-between">
                                    <div class="lg:flex justify-end">
                                        <span class="text-base py-3 lg:py-4 block text-[#727272]">
                                            {{ $user->profileUser->address }}
                                        </span>
                                    </div>
                                    <hr>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="w-full bg-[#F6F6F6] rounded h-full px-14 py-16">
                    <h4 class="text-3xl">Profil</h4>
                    <div class="flex justify-between mt-16">
                        <div class="max-w-[300px] w-full">
                            <div>
                                <span class="text-lg py-4 block">Username</span>
                                <hr>
                            </div>
                            <div>
                                <span class="text-lg py-4 block">Email</span>
                                <hr>
                            </div>
                            <div>
                                <span class="text-lg py-4 block">Nama</span>
                                <hr>
                            </div>
                            <div>
                                <span class="text-lg py-4 block">Telepon</span>
                                <hr>
                            </div>
                            <div>
                                <span class="text-lg py-4 block">Alamat</span>
                                <hr>
                            </div>
                        </div>
                        <div class="max-w-[300px] w-full">
                            <div>
                                <span class="text-base py-4 block text-[#727272]">Aminur</span>
                                <hr>
                            </div>
                            <div>
                                <span class="text-base py-4 block text-[#727272]">Aminur</span>
                                <hr>
                            </div>
                            <div>
                                <span class="text-base py-4 block text-[#727272]">Aminur</span>
                                <hr>
                            </div>
                            <div>
                                <span class="text-base py-4 block text-[#727272]">0822735234</span>
                                <hr>
                            </div>
                            <div>
                                <span class="text-base py-4 block text-[#727272]">
                                    Street: Jl Pungkur 5, Jawa Barat
                                    City: Jawa Barat
                                    State/province/area: Bandung
                                    Phone number 0-22-323-2732
                                    Zip code 40251
                                    Country calling code +62
                                    Country Indonaesia
                                </span>
                                <hr>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
</div>
@endsection