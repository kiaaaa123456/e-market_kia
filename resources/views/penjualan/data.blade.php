<table id="tbl-penjualan" class="table table-bordered table-stripped table-hover table-sm">
    <thead>
        <tr>
            <th style="width: 10px;">No</th>
            <th>No Faktur</th>
            <th>Tangal Faktur</th>
            <th>Total Bayar</th>
            <th>Pelanggan ID</th>
            <th>User ID</th>
            <th>Tools</th>
        </tr>
    </thead>
    {{-- <tbody>
        @foreach ($penjualan as $p)
            <tr>
                <td>{{ $i = !isset($i) ? ($i = 1) : ++$i }}</td>
                <td>{{ $p->no_faktur }}</td>
                <td>{{ $p->tgl_faktur }}</td>
                <td>{{ $p->total_bayar }}</td>
                <td>{{ $p->pelanggan_id }}</td>
                <td>{{ $p->user_id }}</td>
                <td>
                    <button class="btn" data-toggle="modal" data-target="#modalFormProduk" data-mode="edit"
                        data-id="{{ $p->id }}" data-nama_produk="{{ $p->nama_produk }}">
                        <i class="fas fa-edit text-success"></i>
                    </button>
                    <form method="post" action="{{ route('produk.destroy', $p->id) }}" style="display: inline">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn delete-data" data-nama-produk="{{ $p->nama_produk }}">
                            <i class="fas fa-trash text-danger"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody> --}}
</table>
