@extends('dashboard.layout')

@section('title', 'Edit Calon Mahasiswa '.$calonMahasiswa->calon_nama)

@section('js')
    <script>
        @foreach ($kriterias as $item)
            @if ($item->slug == 'nilai-rapor') @continue @endif
            $('#{{ $item->slug }}').select2({
                dropdownParent: $('#form-calon'),
                placeholder: "Pilih {{ $item->kriteria_nama }}",
            });
        @endforeach
    </script>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row column1 mt-5">
            <div class="col-12">
                <div class="white_shd full margin_bottom_30">
                    <div class="full graph_head d-flex justify-content-between align-items-center">
                        <div class="heading1 margin_0">
                            <h2>Edit Kriteria {{ $calonMahasiswa->calon_nama }}</h2>
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
                                        <form action="/dashboard/calon-mahasiswa/{{ $calonMahasiswa->id }}" method="post">
                                            @method('put')
                                            @csrf
                                            <div class="form-group">
                                                <label for="calon_nama" class="form-control-label">Nama Calon Mahasiswa</label>
                                                <input id="calon_nama" type="text" name="calon_nama" placeholder="Nama Calon Mahasiswa" required
                                                    value="{{ old('calon_nama', $calonMahasiswa->calon_nama) }}" class="form-control @error('calon_nama') is-invalid @enderror">
                                                @error('calon_nama')
                                                    <small class="form-text text-muted invalid-feedback">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="calon_asal_sekolah" class="form-control-label">Asal Sekolah</label>
                                                <input id="calon_asal_sekolah" type="text" name="calon_asal_sekolah" placeholder="Asal Sekolah" required
                                                    value="{{ old('calon_asal_sekolah', $calonMahasiswa->calon_asal_sekolah) }}" class="form-control @error('calon_asal_sekolah') is-invalid @enderror">
                                                @error('calon_asal_sekolah')
                                                    <small class="form-text text-muted invalid-feedback">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="peminatan_id" class="form-control-label">Peminatan Sekolah</label>
                                                <select id="peminatan_id" name="peminatan_id" required
                                                    class="form-control @error('peminatan_id') is-invalid @enderror">
                                                    @foreach ($peminatans as $item)
                                                        <option value="{{ $item->id }}" {{ old('peminatan_id', $calonMahasiswa->peminatan_id) == $item->id ? 'selected' : '' }}>
                                                            {{ $item->peminatan_sekolah }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('peminatan_id')
                                                    <small class="form-text text-muted invalid-feedback">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            @foreach ($kriterias as $item)
                                                <div class="form-group">
                                                    <label for="{{ $item->slug }}" class="form-control-label">{{ $item->kriteria_nama }}</label>
                                                    @if ($item->slug == 'nilai-rapor')
                                                        <input type="text" name="{{ $item->slug }}" id="{{ $item->slug }}" required
                                                            value="{{ old($item->slug, $calonMahasiswa->calon_nilai) }}"
                                                            class="form-control @error($item->slug) is-invalid @enderror">
                                                    @else
                                                        <select id="{{ $item->slug }}" name="{{ $item->slug }}[]" required multiple
                                                            class="form-control @error($item->slug) is-invalid @enderror" style="width: 100%;">
                                                            @foreach ($item->subKriterias as $subItem)
                                                                <option value="{{ $subItem->id }}"
                                                                    {{ $calonMahasiswa->subKriterias->contains('id', $subItem->id) ||
                                                                    in_array($subItem->id, old($item->slug, [])) ? 'selected' : '' }}>
                                                                    {{ $subItem->sub_kriteria_nama }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    @endif
                                                    @error($item->slug)
                                                        <small class="form-text text-muted invalid-feedback">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            @endforeach
                                            <div class="text-right mt-5">
                                                <button class="main_bt bg-warning" onclick="window.location.href='/dashboard/calon-mahasiswa'" type="button">Kembali</button>
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
