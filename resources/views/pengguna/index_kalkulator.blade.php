@extends('layouts.template')

@section('title') {{ 'Jenis Sampah' }} @endsection

@section('content')

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Bank Sampah</h6>
            <div class="box-header with-border">
                <a href="/pengguna/create">
                    <button type="button" class="btn btn-primary">Tambah</button>
                </a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <form action="" method="post" class="form-jenis">
                @csrf
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th>Jenis Sampah</th>
                            <th>Harga</th>
                            <th>Berat</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $no = 1 @endphp
                        @foreach ($sampah as $sampah)
                        <tr>
                            <th scope="row">{{ $no }}</th>
                            <td>{{ $sampah->nama }}</td>
                            <td>{{ $sampah->harga }}</td>
                            <td>{{ $sampah->berat }} kg</td>
                            <td>{{ $sampah->total }}</td>
                          </tr>
                          @php $no += 1 @endphp
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th width="5%">No</th>
                            <th>Jenis Sampah</th>
                            <th>Harga</th>
                            <th>Berat</th>
                            <th>Total</th>
                        </tr>
                    </tfoot>
                </table>
            </form>
            </div>
        </div>
    </div>
</div>

@endsection