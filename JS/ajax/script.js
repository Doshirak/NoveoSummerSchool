$(document).ready(function (){
    var monthText = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec'];
    var today = new Date();

    var dayField = document.getElementById("day");
    var monthField = document.getElementById("month");
    var yearField = document.getElementById("year");

    for (var i = 0; i < 31; i++)
        dayField.options[i] = new Option(i + 1, i + 1);

    for (var m = 0; m < 12; m++)
        monthField.options[m] = new Option(monthText[m], monthText[m]);

    var startYear = 1911;
    for (var y = 0; y <= today.getFullYear() - startYear; ++y) {
        yearField.options[y] = new Option(startYear + y, startYear + y);
    }

    var textArea = document.getElementsByName("textArea")[0];
    textArea.value = 'Инженер, люблю кошек';
    var male = document.getElementsByName("sex")[0];
    male.setAttribute("checked", '');
});

function ajax() {
    var str = validate();
    if (str === false) {
        return false;
    }
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange=function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            alert(xmlhttp.responseText);
        }
    };
    xmlhttp.open("POST","ajax.php",true);
    xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xmlhttp.send(str);
    return false;
}

function validate() {

    function info(str) {
        alert("Неправильно заполнены поле " + str);
    }

    var reg1 = new RegExp("^[А-Яа-я]*");

    var lastName = document.getElementsByName("lastName")[0].value;
    if ((lastName.length <= 0) || (!(reg1.test(lastName)) && lastName != '')) {
        info("Фамилия");
        return false;
    }
    var firstName = document.getElementsByName("firstName")[0].value;
    if ((firstName.length <= 0) || (!(reg1.test(firstName)) && firstName != '')) {
        info("Имя");
        return false;
    }
    var patronymic = document.getElementsByName("patronymic")[0].value;
    if ((patronymic.length <= 0) || (!(reg1.test(patronymic)) && patronymic != '')) {
        info("Отчество");
        return false;
    }
    var male = document.getElementsByName("sex")[0];
    var female = document.getElementsByName("sex")[1];
    if ((male.checked || female.checked) == false) {
        info("Пол");
        return false;
    }
    var sex = male.checked ? "мужской" : "женский";

    var cities = document.getElementsByName("city")[0];
    var city = cities.options[cities.selectedIndex].value;

    var reg2 = new RegExp("^.*(?=.*[a-zA-Z]).*$");
    var reg3 = new RegExp("^.*(?=.{8,})(?=.*[a-zA-Z])(?=.*\d).*$");

    var username = document.getElementsByName("username")[0].value;
    if ((username.length <= 0) || (!reg2.test(username) && (username != ''))) {
        info("Логин");
        return false;
    }
    var password = document.getElementsByName("password")[0].value;
    var repeatedPassword = document.getElementsByName("repeatedPassword")[0].value;
    if ((!reg3.test(password)) && (password != '')) {
        info("Пароль");
        return false;
    }
    if ((!reg3.test(repeatedPassword)) && (repeatedPassword != '')) {
        info("Пароль");
        return false;
    }
    if ((password.length <= 0) || (repeatedPassword.length <= 0) || (password != repeatedPassword)) {
        info("Пароль");
        return false;
    }
    var textArea = document.getElementsByName("textArea")[0].value;
    if (textArea.length <= 0) {
        info("О себе");
        return false;
    }

    var year = document.getElementById("year").value;
    var today = new Date();
    var age = today.getYear() + 1900 - year;

    if (age < 18) {
        alert("Вы не проходите по возрастным ограничениям");
        return false;
    }

    str = "lastName=" + lastName + "&";
    str += "firstName=" + firstName + "&";
    str += "patronymic=" + patronymic + "&";
    str += "username=" + username + "&";
    str += "sex=" + sex + "&";
    str += "city=" + city + "&";
    str += "textArea=" + textArea + "&";
    str += "age=" + age;

    return str;
}




