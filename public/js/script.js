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





// yaha h menue wala java h 


document.addEventListener("DOMContentLoaded", function () {

    const buttons = document.querySelectorAll(".menu-category");
    const items = document.querySelectorAll(".menu-item");


    buttons.forEach(function (button) {

        button.addEventListener("click", function () {

            const category = this.getAttribute("data-category");


            // Active button
            buttons.forEach(function (btn) {
                btn.classList.remove("active");
            });

            this.classList.add("active");


            // Show selected card
            items.forEach(function (item) {

                if (item.getAttribute("data-category") === category) {
                    item.style.display = "block";
                } else {
                    item.style.display = "none";
                }

            });

        });

    });

});




// ye navbar ke. liye h javascript h ise acche se use karo 
document.addEventListener("DOMContentLoaded", function () {

    const menuButton = document.getElementById("cafeMenuButton");
    const mobileMenu = document.getElementById("cafeMobileMenu");

    menuButton.addEventListener("click", function () {

        if (mobileMenu.style.display === "block") {
            mobileMenu.style.display = "none";
        } else {
            mobileMenu.style.display = "block";
        }

    });

});

