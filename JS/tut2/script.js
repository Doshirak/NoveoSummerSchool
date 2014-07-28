var list = document.getElementById("list");
var n = 3;
var s = 0;

function info() {
    alert("Выбрано " + s + " пунктов");
}

for (var i = 0; i < n; ++i) {
    var checkbox = document.createElement("input");
    checkbox.setAttribute("type", "checkbox");
    checkbox.setAttribute("id", "checkbox" + i);
    checkbox.addEventListener("click", function () {
        if (this.checked) {
            alert("Вы выбрали пункт " + this.id.slice("checkbox".length));
            ++s;
        }
        else {
            --s;
        }
        superCheckbox.checked = (s == n);

        info();
    });

    var element = document.createElement("ol");
    element.innerHTML = "Пункт " + i;
    element.appendChild(checkbox);

    list.appendChild(element);

}

var superCheckbox = document.createElement("input");
superCheckbox.setAttribute("type", "checkbox");
superCheckbox.setAttribute("id", "super");
superCheckbox.addEventListener("click", function () {
    var value = (this.checked) ? true : false;
    for (var i = 0; i < n; ++i) {
        var checkbox = document.getElementById("checkbox" + i);
        checkbox.checked = value;
    }
    s = n * value;

    info();
});

var element = document.createElement("ol");
element.innerHTML = "Выбрать все";

element.appendChild(superCheckbox);
list.appendChild(element);
