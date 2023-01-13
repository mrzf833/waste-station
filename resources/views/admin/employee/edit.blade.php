@extends('layout.layout')
@inject('User', 'App\Models\User')
@section('page-heading')
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Karyawan</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('employee.index') }}">Karyawan</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
@endsection
@section('page-content')
    <section>
        <form action="{{ route('employee.edit', $user->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-12 col-lg-6">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" name="username" id="username" placeholder="username" required value="{{ old('username') ?? $user->username }}" disabled readonly>
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="email" required value="{{ old('email') ?? $user->email }}" disabled readonly>
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="password" value="{{ old('password') }}">
                        <span class="text-sm text-danger">Jangan diisi jika tidak ingin di ganti password</span>
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="" selected disabled>-- pilih --</option>
                            <option value="{{ $User::STATUS_ACTIVE }}" {{ $user->status == $User::STATUS_ACTIVE ? 'selected' : '' }}>Active</option>
                            <option value="{{ $User::STATUS_NOT_ACTIVE  }}" {{ $user->status == $User::STATUS_NOT_ACTIVE ? 'selected' : '' }}>Not Active</option>
                        </select>
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="form-group">
                        <label for="name">name</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="name" required value="{{ old('name') ?? $user->name }}">
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="form-group">
                        <label for="telephone">Telephone</label>
                        <input type="text" class="form-control" name="telephone" id="telephone" placeholder="telephone" required value="{{ old('telephone') ?? $user->profileUser->telephone }}">
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="address">Address</label>
                        <textarea name="address" id="address" class="form-control" cols="30" rows="4" placeholder="address">{{ old('address') ?? $user->address }}</textarea>
                    </div>
                </div>
                <div class="col-12 mb-5">
                    <button class="btn btn-primary w-100" type="submit">Submit</button>
                </div>
            </div>
        </form>
    </section>
@endsection