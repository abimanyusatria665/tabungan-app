<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
    <h1>Hello, world!</h1>
    <form method="post" action="/create/store">
        @csrf
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Tabungan Awal</label>
          <input type="text" id="rupiah" class="form-control"  aria-describedby="emailHelp" name="saving">
          <label for="exampleInputEmail1" class="form-label">Nama</label>
          <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name">
          <label for="exampleInputEmail1" class="form-label">NIS</label>
          <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="nis">
          <label for="exampleInputEmail1" class="form-label">ROMBEL</label>
          <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="rombel">
         
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script type="text" src="{{url('assets/index.js')}}"></script>  
  </body>
</html>