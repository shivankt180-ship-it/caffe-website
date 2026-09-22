function showMenu(category, button) {

    // Sabhi category sections hide karo
    document.querySelectorAll('.menu-items').forEach(function(item) {
        item.classList.remove('active-menu');
    });


    // Selected category show karo
    const selectedMenu = document.getElementById(category);

    if (selectedMenu) {
        selectedMenu.classList.add('active-menu');
    }


    // Sabhi category buttons se active remove karo
    document.querySelectorAll('.menu-category').forEach(function(btn) {
        btn.classList.remove('active');
    });


    // Click kiye hue button ko active karo
    button.classList.add('active');
}