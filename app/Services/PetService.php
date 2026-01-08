<?php

namespace App\Services;

use App\Repositories\PetRepository;

class PetService
{
    public function __construct(private PetRepository $repository) {}

    // Session
    private function getPets()
    {
        if (!session()->has('pets')) {
            session()->put('pets', $this->repository->getPets());
        }

        return session()->get('pets');
    }

    private function savePets($pets)
    {
        session()->put('pets', $pets);
        return $pets;
    }

    public function resetPets(): array
    {
        session()->forget('pets');
        $pets = $this->repository->getPets();
        session()->put('pets', $pets);
        return $pets;
    }

    // Soal 1 - Ambil semua data hewan
    public function getAllPets(): array
    {
        return $this->getPets();
    }

    // Soal 2 - Tambah Badak Jawa bernama Rino
    public function addRino(): array
    {
        $pets = $this->getPets();

        $pets[] = [
            "jenis" => "Badak",
            "ras" => "Badak Jawa",
            "nama" => "Rino",
            "karakteristik" => ["Pekerja keras"],
            "favorite" => true
        ];

        return $this->savePets($pets);
    }

    // Soal 3 - Sorting hewan favorite asc / desc
    public function sortFavorite(string $order = "asc"): array
    {
        $pets = $this->getPets();

        $favoritePets = array_filter($pets, fn($pet) => $pet["favorite"] === true);

        usort($favoritePets, function ($firstPet, $secondPet) use ($order) {
            return $order === "asc"
                ? strcmp($firstPet["nama"], $secondPet["nama"])
                : strcmp($secondPet["nama"], $firstPet["nama"]);
        });

        return array_values($favoritePets);
    }

    // Soal 4 - Ganti kucing Persia menjadi Maine Coon
    public function replacePersianWithMaineCoon(): array
    {
        $pets = $this->getPets();

        foreach ($pets as &$pet) {
            if ($pet["ras"] === "Persia") {
                $pet["ras"] = "Maine Coon";
            }
        }

        return $this->savePets($pets);
    }

    // Soal 5 - Hitung jumlah hewan berdasarkan jenis
    public function countByType(): array
    {
        $pets = $this->getPets();
        $result = [];

        foreach ($pets as $pet) {
            $jenis = $pet["jenis"];
            $result[$jenis] = ($result[$jenis] ?? 0) + 1;
        }

        return $result;
    }

    // Soal 6 - Cari hewan yang namanya palindrome
    public function getPalindromePets(): array
    {
        $pets = $this->getPets();

        $palindromePets = array_filter($pets, function ($pet) {
            $petName = strtolower($pet["nama"]);
            return $petName === strrev($petName);
        });

        return array_values($palindromePets);
    }

    // Soal 7 - Ambil bilangan genap dan jumlah totalnya
    public function getEvenNumbers(array $numbers = [15, 18, 3, 9, 6, 2, 12, 14]): array
    {
        $evenNumbers = array_filter($numbers, fn($number) => $number % 2 === 0);

        return [
            "even_numbers" => array_values($evenNumbers),
            "sum" => array_sum($evenNumbers)
        ];
    }

    // Soal 8 - Cek apakah dua kata merupakan anagram
    public function isAnagram(string $firstText, string $secondText): bool
    {
        $normalize = function ($text) {
            $text = strtolower(str_replace(" ", "", $text));
            $characters = str_split($text);
            sort($characters);
            return implode("", $characters);
        };

        return $normalize($firstText) === $normalize($secondText);
    }

    // Soal 9 - Format JSON sesuai kebutuhan
    // Soal 9 - Format JSON sesuai kebutuhan
    public function formatJson(array $inputData): array
    {
        $data = $inputData['data'] ?? $inputData;

        $grandTotal = 0;
        $categoryGroups = [];

        // Step 1: Group by category and code
        foreach ($data as $item) {
            $category = $item['category'];
            $code = $item['code'];
            $name = $item['name'];
            $total = $item['total'];

            // Initialize category if not exists
            if (!isset($categoryGroups[$category])) {
                $categoryGroups[$category] = [
                    'category' => $category,
                    'total' => 0,
                    'codes' => []
                ];
            }

            // Initialize code if not exists
            if (!isset($categoryGroups[$category]['codes'][$code])) {
                $categoryGroups[$category]['codes'][$code] = [
                    'total' => 0,
                    'items' => []
                ];
            }

            // Add item to code group
            $categoryGroups[$category]['codes'][$code]['items'][] = [
                'name' => $name,
                'total' => $total
            ];

            // Update totals
            $categoryGroups[$category]['codes'][$code]['total'] += $total;
            $categoryGroups[$category]['total'] += $total;
            $grandTotal += $total;
        }

        // Step 2: Format to expected structure
        $result = [];

        foreach ($categoryGroups as $categoryData) {
            $formattedCodes = [];

            foreach ($categoryData['codes'] as $code => $codeData) {
                $formattedCodes[$code] = [
                    'total' => $codeData['total'],
                    'data' => $codeData['items']
                ];
            }

            $result[] = [
                'category' => $categoryData['category'],
                'total' => $categoryData['total'],
                'data' => $formattedCodes
            ];
        }

        return [
            'total' => $grandTotal,
            'data' => $result
        ];
    }
}
