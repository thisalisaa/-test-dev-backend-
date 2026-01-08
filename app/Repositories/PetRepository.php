<?php

namespace App\Repositories;

class PetRepository
{
    public function getPets(): array
    {
        return [
            ["jenis" => "Anjing", "ras" => "Golden Retriever", "nama" => "Otto", "karakteristik" => ["Energik", "Senang bermain bola"], "favorite" => true],
            ["jenis" => "Anjing", "ras" => "Siberian Husky", "nama" => "Max", "karakteristik" => ["Bulu lebat", "Mata Biru"], "favorite" => true],
            ["jenis" => "Anjing", "ras" => "Beagle", "nama" => "Bob", "karakteristik" => ["Ceria", "Aktif mengajak bermain"], "favorite" => false],
            ["jenis" => "Kucing", "ras" => "Persia", "nama" => "Luna", "karakteristik" => ["Anggun", "Manja"], "favorite" => true],
            ["jenis" => "Kucing", "ras" => "British Short Hair", "nama" => "Milo", "karakteristik" => ["Cerdas", "Aktif"], "favorite" => true],
            ["jenis" => "Ikan", "ras" => "Koi", "nama" => "Nana", "karakteristik" => "Indah", "favorite" => false],
            ["jenis" => "Ikan", "ras" => "Ikan Mas", "nama" => "Goldie", "karakteristik" => "Cerah", "favorite" => false],
        ];
    }
}
