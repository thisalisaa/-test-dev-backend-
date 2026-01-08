document.addEventListener("DOMContentLoaded", function () {
    const csrfTokenMeta = document.querySelector('meta[name="csrf-token"]');
    const csrfToken = csrfTokenMeta
        ? csrfTokenMeta.getAttribute("content")
        : null;

    // ================= PALINDROME =================
    window.checkPalindrome = function () {
        const input = document.getElementById("palText");
        const resultBox = document.getElementById("palResult");

        if (!input || !resultBox) return;

        const text = input.value.trim();

        if (!text) {
            resultBox.innerHTML = `<span class="badge bg-warning">Masukkan kata terlebih dahulu</span>`;
            return;
        }

        const normalized = text.toLowerCase();
        const isPalindrome =
            normalized === normalized.split("").reverse().join("");

        fetch("/api/pets/palindrome")
            .then((res) => res.json())
            .then((response) => {
                const pets = response.data || [];
                const found = pets.find(
                    (p) => p.nama.toLowerCase() === normalized
                );

                if (found) {
                    resultBox.innerHTML = `
                        <span class="badge bg-success">Palindrome ✓</span><br>
                        <strong>Nama:</strong> ${found.nama}<br>
                        <strong>Jenis:</strong> ${found.jenis}<br>
                        <strong>Panjang:</strong> ${found.nama.length} karakter<br>
                        <small class="text-muted">Hewan peliharaan Esa</small>
                    `;
                } else if (isPalindrome) {
                    resultBox.innerHTML = `
                        <span class="badge bg-info">Palindrome ✓</span><br>
                        <strong>Panjang:</strong> ${text.length} karakter<br>
                        <span class="badge bg-warning mt-2">Bukan hewan peliharaan Esa</span>
                    `;
                } else {
                    resultBox.innerHTML = `
                        <span class="badge bg-danger">Bukan Palindrome ✗</span><br>
                        <small class="text-muted">"${text}" tidak sama dibaca dari depan dan belakang</small>
                    `;
                }
            })
            .catch(() => {
                resultBox.innerHTML = `<span class="badge bg-danger">Gagal mengecek data</span>`;
            });
    };

    // ================= EVEN NUMBER =================
    window.checkEven = function () {
        const resultBox = document.getElementById("evenResult");
        if (!resultBox) return;

        fetch("/api/numbers/even")
            .then((res) => res.json())
            .then((result) => {
                const numbers = result.data.even_numbers;
                const sum = result.data.sum;

                resultBox.innerHTML = `
                    <strong>Bilangan Genap:</strong> ${numbers.join(", ")}<br>
                    <strong>Total:</strong> ${sum}
                `;
            })
            .catch(() => {
                resultBox.innerHTML = `<span class="badge bg-danger">Gagal memproses data</span>`;
            });
    };

    // ================= ANAGRAM =================
    window.checkAnagram = function () {
        const firstInput = document.getElementById("word1");
        const secondInput = document.getElementById("word2");
        const resultBox = document.getElementById("anaResult");

        if (!firstInput || !secondInput || !resultBox) return;

        const first = firstInput.value.trim();
        const second = secondInput.value.trim();

        if (!first || !second) {
            resultBox.innerHTML = `<span class="badge bg-warning">Masukkan kedua kata</span>`;
            return;
        }

        fetch("/api/anagram", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": csrfToken,
            },
            body: JSON.stringify({ first, second }),
        })
            .then((res) => res.json())
            .then((result) => {
                resultBox.innerHTML = result.is_anagram
                    ? `<span class="badge bg-success">Anagram ✓</span><br>
                   <small>"${first}" dan "${second}" memiliki huruf yang sama</small>`
                    : `<span class="badge bg-danger">Bukan Anagram ✗</span><br>
                   <small>"${first}" dan "${second}" tidak memiliki huruf yang sama</small>`;
            })
            .catch(() => {
                resultBox.innerHTML = `<span class="badge bg-danger">Gagal mengecek anagram</span>`;
            });
    };
});
