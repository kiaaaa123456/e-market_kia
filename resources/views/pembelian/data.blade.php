<table id="tbl-pemasok" class="table table-compact table stripped">
    <a href="{{ route('exportpembelian') }}" class="btn btn-success">
        <i class="fa fa-file-excel"></i>Export
    </a>
    <a href="{{ url('downloadpdf') }}" target="_blank" class="btn btn-danger">
        <i class="fa fa-file-pdf"></i>PDF
    </a>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal">
        <i class="fas fa-file-excel">Import</i>
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('importpembelian') }}" method="POST" enctype="multipart/form-data">
                        <div class="modal-body">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <input type="file" name="file" required="requuired">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Selesai</button>
                            <button type="submit" class="btn btn-primary">Import</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <thead>
        <tr>
            <th>No.</th>
            <th>Kode Masuk</th>
            <th>Tanggal Masuk</th>
            <th>Total</th>
            <th>Nama Pemasok</th>
            <th>User</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($pembelian as $p)
            <tr>
                <td>{{ $i = !isset($i) ? ($i = 1) : ++$i }}</td>
                <td>{{ $p->kode_masuk }}</td>
                <td>{{ $p->tanggal_masuk }}</td>
                <td>{{ $p->total }}</td>
                <td>{{ $p->nama_pemasok }}</td>
                <td>{{ $p->name }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
<script>
    // $(function() {
    //     $('#tbl-produk').DataTable()

    //     //dialog hapus data
    //     $('.btn-delete').on('click', function(e) {
    //         let nama_produk = $(this).closest('tr').find('')
    //     })
    // // })
</script>
