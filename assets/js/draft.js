// draft.js - perbaikan pada bagian hapus draft
document.addEventListener('DOMContentLoaded', function () {

    const kegiatanInput = document.getElementById('kegiatan');

    // Bagian 1: Load & Auto Save (hanya jalan jika ada Quill)
    if (typeof quill !== 'undefined' && kegiatanInput) {
        const draft = localStorage.getItem('draft_kegiatan');
        if (draft) {
            quill.root.innerHTML = draft;
            kegiatanInput.value = draft;
        }

        quill.on('text-change', function () {
            const html = quill.root.innerHTML;
            localStorage.setItem('draft_kegiatan', html);
            kegiatanInput.value = html;
        });

        const form = document.querySelector('form');
        if (form) {
            form.addEventListener('submit', function () {
                kegiatanInput.value = quill.root.innerHTML;
                localStorage.removeItem('draft_kegiatan');
            });
        }
    }

    // Bagian 2: Tombol Hapus Draft (khusus index.php)
    const containerTugas = document.querySelector('.container-tugas');

    if (containerTugas) {
        containerTugas.addEventListener('click', function (event) {
            const tombolHapus = event.target.closest('.hapus-draft');

            if (tombolHapus) {
                event.preventDefault();

                // Cek dulu sebelum akses, karena di index.php quill & kegiatanInput = null
                if (typeof quill !== 'undefined') {
                    quill.root.innerHTML = '';
                }

                if (kegiatanInput) {          // ← sudah aman, tidak akan error
                    kegiatanInput.value = '';
                }

                localStorage.removeItem('draft_kegiatan');

                alert('Draft kegiatan berhasil dihapus!');
                window.location.reload();
            }
        });
    }
});