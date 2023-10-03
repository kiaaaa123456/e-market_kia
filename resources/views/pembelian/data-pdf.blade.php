<table id="tbl-pemasok" class="table table-stripped">
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
