function ValidateForm(){
    var element = document.forms["myForm"]["login"].value;
    var name = document.forms["myForm"]["name"].value;
    var pass = document.forms["myForm"]["pass"].value;
    var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
    var address = document.forms["myForm"]["email"].value;
    if(element.length < 3 || element.length > 90){
        alert("Недопустимая длина логина");
        return false;
    }
    else if (name.length < 2 || name.length > 50) {
        alert("Недопустимая длина имени");
        return false;
    }
    else if (pass.length < 2 || pass.length > 16) {
        alert("Недопустимая длина пароля (от 2 до 16 символов)");
        return false;
    }
    else
    if(reg.test(address) == false) {
        alert('Введите корректный e-mail');
        return false;

    }
}