@extends('dashboard.layout')

@section('title', 'Tambah Jurusan')

@section('content')
    <div class="container-fluid">
        <div class="row column1 mt-5">
            <div class="col-12">
                <div class="white_shd full margin_bottom_30">
                    <div class="full graph_head d-flex justify-content-between align-items-center">
                        <div class="heading1 margin_0">
                            <h2>Tambah Jurusan</h2>
                        </div>
                    </div>
                    <div class="full progress_bar_inner">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="full">
                                    <div class="padding_infor_info">
                                        @if (session()->has('message'))
                                            <div class="alert alert-success alert-dismissible fade show text-capitalize" role="alert">
                                                {{ session('message') }}
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        @endif
                                        <form action="/dashboard/jurusan" method="post">
                                            @csrf
                                            <div class="form-group">
                                                <label for="jurusan_nama" class="form-control-label">Nama Jurusan</label>
                                                <input id="jurusan_nama" type="text" name="jurusan_nama" placeholder="Nama Jurusan" required
                                                    value="{{ old('jurusan_nama') }}" class="form-control @error('jurusan_nama') is-invalid @enderror">
                                                @error('jurusan_nama')
                                                    <small class="form-text text-muted invalid-feedback">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="peminatan_id" class="form-control-label">Peminatan Sekolah</label>
                                                <select id="peminatan_id" name="peminatan_id" required
                                                    class="form-control @error('peminatan_id') is-invalid @enderror">
                                                    <option value="" hidden>Pilih Peminatan Sekolah Sebelumnya</option>
                                                    @foreach ($peminatans as $item)
                                                        <option value="{{ $item->id }}" {{ old('peminatan_id') == $item->id ? 'selected' : '' }}>
                                                            {{ $item->peminatan_sekolah }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('peminatan_id')
                                                    <small class="form-text text-muted invalid-feedback">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="text-right mt-5">
                                                <button class="main_bt bg-warning" onclick="window.location.href='/dashboard/jurusan'" type="button">Kembali</button>
                                                <button class="main_bt" type="submit">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
