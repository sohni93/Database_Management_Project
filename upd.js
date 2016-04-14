function upd(n){
     console.log("in loadWeapons"+ n);
    var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
               
                document.getElementById("try").innerHTML = xmlhttp.responseText;
            }
        };
		
        xmlhttp.open("GET", "try2.php?z="+n, true);
		
		
        xmlhttp.send();
    
}