import './bootstrap';

(function () {
    axios.get('/api/advertisements').then(response => {
        const {image_url, pixel_url, click_url} = response.data.data;

        const container = document.getElementById('ads');
        const image = document.createElement('img');
        image.loading = 'lazy';
        image.src = image_url;
        image.style.width = '100%';
        image.onclick = () => window.open(click_url, '_blank');

        const pixel = document.createElement('img');
        pixel.loading = 'lazy';
        pixel.src = pixel_url;
        pixel.width = 1;
        pixel.height = 1;

        container.appendChild(image);
        container.appendChild(pixel);

        container.classList.remove('hidden');
    });
})();
