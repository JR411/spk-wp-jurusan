@extends('dashboard.layout')

@section('title', 'Home')

@section('content')
    <div class="container-fluid">
        <div class="row column1 mt-5">
            <div class="col-12">
                <div class="white_shd full margin_bottom_30">
                    <div class="full graph_head">
                        <div class="heading1 margin_0">
                            <h2>SPK Rekomendasi Jurusan Perguruan Tinggi</h2>
                        </div>
                    </div>
                    <div class="full gallery_section_inner padding_infor_info">
                        <div class="row">
                            <div class="col-md-6 margin_bottom_30">
                                <div class="tab_style1">
                                    <div class="tabbar padding_infor_info">
                                        <p>
                                            Sistem Pendukung Keputusan (SPK) Rekomendasi Jurusan Perguruan Tinggi adalah
                                            sistem berbasis teknologi yang membantu calon mahasiswa dalam memilih jurusan
                                            yang tepat sesuai dengan minat dan bakat mereka. Dengan mengumpulkan data pribadi
                                            seperti nilai raport, minat, bakat, dan tujuan karir, sistem ini menganalisis
                                            kesesuaian antara data tersebut dengan karakteristik jurusan yang ada. Berdasarkan
                                            analisis tersebut, sistem memberikan rekomendasi jurusan yang sesuai. SPK ini sangat
                                            berguna bagi calon mahasiswa yang bingung memilih jurusan, karena memungkinkan mereka
                                            membuat keputusan yang meningkatkan efisiensi dalam proses pemilihan jurusan di perguruan tinggi.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 margin_bottom_30">
                                <div class="column">
                                    <a data-fancybox="gallery" href="/images/layout_img/beasiswa.jpeg"><img class="img-responsive" src="/images/layout_img/beasiswa.jpeg" alt="#"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
