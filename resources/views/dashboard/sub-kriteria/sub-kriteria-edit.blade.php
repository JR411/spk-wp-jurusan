@extends('dashboard.layout')

@section('title', 'Edit Sub Kriteria '.$subKriteria->sub_kriteria_nama)

@section('js')
    $('#sub_kriteria_id').select2({
        dropdownParent: $('#form-sub-kriteria'),
        placeholder: 'Pilih Sub Kriteria',
        tags: true,
    });
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row column1 mt-5">
            <div class="col-12">
                <div class="white_shd full margin_bottom_30">
                    <div class="full graph_head d-flex justify-content-between align-items-center">
                        <div class="heading1 margin_0">
                            <h2>Edit Sub Kriteria {{ $subKriteria->sub_kriteria_nama }}</h2>
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
                                        <form action="/dashboard/sub-kriteria/{{ $subKriteria->id }}" method="post">
                                            @method('put')
                                            @csrf
                                            <div class="form-group">
                                                <label for="jurusan_id" class="form-control-label">Jurusan</label>
                                                <input type="text" class="form-control" value="{{ $jurusan->jurusan_nama }}" disabled>
                                                <input type="hidden" name="jurusan_id" value="{{ $jurusan->id }}">
                                                @error('jurusan_id')
                                                    <small class="form-text text-muted invalid-feedback">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="kriteria_id" class="form-control-label">Kriteria</label>
                                                <input type="text" name="kriteria_id" class="form-control" value="{{ $kriteria->kriteria_nama }}" disabled>
                                                @error('kriteria_id')
                                                    <small class="form-text text-muted invalid-feedback">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="sub_kriteria_id" class="form-control-label">Sub Kriteria</label>
                                                <input type="text" class="form-control" value="{{ $subKriteria->sub_kriteria_nama }}" disabled>
                                                <input type="hidden" name="sub_kriteria_id" value="{{ $subKriteria->id }}">
                                                @error('sub_kriteria_id')
                                                    <small class="form-text text-muted invalid-feedback">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="bobot" class="form-control-label">Bobot Sub Kriteria</label>
                                                <select id="bobot" name="bobot" required
                                                    class="form-control @error('bobot') is-invalid @enderror">
                                                    <option value="" hidden>Pilih Bobot Sub Kriteria</option>
                                                    @for ($i = 1; $i <= 5; $i++)
                                                        <option value="{{ $i }}" {{ old('bobot', $pivotData->bobot) == $i ? 'selected' : '' }}>{{ $i }}</option>
                                                    @endfor
                                                </select>
                                                @error('bobot')
                                                    <small class="form-text text-muted invalid-feedback">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="text-right mt-5">
                                                <button class="main_bt bg-warning" onclick="window.location.href='/dashboard/kriteria/minat-dan-bakat'" type="button">Kembali</button>
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
