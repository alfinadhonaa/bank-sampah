@extends('layouts.template')

@section('title') {{ 'Jenis Sampah' }} @endsection

@section('content')

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Jenis Sampah</h6>
            <div class="box-header with-border">
                <a href="/jenis/create">
                    <button type="button" class="btn btn-primary">Tambah Jenis</button>
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
                            <th>Gambar</th>
                            <th>Nama</th>
                            <th>Deskripsi</th>
                            <th>Harga</th>
                            <th width="15%"><i class="fa fa-cog"></i></th>
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
                            <td>
                                <a href="/jenis/{{ $jenis->id_jenis }}/edit" class="btn btn-sm btn-warning">Edit</a>
                                <a href="#" class="btn btn-sm btn-danger" onclick="
                                        event.preventDefault();
                                        if (confirm('Do you want to remove this?')) {
                                          document.getElementById('{{ $jenis->id_jenis }}').submit();
                                        }">
                                        Delete
                                </a>
                                <form id="{{ $jenis->id_jenis }}" action="{{ route('jenis.destroy', $jenis->id_jenis) }}" method="POST">
                                    <input type="hidden" name="_method" value="DELETE">
                                    @csrf
                                </form>
                                <a href="/jenis/{{ $jenis->id_jenis }}" class="btn btn-sm btn-success">Detail</a>
                            </td>
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
                            <th width="15%"><i class="fa fa-cog"></i></th>
                        </tr>
                    </tfoot>
                </table>
            </form>
            </div>
        </div>
    </div>
</div>

@endsection