@inject('User', 'App\Models\User')
@extends('layout.layout')
@section('page-heading')
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Point</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('point.index') }}">Point</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
@endsection
@section('page-content')
    <section>
        <form action="{{ route('point.edit', $user->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="nama" required disabled value="{{ old('name') ?? $user->name }}">
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" name="username" id="username" placeholder="username" required value="{{ old('username') ?? $user->username }}" disabled readonly>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" name="email" id="email" placeholder="email" required value="{{ old('email') ?? $user->email }}" disabled readonly>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="form-group">
                        <label for="point">Point</label>
                        <input type="text" class="form-control" name="point" id="point" placeholder="point" required value="{{ old('point') ?? $user->profileUser->point }}" >
                    </div>
                </div>
                <div class="col-12 col-md-8">
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-control" disabled>
                            <option value="" selected disabled>-- pilih --</option>
                            <option value="0" {{ $user->status == $User::STATUS_ACTIVE ? 'selected' : '' }}>Active</option>
                            <option value="1" {{ $user->status == $User::STATUS_NOT_ACTIVE ? 'selected' : '' }}>Not Active</option>
                        </select>
                    </div>
                </div>
                <div class="col-12 mb-5">
                    <button class="btn btn-primary w-100" type="submit">Submit</button>
                </div>
            </div>
        </form>
    </section>
@endsection