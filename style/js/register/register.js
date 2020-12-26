$(document).ready(function () {
    $('.reg_btn').on('click', function () {

        var login = $('.login').val();
        var email = $('.email').val();
        var pass =  $('.password').val();
        var repPass =  $('.passwordrepit').val();
        var gender =  $('.gender').val();

        $.ajax({
            url: '?page=register',
            type: 'POST',
            dataType: 'html',
            data: {do_register: true, login: login, email: email, password: pass, passwordrepit: repPass, gender: gender}
        }).success(function (data) {
            $('.for-modal').html(data);
            setTimeout(function () {
                $('.swal2-container').remove();
            }, 5555);
        })
    })
})