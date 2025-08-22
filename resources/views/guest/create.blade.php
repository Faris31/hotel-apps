@extends('app')
@section('title', 'Tambah Data Tamu')
@section('content')

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                @foreach ($errors->all() as $i )
                    <ul style="background-color: red">
                        <li>{{ $i }}</li>
                    </ul>                    
                @endforeach
                    
                <h3 class="card-title">{{ $title ?? '' }}</h3>
                <form action="{{ route('guest.store') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="mb-3">
                            <label for="" class="form-label">Nama Tamu *</label>
                            <input type="text" class="form-control" name="nama_tamu" placeholder="silahkan masukan nama tamu" required>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Check-In *</label>
                            <input type="date" class="form-control" name="check_in" required>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Check-Out *</label>
                            <input type="date" class="form-control" name="check_out" required>
                        </div>
                        <div class="mb-3">
                            <label for="form-label">Nomor Kamar *</label>
                            <select name="no_kamar" id="" class="form-select">
                                <option value="">-- Pilih Kamar --</option>
                                <option value="A01">A01</option>
                                <option value="A02">A02</option>
                                <option value="A03">A03</option>
                                <option value="A04">A04</option>
                                <option value="A05">A05</option>

                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Email *</label>
                            <input type="email" class="form-control" name="email" placeholder="silahkan masukan email" required>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">No Telepon *</label>
                            <input type="number" class="form-control" name="no_tlp" placeholder="silahkan masukan no telepon" required>
                        </div>
                        <div class="mb-3">
                            <label for="form-label">Status Tamu *</label>
                            <select name="status_tamu" id="" class="form-select">
                                <option value="">-- Pilih Status --</option>
                                @foreach ($categories as $category)
                                <option value="{{ $category->name }}"> {{ $category->name }} </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="">Alamat Tamu *</label>
                            <textarea name="alamat_tamu" id="" cols="30" rows="10" class="form-control"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="">Kebutuhan Khusus *</label> <br>
                            <input type="radio" name="statusnya" id="ada" onclick="toggleInput(true)"> Ada
                            <input type="radio" name="statusnya" id="tidak" onclick="toggleInput(false)"> Tidak Ada
                            <input type="text" name="kebutuhan_khusus" style="display: none" class="form-control"
                            id="kebutuhan_khusus">
                        </div>
                        <script>
                            function toggleInput(show){
                                const kebutuhan_khusus = document.querySelector('#kebutuhan_khusus');

                                kebutuhan_khusus.style.display = show ? 'block' : 'none';
                            }
                        </script>
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