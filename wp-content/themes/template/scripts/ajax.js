


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
/************************************************************/
function ajax_chon_tour($page_id,$id_loai)
{   

	xmlhttp=GetXmlHttpObject();
		
	var url ="?page_id="+encodeURI($page_id)+"&task=select_tour&id_loai="+encodeURI($id_loai);
	
	xmlhttp.onreadystatechange = function()
	{
		if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
		{
			
			document.getElementById("sort_tour").innerHTML = xmlhttp.responseText;
			
		}
	}
	xmlhttp.open("GET", url, true);
	xmlhttp.send(null);
	
}
function ajax_chon_danh_muc($page_id,$id_loai)
{   
  
	xmlhttp=GetXmlHttpObject();
		
	var url ="?page_id="+encodeURI($page_id)+"&task=select_danh_lam&id_loai="+encodeURI($id_loai);
	
	xmlhttp.onreadystatechange = function()
	{
		if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
		{
			
			document.getElementById("id_nuoc").innerHTML = xmlhttp.responseText;
			
		}
	}
	xmlhttp.open("GET", url, true);
	xmlhttp.send(null);
	
}
function ajax_doi_iframe($page_id,$id_loai)
{   
    
    
	xmlhttp=GetXmlHttpObject();
		
	var url ="?page_id="+encodeURI($page_id)+"&task=doi_iframe&id_loai="+encodeURI($id_loai);
	
	xmlhttp.onreadystatechange = function()
	{
		if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
		{
			
			document.getElementById("div_iframe").innerHTML = xmlhttp.responseText;
			
		}
	}
	xmlhttp.open("GET", url, true);
	xmlhttp.send(null);
	
}
function ajax_danh_lam_thang_canh($page_id,$id_loai,$page)
{   
	xmlhttp=GetXmlHttpObject();
		
	var url ="?page_id="+encodeURI($page_id)+"&task=ajax_danh_lam_thang_canh&id_loai="+encodeURI($id_loai)+"&page="+encodeURI($page);
	
	xmlhttp.onreadystatechange = function()
	{
		if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
		{
			
			document.getElementById("div_iframe").innerHTML = xmlhttp.responseText;
			
		}
	}
	xmlhttp.open("GET", url, true);
	xmlhttp.send(null);
	
}
function ajax_chon_tour_dat_tour($page_id)
{   
 
  var $tong_so=parseInt(document.getElementById("tong_so_khach").value,10);
 
   $nguoi_lon=parseInt(document.getElementById("nguoi_lon").value,10);
   $tre_em=parseInt(document.getElementById("tre_em").value,10);
   $tre_nho=parseInt(document.getElementById("tre_nho").value,10);
   $tong=$nguoi_lon+$tre_em+$tre_nho;
    
   if($tong > $tong_so)
   {
     alert("Số lượng khách vượt quá số tổng số khách đã chọn ");
	 return ;
   }
   
	xmlhttp=GetXmlHttpObject();
		
	var url ="?page_id="+encodeURI($page_id)+"&task=chon_khach&tong="+encodeURI($tong_so);
	
	xmlhttp.onreadystatechange = function()
	{
		if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
		{
			
			document.getElementById("danh_sach_tour").innerHTML = xmlhttp.responseText;
			
		}
	}
	xmlhttp.open("GET", url, true);
	xmlhttp.send(null);
	
}
/**********************Gio Hang******************************/
function ajax_chon_mau($page_id,$id_catalog)
{   

	xmlhttp=GetXmlHttpObject();
		
	var url ="?page_id="+encodeURI($page_id)+"&id_catalog="+encodeURI($id_catalog);
	
	xmlhttp.onreadystatechange = function()
	{
		if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
		{
			
			document.getElementById("id_ajax").innerHTML = xmlhttp.responseText;
			
		}
	}
	xmlhttp.open("GET", url, true);
	xmlhttp.send(null);
	
}

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
function ajax_list_gio_hang($page_id,$task,$id_product)
{   
  
	xmlhttp=GetXmlHttpObject();
		
	var url ="?page_id="+encodeURI($page_id)+"&task="+encodeURI($task)+"&product_id="+encodeURI($id_product);
	
	xmlhttp.onreadystatechange = function()
	{
		if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
		{
			
			document.getElementById("list_gio_hang").innerHTML = xmlhttp.responseText;
			
		}
	}
	xmlhttp.open("GET", url, true);
	xmlhttp.send(null);
	
}
/*************************************************************/
function check_submit()
{
   $dong_y=document.getElementById("txt_dong_y");
   $txt_ho_ten=document.getElementById("txt_ho_ten").value;
   $txt_dien_thoai=document.getElementById("txt_dien_thoai").value;
   $txt_email=document.getElementById("txt_email").value;
   $tong_so_khach=document.getElementById("tong_so_khach").value;
   $nguoi_lon=document.getElementById("nguoi_lon").value;
  
   if($dong_y.checked==false)
   {
     alert("Bạn chưa đồng ý với các điều kiện của chúng tôi");
     return false;
   }
   if($txt_ho_ten=="")
   {
       alert("Bạn chưa điền họ tên");
       return false;
   }
     if($txt_dien_thoai=="")
   {
       alert("Bạn chưa điền điện thoại");
       return false;
   }
     if($txt_email=="")
   {
       alert("Bạn chưa điền Email");
       return false;
   }
     if($tong_so_khach==0)
   {
       alert("Bạn chưa chọn số khách ");
       return false;
   }
      if($nguoi_lon==0)
   {
       alert("Bạn chưa chọn số người lớn ");
       return false;
   }
   $tong_so_khach=parseInt(document.getElementById("tong_so_khach").value,10);
   $nguoi_lon=parseInt(document.getElementById("nguoi_lon").value,10);
   $tre_em=parseInt(document.getElementById("tre_em").value,10);
   $tre_nho=parseInt(document.getElementById("tre_nho").value,10);
   $tong=$nguoi_lon+$tre_em+$tre_nho;
   if($tong_so_khach!=$tong)
   {
     alert("Tổng số khách người lớn + Trẻ em + Trẻ nhỏ không bằng tổng số khách !");
       return false;
   }
    
   
   return true;
}
  