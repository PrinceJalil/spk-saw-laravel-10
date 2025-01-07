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
                        <a href="/alternatif" class="active">
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
            <h1>Tabel Alternatif</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item">Tabel</li>
                    <li class="breadcrumb-item active">Alternatif</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <button type="button" class="btn btn-primary mt-3 mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                <i class="bi bi-plus-square me-2"></i>Tambah Alternatif
                            </button>

                            <table class="table datatable table-hover table-select">
                                <thead>
                                    <tr class="align-middle">
                                        <th>No.</th>
                                        <th>Nama</th>
                                        @foreach ($criteria as $crit)
                                        <th class="text-center">{{ $crit->nama }}</th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody class="align-middle">

                                    @foreach ($alternatives as $alt)
                                    <tr data-bs-toggle="modal" data-bs-target="#exampleModalToggle{{ $alt->id }}" style="cursor: pointer;">
                                        <td>{{ $loop->iteration}}.</td>
                                        <td>{{ $alt->nama }}</td>
                                        @foreach ($criteria as $crit)
                                        <td class=" text-center">{{ $alt->nilai->where('criteria_id', $crit->id)->first()->value ?? '-' }}</td>
                                        @endforeach
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

    <!-- Add Data Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Alternatif</h5>
                    <button id="cancelButton" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('decision.store') }}" method="POST">
                        @csrf

                        <div class="mb-3" for="nama">
                            <label class="mb-1" for="">Nama</label>
                            <input type="text" name="alternatives[0][nama]" class="input-group form-control form-control-lg bg-light fs-6 text-capitalize" autofocus required style="width: 100%;">
                        </div>

                        @foreach ($criteria as $crit)
                        <div class="mb-3" for="nama">
                            <label class="mb-1" for="">{{ $crit->nama }}</label>
                            <select name="alternatives[0][nilai][{{ $crit->id }}]" class="form-select" required style="width: 100%;">
                                <option value="0.1">0.1</option>
                                <option value="0.2">0.2</option>
                                <option value="0.3">0.3</option>
                                <option value="0.4">0.4</option>
                            </select>
                        </div>
                        @endforeach

                        <div>
                            <label for="">Keterangan : <br><ul>
                                <li>0.4 = Sangat Baik</li>
                                <li>0.3 = Baik</li>
                                <li>0.2 = Cukup</li>
                                <li>0.1 = Kurang</li>
                            </ul></label>
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Tambah</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Add Data Modal -->

    @foreach ($alternatives as $alt)
    <!-- Action modal -->
    <div class="modal fade" id="exampleModalToggle{{ $alt->id }}" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Aksi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <button class="btn btn-warning mt-2 mb-2" data-bs-target="#exampleModalToggle2{{ $alt->id }}" data-bs-toggle="modal" data-bs-dismiss="modal"><i class="bi bi-pen-fill m-1"></i>Edit</button>

                    <button class="btn btn-danger ms-2 mt-2 mb-2" onclick="confirmDelete('{{$alt->id}}')"><i class="bi bi-trash3-fill"></i> Hapus
                    </button>

                </div>
            </div>
        </div>
    </div>
    <!-- End action modal -->

    <!-- Edit Modal -->
    <div class="modal fade" id="exampleModalToggle2{{ $alt->id }}" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalToggleLabel2">Edit Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('decision.update', $alt->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <input class="input-group form-control form-control-lg bg-light fs-6" type="text" name="alternatives[0][nama]" value="{{ $alt->nama }}" required style="width: 100%;">
                        </div>

                        @foreach ($criteria as $crit)
                        <div class="mb-3">
                            <label class="mb-1">{{ $crit->nama }}</label>
                            <select name="nilai[{{ $crit->id }}]" class="form-select" required>
                                @php
                                $nilaiObj = $alt->nilai->where('criteria_id', $crit->id)->first();
                                $nilaiValue = $nilaiObj ? $nilaiObj->value : null;
                                @endphp
                                <option style="display: none;" {{ is_null($nilaiValue) ? 'selected' : '' }}>Pilih Nilai</option>
                                <option value="0.1" {{ $nilaiValue == 0.1 ? 'selected' : '' }}>0.1</option>
                                <option value="0.2" {{ $nilaiValue == 0.2 ? 'selected' : '' }}>0.2</option>
                                <option value="0.3" {{ $nilaiValue == 0.3 ? 'selected' : '' }}>0.3</option>
                                <option value="0.4" {{ $nilaiValue == 0.4 ? 'selected' : '' }}>0.4</option>
                            </select>
                        </div>
                        @endforeach

                        <div>
                            <label for="">Keterangan : <br><ul>
                                <li>0.4 = Sangat Baik</li>
                                <li>0.3 = Baik</li>
                                <li>0.2 = Cukup</li>
                                <li>0.1 = Kurang</li>
                            </ul></label>
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <!-- End Edit Modal -->

    <form id="delete-form-{{ $alt->id }}" action="{{ route('decision.delete', $alt->id) }}" method="POST" style="display: none;">
        @csrf
        @method('DELETE')
    </form>

    @endforeach


    @include('public.notif')

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    @include('public.js')

</body>

</html>