@extends('dashboard.layout')

@section('title', 'Data Jurusan')

@section('js')
    @if ($jurusans->isNotEmpty())
        <script>
            $(document).ready(function() {
                $('#jurusan').DataTable({
                    "pageLength": 10,
                    "language": {
                        "sInfo": "_START_-_END_ Data dari _TOTAL_ Data Jurusan",
                        "sInfoEmpty": "Tidak Ada Data Jurusan",
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
                        var pageInfo = $('#jurusan').DataTable().page.info();
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
                            <h2>Data Jurusan</h2>
                        </div>
                        <div class="heading-right heading1 margin_0">
                            <h2><a href="/dashboard/jurusan/tambah" class="btn btn-primary text-light">Tambah Data Jurusan</a></h2>
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
                            <table class="table table-hover table-stripped" id="jurusan">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Jurusan</th>
                                        <th>Peminatan Jurusan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="text-dark text-capitalize">
                                    @foreach ($jurusans as $item)
                                        <tr>
                                            <td></td>
                                            <td>{{ $item->jurusan_nama }}</td>
                                            <td>{{ $item->peminatans->peminatan_sekolah }}</td>
                                            <td>
                                                <div class="btn-group" role="group">
                                                    <a href="/dashboard/jurusan/{{ $item->id }}/edit" class="btn btn-group btn-warning text-white"><i class="fa fa-pencil"></i></a>
                                                    <form action="/dashboard/jurusan/{{ $item->id }}" class="btn-group" method="post">
                                                        @method('delete')
                                                        @csrf
                                                        <button class="btn btn-group btn-danger text-white"
                                                            onclick="return confirm('Yakin Ingin Menghapus Jurusan {{ $item->jurusan_nama }}?')">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
