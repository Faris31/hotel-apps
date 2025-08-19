<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Belajar Laravel</title>
</head>
<body>
    <h1>Tambah Data</h1>
    <form action="{{route('store_tambah')}}" method="POST">
       @csrf
        <label for="">Angka 1</label>
        <input type="number" name="angka1" placeholder="Masukan angka">
        <br><br>
        <label for="">Angka 2</label>
        <input type="number" name="angka2" placeholder="Masukan angka">
        <br><br>
        <button type="submit">Prosess</button>
        <a href="{{ url()->previous() }}">Kembali</a>

    </form>

    <h3>Jumlahnya : {{$jumlah ?? '0'}} </h3>
</body>
</html>