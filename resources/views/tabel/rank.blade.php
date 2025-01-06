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
                        <a href="/kriteriatabel">
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
                        <a href="/rank" class="active">
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
            <h1>Tabel Rank</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item">Tabel</li>
                    <li class="breadcrumb-item active">Rank</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th>Rank</th>
                                        <th>Nama</th>
                                        <th>Point SAW</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($results as $altId => $nilai)
                                    <tr>
                                        <td>{{ $loop->iteration}}.</td>
                                        <td>{{ $alternatives->find($altId)->nama }}</td>
                                        <td class="fw-bold text-success">{{ number_format($nilai, 2) }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main><!-- End #main -->


    @include('public.notif')

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    @include('public.js')

</body>

</html>