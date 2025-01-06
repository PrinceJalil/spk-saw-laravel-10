<!DOCTYPE html>
<html lang="en">

@include('public.head')

<body>
  @include('public.header')

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="/dashboard">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->


      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-layout-text-window-reverse"></i><span>Tabel</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
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
            <a href="/rank">
              <i class="bi bi-circle"></i><span>Rank/Penilaian</span>
            </a>
          </li>
        </ul>
      </li><!-- End Tables Nav -->

    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1 class="d-inline-block">Dashboard SPK</h1>

      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>

    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <div class="col-lg">
          <div class="row">

            <!-- kriteria Card -->
            <div class="col-xl-3">
              <a href="kriteriatabel">
                <div class="card info-card kriteria-card cardhov">
                  <div class="card-body">
                    <h5 class="card-title">Tabel Kriteria</h5>
                    <div class="d-flex align-items-center">
                      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-folder2"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </a>
            </div><!-- End kriteria Card -->

            <!-- Alternatif Card -->
            <div class="col-xl-3">
              <a href="alternatif">
                <div class="card info-card cardhov alter-card">
                  <div class="card-body">
                    <h5 class="card-title">Tabel Alternatif</h5>
                    <div class="d-flex align-items-center">
                      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-person"></i>
                      </div>
                      <div class="ps-3">
                      </div>
                    </div>
                  </div>
                </div>
              </a>

            </div><!-- End alternatif Card -->

            <!-- Normalisasi Card -->
            <div class="col-xl-3">
              <a href="normalisasi">
                <div class="card info-card cardhov normal-card">
                  <div class="card-body">
                    <h5 class="card-title">Tabel Normalisasi</h5>
                    <div class="d-flex align-items-center">
                      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-calculator"></i>
                      </div>
                      <div class="ps-3">
                      </div>
                    </div>
                  </div>
                </div>
              </a>

            </div><!-- End Card -->

            <!-- Rank/Penilaian Card -->
            <div class="col-xl-3">
              <a href="rank">
                <div class="card info-card cardhov rank-card">
                  <div class="card-body">
                    <h5 class="card-title">Tabel Rank</h5>
                    <div class="d-flex align-items-center">
                      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-bar-chart-line"></i>
                      </div>
                      <div class="ps-3">
                      </div>
                    </div>
                  </div>
                </div>
              </a>
            </div><!-- End Card -->

          </div>

        </div>
    </section>

  </main>

  @include('public.js')

</body>

</html>