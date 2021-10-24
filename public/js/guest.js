$(function () {

    $(".addtocart").click(function (e) {

        e.preventDefault();

        var Id = $(this).data("id");
        var Name = $(this).data("name");

        var price = $(this).data("price");

        var fm = $(this).closest("form")[0];

        var Quantity = fm.quantity.value;
        var Token = fm._token.value;
        var cart_total = $(".cart .badge");

        if (Quantity == "") {
            Quantity = 1;
        } else if (Quantity < 0) {
            $('input[name="quantity"]').focus(function (e) {
                e.preventDefault();
                alert("invalid value");
            });
        }

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': Token
            }
        });

        $.ajax({

            url: '/cart/add',
            type: "POST",
            data: {
                product_id: Id,
                product_name: Name,
                quantity: Quantity,
                price: price
            },
            success: function (data) {

                cart_total.text(data.quantity);

            },
            error: function (error) {

                console.log(error);
            }



        });

    });



    $(".deletefromcart").click(function (e) {

        e.preventDefault();

        var Id = $(this).data("id");

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr("content"),
            }
        });

        $.ajax({

            url: '/cart/delete',
            type: "POST",
            data: {
                product_id: Id
            },
            success: function (data) {
                location.reload();

            },
            error: function (error) {
                console.log(error);
            }

        });
    });
});
