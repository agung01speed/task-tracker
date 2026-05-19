const quill = new Quill('#editor', {
    theme: 'snow'
});

const form = document.querySelector('form');

document.querySelector('form').addEventListener('submit', function() {
    const html = quill.root.innerHTML;

    document.getElementById('kegiatan').value = html;
})