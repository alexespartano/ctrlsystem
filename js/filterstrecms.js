// JavaScript Document

/*Desarrollado por Alejandro Romero Aldrete y Gilberto Bustamante Sanchez*/
function clear(oForm) {

    var elements = oForm.elements;

    oForm.reset();

    for (i = 0; i < elements.length; i++) {

        field_type = elements[i].type.toLowerCase();

        switch (field_type) {

            case "text":
            case "password":
            case "textarea":
            case "hidden":
                elements[i].value = "";
                break;
            default:
                break;
        }
    }
}




function films() {
    var input,
        fil1, fil2, fil3, fil4, fil5;
    var count = 0;
    input = document.getElementById("Input1");
    fil1 = input.value.toUpperCase();
    input = document.getElementById("Input2");
    fil2 = input.value.toUpperCase();
    input = document.getElementById("Input3");
    fil3 = input.value.toUpperCase();
    table = document.getElementById("myTable");
    /*filter1*/
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[0];
        td2 = tr[i].getElementsByTagName("td")[5];
        td3 = tr[i].getElementsByTagName("td")[4];
        if (td && td2) {
            if (td.innerHTML.toUpperCase().indexOf(fil1) > -1 && td2.innerHTML.toUpperCase().indexOf(fil2) > -1 && td3.innerHTML.toUpperCase().indexOf(fil3) > -1) {
                tr[i].style.display = "";
                count = count + 1;
            } else {
                tr[i].style.display = "none";
            }
        }
    }
    document.getElementById("con").innerHTML = count;
} /*end*/