import './bootstrap';
import '@jalali-js/web';
import '@jalali-js/web/date-picker.css';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

const picker = document.getElementById('published_at_picker');
const input = document.getElementById('published_at');

picker?.addEventListener('change', (event) => {
    input.value = event.detail.value ?? '';
});