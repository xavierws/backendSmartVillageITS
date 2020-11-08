<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
   
   <title>Input Surat Kematian</title>
</head>
<body>
   <div class="container">
      <br>
      <div class="row">
         <div class="col-md-4"></div>
         <div class="col-md-4">
            <h1>Surat Kematian</h1>
         </div>
      </div>
      <br>
      <div class="row"> 
         <div class="col-md-4">
            <form method="POST" action="{{url('data/SuratKematian')}}">
            {{csrf_field()}}
               <div class="text-center">
                  <h2>Input</h2>
               </div>   

               
               <div class="form-group">
                  <label for="tanggal">Tanggal</label>
                  <input type="date" class="form-control" name="tanggal">
               </div>
               <div class="form-group">
                  <label for="tempat">Tempat</label>
                  <input type="text" class="form-control" name="tempat">
               </div>
               <div class="form-group">
                  <label for="penyebab">Penyebab</label>
                  <input type="text" class="form-control" name="penyebab">
               </div>
               <div class="form-group">
                  <label for="terlapor_id">ID Terlapor</label>
                  <input type="number" class="form-control" name="terlapor_id">
               </div>
               <div class="form-group">
                  <label for="kependudukan_id">ID Kependudukan</label>
                  <input type="number" class="form-control" name="kependudukan_id">
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
                     <th>Tanggal</th>
                     <th>Tempat</th>
                     <th>Penyebab</th>
                     <th>ID Terlapor</th>
                     <th>ID Kependudukan</th>
                     <th colspan="2">Action</th>
                  </tr>
               </thead>
               <tbody>
                  @foreach($dataTabel as $data)
                  <tr>
                     <td>{{$data['id']}}</td>
                     <td>{{$data['tanggal']}}</td>
                     <td>{{$data['tempat']}}</td>
                     <td>{{$data['penyebab']}}</td>
                     <td>{{$data['terlapor_id']}}</td>
                     <td>{{$data['kependudukan_id']}}</td>
                     <td><a href="{{action('ShowSuratKematian@edit', $data['id'])}}" class="btn btn-primary btn-block">Edit</a></td>
                     <td>
                        <form action="{{action('ShowSuratKematian@destroy', $data['id'])}}" method="post">
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