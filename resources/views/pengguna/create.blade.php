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
            <form method="post" action="{{ route('pengguna.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                  <label for="nama" class="form-label">Nama Jenis</label>
                  <select name="jenis_sampah" id="jenis_sampah" class="form-control" required>
                    <option value="">Pilih Jenis Sampah</option>
                    @foreach ($jenis as $key)
                    <option value="{{ $key->id_jenis }}" data-harga="{{ $key->harga }}">{{ $key->nama }}</option>
                    @endforeach
                </select>
                </div>
                <div class="mb-3">
                    <label for="harga" class="form-label">Harga</label>
                    <input type="text" class="form-control" id="harga" name="harga" readonly>
                    <div id="text" class="form-text">**harga diatas merupakan harga per kg</div>
                  </div>
                  <div class="mb-3">
                    <label for="berat" class="form-label">Berat</label>
                    <input type="text" class="form-control" id="berat" name="berat">
                  </div> 
                  <div class="mb-3">
                    <label for="total" class="form-label">Total</label>
                    <input type="text" class="form-control" id="total" name="total" readonly>
                  </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
        </div>
    </div>
</div>

@endsection

<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
// Mendengarkan perubahan dalam elemen select
        document.getElementById("jenis_sampah").addEventListener("change", function() {
        // Mendapatkan elemen select yang dipilih
        var select = document.getElementById("jenis_sampah");
        var selectedOption = select.options[select.selectedIndex];

        // Mengisi nilai harga berdasarkan data yang tersedia dalam atribut "data-harga"
        document.getElementById("harga").value = selectedOption.getAttribute("data-harga");
    });

    $("#harga, #berat").keyup(function() {
            var harga  = $("#harga").val();
            var berat = $("#berat").val();

            var total = parseInt(harga) * parseInt(berat);
            $("#total").val(total);
        });

});
</script>
