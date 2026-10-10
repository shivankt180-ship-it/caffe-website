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


document.addEventListener("DOMContentLoaded", function () {
    const modalElement = document.getElementById("authModal");

    if (!modalElement || !window.bootstrap?.Modal) {
        return;
    }

    const authModal = window.bootstrap.Modal.getOrCreateInstance(modalElement);
    const modeButtons = modalElement.querySelectorAll("[data-auth-mode]");
    const panels = modalElement.querySelectorAll("[data-auth-panel]");
    const modalTitle = document.getElementById("authModalTitle");

    function selectAuthMode(mode, updateUrl = true) {
        if (mode !== "login" && mode !== "register") {
            return;
        }

        modeButtons.forEach(function (button) {
            const isActive = button.dataset.authMode === mode;
            button.classList.toggle("active", isActive);
            button.setAttribute("aria-selected", isActive ? "true" : "false");
        });

        panels.forEach(function (panel) {
            panel.hidden = panel.dataset.authPanel !== mode;
        });

        modalTitle.textContent = mode === "login" ? "Welcome back" : "Create your account";

        if (updateUrl) {
            const currentUrl = new URL(window.location.href);
            currentUrl.searchParams.set("auth", mode);
            window.history.replaceState({}, "", currentUrl);
        }
    }

    modeButtons.forEach(function (button) {
        button.addEventListener("click", function () {
            selectAuthMode(button.dataset.authMode);
        });
    });

    const requestedMode = new URL(window.location.href).searchParams.get("auth");

    if (requestedMode === "login" || requestedMode === "register") {
        selectAuthMode(requestedMode, false);
        authModal.show();
    }

    modalElement.addEventListener("hidden.bs.modal", function () {
        const currentUrl = new URL(window.location.href);

        if (currentUrl.searchParams.has("auth")) {
            currentUrl.searchParams.delete("auth");
            window.history.replaceState({}, "", currentUrl);
        }
    });
});

