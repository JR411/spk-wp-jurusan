@extends('layouts.app')

@section('title', 'Beranda')

@section('js')
    <script>
        $(document).ready(function() {
            function initSelect2() {
                @foreach ($kriterias as $item)
                    @if ($item->slug != 'nilai-rapor')
                        $('#{{ $item->slug }}').select2({
                            dropdownParent: $('#surveyForm'),
                            placeholder: "Pilih {{ $item->kriteria_nama }} Anda",
                        });
                    @endif
                @endforeach
            }

            initSelect2();

            $('#resetButton').on('click', function() {
                $('#surveyForm')[0].reset();

                @foreach ($kriterias as $item)
                    @if ($item->slug != 'nilai-rapor')
                        $('#{{ $item->slug }}').val(null).trigger('change');
                    @endif
                @endforeach

                initSelect2();
            });

            $('#surveyForm').on('submit', function(event) {
                event.preventDefault();

                $.ajax({
                    url: '/submit',
                    method: 'POST',
                    data: $(this).serialize() + '&_token={{ csrf_token() }}',
                    beforeSend: function() {
                        $('#loadingModal').modal('show');
                    },
                    success: function(response) {
                        var htmlResponse = `
                            <div class="title-selesai">Terima kasih sudah berpartisipasi!</div>
                            <table class="table table-hover table-bordered">
                                <tbody class="text-left text-capitalize">
                                    <tr><th>Nama</th><td>${response.calon.nama}</td></tr>
                                    <tr><th>Asal Sekolah</th><td>${response.calon.asal_sekolah}</td></tr>
                                    <tr><th>Peminatan Sekolah</th><td>${response.calon.peminatan}</td></tr>
                                    ${response.kriteria.map((kriteria) => {
                                        if (kriteria.slug === 'nilai-rapor') {
                                            return `
                                                <tr><th>${kriteria.kriteria_nama}</th>
                                                <td>${kriteria.nilai}</td></tr>
                                            `;
                                        } else {
                                            return `
                                                <tr><th>${kriteria.kriteria_nama}</th>
                                                <td><ul>${kriteria.nilai.map((nilai) => `
                                                    <li>${nilai}</li>
                                                `).join('')}</ul></td></tr>
                                            `;
                                        }
                                    }).join('')}
                                    <tr><th>Rekomendasi Jurusan</th><td>
                                        <ol>
                                            ${response.jurusans.map((jurusan, index) => `
                                                <li>${jurusan.jurusan.jurusan_nama}</li>
                                            `).join('')}
                                        </ol>
                                    </td></tr>
                                </tbody>
                            </table>
                            <button type="button" class="btn btn-outline-secondary btn-radius-8 btn-selesai" data-dismiss="modal">Kembali</button>
                        `;

                        $('#responseMessage').html(htmlResponse);
                        $('#responseModal').modal('show');

                        $('#surveyForm')[0].reset();

                        initSelect2();
                    },
                    error: function(xhr) {
                        $('#responseMessage').html(`<div class="alert alert-danger">Terjadi kesalahan: ${xhr.responseJSON.message}</div>`);
                        $('#responseModal').modal('show');
                    },
                    complete: function() {
                        $('#loadingModal').modal('hide');
                    }
                });
            });
        });
    </script>
@endsection

@section('modal')
    <div class="modal fade" id="responseModal" tabindex="-1" aria-labelledby="responseModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body text-center" id="responseMessage"></div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <main>
        <div class="container">
            {{-- <a href="#" class="btn btn-primary btn-radius-32 mt-5" data-toggle="modal" data-target="#responseModal">Selamat Datang</a> --}}
            <h1 class="main-title mt-5">Silakan Isi Data Anda dengan Benar di Bawah Ini!</h1>
            <h3 class="main-text">Pastikan semua informasi yang Anda masukkan <span>akurat dan tepat.</span></h3>
            <form id="surveyForm">
                @csrf
                <div class="user-group">
                    <label for="calon_nama" class="user-label">Nama Lengkap</label>
                    <input type="text" class="form-control form-user @error('calon_nama') is-invalid @enderror" id="calon_nama" name="calon_nama"
                        placeholder="Masukkan Nama Lengkap Anda" required>
                </div>
                <div class="user-group">
                    <label for="calon_asal_sekolah" class="user-label">Asal Sekolah</label>
                    <input type="text" class="form-control form-user @error('calon_asal_sekolah') is-invalid @enderror" id="calon_asal_sekolah" name="calon_asal_sekolah"
                        placeholder="Masukkan Asal Sekolah Anda" required>
                </div>
                <div class="user-group">
                    <label for="peminatan_id" class="user-label">Peminatan Sekolah</label>
                    <select name="peminatan_id" class="form-control form-user" id="peminatan_id" required>
                        <option value="" hidden selected>Pilih Peminatan Sekolah Anda</option>
                        @foreach ($peminatans as $item)
                            <option value="{{ $item->id }}" {{ old('peminatan_id') == $item->id ? 'selected' : '' }}>
                                {{ $item->peminatan_sekolah }}
                            </option>
                        @endforeach
                    </select>
                </div>
                @foreach ($kriterias as $item)
                    <div class="user-group">
                        <label for="{{ $item->slug }}" class="user-label">{{ $item->kriteria_nama }}</label>
                        @if ($item->slug == 'nilai-rapor')
                            <input type="text" name="{{ $item->slug }}" id="{{ $item->slug }}" required
                                placeholder="Masukkan {{ $item->kriteria_nama }} Anda Contoh: 76.54"
                                class="form-control form-user @error($item->slug) is-invalid @enderror">
                        @else
                            <select id="{{ $item->slug }}" name="{{ $item->slug }}[]" required multiple
                                class="form-control @error($item->slug) is-invalid @enderror" style="width: 100%;">
                                @foreach ($item->subKriterias as $subItem)
                                    <option value="{{ $subItem->id }}"
                                        {{ in_array($subItem->id, old($item->slug, [])) ? 'selected' : '' }}>
                                        {{ $subItem->sub_kriteria_nama }}
                                    </option>
                                @endforeach
                            </select>
                        @endif
                    </div>
                @endforeach
                <button type="submit" class="btn btn-primary btn-radius-8 btn-save py-2">Simpan & Lanjutkan</button>
                <button type="button" class="btn btn-outline-secondary btn-radius-8 btn-reset py-2" id="resetButton">Batalkan</button>
                <div class="d-flex">
                    <span class="text-penutup">Informasi yang Anda masukkan akan membantu kami memproses data anda dengan lebih akurat.</span>
                </div>
            </form>
        </div>
    </main>
@endsection
