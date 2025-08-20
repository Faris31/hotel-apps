@extends('app')
@section('title', 'Data Kamar')
@section('content')

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">{{ $title ?? '' }}</h3>
                <div align="right" class="mb-3">
                    <a href="{{route('room.create')}}" class="btn btn-primary">Tambah Kamar</a>
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr class="text-center ">
                            <th>No</th>
                            <th>Foto</th>
                            <th>Kategori</th>
                            <th>Nama</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datas as $index => $data )
                        <tr class="text-center align-content-center">
                            <td>{{ $index += 1 }}</td>
                            <td>{{ $data->name }}</td>
                            <td>{{ $data->category->name }}</td>
                            <td>{{ $data->name }}</td>
                            <td>{{ number_format($data->price) }}</td>
                            <td>
                                <a href="{{route('room.edit', $data->id)}}" class="btn btn-success">Edit</a>
                                <form action="{{route('room.destroy', $data->id)}}" method="post" class="d-inline">
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