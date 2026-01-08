document.addEventListener("DOMContentLoaded", function () {

    const csrfTokenMeta = document.querySelector('meta[name="csrf-token"]');
    const csrfToken = csrfTokenMeta ? csrfTokenMeta.getAttribute('content') : null;

    // expose function ke global supaya bisa dipanggil dari onclick
    window.formatJson = function () {

        const input = document.getElementById("jsonInput");
        const output = document.getElementById("jsonOutput");
        const errorBox = document.getElementById("errorBox");

        if (!input || !output || !errorBox) return;

        const raw = input.value.trim();

        errorBox.innerHTML = "";
        output.innerHTML = "Processing...";

        let jsonData;

        // VALIDASI JSON
        try {
            jsonData = JSON.parse(raw);
        } catch (e) {
            errorBox.innerHTML =
                `<span class="badge bg-danger">JSON Tidak Valid: ${e.message}</span>`;
            output.innerHTML = "";
            return;
        }

        fetch("/api/json/format", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": csrfToken
            },
            body: JSON.stringify({ data: jsonData })
        })
        .then(res => {
            if (!res.ok) throw new Error("Server error");
            return res.json();
        })
        .then(result => {
            output.innerHTML = JSON.stringify(result.data, null, 4);
            errorBox.innerHTML =
                `<span class="badge bg-success">✓ JSON berhasil diformat!</span>`;
        })
        .catch(error => {
            console.error("Error:", error);
            errorBox.innerHTML =
                `<span class="badge bg-danger">Gagal memformat JSON: ${error.message}</span>`;
            output.innerHTML = "";
        });
    };

});
