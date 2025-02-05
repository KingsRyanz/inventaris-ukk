@extends('layouts.tamplate')

@section('content')
<div class="container">
    <h1>Tambah Opname</h1>
    <form action="{{ route('admin.opname.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="id_pengadaan" class="form-label">Pengadaan</label>
            <select class="form-control" id="id_pengadaan" name="id_pengadaan" required>
                <option value="">Pilih Pengadaan</option>
                @foreach($pengadaan as $peng)
                    <option value="{{ $peng->id_pengadaan }}">{{ $peng->kode_pengadaan }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="tgl_opname" class="form-label">Tanggal Opname</label>
            <input type="date" class="form-control" id="tgl_opname" name="tgl_opname" required>
        </div>
        <div class="mb-3">
            <label for="kondisi" class="form-label">Kondisi</label>
            <input type="text" class="form-control" id="kondisi" name="kondisi" required>
        </div>
        <div class="mb-3">
            <label for="keterangan" class="form-label">Keterangan</label>
            <textarea class="form-control" id="keterangan" name="keterangan"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
