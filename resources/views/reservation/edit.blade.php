@extends('app')
@section('title', 'Ubah Data Tamu')
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
                <form action="{{ route('guest.update', $edit->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="mb-3">
                            <label for="" class="form-label">Nama Tamu *</label>
                            <input type="text" class="form-control" name="nama_tamu" placeholder="silahkan masukan nama tamu" required value="{{ $edit->nama_tamu }}">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Check-In *</label>
                            <input type="date" class="form-control" name="check_in" required value="{{ $edit->check_in }}">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Check-Out *</label>
                            <input type="date" class="form-control" name="check_out" required value="{{ $edit->check_out }}">
                        </div>
                        <div class="mb-3">
                            <label for="form-label">Nomor Kamar *</label>
                            <select name="no_kamar" id="" class="form-select">
                                <option value="">-- Pilih Kamar --</option>
                                <option value="A01" <?=$edit->no_kamar == 'A01' ? 'selected' : ''?>>A01</option>
                                <option value="A02" <?=$edit->no_kamar == 'A02' ? 'selected' : ''?>>A02</option>
                                <option value="A03" <?=$edit->no_kamar == 'A03' ? 'selected' : ''?>>A03</option>
                                <option value="A04" <?=$edit->no_kamar == 'A04' ? 'selected' : ''?>>A04</option>
                                <option value="A05" <?=$edit->no_kamar == 'A05' ? 'selected' : ''?>>A05</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Email *</label>
                            <input type="email" class="form-control" name="email" placeholder="silahkan masukan email" required value="{{ $edit->email }}">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">No Telepon *</label>
                            <input type="number" class="form-control" name="no_tlp" placeholder="silahkan masukan no telepon" required value="{{ $edit->no_tlp }}">
                        </div>
                        <div class="mb-3">
                            <label for="form-label">Status Tamu *</label>
                            <select name="status_tamu" id="" class="form-select">
                                <option value="">-- Pilih Status --</option>
                                @foreach ($categories as $category)
                                <option {{ $category->name == $edit->status_tamu ? 'selected' : '' }} value="{{ $category->name }}"> {{ $category->name }} </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="">Alamat Tamu *</label>
                            <textarea name="alamat_tamu" id="" cols="30" rows="10" class="form-control">{{ $edit->alamat_tamu }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="">Kebutuhan Khusus *</label> <br>

                            {{-- Radio Button --}}
                            <input type="radio" name="statusnya" id="ada" onclick="toggleInput(true)" 
                                {{ $edit->kebutuhan_khusus ? 'checked' : '' }}>
                            <label for="ada">Ada</label>

                            <input type="radio" name="statusnya" id="tidak" onclick="toggleInput(false)" 
                                {{ !$edit->kebutuhan_khusus ? 'checked' : '' }}>
                            <label for="tidak">Tidak Ada</label>

                            {{-- Text Input --}}
                            <input 
                                type="text" 
                                name="kebutuhan_khusus" 
                                class="form-control mt-2" 
                                id="kebutuhan_khusus" 
                                value="{{ $edit->kebutuhan_khusus ?? '' }}" 
                                style="display: {{ $edit->kebutuhan_khusus ? 'block' : 'none' }}">
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