
$(document).ready(function (){
    var monthText = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec'];
    var today = new Date("day", "month", "year");
    var dayField = document.getElementById("day");
    var monthField = document.getElementById("month");
    var yearField = document.getElementById("year");

    for (var i = 0; i < 31; i++)
        dayField.options[i] = new Option(i + 1, i + 1);

    for (var m = 0; m < 12; m++)
        monthField.options[m] = new Option(monthText[m], monthText[m])

    monthField.options[today.getMonth()] = new Option(monthText[today.getMonth()], monthText[today.getMonth()], true, true); //select today's month

    var thisYear = 1911;
    for (var y = 0; y < 200; ++y) {
        yearField.options[y] = new Option(thisYear, thisYear);
        thisYear += 1;
    }

    var textArea = document.getElementsByName("textArea")[0];
    textArea.value = '';
});

function info() {
    alert("Неправильно заполнены поля");
}

function validate() {
    var lastName = document.getElementsByName("lastName")[0];
    if ((lastName.value.length <= 0) || (!(/^[А-Я][а-я]*/.test(lastName.value)) && lastName.value != '')) {
//        info();
//        return false;
    }
    var firstName = document.getElementsByName("firstName")[0];
    if ((firstName.value.length <= 0) || (!(/^[А-Я][а-я]*/.test(firstName.value)) && firstName.value != '')) {
//        info();
//        return false;
    }
    var patronymic = document.getElementsByName("patronymic")[0];
    if ((patronymic.value.length <= 0) || (!(/^[А-Я][а-я]*/.test(patronymic.value)) && patronymic.value != '')) {
        //info();
        //return false;
    }
    var male = document.getElementsByName("sex")[0];
    var female = document.getElementsByName("sex")[1];
    if ((male.checked || female.checked) == false) {
        //info();
        //return false;
    }
    var username = document.getElementsByName("username")[0];
    if (username.value.length <= 0) {
        //info();
        //return false;
    }
    var password = document.getElementsByName("password")[0];
    var repeatedPassword = document.getElementsByName("repeatedPassword")[0];
    if ((!/((?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[@#$%]).{6,20})/.test(password.value)) && (password.value != '')) {
        info();
        return false;
    }
    if ((!/((?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[@#$%]).{6,20})/.test(repeatedPassword.value)) && (repeatedPassword.value != '')) {
        info();
        return false;
    }
    if ((password.value.length <= 0) || (repeatedPassword.value.length <= 0) || (password.value != repeatedPassword.value)) {
        info();
        return false;
    }
    var textArea = document.getElementsByName("textArea")[0];
    if (textArea.value.length <= 0) {
        //info();
        //return false;
    }

    var year = document.getElementById("year").value;
    var today = new Date();
    var age = today.getYear() + 1900 - year;

    if (age < 18) {
        info();
        //return false;
    }
}

function ajax() {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.open("POST","ajax.php",true);
    xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xmlhttp.send("fname=Henry&lname=Ford");
    xmlhttp.send();
}

