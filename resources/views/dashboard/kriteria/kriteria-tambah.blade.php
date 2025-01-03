@extends('dashboard.layout')

@section('title', 'Tambah Kriteria')

@section('js')
    <script>
        document.getElementById("scale").oninput = function() {
            document.getElementById("textInput").value = this.value;
        }

        function updateTextInput(val) {
            document.getElementById('textInput').value = val;
        }

        function updateRangeInput(val) {
            if (val < 0.001) {
                val = 0.001;
            } else if (val > 1.000) {
                val = 1.000;
            }
            document.getElementById('scale').value = val;
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
                            <h2>Tambah Kriteria</h2>
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
                                        <form action="/dashboard/kriteria" method="post">
                                            @csrf
                                            <div class="form-group">
                                                <label for="kriteria_nama" class="form-control-label">Kriteria</label>
                                                <input id="kriteria_nama" type="text" name="kriteria_nama" placeholder="Kriteria" required
                                                    value="{{ old('kriteria_nama') }}" class="form-control @error('kriteria_nama') is-invalid @enderror">
                                                @error('kriteria_nama')
                                                    <small class="form-text text-muted invalid-feedback">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="kriteria_bobot" class="col-form-label">Bobot Kriteria</label>
                                                <br>
                                                <input type="range" min="0.001" max="1.000" step="0.001" style="width: 30%;" value="{{ old('kriteria_bobot', 0.500) }}"
                                                    name="kriteria_bobot" id="scale" oninput="updateTextInput(this.value);">
                                                <input type="text" id="textInput" class="form-control d-inline" style="width: 69.7%;" value="{{ old('kriteria_bobot', 0.500) }}"
                                                    onchange="updateRangeInput(this.value);" oninput="updateRangeInput(this.value);">
                                            </div>
                                            <div class="text-right mt-5">
                                                <button class="main_bt bg-warning" onclick="window.location.href='/dashboard/kriteria'" type="button">Kembali</button>
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
