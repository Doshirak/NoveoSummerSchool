var list = document.getElementById("list");

for (var i = 0; i < 10; ++i) { 
    var element = document.createElement("ol");
    var checkbox = document.createElement("input");
	element.appendChild(checkbox);
	element.innerHTML="text";
	list.appendChild(element);
}

