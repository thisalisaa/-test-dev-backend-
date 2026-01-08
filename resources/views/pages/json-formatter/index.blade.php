@extends('layouts.dashboard')

@section('scripts')
    <script src="{{ asset('assets/js/json-formatter.js') }}"></script>
@endsection

@section('content')
    <div class="row">

        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">JSON Formatter</h4>
                    <p class="card-description">
                        Masukkan JSON dari <strong>assets/json/case.json</strong> lalu sistem akan memformat menjadi
                        struktur sesuai expectation.
                    </p>

                    <textarea id="jsonInput" rows="12" class="form-control" placeholder="Paste JSON Case di sini..."></textarea>

                    <button class="btn btn-primary mt-3" onclick="formatJson()">
                        Proses JSON
                    </button>

                    <div class="mt-3" id="errorBox"></div>

                </div>
            </div>
        </div>


        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Result</h4>

                    <pre id="jsonOutput" style="background:#111;color:#0f0;padding:10px;border-radius:5px;height:400px;overflow:auto;">
Hasil akan muncul di sini...
                </pre>

                </div>
            </div>
        </div>

    </div>
@endsection
