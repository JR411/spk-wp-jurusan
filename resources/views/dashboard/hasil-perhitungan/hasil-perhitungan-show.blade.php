@extends('dashboard.layout')

@section('title', 'Data Hasil Perhitungan '.$calonMahasiswa->calon_nama)

@section('js')
    <script>
        $(document).ready(function() {
            $('#calonMahasiswa').DataTable({
                order: [5, 'desc'],
                lengthChange: false,
                info: false,
                searching: false,
                paginate: false,
                columnDefs: [
                    {
                        targets: 4,
                        orderable: false,
                    }
                ],
            });
        });
    </script>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row column1 mt-5">
            <div class="col-12">
                <div class="white_shd full margin_bottom_30">
                    <div class="full graph_head d-flex justify-content-between align-items-center">
                        <div class="heading1 margin_0">
                            <h2>Data Hasil Perhitungan {{ $calonMahasiswa->calon_nama }}</h2>
                        </div>
                    </div>
                    <div class="table_section padding_infor_info">
                        <div class="table-responsive-sm">
                            <table class="table table-hover table-bordered">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Nama</th>
                                        <th>Asal Sekolah</th>
                                        <th>Peminatan Sekolah</th>
                                        @foreach ($kriterias as $item)
                                            <th>{{ $item->kriteria_nama }}</th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody class="text-dark text-capitalize">
                                    <tr>
                                        <td>{{ $calonMahasiswa->calon_nama }}</td>
                                        <td>{{ $calonMahasiswa->calon_asal_sekolah }}</td>
                                        <td>{{ $calonMahasiswa->peminatans->peminatan_sekolah }}</td>
                                        @foreach ($kriterias as $item)
                                            @if ($item->slug == 'nilai-rapor')
                                                <td>{{ $calonMahasiswa->calon_nilai }}</td>
                                            @else
                                                <td>
                                                    <ul>
                                                        @foreach ($calonMahasiswa->subKriterias as $subItem)
                                                            @if ($calonMahasiswa->subKriterias->contains($subItem) && $subItem->kriteria_id == $item->id)
                                                                <li>{{ $subItem->sub_kriteria_nama }}</li>
                                                            @endif
                                                        @endforeach
                                                    </ul>
                                                </td>
                                            @endif
                                        @endforeach
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="table-responsive-sm mt-3">
                            <table class="table table-hover table-bordered" id="calonMahasiswa">
                                <thead class="thead-darks">
                                    <tr>
                                        <th>Jurusan</th>
                                        @foreach ($kriterias as $item)
                                            <th>{{ $item->kriteria_nama }}</th>
                                        @endforeach
                                        <th>Rumus</th>
                                        <th>Hasil</th>
                                    </tr>
                                </thead>
                                <tbody class="text-dark text-capitalize">
                                    @foreach ($jurusans as $item)
                                        <tr>
                                            <td>{{ $item->jurusan_nama }}</td>

                                            @php
                                                $rumus = '';
                                            @endphp

                                            @foreach ($kriterias as $item2)
                                                <td>
                                                    <ul>
                                                        @php
                                                            $maxBobot = null;
                                                            foreach ($calonMahasiswa->subKriterias as $subItem) {
                                                                if ($calonMahasiswa->subKriterias->contains($subItem) && $subItem->kriteria_id == $item2->id) {
                                                                    foreach ($item->subKriterias as $subItem2) {
                                                                        if ($subItem2->id == $subItem->id) {
                                                                            if ($maxBobot === null || $subItem2->pivot->bobot > $maxBobot) {
                                                                                $maxBobot = $subItem2->pivot->bobot;
                                                                            }
                                                                        }
                                                                    }
                                                                }
                                                            }
                                                            $maxBobot = $maxBobot ?? 1;
                                                            $kriteriaBobot = $item2->kriteria_bobot;
                                                            $rumus .= ($rumus === '' ? '' : ' * ') . "($maxBobot^$kriteriaBobot)";
                                                        @endphp
                                                        <li>{{ $maxBobot }}</li>
                                                    </ul>
                                                </td>
                                            @endforeach

                                            <td>{{ $rumus }}</td>

                                            <td>
                                                @foreach ($item->calonMahasiswas as $subItem)
                                                    @if ($subItem->id == $calonMahasiswa->id)
                                                        {{ $subItem->pivot->hasil }}
                                                    @endif
                                                @endforeach
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="text-right">
                            <button class="main_bt bg-warning" onclick="window.location.href='/dashboard/hasil-perhitungan'" type="button">Kembali</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
