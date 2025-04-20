@extends('layouts.app-dashboard')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Ini nama menunya biasanya</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <form method="post" spellcheck="false">
                        @csrf
                        <div class="mb-3">
                            <label class="col-form-label" for="username">Username</label>
                            <input type="text" id="username" name="username" class="form-control" placeholder="Masukkan Username">
                        </div>

                        <div class="mb-3">
                            <label class="col-form-label" for="password">Password</label>
                            <input type="password" id="password" name="password" class="form-control" placeholder="Masukkan Password">
                        </div>

                        <div class="mb-3">
                            <label class="col-form-label" for="type">Type</label>
                            <select name="type" id="type" class="form-select">
                                <option value="1">Satu</option>
                                <option value="2">Dua</option>
                                <option value="3">Tiga</option>
                                <option value="4">Empat</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="col-form-label" for="keterangan">Keterangan</label>
                            <textarea name="keterangan" id="keterangan" class="form-control" rows="4" placeholder="Masukkan Keterangan"></textarea>
                        </div>

                        <button type="button" class="btn btn-primary">Submit</button>
                        <button type="button" class="btn btn-success">Submit</button>
                        <button type="button" class="btn btn-info">Submit</button>
                        <button type="button" class="btn btn-danger">Submit</button>
                    </form>
                </div>
                <div class="col-6">

                </div>
            </div>

            <div class="mt-5"></div>

            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#my-modal">Show Modal</button>

            <div class="mt-5"></div>

            <table class="table" id="my-table" style="width: 100%;">
                <thead>
                    <tr>
                        <th width="50px">No</th>
                        <th>Produk</th>
                        <th>Total Terjual</th>
                        <th>Tanggal Dibuat</th>
                        <th>Tanggal Diupdate</th>
                        <th width="250px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @for ($i = 1; $i <=20; $i++)
                        <tr>
                            <td class="text-center">{{ $i }}</td>
                            <td>Produk {{$i}}</td>
                            <td>{{ rand(10,20) }} Pcs</td>
                            <td>03-01-2025 18:20</td>
                            <td></td>
                            <td class="text-center">
                                <button type="button" class="btn btn-primary me-1">Edit</button>
                                <button type="button" class="btn btn-danger">Delete</button>
                            </td>
                        </tr>
                    @endfor
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('modal')
    <div class="modal fade" id="my-modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Modal Title</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">

                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
<script>
    $(document).ready(function() {
        $('#my-table').DataTable();
    });
</script>
@endpush