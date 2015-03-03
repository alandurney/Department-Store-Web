window.onload = function () {
    //-------------------------------------------------------------------------
    // define an event listener for the '#createProgrammerForm'
    //-------------------------------------------------------------------------
    var createProductForm = document.getElementById('createProductForm');
    if (createProductForm !== null) {
        createProductForm.addEventListener('submit', validateProductForm);
    }

    function validateProductForm(event) {
        var form = event.target;

        if (!confirm("Is the form data correct?")) {
            event.preventDefault();
        }
    }

    //-------------------------------------------------------------------------
    // define an event listener for the '#createProgrammerForm'
    //-------------------------------------------------------------------------
    var editProductForm = document.getElementById('editProductForm');
    if (editProductForm !== null) {
        editProductForm.addEventListener('submit', validateProductForm);
    }

    //-------------------------------------------------------------------------
    // define an event listener for any '.deleteProgrammer' links
    //-------------------------------------------------------------------------
    var deleteLinks = document.getElementsByClassName('deleteProduct');
    for (var i = 0; i !== deleteLinks.length; i++) {
        var link = deleteLinks[i];
        link.addEventListener("click", deleteLink);
    }

    function deleteLink(event) {
        if (!confirm("Are you sure you want to delete this product?")) {
            event.preventDefault();
        }
    }

};


