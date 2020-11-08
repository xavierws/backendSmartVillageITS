<!-- edit.blade.php -->
<!DOCTYPE html>
<html>
<head>
   <meta charset="UTF-8">
   <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
   <title>Ubah Kartu Keluarga</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4 text-center">
                <h1>Pengubahan Item</h1>
                <h1>Kartu Keluarga</h1>
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

        <form method="post" action="{{action('ShowKartuKeluarga@update', $id)}}">
            {{csrf_field()}}
            <input name="_method" type="hidden" value="PATCH">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <label for="noKK">Nomor KK</label>
                    <input type="number" class="form-control" name="noKK" value="{{$data->noKK}}">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <label for="kepalaKeluarga">Kepala Keluarga</label>
                    <input type="text" class="form-control" name="kepalaKeluarga" value="{{$data->kepalaKeluarga}}">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <label for="alamat">Alamat</label>
                    <input type="text" class="form-control" name="alamat" value="{{$data->alamat}}">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <label for="rt">Nomor RT</label>
                    <input type="number" class="form-control" name="rt" value="{{$data->rt}}">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <label for="rw">Nomor RW</label>
                    <input type="number" class="form-control" name="rw" value="{{$data->rw}}">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <label for="kodePos">Kode Pos</label>
                    <input type="number" class="form-control" name="kodePos" value="{{$data->kodePos}}">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <label for="desa">Desa</label>
                    <input type="text" class="form-control" name="desa" value="{{$data->desa}}">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <label for="kecamatan">Kecamatan</label>
                    <input type="text" class="form-control" name="kecamatan" value="{{$data->kecamatan}}">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <label for="kota">Kota</label>
                    <input type="text" class="form-control" name="kota" value="{{$data->kota}}">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <label for="provinsi">Provinsi</label>
                    <input type="text" class="form-control" name="provinsi" value="{{$data->provinsi}}">
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