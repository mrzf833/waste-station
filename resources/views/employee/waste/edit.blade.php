@inject('Waste', 'App\Models\Waste')
@extends('layout.layout')
@section('page-heading')
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Sampah</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('waste.index') }}">Sampah</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
@endsection
@section('page-content')
    <section>
        <form action="" method="POST" id="delete-image-form" class="d-none">
            @csrf
            @method('DELETE')
        </form>
        <form action="{{ route('waste.edit', $waste->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="nama">Name</label>
                        <input type="text" class="form-control" name="name" id="nama" placeholder="" required value="{{ old('name') ?? $waste->name }}">
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="point">Point</label>
                        <input type="number" class="form-control" name="point" id="point" placeholder="" required value="{{ old('point') ?? $waste->point }}">
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="type">Type</label>
                        <select name="type" id="type" class="form-control">
                            <option value="{{ $Waste::VALUABLE }}" {{ $waste->type == $Waste::VALUABLE ? 'selected' : '' }}>Berharga</option>
                            <option value="{{ $Waste::WORTHLESS }}" {{ $waste->type == $Waste::WORTHLESS ? 'selected' : '' }}>Tidak Berharga</option>
                        </select>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <div class="d-flex justify-content-between">
                            <label for="image">Image</label>
                            <a href="{{ route('waste.create.image', $waste->id) }}" class="btn btn-success" id="add-image">Add Image</a>
                        </div>
                    </div>
                </div>
                @forelse ($waste->images as $image)
                    <div class="col-12">
                        <div class="form-group">
                            <div class="d-flex">
                                <input type="file" accept="image/*" class="form-control mx-1 custom-file-input input-image-preview" name="images[{{ $image->id }}]" id="images" placeholder="">
                                <button type="button" href="{{ route('waste.destroy.image', [$waste->id, $image->id]) }}" class="mx-1 btn btn-danger delete-image">Delete</button>
                            </div>
                            <div class="py-3">
                                <img class="image-preview" src="{{ asset('storage' . str_replace('public', '/', $image->url)) }}" default-image="{{ asset('storage' . str_replace('public', '/', $image->url)) }}" alt="your image" style="max-width: 300px" />
                            </div>
                        </div>
                    </div>
                @empty
                    
                @endforelse
                <div class="col-12 mb-5">
                    <button class="btn btn-primary w-100" type="submit">Submit</button>
                </div>
            </div>
        </form>
    </section>
@endsection
@section('script')
    <script src="{{ asset('assets-mazer/vendors/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>\
    <script>
        $(document).on('click', '.delete-image', function(){
            let cek_confirm = confirm('gambar di hapus ?')
            if(!cek_confirm){
                return
            }
            let url_action = $(this).attr('href')
            $('#delete-image-form').attr('action', url_action)
            $('#delete-image-form').submit()
            console.log(url_action);
        })
    </script>
    <script>
        $(function () {
            bsCustomFileInput.init();
        });
        $(document).on('change', '.input-image-preview', function(){
            const [file] = this.files
            if (file) {
                $(this).closest('div .form-group').find('.image-preview').attr('src', URL.createObjectURL(file))
                return
            }
            let image_default = $(this).closest('div .form-group').find('.image-preview').attr('default-image')
            $(this).closest('div .form-group').find('.image-preview').attr('src', image_default)
        })
    </script>
@endsection