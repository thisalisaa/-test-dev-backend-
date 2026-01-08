document.addEventListener("DOMContentLoaded", function () {

    const csrfTokenMeta = document.querySelector('meta[name="csrf-token"]');
    const csrfToken = csrfTokenMeta ? csrfTokenMeta.getAttribute('content') : null;

    const petsBody = document.getElementById("petsBody");
    const filterFavorite = document.getElementById("filterFavorite");
    const sortOrder = document.getElementById("sortOrder");
    const btnRino = document.getElementById("btnRino");
    const btnReplace = document.getElementById("btnReplace");
    const btnReset = document.getElementById("btnReset");


    // load data 
    function loadPets() {
        fetch("/api/pets")
            .then(res => res.json())
            .then(result => {
                let pets = result.data;

                const filter = filterFavorite.value;
                const sort = sortOrder.value;

                if (filter === "favorite") pets = pets.filter(p => p.favorite);
                if (filter === "non") pets = pets.filter(p => !p.favorite);

                if (sort === "asc") pets.sort((a, b) => a.nama.localeCompare(b.nama));
                if (sort === "desc") pets.sort((a, b) => b.nama.localeCompare(a.nama));

                petsBody.innerHTML = "";

                pets.forEach((pet, index) => {
                    petsBody.innerHTML += `
                        <tr>
                            <td style="text-align:center;">${index + 1}</td>
                            <td>${pet.jenis}</td>
                            <td>${pet.ras}</td>
                            <td>${pet.nama}</td>
                            <td>
                                <ul>
                                    ${
                                        Array.isArray(pet.karakteristik)
                                            ? pet.karakteristik.map(item => `<li>${item}</li>`).join('')
                                            : `<li>${pet.karakteristik}</li>`
                                    }
                                </ul>
                            </td>
                            <td>
                                ${
                                    pet.favorite
                                    ? '<span class="badge bg-danger text-white">Favorite</span>'
                                    : '<span class="badge bg-warning text-white">Tidak Favorite</span>'
                                }
                            </td>
                        </tr>
                    `;
                });
            })
            .catch(() => Swal.fire("Error", "Gagal memuat data hewan!", "error"));
    }

    // tambah rino 
    if (btnRino) {
        btnRino.addEventListener("click", function () {

            Swal.fire({
                title: "Tambah Badak Rino?",
                text: "Rino akan menjadi hewan kesayangan baru Esa",
                icon: "question",
                showCancelButton: true,
                confirmButtonText: "Tambah",
                cancelButtonText: "Batal"
            }).then(result => {
                if (!result.isConfirmed) return;

                fetch("/api/pets/add-rino", {
                    method: "POST",
                    headers: {
                        "X-CSRF-TOKEN": csrfToken
                    }
                })
                .then(res => res.json())
                .then(() => {
                    Swal.fire("Berhasil!", "Rino berhasil ditambahkan!", "success");
                    loadPets();
                })
                .catch(() => Swal.fire("Gagal", "Tidak bisa menambahkan Rino", "error"));
            });
        });
    }

    // ganti persia
    if (btnReplace) {
        btnReplace.addEventListener("click", function () {

            Swal.fire({
                title: "Yakin Ganti Ras?",
                text: "Kucing Persia akan diganti menjadi Maine Coon",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Ganti",
                cancelButtonText: "Batal"
            }).then(result => {
                if (!result.isConfirmed) return;

                fetch("/api/pets/replace-persia", {
                    method: "PATCH",
                    headers: {
                        "X-CSRF-TOKEN": csrfToken
                    }
                })
                .then(res => res.json())
                .then(() => {
                    Swal.fire("Berhasil!", "Persia berhasil diganti!", "success");
                    loadPets();
                })
                .catch(() => Swal.fire("Gagal", "Tidak bisa mengganti Persia", "error"));
            });
        });
    }

    // reset data
    if (btnReset) {
        btnReset.addEventListener("click", function () {

            Swal.fire({
                title: "Reset Data?",
                text: "Semua data akan kembali ke awal",
                icon: "error",
                showCancelButton: true,
                confirmButtonText: "Reset",
                cancelButtonText: "Batal"
            }).then(result => {
                if (!result.isConfirmed) return;

                fetch("/api/pets/reset", {
                    method: "POST",
                    headers: {
                        "X-CSRF-TOKEN": csrfToken
                    }
                })
                .then(res => res.json())
                .then(res => {
                    Swal.fire("Berhasil!", res.message || "Data direset", "success");
                    loadPets();
                })
                .catch(() => Swal.fire("Gagal", "Reset gagal", "error"));
            });
        });
    }

    // filter dan sort
    if (filterFavorite) filterFavorite.addEventListener("change", loadPets);
    if (sortOrder) sortOrder.addEventListener("change", loadPets);

    loadPets();

});
