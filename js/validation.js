$(document).ready(function() {
    $("#add_product").validate({
        errorClass: 'validation-error', // Add a custom class to error messages
        rules: {
            // Add validation rules for your static fields here
            category: {
                required: true,
                min: 1, 
            },
            subCategory: {
                required: true,
                min: 1, 
            },
            productName: "required",
            "image1": "required",
            fabric: {
                required: true,
                min: 1, 
            },
            price: "required",
            color:  {
                required: true,
                min: 1,
            },
            size: {
                required: true,
                min: 1, 
            },
            quantity: "required",
            // Add validation rules for dynamic fields here
            "image1[]": "required",
            "price[]": "required",
            "color[]": "required",
            "size[]":  {
                required: true,
                min: 1, 
            },
            "quantity[]": "required",
        },
        messages: {
            // Add custom error messages for your static fields here
            category: {
                required: "Please select a category",
                min: "Please select a category",
            },
            subCategory: {
                required: "Please select a sub-category",
                min: "Please select a sub-category",
            },
            productName: "Please enter a product name",
            "image1": "Please select an image",
            fabric: "Please select a fabric",
            price: "Please enter a price",
            color: "Please select a color",
            size: "Please select a size",
            quantity: "Please enter a quantity",
            // Add custom error messages for dynamic fields here
            "image1[]": "Please select an image",
            "price[]": "Please enter a price",
            "color[]": "Please select a color",
            "size[]": "Please select a size",
            "quantity[]": "Please enter a quantity",
        },
        errorPlacement: function(error, element) {
            // Display error messages in a custom way
            if (element.is(":input")) {
                error.insertAfter(element); // Display errors after input fields
            } else if (element.is("select")) {
                error.insertAfter(element.closest(".mb-2").find(".error-msg")); // Display errors after the dropdown
            }
        },
        submitHandler: function(form) {
            
            form.submit();
        }
    });
});