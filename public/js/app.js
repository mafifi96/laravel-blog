$(function() {

    $("#userDropdown").click(function(e) {

        e.preventDefault();
        $(".dropdown-menu").slideToggle();

    });

    $(".addcat").click(function (e) {
        //e.preventDefault();
        //$(this).attr("disabled","disabled");
        //$(this).closest('form').submit();


    });

    $(".product_delete").click(function(e) {



        e.preventDefault();
        var id = $(this).data("id");
        $(".dialog").fadeIn(500);
        $("#delete").click(function() {
            e.preventDefault();
            $(".dialog").fadeOut();
            (500);


            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({

                url: '/admin/product/delete',
                method: "POST",
                data: {
                    id: id
                },

                success: function(data) {
                    location.reload();

                },
                error: function(data) {
                    console.log(data);
                }
            });

        });

        $("#cancel").click(function(e) {

            e.preventDefault();
            $(".dialog").fadeOut(500);
        });



    });

});
