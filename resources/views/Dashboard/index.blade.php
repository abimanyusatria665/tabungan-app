<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <title>Document</title>
</head>
<body>
    <div class="container">
    <table class="table table-striped">
        <tr>
            <th>Money</th>
            <th>Date</th>
            <th>Name</th>
            <th>Nis</th>
            <th>Rombel</th>
        </tr>
        {{-- melakukan pengulangan data baris yang di panggil dalam tabel database --}}
        @foreach ($saving as $save)
        <tr>
            <td>{{ $save['saving'] }} <a href="/setor/{{ $save->id }}" class="btn btn-danger px-1">Menabung</a><a href="/tarik/{{ $save->id }}" class="btn btn-danger px-1">Tarik Tabungan</a></td>
            <td>{{ $save['date_save'] }}</td>
            <td>{{ $save['name'] }}</td>
            <td>{{ $save['nis'] }}</td>
            <td>{{ $save['rombel'] }}</td>
            <td><a class="btn btn-danger" href="/delete/{{ $save->id}}"><i class="fa-solid fa-trash mx-2"></i>Delete</a>
        </tr>
        @endforeach
        <h1 class="text-center">{{$saving->count()}}</h1>
        <p class="text-center">{{"Rp " . number_format($money,2,',','.') }}</p>
        </table>
    <a href="/create" class="btn btn-primary">Tambah Data Siswa</a>
   
</div>
</body>
</html>