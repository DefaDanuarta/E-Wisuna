<div class="container">
    <!-- sambutan -->
    <div class="col-md-6 mx-auto">
        <div class="mt-4 mb-4">
            <div class=" text-center">
                <h5 class="app-brand-text text-body fw-medium mb-0">Selamat datang</h5>
                <h2 class="app-brand-text text-body fw-bolder ">Laporkan Keluhan Anda Pada Kami</h2>
                <h6 class="card-subtitle text-muted">Ujian Kompetensi Keahlian Rekayasa Perangkat Lunak Tahun 2022/2023</h6>
                <div class="content-center mt-3">
                    <a href="index.php?page=login" class="btn rounded-pill btn-primary w-100">Laporkan Keluhanmu</a>
                </div>
            </div>
        </div>
    </div>
    <!-- <div class = "mt-3">
        <h4 class="mb-0 text-center">Ujian Kompetensi Keahlian <br>Rekayasa Perangkat Lunak <br> Tahun 2022/2023</h4>
        <hr>
    </div> -->
    <div class="content-wrapper">
        <div class="nav-align-top mb-4">
            <ul class="nav nav-tabs nav-fill" role="tablist">
                <li class="nav-item">
                    <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-justified-info" aria-controls="navs-justified-info" aria-selected="false">
                        <i class="bx bx-info-circle"></i> Informasi
                        <span class="badge rounded-pill badge-center h-px-20 w-px-20 bg-label-danger"></span>
                    </button>
                </li>
                <li class="nav-item">
                    <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-justified-profile" aria-controls="navs-justified-profile" aria-selected="true">
                        <i class="tf-icons bx bx-user"></i> Profil
                    </button>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade active show" id="navs-justified-info" role="tabpanel">
                    <div class="col-md">
                        <div class="mb-3">
                            <div class="row g-0">
                                <div class="col-md-7">
                                    <div class="card-body pt-0" style="padding-left:0;">
                                        <h1 class="display-6 mb-0 fw-bold">
                                            INFORMASI
                                        </h1>
                                        <p class="text-subtitle text-muted">Informasi tentang website ini</p>
                                        <p class="mb-4">
                                            Website yang berguna untuk menyampaikan pengaduan yang berkaitan <br> dengan kerusakan kerusakan fasilitas umum, seperti jalan rusak, halte roboh, dsb.
                                        </p>
                                        <h5 class="mt-2 mb-0 fw-bold">
                                            TUJUAN
                                        </h5>
                                        <p class="text-subtitle text-muted">Tujuan dibuatnya website ini</p>
                                        <p>
                                            Tujuan dibuatnya website ini adalah memudahkan para pihak berwajib <br> untuk mendengarkan keluhan yang dilontarkan para masyarakat <br> sekaligus pelapor mengenai masalah ketidaknyamanan, kerusakan yang ada pada fasilitas umum
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <img class="rounded-3 card-img card-img-right" src="./assets/img_2/kantor.jpg" alt="Kantor E-wisuna">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="navs-justified-profile" role="tabpanel">
                    <h1 class="display-6 mb-0 fw-bold">
                        PROFIL
                    </h1>
                    <p class="text-subtitle text-muted">Informasi tentang pembuat website ini</p>
                    <div class="row md-12 g-0">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img class="rounded-3 card-img card-img-left" src="./assets/img_2/profil.jpg" alt="Card image">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body pb-0">
                                    <h4 class="mb-0 fw-bold text-primary">
                                        I Kadek Defa Danuarta
                                    </h4>
                                    <p class="text-subtitle text-muted">Seorang siswa rpl kelas 12 </p>
                                    <p class="card-text mb-2">
                                        Saya adalah seorang siswa SMK yang mengambil jurusan RPL <br> di SMK Wira Harapan dan masi menduduki kelas 12 tahun ini.
                                    </p>
                                    <div class="list-group list-group-flush">
                                        <a class="list-group-item list-group-item-action">UKK Paket 2</a>
                                        <a class="list-group-item list-group-item-action">Umur 17 Tahun</a>
                                        <a class="list-group-item list-group-item-action">Kelas 12 RPL</a>
                                        <a class="list-group-item list-group-item-action">
                                            No. Telfon :
                                            <div class="input-group align-items-between">
                                                <input type="num    ber" class="form-control" id="textToCopy" value="087862275753" disabled>
                                                <button onclick="copyText()" class="btn btn-outline-primary"><span class="tf-icons bx bx-copy"></span></button>
                                            </div>
                                            <script>
                                                function copyText() {
                                                    var copyText = document.getElementById("textToCopy");

                                                    copyText.disabled = false;
                                                    copyText.select();
                                                    document.execCommand("copy");
                                                    copyText.disabled = true;
                                                    alert("Teks berhasil dicopy");
                                                }
                                            </script>
                                        </a>
                                        <a class="list-group-item list-group-item-action  mb-2">Cita-cita mau jadi kaya</a>
                                    </div>
                                    <p class="text-subtitle text-muted mb-0">Follow me on Instagram : </p>
                                    <a href="https://www.instagram.com/dfa_danuarta/" target="blank"><small> @Dfa_danuarta</small></a>,
                                    <a href="https://www.instagram.com/duipa.std/" target="blank"><small> @Duipa.Std</small></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>