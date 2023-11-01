@extends('layouts.template')

@section('title') {{ 'Jenis Sampah' }} @endsection

@section('content')

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Jenis Sampah</h6>
            <div class="box-header with-border">
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
                            <th>Gambar</th>
                            <th>Nama</th>
                            <th>Deskripsi</th>
                            <th>Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $no = 1 @endphp
                        @foreach ($jenis as $jenis)
                        <tr>
                            <th scope="row">{{ $no }}</th>
                            <td><img src="{{ asset ('storage/jenis/'. $jenis->foto) }}"  style="width:150px;display: block;margin: 0 auto;" class="img-fluid"></td>
                            <td>{{ $jenis->nama }}</td>
                            <td>{{ $jenis->deskripsi }}</td>
                            <td>{{ $jenis->harga }}</td>
                          </tr>
                          @php $no += 1 @endphp
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th width="5%">No</th>
                            <th>Gambar</th>
                            <th>Nama</th>
                            <th>Deskripsi</th>
                            <th>Harga</th>
                        </tr>
                    </tfoot>
                </table>
            </form>
            </div>
        </div>
    </div>
</div>

@endsection