@extends('dashboard.layout')

@section('title', 'Tambah Sub Kriteria')

@section('js')
    <script>
        $('#kriteria_id').select2({
            dropdownParent: $('#form-sub-kriteria'),
            placeholder: 'Pilih Kriteria',
        });
        $('#jurusan_id').select2({
            dropdownParent: $('#form-sub-kriteria'),
            placeholder: 'Pilih Jurusan',
        });
        $('#sub_kriteria_id').select2({
            dropdownParent: $('#form-sub-kriteria'),
            placeholder: 'Pilih Sub Kriteria',
            tags: true,
        });
    </script>
    <script>
        function updateSubKriteria() {
            const kriteriaSelect = document.getElementById('kriteria_id');
            const subKriteriaSelect = document.getElementById('sub_kriteria_id');
            const selectedOption = kriteriaSelect.options[kriteriaSelect.selectedIndex];

            const subKriterias = selectedOption ? JSON.parse(selectedOption.getAttribute('data-sub-kriteria')) : [];

            subKriteriaSelect.innerHTML = '<option value="" hidden>Pilih Sub Kriteria</option>';

            if (subKriterias.length > 0) {
                subKriterias.forEach(function(subKriteria) {
                    const option = document.createElement('option');
                    option.value = subKriteria.sub_kriteria_nama;
                    option.textContent = subKriteria.sub_kriteria_nama;
                    subKriteriaSelect.appendChild(option);
                });
            }
        }
    </script>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row column1 mt-5">
            <div class="col-12">
                <div class="white_shd full margin_bottom_30">
                    <div class="full graph_head d-flex justify-content-between align-items-center">
                        <div class="heading1 margin_0">
                            <h2>Tambah Sub Kriteria</h2>
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
                                        <form id="form-sub-kriteria" action="/dashboard/sub-kriteria" method="post">
                                            @csrf
                                            <div class="form-group">
                                                <label for="jurusan_id" class="form-control-label">Jurusan</label>
                                                <select id="jurusan_id" name="jurusan_id" required style="width: 100%;"
                                                    class="form-control @error('jurusan_id') is-invalid @enderror">
                                                    <option value="" hidden>Pilih Jurusan</option>
                                                    @foreach ($jurusans as $item)
                                                        <option value="{{ $item->id }}" {{ old('jurusan_id') == $item->id ? 'selected' : '' }}>
                                                            {{ $item->jurusan_nama }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('jurusan_id')
                                                    <small class="form-text text-muted invalid-feedback">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="kriteria_id" class="form-control-label">Kriteria</label>
                                                <select id="kriteria_id" name="kriteria_id" required style="width: 100%;"
                                                    class="form-control @error('kriteria_id') is-invalid @enderror" onchange="updateSubKriteria()">
                                                    <option value="" hidden>Pilih Kriteria</option>
                                                    @foreach ($kriterias as $item)
                                                        <option value="{{ $item->id }}"
                                                            data-sub-kriteria="{{ json_encode($item->subKriterias) }}"
                                                            {{ old('kriteria_id') == $item->id ? 'selected' : '' }}>
                                                            {{ $item->kriteria_nama }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('kriteria_id')
                                                    <small class="form-text text-muted invalid-feedback">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="sub_kriteria_id" class="form-control-label">Sub Kriteria</label>
                                                <select id="sub_kriteria_id" name="sub_kriteria_id" required style="width: 100%;"
                                                    class="form-control @error('sub_kriteria_id') is-invalid @enderror">
                                                    <option value="" hidden>Pilih Sub Kriteria</option>
                                                </select>
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
                                                        <option value="{{ $i }}">{{ $i }}</option>
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
