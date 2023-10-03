<table id="tbl-produk" class="table table-compact table stripped">
    <thead>
        <tr>
            <th>No.</th>
            <th>Nama Produk</th>
            <th>Tools</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($produk as $p)
            <tr>
                <td>{{ $i = !isset($i) ? ($i = 1) : ++$i }}</td>
                <td>{{ $p->nama_produk }}</td>
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
    </tbody>
</table>
