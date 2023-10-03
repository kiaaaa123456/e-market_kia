@extends('templates/layout')

@push('style')
@endpush

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">

                <!-- Default box -->
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header">
                            <strong>No Invoice:</strong>{{ request()->segment(2) }}
                            <br>
                            <h3 class="card-title">Penjualan</h3>
                        </div>
                        <div class="card-body">
                            <div class="mt-3">
                                @include('penjualan.data')
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <!-- /.card-footer-->
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <form action="/penjualan" method="POST">
                                @csrf
                                <div class="form-group">
                                    <input type="hidden" name="no_faktur" value="{{ request()->segment(2) }}">
                                    <input type="text" name="kode_barang" id="" class="form-control form-sm"
                                        autofocus placeholder="Masukan kode barang" required>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block btn-sm">Submit</button>
                                </div>
                            </form>
                            <hr>
                            <form action="" method="POST">
                                @csrf
                                <div class="form-group">
                                    <input type="text" name="" id="" class="form-control form-sm"
                                        placeholder="Total Pembayaran" readonly>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="" id="" class="form-control form-sm"
                                        placeholder=" Pembayaran">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="" id="" class="form-control form-sm"
                                        placeholder="Kembalian" readonly>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block btn-sm">Simpan
                                        Transaksi</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
    </script>
@endpush
