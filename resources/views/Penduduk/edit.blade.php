<!-- edit.blade.php -->
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Ubah Penduduk</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4 text-center">
                <h1>Pengubahan Item</h1>
                <h1>Penduduk</h1>
            </div>
        </div>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div><br />
        @endif

        <form method="post" action="{{action('ShowPenduduk@update', $id)}}">
            {{csrf_field()}}
            <input name="_method" type="hidden" value="PATCH">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <label for="nik">NIK</label>
                    <input type="number" class="form-control" name="nik" value="{{$data->nik}}">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" name="nama" value="{{$data->nama}}">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <label for="jenisKelamin">Jenis Kelamin</label>
                    <input type="text" class="form-control" name="jenisKelamin" value="{{$data->jenisKelamin}}">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <label for="tempatLahir">Tempat Lahir</label>
                    <input type="text" class="form-control" name="tempatLahir" value="{{$data->tempatLahir}}">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <label for="tanggalLahir">Tanggal Lahir</label>
                    <input type="date" class="form-control" name="tanggalLahir" value="{{$data->tanggalLahir}}">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <label for="agama">Agama</label>
                    <input type="text" class="form-control" name="agama" value="{{$data->agama}}">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <label for="pendidikan">Pendidikan</label>
                    <input type="text" class="form-control" name="pendidikan" value="{{$data->pendidikan}}">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <label for="jenisPekerjaan">Jenis Pekerjaan</label>
                    <input type="text" class="form-control" name="jenisPekerjaan" value="{{$data->jenisPekerjaan}}">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <label for="golDarah">Gol. Darah</label>
                    <input type="text" class="form-control" name="golDarah" value="{{$data->golDarah}}">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <label for="status_perkawinan">Status Perkawinan</label>
                    <input type="text" class="form-control" name="status_perkawinan" value="{{$data->status_perkawinan}}">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <label for="kewarganegaraan">Kewarganegaraan</label>
                    <input type="text" class="form-control" name="kewarganegaraan" value="{{$data->kewarganegaraan}}">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <label for="kartu_keluarga_id">ID KK</label>
                    <input type="number" class="form-control" name="kartu_keluarga_id" value="{{$data->kartu_keluarga_id}}">
                </div>
            </div>

            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4 text-center">
                    <a href="../create" class="btn btn-danger ">Batal</a></td>
                    <button type="submit" class="btn btn-success" style="margin-left: 38px">Update Item</button>
                </div>
            </div>
    </div>
    </form>
    </div>
</body>

</html>