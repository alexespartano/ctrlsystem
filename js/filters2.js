// JavaScript Document

/*Desarrollado por Alejandro Romero Aldrete y Gilberto Bustamante Sanchez*/
function clear(oForm){ 
    
  var elements = oForm.elements; 
    
  oForm.reset();

  for(i=0; i<elements.length; i++) {
      
	field_type = elements[i].type.toLowerCase();
	
	switch(field_type) {
	
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
	
	
	
	
	function filter2(){
	var input,
		fil1,fil2,fil3,fil4,fil5,fil6,fil7;
		var count=0;
		input = document.getElementById("Input1");
  		fil1 = input.value.toUpperCase();
		input = document.getElementById("Input2");
  		fil2 = input.value.toUpperCase();
		input = document.getElementById("Input3");
  		fil3 = input.value.toUpperCase();
		input = document.getElementById("Input4");
  		fil4 = input.value.toUpperCase();
		input = document.getElementById("Input5");
  		fil5 = input.value.toUpperCase();
		input = document.getElementById("Input6");
  		fil6 = input.value.toUpperCase();
		input = document.getElementById("Input7");
  		fil7 = input.value.toUpperCase();
  		input = document.getElementById("Input8");
  		fil8 = input.value.toUpperCase();
		table = document.getElementById("myTable");
  		/*filter1*/
		tr = table.getElementsByTagName("tr");
		  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[5];
    td2 = tr[i].getElementsByTagName("td")[4];
	td3 = tr[i].getElementsByTagName("td")[2];
	td4 = tr[i].getElementsByTagName("td")[3];
	td5 = tr[i].getElementsByTagName("td")[8];
	td6 = tr[i].getElementsByTagName("td")[14];
	td7 = tr[i].getElementsByTagName("td")[9];
	td8 = tr[i].getElementsByTagName("td")[18];
	if (td && td2) {
      if (td.innerHTML.toUpperCase().indexOf(fil1) > -1 && td2.innerHTML.toUpperCase().indexOf(fil2) > -1 && td3.innerHTML.toUpperCase().indexOf(fil3) > -1 && td4.innerHTML.toUpperCase().indexOf(fil4) > -1 && td5.innerHTML.toUpperCase().indexOf(fil5) > -1 && td6.innerHTML.toUpperCase().indexOf(fil6) > -1 && td7.innerHTML.toUpperCase().indexOf(fil7) > -1 && td8.innerHTML.toUpperCase().indexOf(fil8) > -1) {
        tr[i].style.display = "";
        count= count + 1;
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
document.getElementById("con").innerHTML = count;
}/*end*/