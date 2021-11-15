$(function() {

    $("#userDropdown").click(function(e) {

        e.preventDefault();
        $(".dropdown-menu").slideToggle();

    });

    $(".category_delete").click(function(e) {

        e.preventDefault();
        var id = $(this).data("id");
        $(".dialog").fadeIn(500);

        $("#delete").click(function() {
            e.preventDefault();
            $(".dialog").fadeOut();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({

                url: '/admin/category/delete',
                method: "post",
                data : {
                    id : id
                },
                success: function(data) {
                    window.location = "/admin/categories";

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
