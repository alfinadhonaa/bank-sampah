@extends('layouts.template')

@section('title') {{ 'Jenis Sampah' }} @endsection

@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
<div class="col-xl-7 col-lg-7">
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Transaksi Sampah</h6>
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

<div class="col-xl-5 col-lg-7">
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
                            <th>Jenis</th>
                            <th>Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $no = 1 @endphp
                        @foreach ($jenis as $jenis)
                        <tr>
                            <th scope="row">{{ $no }}</th>
                            <td>{{ $jenis->nama }}</td>
                            <td>{{ $jenis->harga }}</td>
                          </tr>
                          @php $no += 1 @endphp
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th width="5%">No</th>
                            <th>Jenis</th>
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
