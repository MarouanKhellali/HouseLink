import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;


// Responsive sideBar 
window.onload = function() {
    Alpine.data('yourComponentName', () => ({
        isSideMenuOpen: false,
    }));
}

Alpine.start();
