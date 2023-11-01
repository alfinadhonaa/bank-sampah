@extends('layouts.template')

@section('title') {{ 'Dashboard' }} @endsection

@section('content')

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Tambah Jenis Sampah</h6>
            {{-- <div class="box-header with-border">
    
            </div> --}}
        </div>
        <div class="card-body">
            <form method="post" action="{{ route('jenis.update', $jenis->id_jenis) }}" enctype="multipart/form-data">
              @method('PUT')
                @csrf
                <div class="mb-3">
                  <label for="nama" class="form-label">Nama Jenis</label>
                  <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama', $jenis->nama)}}">
                </div>
                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3">{{ old('deskrisi', $jenis->deskripsi)}}</textarea>
                </div>
                <div class="mb-3">
                    <label for="harga" class="form-label">Harga</label>
                    <input type="text" class="form-control" id="harga" name="harga" value="{{ old('harga', $jenis->harga)}}">
                  </div>
                  <div class="mb-3">
                    <label for="foto" class="form-label">Gambar</label>
                    <input type="file" class="form-control" id="foto" name="foto" accept=".png, .jpg, .jpeg" value="{{ old('foto', $jenis->foto)}}">
                    <img class="img-fluid " src="{{ asset ('storage/jenis/'. $jenis->foto) }}" style="height:100px">
                  </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
        </div>
    </div>
</div>

@endsection