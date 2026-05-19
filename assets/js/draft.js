quill.on('text-change', function(){
    const html = quill.root.innerHTML;

    localStorage.setItem(
        'draft_kegiatan', html
    )
})

window.addEventListener('load', function() {
    const draft =
        localStorage.getItem('draft_deskripsi');

    if (draft) {
        quill.root.innerHTML = draft;
    }

});