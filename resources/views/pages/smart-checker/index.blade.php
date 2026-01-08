@extends('layouts.dashboard')

@section('scripts')
    <script src="{{ asset('assets/js/smart-checker.js') }}"></script>
@endsection

@section('content')

<div class="row">
    <div class="col-12">

        {{-- cek palindrome --}}
        <div class="grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Palindrome Checker</h4>
                    <p class="card-description">Cek apakah nama hewan palindrome + panjang karakter</p>

                    <input type="text" id="palText" class="form-control" placeholder="Masukkan kata...">

                    <button class="btn btn-primary mt-2" onclick="checkPalindrome()">Cek</button>

                    <div id="palResult" class="mt-3"></div>
                </div>
            </div>
        </div>


        {{-- even number --}}
        <div class="grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Even Number Checker</h4>
                    <p class="card-description">Array: [15,18,3,9,6,2,12,14]</p>

                    <button class="btn btn-success" onclick="checkEven()">Proses</button>

                    <div id="evenResult" class="mt-3"></div>
                </div>
            </div>
        </div>


        {{-- anagram --}}
        <div class="grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Anagram Checker</h4>
                    <p class="card-description">Cek apakah dua kata anagram</p>

                    <input type="text" id="word1" class="form-control mb-2" placeholder="Kata pertama">
                    <input type="text" id="word2" class="form-control" placeholder="Kata kedua">

                    <button class="btn btn-warning mt-2" onclick="checkAnagram()">Cek</button>

                    <div id="anaResult" class="mt-3"></div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection
