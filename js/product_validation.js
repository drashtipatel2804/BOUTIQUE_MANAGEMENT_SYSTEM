$(document).ready(function () {
    $('form[name="add_product"]').submit(function (e) {
        var categorySelected = $('#category').val() !== '0';
        var subCategorySelected = $('#subCategory').val() !== '0';
        var productName = $('#productName').val().trim();
        var fabricSelected = $('#fabric').val() !== '0';
        var price = $('#price').val().trim();
        var colorSelected = $('#color').val() !== '0';
        var sizeSelected = $('#size').val() !== '0';
        var quantity = $('#quantity').val().trim();
        var imageInput = $('#image1');
        
        
        if (!categorySelected) {
            $('.category-error-msg').show();
            e.preventDefault(); // Prevent form submission
        } else {
            $('.category-error-msg').hide();
        }

        if (!subCategorySelected) {
            $('.sub-category-error-msg').show();
            e.preventDefault(); // Prevent form submission
        } else {
            $('.sub-category-error-msg').hide();
        }

        if (productName === '') {
            $('.product-name-error-message').text('Product name is required').show();
            e.preventDefault(); // Prevent form submission
        } else if (!/^[a-zA-Z\s]+$/.test(productName)) {
            $('.product-name-error-message').text('Only allowed characters in Product name').show();
            e.preventDefault(); // Prevent form submission
        } else {
            $('.product-name-error-message').hide();
        }

        if (!fabricSelected) {
            $('.fabric-error-msg').show();
            e.preventDefault(); // Prevent form submission
        } else {
            $('.fabric-error-msg').hide();
        }

        if (price === '') {
            $('.price-error-message').text('Price is required').show();
            e.preventDefault(); // Prevent form submission
        } else if (price < 0) {
            $('.price-error-message').text('Negative number in price is not allowed').show();
        } else {
            $('.price-error-message').text('');
        }

        if (!colorSelected) {
            $('.color-error-msg').show();
            e.preventDefault(); // Prevent form submission
        } else {
            $('.color-error-msg').hide();
        }

        if (!sizeSelected) {
            $('.size-error-msg').show();
            e.preventDefault(); // Prevent form submission
        } else {
            $('.size-error-msg').hide();
        }

        if (quantity === '') {
            $('.quantity-error-message').text('Quantity is required').show();
            e.preventDefault(); // Prevent form submission
        } else if (quantity < 0) {
            $('.quantity-error-message').text('Negative number in quantity is not allowed').show();
        } else {
            $('.quantity-error-message').text('');
        }
        
         if (imageInput[0].files.length === 0) {
            $('.image-error-message').text('Please select an image');
            e.preventDefault(); // Prevent form submission
        } else {
            // Check if the selected file has a valid extension
            var allowedExtensions = [".jpg", ".jpeg", ".png"];
            var fileName = imageInput.val();
            var fileExtension = fileName.substring(fileName.lastIndexOf('.')).toLowerCase();

            if ($.inArray(fileExtension, allowedExtensions) === -1) {
                $('.image-error-message').text('Only .jpg, .jpeg, and .png files are allowed');
                e.preventDefault(); // Prevent form submission
            }
        }
    });
    $('#category').change(function () {
        if ($('#category').val() !== '0') {
            $('.category-error-msg').hide();
        }
    });
    $('#subCategory').change(function () {
        if ($('#subCategory').val() !== '0') {
            $('.sub-category-error-msg').hide();
        }
    });
    $('#productName').on('input', function () {
        var productName = $(this).val();
        // Check Product Name
        if (productName === '') {
            $('.product-name-error-message').text('Product name is required');
        } else if (!/^[a-zA-Z\s]+$/.test(productName)) {
            $('.product-name-error-message').text('Only allowed characters in product name');
        } else {
            $('.product-name-error-message').text('');
        }
    });

    $('#fabric').change(function () {
        if ($('#fabric').val() !== '0') {
            $('.fabric-error-msg').hide();
        }
    });

    $('#price').on('input', function () {
        var price = $(this).val();
        if (price === '') {
            $('.price-error-message').text('Price is required');
        } else if (price < 0) {
            $('.price-error-message').text('Negative number in Price is not allowed.');
        } else {
            $('.price-error-message').text('');
        }
    });

    $('#color').change(function () {
        if ($('#color').val() !== '0') {
            $('.color-error-msg').hide();
        }
    });

    $('#size').change(function () {
        if ($('#size').val() !== '0') {
            $('.size-error-msg').hide();
        }
    });

    $('#quantity').on('input', function () {
        var quantity = $(this).val();
        if (quantity === '') {
            $('.quantity-error-message').text('Quantity is required');
        } else if (quantity < 0) {
            $('.quantity-error-message').text('Negative number in Quantity is not allowed.');
        } else {
            $('.quantity-error-message').text('');
        }
    });
    
    
    $('#image1').change(function () {
        var errorMessage = $('.image-error-message');
        // Clear the error message when a new file is selected
        errorMessage.text('');
    });


});
