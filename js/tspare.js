// JavaScript Document
//filters for toolspare.php table.
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
	function tspare(){
	var input,
		fil1,fil2,fil3,fil4,fil5,fil7;
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
		input = document.getElementById("Input7");
  		fil7 = input.value.toUpperCase();
		table = document.getElementById("myTable");
  		/*filter1*/
		tr = table.getElementsByTagName("tr");
		  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    td2 = tr[i].getElementsByTagName("td")[2];
	td3 = tr[i].getElementsByTagName("td")[3];
	td4 = tr[i].getElementsByTagName("td")[4];
	td5 = tr[i].getElementsByTagName("td")[8];
	td7 = tr[i].getElementsByTagName("td")[9];
	if (td && td2) {
      if (td.innerHTML.toUpperCase().indexOf(fil1) > -1 && td2.innerHTML.toUpperCase().indexOf(fil2) > -1 && td3.innerHTML.toUpperCase().indexOf(fil3) > -1 && td4.innerHTML.toUpperCase().indexOf(fil4) > -1 && td5.innerHTML.toUpperCase().indexOf(fil5) > -1 && td7.innerHTML.toUpperCase().indexOf(fil7) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}/*end*/