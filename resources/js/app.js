import "./bootstrap"; // Ini harusnya sudah ada dari Breeze
import * as bootstrap from "bootstrap"; // Tambahkan ini untuk JS Bootstrap

// Tambahkan kode JavaScript/AJAX untuk form pengajuan di sini
document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("formPengajuanBantuan");
    if (form) {
        form.addEventListener("submit", async function (e) {
            e.preventDefault(); // Mencegah submit form default

            const formData = new FormData(form);
            try {
                const response = await fetch(form.action, {
                    method: "POST",
                    body: formData,
                    headers: {
                        "X-CSRF-TOKEN": document
                            .querySelector('meta[name="csrf-token"]')
                            .getAttribute("content"),
                    },
                });

                const result = await response.json();

                if (response.ok) {
                    alert(result.message);
                    form.reset(); // Reset form setelah sukses
                } else {
                    // Tangani error validasi atau error server lainnya
                    if (response.status === 422 && result.errors) {
                        let errorsHtml = "<ul>";
                        for (const key in result.errors) {
                            errorsHtml += `<li>${result.errors[key].join(
                                ", "
                            )}</li>`;
                        }
                        errorsHtml += "</ul>";
                        alert("Terjadi kesalahan validasi:\n" + errorsHtml);
                    } else if (response.status === 409 && result.message) {
                        alert(result.message); // Untuk NIK sudah terdaftar
                    } else {
                        alert(
                            result.message ||
                                "Terjadi kesalahan yang tidak diketahui."
                        );
                    }
                }
            } catch (error) {
                console.error("Error:", error);
                alert("Terjadi kesalahan koneksi. Silakan coba lagi.");
            }
        });
    }
});
