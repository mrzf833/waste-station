@inject('User', 'App\Models\User')
@extends('layout.layout')
@section('page-heading')
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Profile</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">Profile</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
@endsection
@section('page-content')
    <section>
            <div>
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
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="name" disabled readonly value="{{ $user->name }}">
                        </div>
                    </div>
                    <div class="col-12 mb-5">
                        <a href="{{ route('admin.change_password') }}" class="btn btn-warning w-100 text-center">Change Password</a>
                    </div>
                </div>
            </div>
    </section>
@endsection