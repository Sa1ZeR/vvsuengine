$(document).ready(function () {
    $('.remove_post').on('click', function (e) {
        e.preventDefault()
        var href = $('.remove_post').attr('href');
        var id = href.substr(href.lastIndexOf('=')+1, href.length);
        $.ajax({
            url: '?page=post_remove',
            type: 'get',
            dataType: 'html',
            data: {id: id}
        }).success(function (data) {
            $('.for-modal').html(data);
        });
        $(this).parent().parent().addClass('bounceOut');
        $obj = $(this).parent().parent();
        setTimeout(function () {
            $obj.remove();
        }, 600)
    })
});