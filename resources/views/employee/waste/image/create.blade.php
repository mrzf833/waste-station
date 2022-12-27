@inject('Waste', 'App\Models\Waste')
@extends('layout.layout')
@section('page-heading')
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Tambah Gambar Sampah</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('waste.index') }}">Sampah</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('waste.show', $waste->id) }}">Image</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Create</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
@endsection
@section('page-content')
    <section>
        <form action="{{ route('waste.store.image', $waste->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <div class="d-flex justify-content-between">
                            <label for="image">Image</label>
                            <button type="button" class="btn btn-success" id="add-image">Add Image</button>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div id="images">
                        <div class="form-group">
                            <div class="d-flex">
                                <input type="file" accept="image/*" class="form-control mx-1 custom-file-input input-image-preview" name="images[]" id="images" placeholder="" required>
                                <button type="button" class="mx-1 btn btn-danger delete-image">Delete</button>
                            </div>
                            <div class="py-3">
                                <img class="image-preview" src="https://plchldr.co/i/250x128?&bg=000000&fc=FFFFFF&text=300 X 128" alt="your image" style="max-width: 300px" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 mb-5">
                    <button class="btn btn-primary w-100" type="submit">Submit</button>
                </div>
            </div>
        </form>
    </section>
@endsection
@section('script')
    <script src="{{ asset('assets-mazer/vendors/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
    <script>
        $('#add-image').click(function(){
            $('#images').append(`
                <div class="form-group">
                    <div class="d-flex">
                        <input accept="image/*" type="file" class="form-control mx-1 mx-1 custom-file-input input-image-preview" name="image[]" id="image" placeholder="" required>
                        <button type="button" class="mx-1 btn btn-danger delete-image">Delete</button>
                    </div>
                    <div class="py-3">
                        <img class="image-preview" src="https://plchldr.co/i/250x128?&bg=000000&fc=FFFFFF&text=300 X 128" alt="your image" style="max-width: 300px" />
                    </div>
                </div>
            `)
        })

        $(document).on('click', '.delete-image', function(){
            $(this).closest('.form-group').remove()
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
            $(this).closest('div .form-group').find('.image-preview').attr('src', "https://plchldr.co/i/250x128?&bg=000000&fc=FFFFFF&text=250 X 128")
        })
    </script>
@endsection