@extends('layout.layout')
@section('page-heading')
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Item Point</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('item_point.index') }}">Item Point</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
@endsection
@section('page-content')
    <section>
        <form action="{{ route('item_point.edit', $itemPoint->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" name="title" id="title" placeholder="title" required value="{{ old('title') ?? $itemPoint->title }}">
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label for="point">Point</label>
                        <input type="text" class="form-control" name="point" id="point" placeholder="point" required value="{{ old('point') ?? $itemPoint->point }}">
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label for="stock">Stock</label>
                        <input type="text" class="form-control" name="stock" id="stock" placeholder="stock" required value="{{ old('stock') ?? $itemPoint->stock }}">
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" class="form-control" name="image" id="image" placeholder="image">
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="description1">Deskripsi 1</label>
                        <textarea name="description1" id="description1" class="form-control" cols="30" rows="4" placeholder="desckripsi">{{ old('description1') ?? $itemPoint->description1 }}</textarea>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="description2">Deskripsi 2</label>
                        <textarea name="description2" id="description2" class="form-control" cols="30" rows="4" placeholder="desckripsi">{{ old('description2') ?? $itemPoint->description2 }}</textarea>
                    </div>
                </div>
                <div class="col-12 mb-5">
                    <button class="btn btn-primary w-100" type="submit">Submit</button>
                </div>
            </div>
        </form>
    </section>
@endsection