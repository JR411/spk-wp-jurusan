@extends('dashboard.layout')

@section('title', 'Data Sub Kriteria '.$kriteria->kriteria_nama)

@section('js')
    @if ($subKriterias->isNotEmpty())
        <script>
            $(document).ready(function() {
                $('#subKriterias').DataTable({
                    "pageLength": 10,
                    "language": {
                        "sInfo": "_START_-_END_ Data dari _TOTAL_ Data Sub Kriteria {{ $kriteria->kriteria_nama }}",
                        "sInfoEmpty": "Tidak Ada Data Sub Kriteria {{ $kriteria->kriteria_nama }}",
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
                        var pageInfo = $('#subKriterias').DataTable().page.info();
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
        <script>
            $('#jurusan_id').select2({
                dropdownParent: $('#select2_jurusan')
            });
        </script>
        <script>
            function filterJurusan() {
                const select = document.getElementById('jurusan_id');
                const selectedOption = select.options[select.selectedIndex];
                const id = selectedOption ? selectedOption.dataset.id : null;
                const data = @json($subKriterias);
                const kriteria = @json($kriteria);
                const table = document.getElementById('subKriterias');

                table.innerHTML = `
                    <table class="table table-bordered table-hover text-center" id="subKriterias">
                        <thead class="thead-dark">
                            <tr>
                                <th>#</th>
                                <th>Sub Kriteria</th>
                                <th>Jurusan</th>
                                <th>Bobot Sub Kriteria</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                `;
                let adaData = false;
                let index = 1;

                if (select.value === "0") {
                    data.forEach(item => {
                        item.jurusans.forEach(jurusanItem => {
                            adaData = true;
                            const row = `
                                <tr>
                                    <td>${index++}</td>
                                    <td>${item.sub_kriteria_nama}</td>
                                    <td>${jurusanItem.jurusan_nama}</td>
                                    <td class="text-left">${jurusanItem.pivot.bobot}</td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="/dashboard/sub-kriteria/${item.id}/edit" class="btn btn-warning text-white"><i class="fa fa-pencil"></i></a>
                                            <form action="/dashboard/sub-kriteria/${item.id}" method="post" class="btn-group">
                                                @method('delete')
                                                @csrf
                                                <button class="btn btn-danger text-white" onclick="return confirm(
                                                    'Yakin ingin menghapus Sub Kriteria ${item.sub_kriteria_nama} dari Kriteria ${kriteria.kriteria_nama}?')">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            `;
                            document.querySelector('#subKriterias tbody').insertAdjacentHTML('beforeend', row);
                        });
                    });
                } else if (id) {
                    data.forEach(item => {
                        item.jurusans.forEach(jurusanItem => {
                            if (jurusanItem.id == id) {
                                adaData = true;

                                const row = `
                                    <tr>
                                        <td>${index++}</td>
                                        <td>${item.sub_kriteria_nama}</td>
                                        <td>${jurusanItem.jurusan_nama}</td>
                                        <td>${jurusanItem.pivot.bobot}</td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a href="/dashboard/sub-kriteria/${item.id}/edit" class="btn btn-warning text-white"><i class="fa fa-pencil"></i></a>
                                                <form action="/dashboard/sub-kriteria/${item.id}" method="post" class="btn-group">
                                                    @method('delete')
                                                    @csrf
                                                    <button class="btn btn-danger text-white" onclick="return confirm(
                                                        'Yakin ingin menghapus Sub Kriteria ${item.sub_kriteria_nama} dari Kriteria ${kriteria.kriteria_nama}?')">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                `;
                                document.querySelector('#subKriterias tbody').insertAdjacentHTML('beforeend', row);
                            }
                        });
                    });
                }

                if (adaData) {
                    $(document).ready(function() {
                        $('#subKriterias').DataTable({
                            "pageLength": 10,
                            "language": {
                                "sInfo": "_START_-_END_ Data dari _TOTAL_ Data Sub Kriteria {{ $kriteria->kriteria_nama }}",
                                "sInfoEmpty": "Tidak Ada Data Sub Kriteria {{ $kriteria->kriteria_nama }}",
                                "sInfoFiltered": "",
                                "sSearch": "",
                                "searchPlaceholder": "Cari Data",
                                "sZeroRecords": "Tidak Ada Data Yang Cocok Ditemukan",
                                "oPaginate": {
                                    "sFirst": "<<",
                                    "sPrevious": "<",
                                    "sNext": ">",
                                    "sLast": ">>"
                                }
                            },
                            "rowCallback": function(row, data, index) {
                                const pageInfo = $('#subKriterias').DataTable().page.info();
                                const page = pageInfo.page;
                                const length = pageInfo.length;
                                const number = page * length + index + 1;
                                $('td:eq(0)', row).html(number);
                            },
                            destroy: true,
                            lengthChange: false,
                            ordering: false,
                        });
                    });
                }
            }
        </script>
    @endif
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row mt-5">
            <div class="col-12">
                <div class="white_shd full margin_bottom_30">
                    <div class="full graph_head d-flex justify-content-between align-items-center">
                        <div class="heading1 margin_0">
                            <h2>Data Sub Kriteria {{ $kriteria->kriteria_nama }}</h2>
                        </div>
                        <div class="heading-right heading1 margin_0">
                            <h2><a href="/dashboard/sub-kriteria/tambah" class="btn btn-primary text-light">Tambah Data Sub Kriteria</a></h2>
                        </div>
                    </div>
                    <div class="tab_style2">
                        <div class="tabbar padding_infor_info">
                            @if (session()->has('message'))
                                <div class="alert alert-success alert-dismissible fade show text-capitalize" role="alert">
                                    {{ session('message') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            <div id="select2_jurusan">
                                <label for="jurusan_id" class="form-control-label">Pilih Jurusan</label>
                                <select id="jurusan_id" name="jurusan_id" onchange="filterJurusan()" style="width: 100%;">
                                    <option value="0">Semua Jurusan</option>
                                    @foreach ($jurusans as $item)
                                        <option value="{{ $item->id }}" data-id="{{ $item->id }}"
                                            {{ old('jurusan_id') == $item->id ? 'selected' : '' }}>
                                            {{ $item->jurusan_nama }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="table-responsive-sm">
                                <table class="table table-hover table-stripped" id="subKriterias">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>#</th>
                                            <th>Sub Kriteria</th>
                                            <th>Jurusan</th>
                                            <th>Bobot Sub Kriteria</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-dark text-capitalize">
                                        @foreach ($subKriterias as $item)
                                            @foreach ($item->jurusans as $jurusanItem)
                                                <tr>
                                                    <td></td>
                                                    <td>{{ $item->sub_kriteria_nama }}</td>
                                                    <td>{{ $jurusanItem->jurusan_nama }}</td>
                                                    <td>{{ $jurusanItem->pivot->bobot }}</td>
                                                    <td>
                                                        <div class="btn-group" role="group">
                                                            <a href="/dashboard/sub-kriteria/{{ $item->id }}/edit?jurusan_id={{ $jurusanItem->id }}"
                                                                class="btn btn-group btn-warning text-white">
                                                                <i class="fa fa-pencil"></i>
                                                            </a>
                                                            <form action="/dashboard/sub-kriteria/{{ $item->id }}" class="btn-group" method="post">
                                                                @method('delete')
                                                                @csrf
                                                                <input type="text" value="{{ $jurusanItem->id }}" name="jurusan_id" hidden>
                                                                <button class="btn btn-group btn-danger text-white" onclick="return confirm(
                                                                    'Yakin Ingin Menghapus Sub Kriteria {{ $item->sub_kriteria_nama }} dari Kriteria {{ $kriteria->kriteria_nama }}?')">
                                                                    <i class="fa fa-trash"></i>
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
