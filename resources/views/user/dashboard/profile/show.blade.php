@extends('user.layout.dashboard.layout')

@section('content')
<div class="mx-8">
    <div class="container mx-auto pt-72">
        <div>
            <h1 class="text-4xl text-center mb-8">Edit Profile</h1>
            <form action="{{ route('user.profile.edit') }}" method="POST">
                @csrf
                @method('PUT')
                <div class="flex flex-col mb-4">
                    <label for="" class="mb-2">Email: </label>
                    <input type="email" class="rounded-lg border-[#2C7B0C] border-2 bg-gray-300" disabled id="" value="{{ $user->email }}">
                </div>
                <div class="flex flex-col mb-4">
                    <label for="" class="mb-2">Password: </label>
                    <input type="text" class="rounded-lg border-[#2C7B0C] border-2 mb-2" name="password" id="">
                    <span class="text-sm text-red-500">Jika tidak mau merubah password maka jangan di isi</span>
                </div>
                <div class="flex flex-col mb-4">
                    <label for="" class="mb-2">Username: </label>
                    <input type="text" class="rounded-lg border-[#2C7B0C] border-2 bg-gray-300" disabled id="" value="{{ $user->username }}">
                </div>
                <div class="flex flex-col mb-4">
                    <label for="" class="mb-2">Name: </label>
                    <input type="text" class="rounded-lg border-[#2C7B0C] border-2" name="name" id="" value="{{ $user->name }}">
                </div>
                <div class="flex flex-col mb-4">
                    <label for="" class="mb-2">Telephone: </label>
                    <input type="text" class="rounded-lg border-[#2C7B0C] border-2" name="telephone" id="" value="{{ $user->profileUser->telephone }}">
                </div>
                <div class="flex flex-col mb-4">
                    <label for="" class="mb-2">Address: </label>
                    <textarea name="address" id="" cols="30" rows="5" class="rounded-lg border-[#2C7B0C] border-2 px-2 py-2">{{ $user->profileUser->address }}</textarea>
                </div>

                <div class="flex justify-center mb-4">
                    <button type="submit" class="px-16 rounded-lg bg-[#2C7B0C] text-xl text-white py-2">Edit</button>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection