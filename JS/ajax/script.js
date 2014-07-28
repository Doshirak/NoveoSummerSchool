var str;

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
    var lastName = document.getElementsByName("lastName")[0].value;
    if ((lastName.length <= 0) || (!(/^[А-Я][а-я]*/.test(lastName)) && lastName != '')) {
//        info();
//        return false;
    }
    var firstName = document.getElementsByName("firstName")[0].value;
    if ((firstName.length <= 0) || (!(/^[А-Я][а-я]*/.test(firstName)) && firstName != '')) {
//        info();
//        return false;
    }
    var patronymic = document.getElementsByName("patronymic")[0].value;
    if ((patronymic.length <= 0) || (!(/^[А-Я][а-я]*/.test(patronymic)) && patronymic != '')) {
        //info();
        //return false;
    }
    var male = document.getElementsByName("sex")[0];
    var female = document.getElementsByName("sex")[1];
    if ((male.checked || female.checked) == false) {
        //info();
        //return false;
    }
    var username = document.getElementsByName("username")[0].value;
    if (username.length <= 0) {
        //info();
        //return false;
    }
    var password = document.getElementsByName("password")[0].value;
    var repeatedPassword = document.getElementsByName("repeatedPassword")[0].value;
    if ((!/((?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20})/.test(password)) && (password != '')) {
//        info();
//        return false;
    }
    if ((!/((?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[@#$%]).{6,20})/.test(repeatedPassword)) && (repeatedPassword != '')) {
//        info();
//        return false;
    }
    if ((password.length <= 0) || (repeatedPassword.length <= 0) || (password != repeatedPassword)) {
//        info();
//        return false;
    }
    var textArea = document.getElementsByName("textArea")[0].value;
    if (textArea.length <= 0) {
        //info();
        //return false;
    }

    var year = document.getElementById("year").value;
    var today = new Date();
    var age = today.getYear() + 1900 - year;

    if (age < 18) {
//        info();
        //return false;
    }

    str = '';
    str = "lastName=" + lastName + "&";
    str += "firstName=" + firstName + "&";
    str += "patronymic=" + patronymic + "&";
    str += "username=" + username + "&";
    str += "textArea=" + textArea + "&";
    str += "age=" + age;
    console.log(str);
//    ajax(str);


}

function ajax() {
    validate();
    console.log(str);
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange=function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("myDiv").innerHTML=xmlhttp.responseText;
        }
    };
    xmlhttp.open("POST","ajax.php",true);
    xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xmlhttp.send(str);
    return false;
}

document.getElementById("submit").addEventListener("click", ajax());


