<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
   
   <title>Input Surat Tidak Mampu</title>
</head>
<body>
   <div class="container">
      <br>
      <div class="row">
         <div class="col-md-4"></div>
         <div class="col-md-4">
            <h1>Surat Tidak Mampu</h1>
         </div>
      </div>
      <br>
      <div class="row"> 
         <div class="col-md-4">
            <form method="POST" action="{{url('data/SuratTidakMampu')}}">
            {{csrf_field()}}
               <div class="text-center">
                  <h2>Input</h2>
               </div>   

               
               <div class="form-group">
                  <label for="siswa_id">ID Siswa</label>
                  <input type="number" class="form-control" name="siswa_id">
               </div>
               <div class="form-group">
                  <label for="sekolah">Sekolah</label>
                  <input type="text" class="form-control" name="sekolah">
               </div>
               <div class="form-group">
                  <label for="layanan_surat_id">ID Layanan Surat</label>
                  <input type="number" class="form-control" name="layanan_surat_id">
               </div>
               
               <div class="form-group">
                  <div class="text-center">
                     <button type="submit" class="btn btn-success">Tambahkan</button>
                  </div>
               </div>
               
               @if ($errors->any())
               <div class="alert alert-danger">
                  <ul>
                     @foreach ($errors->all() as $error)
                     <li>{{ $error }}</li>
                     @endforeach
                  </ul>
               </div>
               <br>
               @endif
               @if (\Session::has('success'))
                  <div class="alert alert-success">
                     <p>{{ \Session::get('success') }}</p>
                  </div>
               <br>
               @endif
               @if (\Session::has('delete'))
                  <div class="alert alert-danger">
                     <p>{{ \Session::get('delete') }}</p>
                  </div>
               <br>
               @endif
            </form>
         </div>
         <div class="col-md-8">
            <div class="text-center">
               <h2>Tabel</h2>
            </div>
            <table class="table table-striped">
               <thead>
                  <tr>
                     <th>ID</th>
                     <th>ID Siswa</th>
                     <th>Sekolah</th>
                     <th>ID Layanan Surat</th>
                     <th colspan="2">Action</th>
                  </tr>
               </thead>
               <tbody>
                  @foreach($dataTabel as $data)
                  <tr>
                     <td>{{$data['id']}}</td>
                     <td>{{$data['siswa_id']}}</td>
                     <td>{{$data['sekolah']}}</td>
                     <td>{{$data['layanan_surat_id']}}</td>
                     <td><a href="{{action('ShowSuratTidakMampu@edit', $data['id'])}}" class="btn btn-primary btn-block">Edit</a></td>
                     <td>
                        <form action="{{action('ShowSuratTidakMampu@destroy', $data['id'])}}" method="post">
                            {{csrf_field()}}
                            <input name="_method" type="hidden" value="DELETE">
                            <button onclick="return confirm('Yakin dihapus?');" class="btn btn-danger btn-block" type="submit">Delete</button>
                        </form>
                     </td>
                  </tr>
                  @endforeach
               </tbody>
            </table>
            
         </div>
      </div>

   </div>
</body>
</html>