@extends('dashboard.layout')

@section('title', 'Data Hasil Perhitungan')

@section('js')
    @if ($peminatans->isNotEmpty())
        @foreach ($peminatans as $index => $item)
            <script>
                $(document).ready(function() {
                    $('#tabel{{ $item->id }}').DataTable({
                        "pageLength": 10,
                        "language": {
                            "sInfo": "_START_-_END_ Data dari _TOTAL_ Data Calon Mahasiswa",
                            "sInfoEmpty": "Tidak Ada Data Calon Mahasiswa",
                            "sInfoFiltered": "",
                            "sSearch": "",
                            "searchPlaceholder": "Cari Data",
                            "sZeroRecords": "Tidak Ada Data Yang Cocok Ditemukan",
                            "oPaginate": {
                                "sFirst": "<<",
                                "sPrevious": "<",
                                "sNext": ">",
                                "sLast": ">>",
                            }
                        },
                        "rowCallback": function(row, data, index) {
                            var pageInfo = $('#tabel{{ $item->id }}').DataTable().page.info();
                            var page = pageInfo.page;
                            var length = pageInfo.length;
                            var number = page * length + index + 1;
                            $('td:eq(0)', row).html(number);
                        },
                        lengthChange: false,
                        ordering: false,
                    });
                });
            </script>
        @endforeach
    @endif
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row column1 mt-5">
            <div class="col-12">
                <div class="white_shd full margin_bottom_30">
                    <div class="full graph_head d-flex justify-content-between align-items-center">
                        <div class="heading1 margin_0">
                            <h2>Data Hasil Perhitungan</h2>
                        </div>
                    </div>
                    <div class="full inner_elements">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="tab_style2">
                                    <div class="tabbar padding_infor_info">
                                        <nav>
                                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                                @foreach ($peminatans as $index => $item)
                                                    <a class="nav-item nav-link {{ $index === 0 ? 'active' : '' }}"
                                                    id="nav-{{ $item->id }}-tab"
                                                    data-toggle="tab"
                                                    href="#calonMahasiswa{{ $item->id }}"
                                                    role="tab"
                                                    aria-controls="calonMahasiswa{{ $item->id }}"
                                                    aria-selected="{{ $index === 0 ? 'true' : 'false' }}">
                                                    {{ $item->peminatan_sekolah }}
                                                    </a>
                                                @endforeach
                                            </div>
                                        </nav>
                                        <div class="tab-content" id="nav-tabContent">
                                            @foreach ($peminatans as $index => $item)
                                                <div class="tab-pane fade {{ $index === 0 ? 'show active' : '' }}"
                                                    id="calonMahasiswa{{ $item->id }}" role="tabpanel" aria-labelledby="nav-{{ $item->id }}-tab">
                                                    <div class="table_section padding_infor_info">
                                                        <div class="table-responsive-sm">
                                                            <div class="heading1 margin_0">
                                                                <h2>Peminatan {{ $item->peminatan_sekolah }}</h2>
                                                            </div>
                                                            <table class="table table-hover table-stripped" id="tabel{{ $item->id }}">
                                                                <thead class="thead-dark">
                                                                    <tr>
                                                                        <th>#</th>
                                                                        <th>Calon Mahasiswa</th>
                                                                        <th>Asal Sekolah</th>
                                                                        @foreach ($jurusans as $item2)
                                                                            @if ($item2->peminatan_id == $item->id)
                                                                                <th>{{ $item2->jurusan_nama }}</th>
                                                                            @endif
                                                                        @endforeach
                                                                    </tr>
                                                                </thead>
                                                                <tbody class="text-dark text-capitalize">
                                                                    @foreach ($calonMahasiswas as $item2)
                                                                        @if ($item2->peminatan_id == $item->id)
                                                                            <tr>
                                                                                <td></td>
                                                                                <td>{{ $item2->calon_nama }}</td>
                                                                                <td>{{ $item2->calon_asal_sekolah }}</td>
                                                                                @foreach ($item2->jurusans as $subItem)
                                                                                    <td>{{ $subItem->pivot->hasil }}</td>
                                                                                @endforeach
                                                                            </tr>
                                                                        @endif
                                                                    @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
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
