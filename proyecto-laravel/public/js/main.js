var url = 'http://proyecto-laravel.com.devel';

window.addEventListener("load", function() {
    document.addEventListener('click', function(e) {
        // Si hace clic en un "like"
        if (e.target.classList.contains('btn-like')) {
            const imageId = e.target.dataset.id; // ✅ más limpio que getAttribute('data-id')

            e.target.classList.add('btn-dislike');
            e.target.classList.remove('btn-like');
            e.target.setAttribute('src', url+'/img/heart-black.png');

            fetch('/dislike/' + imageId, {
                method: 'GET',
                headers: { 'X-Requested-With': 'XMLHttpRequest' }
            })
            .then(res => res.json())
            .then(data => console.log('Like guardado:', data))
            .catch(err => console.error(err));
        }

        // Si hace clic en un "dislike"
        else if (e.target.classList.contains('btn-dislike')) {
            const imageId = e.target.dataset.id;

            e.target.classList.remove('btn-dislike');
            e.target.classList.add('btn-like');
            e.target.setAttribute('src', url+'/img/heart-red.png');

            fetch('/like/' + imageId, {
                method: 'GET',
                headers: { 'X-Requested-With': 'XMLHttpRequest' }
            })
            .then(res => res.json())
            .then(data => console.log('Dislike eliminado:', data))
            .catch(err => console.error(err));
        }
    });

    document.querySelectorAll('.btn-like, .btn-dislike').forEach(el => {
        el.style.cursor = 'pointer';
    });
});
