import './bootstrap';
import 'bootstrap/dist/js/bootstrap.bundle.min.js';
import 'bootstrap-icons/font/bootstrap-icons.css';

import Swal from 'sweetalert2';
window.Swal = Swal;

import Alpine from 'alpinejs';
import './datatable';

window.Alpine = Alpine;
Alpine.start();