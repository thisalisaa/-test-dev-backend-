@extends('layouts.dashboard')

@section('scripts')
    <script src="{{ asset('assets/js/pets.js') }}"></script>
@endsection


@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Pet Management</h4>
                <p class="card-description">
                    Halaman ini menampilkan daftar hewan peliharaan Esa dan beberapa aksi sesuai kebutuhan test.
                </p>

                <hr>

                {{-- filter untuk mengambil hewan kesayangan Esa secara descending dan ascending.  --}}
                <div class="row mb-3">

                    <div class="col-md-3">
                        <select id="filterFavorite" class="form-control">
                            <option value="all">Semua Hewan</option>
                            <option value="favorite">Hewan Favorite</option>
                            <option value="non">Tidak Favorite</option>
                        </select>
                    </div>

                    <div class="col-md-3">
                        <select id="sortOrder" class="form-control">
                            <option value="none">Tanpa Sorting</option>
                            <option value="asc">Sort A → Z</option>
                            <option value="desc">Sort Z → A</option>
                        </select>
                    </div>

                </div>

                <div class="mb-3">
                    <button id="btnRino" class="btn btn-primary">
                        <i class="fa fa-plus"></i> Tambah Badak Rino
                    </button>

                    <button id="btnReplace" class="btn btn-warning">
                        <i class="fa fa-refresh"></i> Ganti Persia → Maine Coon
                    </button>

                    <button id="btnReset" class="btn btn-danger">
                        <i class="fa fa-undo"></i> Reset Data
                    </button>
                </div>

                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th style="width: 5%; text-align:center;">No</th>
                                <th style="width: 15%;">Jenis</th>
                                <th style="width: 20%;">Ras</th>
                                <th style="width: 15%;">Nama</th>
                                <th style="width: 25%;">Karakteristik</th>
                                <th style="width: 10%;">Favorite</th>
                            </tr>
                        </thead>

                        <tbody id="petsBody">
                        </tbody>

                    </table>
                </div>

            </div>
        </div>
    </div>

@endsection
