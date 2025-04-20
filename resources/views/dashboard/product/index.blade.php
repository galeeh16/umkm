@extends('layouts.app-dashboard')

@section('title')
    UMKM - Produk
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">List Produk</h5>
        </div>
        <div class="card-body">
            <a href="{{ url('dashboard/products/create') }}" class="btn btn-primary mb-4">
                <i class="tf-icons bx bx-plus"></i>
                Tambah Produk
            </a>

            <table id="table-product" class="table" style="width: 100%;">
                <thead>
                    <tr>
                        <th class="text-nowrap text-start" width="50px">NO</th>
                        <th class="text-nowrap text-start">PRODUK</th>
                        <th class="text-nowrap text-start">HARGA</th>
                        <th class="text-nowrap text-start">TANGGAL DIBUAT</th>
                        <th class="text-nowrap text-start">TANGGAL DIUBAH</th>
                        <th class="text-nowrap text-start">AKSI</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection

@push('js')
    <script>
        function getData() {
            var dtable = $('#table-product').DataTable({
	            "processing": true,
	            "serverSide": true,
                "ordering": false,
                "scrollX": true,
	            "destroy": true,
                "language": {
                    "searchPlaceholder": "Cari Produk..."
                },
	            "ajax":{
	                "url": "{{ url('dashboard/products/list') }}",
	                "dataType": "json",
	                "type": "POST",
	                "data": function(data) {
	                    return {
	                        ...data,
	                        _token: "{{ csrf_token() }}",
                            page: parseInt($('#table-product').DataTable().page.info().page + 1),
	                    }
	                },
	            },
	            "columns": [
	                {"data": "no", "orderable": false, class: "text-center text-start", render: function (data, type, row, meta) {
	                    return meta.row + meta.settings._iDisplayStart + 1;
	                }},
	                { "data": "product", 'class': 'text-nowrap', render: function(data, type, row, meta) {
                        let randomImages = [
                            'http://localhost:8000/assets/img/elements/18.jpg',
                            'http://localhost:8000/assets/img/elements/1.jpg',
                            'http://localhost:8000/assets/img/elements/2.jpg',
                            'http://localhost:8000/assets/img/elements/3.jpg',
                            'http://localhost:8000/assets/img/elements/4.jpg',
                            'http://localhost:8000/assets/img/elements/5.jpg',
                            'http://localhost:8000/assets/img/elements/11.jpg',
                            'http://localhost:8000/assets/img/elements/7.jpg',
                            'http://localhost:8000/assets/img/elements/13.jpg',
                            'http://localhost:8000/assets/img/elements/12.jpg',
                        ];
                        let randomItem = randomImages[Math.floor(Math.random() * randomImages.length)];

                        let product = `
                        <div class="d-flex align-items-center w-100 gap-3">
                            <div>
                                <img src="${ randomItem }" class="rounded" style="width: 64px; height: 64px;" />
                            </div>
                            <div>
                                <div class="text-dark"><b>${ row.product_name }</b></div>
                                <div class="text-muted">${ row.category.category_name }</div>
                            </div>
                        </div>`;

                        return product;
                    }},
	                { "data": "price", 'class': 'text-nowrap text-start', render: function(data, type, row, meta) {
                        return formatRupiah(row.price);
                    }},
	                { "data": "created_at", 'class': 'text-nowrap text-start', render: function(data, type, row, meta) {
                        return formatDateTime(row.created_at);
                    }},
	                { "data": "updated_at", 'class': 'text-nowrap text-start', render: function(data, type, row, meta) {
                        return formatDateTime(row.updated_at);
                    }},
	                { "data": "aksi", 'class': 'text-nowrap', render: function(data, type, row, meta) {
                        let urlEdit = `{{ url('dashboard/products/edit/${row.id}') }}`;

                        return `
                            <div class="d-flex gap-2">
                                <a href="${urlEdit}" class="btn btn-primary ps-12 pe-12">
                                    <i class="bx bx-pencil"></i>
                                </a>
                                <button type="button" class="btn btn-danger ps-12 pe-12">
                                    <i class="bx bx-trash-alt"></i>
                                </button>
                            </div>
                        `;
                    }},
	            ],
	        });
	        // end datatable
        }

        $(document).ready(function() {
            getData();
        });
    </script>
@endpush