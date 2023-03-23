<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>OMLIK.Net</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>

{{--  <body style="background: lightgray">  --}}

<div class="container mt-3">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow rounded">
                <div class="card-body">
                    <h2 class="text-center">OMLIK.Net</h2>
                    <h6 class="display-6 text-center">Data Pelanggan Pembayaran WIFI</h6>
                    <a href="{{ route('pembayaran.create') }}" class="btn btn-md btn-success mb-3">Tambahkan
                        Data</a>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Bulan</th>
                                <th scope="col">Tahun</th>
                                <th scope="col">Nominal</th>
                                <th scope="col">Tgl. Bayar</th>
                                <th scope="col">Status</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $nomor = 1 + ($pembayarans->currentPage() - 1) * $pembayarans->perPage();
                            @endphp
                            @forelse ($pembayarans as $pembayaran)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $pembayaran->nama }}</td>
                                    <td>{{ $pembayaran->bulan }}</td>
                                    <td>{{ $pembayaran->tahun }}</td>
                                    <td>{{ $pembayaran->nominal }}</td>
                                    <td>{{ $pembayaran->tgl_bayar }}</td>
                                    <td>{{ $pembayaran->status }}</td>
                                    <td class="text-center">
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                            action="{{ route('pembayaran.destroy', $pembayaran->id) }}" method="POST">
                                            <a href="{{ route('pembayaran.edit', $pembayaran->id) }}"
                                                class="btn btn-sm btn-primary">Edit</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <div class="alert alert-danger">
                                    Data Pembayaran WIFI belum Tersedia.
                                </div>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center">
                        {{ $pembayarans->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
    //message with toastr
    @if (session()->has('success'))

        toastr.success('{{ session('success') }}', 'Berhasil!');
    @elseif (session()->has('error'))

        toastr.error('{{ session('error') }}', 'Gagal!');
    @endif
</script>

</body>

</html>
