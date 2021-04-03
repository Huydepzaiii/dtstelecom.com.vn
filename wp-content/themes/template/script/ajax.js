var xmlhttp;
var xmlhttp1;
function GetXmlHttpObject()
{
	if (window.XMLHttpRequest)
	{
		// code for IE7+, Firefox, Chrome, Opera, Safari
		return new XMLHttpRequest();
	}
	if (window.ActiveXObject)
	{
		// code for IE6, IE5
		return new ActiveXObject("Microsoft.XMLHTTP");
	}
	return null;
} 
/**********************Gio Hang******************************/
function ajax_gio_hang($page_id,$task,$id_product)
{   
  
	xmlhttp=GetXmlHttpObject();
		
	var url ="?page_id="+encodeURI($page_id)+"&task="+encodeURI($task)+"&product_id="+encodeURI($id_product);
	
	xmlhttp.onreadystatechange = function()
	{
		if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
		{
			
			document.getElementById("menu_2").innerHTML = xmlhttp.responseText;
			
		}
	}
	xmlhttp.open("GET", url, true);
	xmlhttp.send(null);
	
}
function ajax_gio_hang_so_luong($page_id,$task,$id_product)
{   
  
	xmlhttp=GetXmlHttpObject();
    $id_so_luong=document.getElementById("so_luong").value;
	$id_mau=document.getElementById("id_mau_sac").value;
	$id_size=document.getElementById("id_size").value;
	
	var url ="?page_id="+encodeURI($page_id)+"&task="+encodeURI($task)+"&product_id="+encodeURI($id_product)+"&product_so_luong="+encodeURI($id_so_luong)+"&id_mau="+encodeURI($id_mau)+"&id_size="+encodeURI($id_size);
	
	xmlhttp.onreadystatechange = function()
	{
		if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
		{
			
			document.getElementById("menu_2").innerHTML = xmlhttp.responseText;
			
		}
	}
	xmlhttp.open("GET", url, true);
	xmlhttp.send(null);
	
	
	
}
function ajax_list_gio_hang($page_id,$task,$id_product)
{   
  
	xmlhttp=GetXmlHttpObject();
		
	var url ="?page_id="+encodeURI($page_id)+"&task="+encodeURI($task)+"&product_id="+encodeURI($id_product);
	
	xmlhttp.onreadystatechange = function()
	{
		if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
		{
			/*parent.ajax_gio_hang(61,'defaul',0 );*/
			document.getElementById("list_gio_hang").innerHTML = xmlhttp.responseText;
			
		}
	}
	xmlhttp.open("GET", url, true);
	xmlhttp.send(null);
	
	
	
	
}
function ajax_list_gio_hang_1($page_id,$task,$id_product)
{   
  
	xmlhttp=GetXmlHttpObject();
		
	var url ="?page_id="+encodeURI($page_id)+"&task="+encodeURI($task)+"&product_id="+encodeURI($id_product);
	
	xmlhttp.onreadystatechange = function()
	{
		if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
		{
			
			document.getElementById("menu_2").innerHTML = xmlhttp.responseText;
			
		}
	}
	xmlhttp.open("GET", url, true);
	xmlhttp.send(null);
	
}
/*************************************************************/