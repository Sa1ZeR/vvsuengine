$(document).ready(function() {
    $('.login').on('change', function () {
        var login = $('.login').val();
        if(login === '') {
            $('.exist-login').html('Данное поле не может быть пустым!').css('color', 'red');
            return;
        }
        $.ajax({
            url: '?page=register',
            type: 'POST',
            dataType: 'html',
            data: {existLogin: true, login: login}
        }).success(function (data) {
            $('.exist-login').html(data);
        })
    })
})