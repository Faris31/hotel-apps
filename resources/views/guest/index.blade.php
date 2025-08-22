@extends('app')
@section('title', 'Data Tamu')
@section('content')

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">{{ $title ?? '' }}</h3>
                <div align="right" class="mb-3">
                    <a href="{{route('guest.create')}}" class="btn btn-primary">Tambah Tamu</a>
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr class="text-center ">
                            <th>No</th>
                            <th>Nama Tamu</th>
                            <th>Tanggal Check-In & Check-Out</th>
                            <th>Nomor Kamar</th>
                            <th>Kontak Tamu</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datas as $index => $data )
                        <tr class="text-center align-content-center">
                            <td>{{$index += 1 }}</td>
                            <td>{{$data->nama_tamu}}</td>
                            <td>{{$data->check_in}} - {{ $data->check_out }}</td>
                            <td>{{$data->no_kamar}}</td>
                            <td>{{$data->no_tlp}} - {{ $data->email }}</td>
                            <td>
                                <a href="{{route('guest.edit', $data->id)}}" class="btn btn-success">Edit</a>
                                <form action="{{route('guest.destroy', $data->id)}}" method="post" class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection