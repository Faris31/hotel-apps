@extends('app')
@section('title', 'Reservation')
@section('content')

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">{{ $title ?? '' }}</h3>
                <div align="right" class="mb-3">
                    <a href="{{route('reservation.create')}}" class="btn btn-primary">Tambah Reservasi</a>
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr class="text-center ">
                            <th>No</th>
                            <th>Kamar</th>
                            <th>No Reservasi</th>
                            <th>Tamu</th>
                            <th>Check-In</th>
                            <th>Check-Out</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datas as $index => $data )
                        <tr class="text-center align-content-center">
                            <td>{{$index += 1 }}</td>
                            <td>{{$data->room->name}}</td>
                            <td>{{$data->reservation_number}}</td>
                            <td align="left">
                                <small>
                                    Nama : {{$data->guest_name}}
                                    <br>
                                    Email : {{$data->guest_email}}
                                    <br>
                                    Tlp : {{$data->guest_phone}}
                                </small>
                            </td>
                            <td>{{$data->guest_checkin}}</td>
                            <td>{{$data->guest_checkout}}</td>
                           <td><span class="{{ $data->isReserved_class }}">{{ $data->isReserved_text }}</span></td>
                            <td>
                                <a href="{{route('reservation.edit', $data->id)}}" class="btn btn-success">Edit</a>
                                <form action="{{route('reservation.destroy', $data->id)}}" method="post" class="d-inline">
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