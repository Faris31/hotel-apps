@extends('app')
@section('title', 'Ubah Kamar')
@section('content')

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">{{ $title ?? '' }}</h3>
                <form action="{{ route('room.update', $edit->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="mb-3">
                            <label for="" class="form-label">Kategori Kamar *</label>
                            <select name="category_id" id="" class="form-control">
                                <option value="">Pilih Kategori Kamar</option>
                                @foreach ($categories as $category )
                                    <option {{$category->id == $edit->category_id ? 'selected' : '' }} value="{{ $category->id }}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Nama Kamar *</label>
                            <input type="text" class="form-control" name="name" placeholder="silahkan masukan nama kamar" required value="{{ $edit->name ?? '' }}">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Harga *</label>
                            <input type="number" class="form-control" name="price" placeholder="silahkan masukan harga kamar" required value="{{ $edit->price ?? '' }}">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Facility *</label>
                            <textarea name="facility" id="" cols="30" rows="10" class="form-control" required value="{{ $edit->facility ?? '' }}"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Deskripsi *</label>
                            <textarea name="description" id="" cols="30" rows="10" class="form-control" required value="{{ $edit->description ?? '' }}"></textarea>
                        </div>
                        <div class="mb-4">
                            <label for="" class="form-label">Gambar *</label>
                            <input type="file" name="image_cover" class="form-control mb-3" required >
                            <img width="200" class="rounded-3" src="{{ asset('storage/'. $edit->image_cover ?? '')  }}" alt="">
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-primary" type="submit" name="simpan">Submit</button>
                            <a href="{{url()->previous()}}" class="text-muted">Kembali</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection