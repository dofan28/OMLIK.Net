<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Data Pembayaran WIFI</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

{{--  <body style="background: lightgray">  --}}

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <form action="{{ route('pembayaran.update', $pembayaran->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')


                            <div class="form-group">
                                <label class="font-weight-bold">Nama</label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                    name="nama" value="{{ old('nama', $pembayaran->nama) }}"
                                    placeholder="Masukkan Nama pembayaran">

                                <!-- error message untuk nama -->
                                @error('nama')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label class="font-weight-bold" for="bulan">Bulan</label>
                                <select class="form-control @error('bulan') is-invalid @enderror" id="bulan"
                                    name="bulan" value="{{ old('bulan', $pembayaran->bulan) }}">
                                    <option value="Januari">Januari</option>
                                    <option value="Februari">Februari</option>
                                    <option value="Maret">Maret</option>
                                    <option value="April">April</option>
                                    <option value="Mei">Mei</option>
                                    <option value="Juni">Juni</option>
                                    <option value="Juli">Juli</option>
                                    <option value="Agustus">Agustus</option>
                                    <option value="September">September</option>
                                    <option value="Oktober">Oktober</option>
                                    <option value="November">November</option>
                                    <option value="Desember">Desember</option>
                                </select>

                                <!-- error message untuk bulan -->
                                @error('bulan')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Tahun</label>
                                <input type="text" class="form-control @error('tahun') is-invalid @enderror"
                                    name="tahun" value="{{ old('tahun', $pembayaran->tahun) }}"
                                    placeholder="Masukkan Tahun pembayaran">

                                <!-- error message untuk tahun -->
                                @error('tahun')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Nominal</label>
                                <input type="text" class="form-control @error('nominal') is-invalid @enderror"
                                    name="nominal" value="{{ old('nominal', $pembayaran->nominal) }}"
                                    placeholder="Masukkan Nominal pembayaran">

                                <!-- error message untuk nominal -->
                                @error('nominal')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>



                            <div class="form-group">
                                <label class="font-weight-bold">Tanggal Bayar</label>
                                <input type="date" class="form-control @error('tgl_bayar') is-invalid @enderror"
                                    name="tgl_bayar" value="{{ old('tgl_bayar', $pembayaran->tgl_bayar) }}"
                                    placeholder="Masukkan Tanggal Bayar pembayaran">

                                <!-- error message untuk tgl_bayar -->
                                @error('tgl_bayar')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="status" class="font-weight-bold">Status</label>
                                <select class="form-control @error('status') is-invalid @enderror" id="status"
                                    name="status" value="{{ old('status', $pembayaran->status) }}">
                                    <option value="Lunas">Lunas</option>
                                    <option value="Belum Lunas">Belum Lunas</option>
                                </select>

                                <!-- error message untuk status -->
                                @error('status')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-md btn-primary">Update</button>
                            <button type="reset" class="btn btn-md btn-warning">Reset</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
    <script></script>
</body>

</html>
