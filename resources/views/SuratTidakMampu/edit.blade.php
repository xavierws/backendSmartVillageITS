<!-- edit.blade.php -->
<!DOCTYPE html>
<html>
<head>
   <meta charset="UTF-8">
   <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
   <title>Ubah Surat Tidak Mampu</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4 text-center">
                <h1>Pengubahan Item</h1>
                <h1>Surat Tidak Mampu</h1>
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

        <form method="post" action="{{action('ShowSuratTidakMampu@update', $id)}}">
            {{csrf_field()}}
            <input name="_method" type="hidden" value="PATCH">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <label for="siswa_id">ID Siswa</label>
                    <input type="number" class="form-control" name="siswa_id" value="{{$data->siswa_id}}">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <label for="sekolah">Sekolah</label>
                    <input type="text" class="form-control" name="sekolah" value="{{$data->sekolah}}">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <label for="layanan_surat_id">ID Layanan Surat</label>
                    <input type="number" class="form-control" name="layanan_surat_id" value="{{$data->layanan_surat_id}}">
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