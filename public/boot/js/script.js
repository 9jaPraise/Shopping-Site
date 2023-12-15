
$(document).ready(function () {

    $('.addToCart').click(function (e) {
        e.preventDefault();

        var product_id = $(this).closest('.product_data').find('.post_id').val();
        var product_qty = $(this).closest('.product_data').find('.qty_input').val();

        // alert(product_id);
        // alert(product_qty); to test if the product_id & product_qty is working
        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })

        $.ajax({
            type: "POST",
            url: "/add-to-cart",
            data: {
                'product_id': product_id,
                'product_qty': product_qty,
            },
            success: function (response) {
                alert(response.status);
            }
        });
    });


    //increment/decrement btn
    $('.increment-btn').click(function (e) {
        e.preventDefault();
        // var inc_value = $('.qty_input').val()

        var  inc_value = $(this).closest('.product_data').find('.qty_input').val();//value in increament/decrement-btn
        var value = parseInt(inc_value, 10)  //the value in increament/decrement-btn should not be greater than 10
        value = isNaN(value) ? 0 : value;   //if the value is not a number assign it to 0 else it should be whatever number that is written in it
        if(value < 10){ //increase the value if it is less than 10
           value++;
        //    $('.qty_input').val(value);
        $(this).closest('.product_data').find('.qty_input').val(value);
        }
    });

    $('.decreament-btn').click(function (e) {
        e.preventDefault();
        var  dec_value = $(this).closest('.product_data').find('.qty_input').val(); //value in increament/decrement-btn
        var value = parseInt(dec_value, 10)  //the value in increament/decrement-btn should not be greater than 10
        value = isNaN(value) ? 0 : value;   //if the value is not a number assign it to 0 else it should be whatever number that is written in it
        if(value > 1){ //increase the value if it is less than 10
           value--;
           $(this).closest('.product_data').find('.qty_input').val(value);
        }
    });

    $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })

    //delete product from cart
    $('.delete-cart-btn').click(function (e) {
        e.preventDefault();
        var post_id = $(this).closest('.product_data').find('.post_id').val();

        $.ajax({
            type: "POST",
            url: "delete-cart-item",
            data: {
                'post_id':post_id,
            },
            success: function (response) {
                window.location.reload();
                alert(response.status);
            }
        });
    });

    //change product quantity

    $('.quantity-btn').click(function (e) {
        e.preventDefault();
        var post_id = $(this).closest('.product_data').find('.post_id').val();
        var qty = $(this).closest('.product_data').find('.qty_input').val();

        data = {
            'post_id' : post_id,
            'prod_qty' : qty,
        }

        $.ajax({
            type: "POST",
            url: "update-cart",
            data: data,
            success: function (response) {
                window.location.reload();
                alert(response.status);
            }
        });
    });

});

