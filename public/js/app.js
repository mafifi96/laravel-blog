$(function () {

    $("#userDropdown").click(function (e) {

        e.preventDefault();
        $(".dropdown-menu").slideToggle();

    });


    $(".user_delete").click(function (e) {

        var btn = $(this);
        e.preventDefault();

        $(".dialog").fadeIn(500);

        $("#delete").click(function () {
            e.preventDefault();
            $(".dialog").fadeOut();

            btn.closest('form').submit();

        });

        $("#cancel").click(function (e) {
            e.preventDefault();
            $(".dialog").fadeOut(500);
        });

    });

    $(".post_delete").click(function (e) {

        var id = $(this).data("id");

        e.preventDefault();

        $(".dialog").fadeIn(500);

        $("#delete").click(function () {
            e.preventDefault();
            $(".dialog").fadeOut();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '/admin/post/' + id + '/delete',
                type: 'DELETE',
                success: function (res) {
                    location.reload();
                },
                error: function (err) {
                    console.log(err)
                }
            })

        });

        $("#cancel").click(function (e) {
            e.preventDefault();
            $(".dialog").fadeOut(500);
        });

    });



});


