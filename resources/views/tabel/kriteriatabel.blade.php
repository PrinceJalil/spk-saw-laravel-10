<!DOCTYPE html>
<html lang="en">

@include('public.head')

<body>

    <!-- ======= Header ======= -->
    @include('public.header')

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item">
                <a class="nav-link collapsed" href="/dashboard">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li><!-- End Dashboard Nav -->

            <li class="nav-item">
                <a class="nav-link " data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-layout-text-window-reverse"></i><span>Tabel</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="tables-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="/kriteriatabel" class="active">
                            <i class="bi bi-circle"></i><span>Kriteria</span>
                        </a>
                    </li>
                    <li>
                        <a href="/alternatif">
                            <i class="bi bi-circle"></i><span>Alternatif</span>
                        </a>
                    </li>
                    <li>
                        <a href="/normalisasi">
                            <i class="bi bi-circle"></i><span>Normalisasi</span>
                        </a>
                    </li>
                    <li>
                        <a href="/rank">
                            <i class="bi bi-circle"></i><span>Rank/Penilaian</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End Tables Nav -->

        </ul>

    </aside><!-- End Sidebar-->

    <!-- ======= Main ======= -->
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Tabel Kriteria</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item">Tabel</li>
                    <li class="breadcrumb-item active">Kriteria</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <!-- <button type="button" class="btn btn-primary mt-3 mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                <i class="bi bi-plus-square me-2"></i>Tambah Kriteria
                            </button> -->
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama Kriteria</th>
                                        <th>Bobot Kriteria</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="align-middle">
                                    @foreach($kriteriadata as $item)
                                    <td>{{ $loop->iteration}}.</td>
                                    <td>{{ $item->nama}}</td>
                                    <td>{{ $item->bobotkriteria}}</td>
                                    <td><button class="btn btn-warning mt-2 mb-2" data-bs-target="#exampleModalToggle2{{ $item->id }}" data-bs-toggle="modal" data-bs-dismiss="modal"><i class="bi bi-pencil-square"></i></button></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!-- End Table with stripped rows -->

                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main><!-- End #main -->

    <!-- Add Data Modal -->
    <!-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                    <button id="cancelButton" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    
                </div>
            </div>
        </div>
    </div> -->
    <!-- End Add Data Modal -->

    <!-- Edit Modal -->
    @foreach($kriteriadata as $item)
    <div class="modal fade" id="exampleModalToggle2{{ $item->id }}" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalToggleLabel2">Edit Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <form action="{{ route('kriteria.update', ['id' => $item->id]) }}" method="post">
                        @csrf
                        @method('put')

                        <div class=" mb-3" for="nama">
                            <input type="text" name="nama" class="input-group form-control form-control-lg bg-light fs-6" placeholder="Nama" autofocus value="{{$item->nama}}">
                        </div>

                        <div class=" mb-3" for="bobotkriteria">
                            <input type="text" name="bobotkriteria" class="input-group form-control form-control-lg bg-light fs-6" value="{{$item->bobotkriteria}}">
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    <!-- End Edit Modal -->

    @include('public.notif')

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    @include('public.js')

</body>

</html>