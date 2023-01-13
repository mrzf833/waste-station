@inject('User', 'App\Models\User')
@extends('layout.layout')
@section('page-heading')
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Ubah Password</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.profile') }}">Profile</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Change Password</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
@endsection
@section('page-content')
    <section>
        <form action="{{ route('admin.change_password') }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-12 col-lg-12">
                    <div class="form-group">
                        <label for="password">New Password</label>
                        <input type="text" class="form-control" name="password" id="password" placeholder="new password" required value="{{ old('password') }}">
                    </div>
                </div>
                <div class="col-12 mb-5">
                    <button class="btn btn-primary w-100" type="submit">Submit</button>
                </div>
            </div>
        </form>
    </section>
@endsection