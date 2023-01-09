<div id="registerModal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
    <div class="relative w-full h-full max-w-2xl">
        <!-- Modal content -->
        <div class="relative bg-[#F4F4F4] rounded-lg shadow mt-[80px]">
            <!-- Modal header -->
            <div class="flex items-start justify-between p-4 rounded-t relative pb-8">
                <div class="flex justify-center w-full absolute mt-[-80px]">
                    <div>
                        <img class="w-[130px]" src="{{ asset('assets-user/logo-login.png') }}" alt="">
                    </div>
                </div>
            </div>
            <!-- Modal body -->
            <div class="p-6 space-y-6">
                <div>
                    <form action="{{ route('landing.register') }}" method="POST">
                        @csrf
                        <div class="flex flex-col mb-4">
                            <label for="" class="mb-2">Username: </label>
                            <input type="text" class="rounded-lg border-[#2C7B0C] border-2" name="username" id="">
                        </div>
                        <div class="flex flex-col mb-4">
                            <label for="" class="mb-2">Email: </label>
                            <input type="email" class="rounded-lg border-[#2C7B0C] border-2" name="email" id="">
                        </div>
                        <div class="flex flex-col mb-4">
                            <label for="" class="mb-2">Password: </label>
                            <input type="text" class="rounded-lg border-[#2C7B0C] border-2" name="password" id="">
                        </div>
                        <div class="flex flex-col mb-4">
                            <label for="" class="mb-2">Name: </label>
                            <input type="text" class="rounded-lg border-[#2C7B0C] border-2" name="name" id="">
                        </div>
                        <div class="flex flex-col mb-4">
                            <label for="" class="mb-2">Telephone: </label>
                            <input type="text" class="rounded-lg border-[#2C7B0C] border-2" name="telephone" id="">
                        </div>
                        <div class="flex flex-col mb-4">
                            <label for="" class="mb-2">Address: </label>
                            <textarea name="address" id="" cols="30" rows="5" class="rounded-lg border-[#2C7B0C] border-2 px-2 py-2"></textarea>
                        </div>
                        {{-- <div class="mb-4">
                            <a href="" class="text-[#2C7B0C] text-lg">Lupa Password</a>
                        </div> --}}

                        <div class="flex justify-center mb-4">
                            <button type="submit" class="px-16 rounded-lg bg-[#2C7B0C] text-xl text-white py-2">Daftar</button>
                        </div>

                        <div class="flex justify-center text-[#2C7B0C]">
                            <span class="">Sudah mempunyai akun? <a href="#" data-modal-hide="registerModal" data-modal-target="default" data-modal-toggle="loginModal" class="font-bold">Masuk</a></span>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="loginModal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
    <div class="relative w-full h-full max-w-2xl md:h-auto">
        <!-- Modal content -->
        <div class="relative bg-[#F4F4F4] rounded-lg shadow">
            <!-- Modal header -->
            <div class="flex items-start justify-between p-4 rounded-t relative pb-8">
                <div class="flex justify-center w-full absolute mt-[-70px]">
                    <div>
                        <img class="w-[130px]" src="{{ asset('assets-user/logo-login.png') }}" alt="">
                    </div>
                </div>
            </div>


            <!-- Modal body -->
            <div class="p-6 space-y-6">
                <div>
                    <form action="{{ route('landing.login') }}" method="POST">
                        @csrf
                        <div class="flex flex-col mb-4">
                            <label for="" class="mb-2">Email: </label>
                            <input type="text" class="rounded-lg border-[#2C7B0C] border-2" name="email" id="">
                        </div>
                        <div class="flex flex-col mb-4">
                            <label for="" class="mb-2">Password: </label>
                            <input type="password" class="rounded-lg border-[#2C7B0C] border-2" name="password" id="">
                        </div>
                        {{-- <div class="mb-4">
                            <a href="" class="text-[#2C7B0C] text-lg">Lupa Password</a>
                        </div> --}}

                        <div class="flex justify-center mb-4">
                            <button type="submit" class="px-16 rounded-lg bg-[#2C7B0C] text-xl text-white py-2">Masuk</button>
                        </div>

                        <div class="flex justify-center text-[#2C7B0C]">
                            <span class="">Tidak mempunyai akun? <a href="#" data-modal-hide="loginModal" data-modal-target="default" data-modal-toggle="registerModal" class="font-bold">Daftar</a></span>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>