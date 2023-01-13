<div>
    <div class="bg-[#EEEEEE] px-8 pt-8 rounded hidden lg:inline-block">
        <img src="{{ asset('assets-user/profile.png') }}" alt="">
    
        <span class="font-semibold text-2xl text-center w-full block py-8">
            {{ $user->name }}
        </span>
    
        <hr class=" border-black">
    
        <div class="mx-2 h-[570px]">
            <div class="">
                <a href="{{ route('user.profile.index') }}" class="flex items-center py-4">
                    <i class="fa-solid fa-user fa-2xl"></i>
                    <span class="text-lg ml-4">Profil</span>
                </a>
                <hr>
            </div>
            <div class="">
                <div class="flex items-center py-4">
                    <i class="fa-solid fa-cart-shopping fa-2xl"></i>
                    <a href="{{ route('user.riwayat_setor.index') }}" class="flex flex-col ml-4">
                        <span class="text-lg">Riwayat Setor</span>
                        <span class="text-sm text-[#7D7D7D]">{{ $riwayatSetorTotal }} Transaksi</span>
                    </a>
                </div>
                <hr>
            </div>
            <div class="">
                <div class="flex items-center py-4">
                    <i class="fa-solid fa-cart-shopping fa-2xl"></i>
                    <a href="{{ route('user.riwayat_penukaran.index') }}" class="flex flex-col ml-4">
                        <span class="text-lg">Riwayat Penukaran</span>
                        <span class="text-sm text-[#7D7D7D]">{{ $riwayatPenukaranTotal }} Transaksi</span>
                    </a>
                </div>
                <hr>
            </div>
        </div>
    
        <div>
            <a href="{{ route('user.profile.show') }}" class="py-8 flex justify-center items-center">
                <i class="fa-solid fa-gear fa-2xl text-[#7D7D7D]"></i>
                <span class="text-[#7D7D7D] text-lg ml-4">Edit profil</span>
            </a>
        </div>
    </div>
</div>