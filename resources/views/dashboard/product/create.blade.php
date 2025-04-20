@extends('layouts.app-dashboard')

@section('title')
    UMKM - Tambah Produk
@endsection

@push('css')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/quill/quill.snow.css') }}">
@endpush

@section('content')
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Tambah Produk</h5>
        </div>
        <div class="card-body">
            <form method="post" action="{{ url('dashboard/products/create') }}" id="form-add-product" spellcheck="false">
                @csrf

                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="nama_produk" class="col-form-label">Nama Produk</label>
                            <input type="text" id="nama_produk" name="nama_produk" class="form-control" placeholder="Masukkan nama produk">
                        </div>
    
                        <div class="mb-3">
                            <label for="kategori" class="col-form-label">Kategori Produk</label>
                            <select name="kategori" id="kategori" class="form-control select-dua" data-placeholder="Pilih Kategori">
                                <option></option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="harga" class="col-form-label">Harga</label>
                            <input type="text" id="harga" name="harga" class="form-control" placeholder="Masukkan harga">
                        </div>    
    
                        <div class="mb-4">
                            <label for="deskripsi" class="col-form-label">Deskripsi Produk</label>
                            <div id="deskripsi"></div>
                        </div>

                        <button type="submit" class="btn btn-primary">Buat Produk</button>
                    </div>
                    
                </div>

            </form>
        </div>
    </div>
@endsection

@push('js')
    <script src="{{ asset('assets/vendor/libs/quill/quill.js') }}"></script>
    <script>
        $('#kategori').select2({
            minimumResultsForSearch: -1
        });

        const toolbarOptions = [
            ['bold', 'italic', 'underline', 'strike'],        // toggled buttons
            [{ 'header': 1 }, { 'header': 2 }],               // custom button values
            // ['link', 'image', 'video', 'formula'],
            ['blockquote', 'code-block'],

            [{ 'list': 'ordered'}, { 'list': 'bullet' }, { 'list': 'check' }],

            [{ 'header': [1, 2, 3, 4, 5, 6, false] }],

            // [{ 'font': [] }],
            [{ 'align': [] }],

            // ['clean']                                         // remove formatting button
        ];

        const options = {
            // debug: 'info',
            modules: {
                toolbar: toolbarOptions,
            },
            placeholder: 'Masukkan deskripsi produk',
            theme: 'snow'
        };

        const quill = new Quill('#deskripsi', options);

        $('#form-add-product').on('submit', function(e) {
            e.preventDefault();

            let url = '{{ url('dashboard/products/create') }}';

            ajaxPost(url, {
                nama_produk: $('#nama_produk').val(),
                kategori: $('#kategori').val(),
                harga: $('#harga').val(),
                deskripsi: quill.getText(),
            })
            .then(res => {
                console.log(res);
            })
            .catch(err => {
                console.error(err);
            });
        });

    </script>
@endpush