@extends('layout.layout')
@section('page-heading')
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Profile</h3>
            </div>
        </div>
    </div>
@endsection
@section('page-content')
    <section>
        <form action="" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-12 col-lg-6">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" name="username" id="username" placeholder="username" disabled readonly value="{{ $user->username }}">
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="email" disabled readonly value="{{ $user->email }}">
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="password">
                        <span class="text-sm text-danger">Jangan Diisi jika tidak mau di ganti</span>
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="name" value="{{ $user->name }}">
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="form-group">
                        <label for="telephone">Telephone</label>
                        <input type="text" class="form-control" name="telephone" id="telephone" placeholder="telephone" value="{{ $user->profileUser->telephone }}">
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="name">Address</label>
                        <textarea name="address" id="address" class="form-control" cols="30" rows="5">{{ $user->profileUser->address }}</textarea>
                    </div>
                </div>
                <div class="col-12 mb-5">
                    <button type="submit" class="btn btn-primary w-100 text-center">Submit</button>
                </div>
            </div>
        </form>
    </section>
@endsection