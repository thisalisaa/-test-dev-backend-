document.addEventListener("DOMContentLoaded", function () {

    const container = document.getElementById("statCards");


    function loadStatistics() {
        fetch("/api/pets/statistics")
            .then(res => res.json())
            .then(result => {
                const data = result.data;
                container.innerHTML = "";

                let totalSemua = 0;

                Object.keys(data).forEach(type => {
                    totalSemua += data[type];

                    container.innerHTML += `
                        <div class="col-md-3 grid-margin stretch-card">
                            <div class="card shadow-sm">
                                <div class="card-body text-center">
                                    <h5 class="card-title text-capitalize">${type}</h5>
                                    <h2 class="text-warning">${data[type]}</h2>
                                    <p>Jumlah Hewan ${type}</p>
                                </div>
                            </div>
                        </div>
                    `;
                });

                // Card total semua hewan
                container.insertAdjacentHTML("afterbegin", `
                    <div class="col-md-3 grid-margin stretch-card">
                        <div class="card shadow-sm ">
                            <div class="card-body text-center">
                                <h5 class="card-title">Total Semua Hewan</h5>
                                <h2 class="text-warning">${totalSemua}</h2>
                                <p>Akumulasi seluruh jenis hewan</p>
                            </div>
                        </div>
                    </div>
                `);
            })
            .catch(() => {
                Swal.fire("Error", "Gagal memuat statistik hewan", "error");
            });
    }

    loadStatistics();

});
