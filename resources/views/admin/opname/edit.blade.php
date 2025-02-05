@extends('layouts.tamplate')

@section('content')
<div class="container">
    <h1>Edit Opname</h1>
    <form action="{{ route('admin.opname.update', $opname->id_opname) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="id_pengadaan" class="form-label">Pengadaan</label>
            <select class="form-control" id="id_pengadaan" name="id_pengadaan" required>
                @foreach($pengadaan as $peng)
                    <option value="{{ $peng->id_pengadaan }}" {{ $opname->id_pengadaan == $peng->id_pengadaan ? 'selected' : '' }}>
                        {{ $peng->kode_pengadaan }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="tgl_opname" class="form-label">Tanggal Opname</label>
            <input type="date" class="form-control" id="tgl_opname" name="tgl_opname" value="{{ $opname->tgl_opname }}" required>
        </div>
        <div class="mb-3">
            <label for="kondisi" class="form-label">Kondisi</label>
            <input type="text" class="form-control" id="kondisi" name="kondisi" value="{{ $opname->kondisi }}" required>
        </div>
        <div class="mb-3">
            <label for="keterangan" class="form-label">Keterangan</label>
            <textarea class="form-control" id="keterangan" name="keterangan">{{ $opname->keterangan }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
