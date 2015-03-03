window.onload = function () {
    //-------------------------------------------------------------------------
    // define an event listener for the '#createShopForm'
    //-------------------------------------------------------------------------
    var createShopForm = document.getElementById('createShopForm');
    if (createShopForm !== null) {
        createShopForm.addEventListener('submit', validateShopForm);
    }

    function validateShopForm(event) {
        var form = event.target;

        if (!confirm("Is the form data correct?")) {
            event.preventDefault();
        }
    }

    //-------------------------------------------------------------------------
    // define an event listener for the '#createProgrammerForm'
    //-------------------------------------------------------------------------
    var editShopForm = document.getElementById('editShopForm');
    if (editShopForm !== null) {
        editShopForm.addEventListener('submit', validateShopForm);
    }

    //-------------------------------------------------------------------------
    // define an event listener for any '.deleteShop' links
    //-------------------------------------------------------------------------
    var deleteLinks = document.getElementsByClassName('deleteShop');
    for (var i = 0; i !== deleteLinks.length; i++) {
        var link = deleteLinks[i];
        link.addEventListener("click", deleteLink);
    }

    function deleteLink(event) {
        if (!confirm("Are you sure you want to delete this shop?")) {
            event.preventDefault();
        }
    }

};

