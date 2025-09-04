document.addEventListener('DOMContentLoaded', () => {
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const navbarLinks = document.getElementById('navbar-links');

    if(mobileMenuButton && navbarLinks) {
        mobileMenuButton.addEventListener('click', () => {
            navbarLinks.classList.toggle('hidden');
            navbarLinks.classList.toggle('flex');
        });
    }

    const toiletMenuButton = document.getElementById('toilet-menu-button');
    const toiletSubmenu = document.getElementById('toilet-submenu');
    const toiletMenuArrow = document.getElementById('toilet-menu-arrow');

    if(toiletMenuButton && toiletSubmenu && toiletMenuArrow) {
        toiletMenuButton.addEventListener('click', () => {
            toiletSubmenu.classList.toggle('hidden');
            toiletMenuArrow.classList.toggle('rotate-180');
        });
    }
});
