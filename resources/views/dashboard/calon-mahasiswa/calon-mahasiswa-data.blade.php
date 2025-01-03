@extends('dashboard.layout')

@section('title', 'Data Calon Mahasiswa')

@section('js')
    @if ($calonMahasiswas->isNotEmpty())
        <script>
            $(document).ready(function() {
                $('#calonMahasiswa').DataTable({
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
                        var pageInfo = $('#calonMahasiswa').DataTable().page.info();
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
    @endif
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row column1 mt-5">
            <div class="col-12">
                <div class="white_shd full margin_bottom_30">
                    <div class="full graph_head d-flex justify-content-between align-items-center">
                        <div class="heading1 margin_0">
                            <h2>Data Calon Mahasiswa</h2>
                        </div>
                        <div class="heading-right heading1 margin_0">
                            <h2><a href="/dashboard/calon-mahasiswa/tambah" class="btn btn-primary text-light">Tambah Data Calon Mahasiswa</a></h2>
                        </div>
                    </div>
                    <div class="table_section padding_infor_info">
                        @if (session()->has('message'))
                            <div class="alert alert-success alert-dismissible fade show text-capitalize" role="alert">
                                {{ session('message') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <div class="table-responsive-sm">
                            <table class="table table-hover table-stripped" id="calonMahasiswa">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>#</th>
                                        <th>Nama</th>
                                        <th>Asal Sekolah</th>
                                        <th>Peminatan Sekolah</th>
                                        @foreach ($kriterias as $item)
                                            <th>{{ $item->kriteria_nama }}</th>
                                        @endforeach
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="text-dark text-capitalize">
                                    @if ($calonMahasiswas->isNotEmpty())
                                        @foreach ($calonMahasiswas as $item)
                                            <tr>
                                                <td></td>
                                                <td>{{ $item->calon_nama }}</td>
                                                <td>{{ $item->calon_asal_sekolah }}</td>
                                                <td>{{ $item->peminatans->peminatan_sekolah }}</td>
                                                @foreach ($kriterias as $item2)
                                                    <td>
                                                        <ul>
                                                            @foreach ($item->subKriterias as $subItem)
                                                                @if ($item->subKriterias->contains($subItem) && $subItem->kriteria_id == $item2->id)
                                                                    <li>{{ $subItem->sub_kriteria_nama }}</li>
                                                                @endif
                                                            @endforeach
                                                        </ul>
                                                    </td>
                                                @endforeach
                                                <td>
                                                    <div class="btn-group" role="group">
                                                        <a href="/dashboard/calon-mahasiswa/{{ $item->id }}/edit" class="btn btn-group btn-warning text-white"><i class="fa fa-pencil"></i></a>
                                                        <form action="/dashboard/calon-mahasiswa/{{ $item->id }}" class="btn-group" method="post">
                                                            @method('delete')
                                                            @csrf
                                                            <button class="btn btn-group btn-danger text-white"
                                                                onclick="return confirm('Yakin Ingin Menghapus Calon Mahasiswa {{ $item->calon_nama }}?')">
                                                                <i class="fa fa-trash"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
