$("#sendMail").on("click", function () {

    var reg = /^([A-Za-z0-9]_{0,1})+\@+([A-Za-z]{2,})+\.([ru]{2})$/;
    var reg1 = /^([A-Za-z0-9]_{0,1})+\@+([A-Za-z]{2,})+\.([by]{2})$/;
    var reg2 = /^([A-Za-z0-9]_{0,1})+\@+([A-Za-z]{2,})+\.([com]{3})$/;
    var reg3 = /^([A-Za-z0-9]_{0,1})+\@+([A-Za-z]{2,})+\.([net]{3})$/;
    var valname = /^[А-Я][а-я]{1,20}$/;
    var tel = /^[0-9]{13,16}$/;
    var fname = $("#fname").val().trim();
    var lname = $("#lname").val().trim();
    var email = $("#email").val().trim();
    var mob = $("#mob").val().trim();
    var message = $("#message").val().trim();

    if (valname.test(fname) == false) {
        alert('Введите корректное имя');
        return false;
    } else if (valname.test(lname) == false) {
        alert('Введите корректную фамилию');
        return false;
    } else if(reg.test(email) == false && reg1.test(email) == false && reg2.test(email) == false && reg3.test(email) == false) {
        alert('Введите корректный e-mail');
        return false;
    }
    else if(tel.test(mob) == false) {
        alert('Введите корректный номер телефона от 13 до 16 цифр');
        return false;
    }
    else if (message.length < 5){
        alert("Введите сообщение не менее 5 символов");
        return false;
    }

    $.ajax({
        url: 'ajax/mail.php',
        type: 'POST',
        cache: false,
        data: { 'fname': fname, 'lname': lname, 'email': email, 'mob': mob, 'message': message},
        dataType: 'html',
        beforeSend: function () {
            $("#sendMail").prop("disabled", true);
        },
        success: function (data) {
            if(!data)
                alert("Сообщение будет отправлено только с удалённого сервера!");
            else
                $("#form_input").trigger("reset");
            $("#sendMail").prop("disabled", false);
        }
    });

});