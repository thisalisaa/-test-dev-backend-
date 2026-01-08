<?php

namespace App\Http\Controllers;

use App\Services\PetService;
use Illuminate\Http\Request;

class PetController extends Controller
{
    public function __construct(private PetService $petService) {}

    // Soal 1 - Mengambil data hewan peliharaan
    public function getAllPets()
    {
        return response()->json([
            "message" => "All Pets Data",
            "data" => $this->petService->getAllPets()
        ]);
    }

    // Soal 2 - Menambahkan Badak Jawa bernama Rino
    public function addRino()
    {
        return response()->json([
            "message" => "Rino Added",
            "data" => $this->petService->addRino()
        ]);
    }

    // **TAMBAHAN: Reset data ke awal**
    public function resetPets()
    {
        return response()->json([
            "message" => "Pets Data Reset",
            "data" => $this->petService->resetPets()
        ]);
    }

    //Soal 3 - Mengambil hewan kesayangan dengan sorting 
    public function sortFavorite(Request $request)
    {
        $order = $request->query("order", "asc");

        return response()->json([
            "message" => "Favorite Pets Sorted ($order)",
            "data" => $this->petService->sortFavorite($order)
        ]);
    }

    // Soal 4 - Mengganti kucing Persia menjadi Maine Coon
    public function replacePersia()
    {
        return response()->json([
            "message" => "Persian Cat Replaced With Maine Coon",
            "data" => $this->petService->replacePersianWithMaineCoon()
        ]);
    }

    // Soal 5 - Menghitung jumlah hewan berdasarkan jenisnya
    public function statistics()
    {
        return response()->json([
            "message" => "Pet Count By Type",
            "data" => $this->petService->countByType()
        ]);
    }

    // Soal 6 - Mengecek hewan yang memiliki nama palindrome
    public function palindrome()
    {
        return response()->json([
            "message" => "Palindrome Pets",
            "data" => $this->petService->getPalindromePets()
        ]);
    }

    // Soal 7 - Mengambil bilangan genap dan jumlah totalnya
    public function evenNumbers()
    {
        return response()->json([
            "message" => "Even Numbers",
            "data" => $this->petService->getEvenNumbers()
        ]);
    }

    // Soal 8 - Mengecek apakah dua kata merupakan anagram
    public function anagram(Request $request)
    {
        $firstText = $request->input("first");
        $secondText = $request->input("second");

        return response()->json([
            "message" => "Anagram Result",
            "is_anagram" => $this->petService->isAnagram($firstText, $secondText)
        ]);
    }

    // Soal 9 - Memformat JSON sesuai kebutuhan
    public function formatJson(Request $request)
    {
        return response()->json([
            "message" => "Formatted JSON",
            "data" => $this->petService->formatJson($request->input("data", []))
        ]);
    }
}
