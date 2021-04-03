var $ =jQuery.noConflict();
/*----------------------------Random-------------------------------------*/
$.extend({ 
  password: function (length, special) {
    var iteration = 0;
    var password = "";
    var randomNumber;
    if(special == undefined){
        var special = false;
    }
    while(iteration < length){
        randomNumber = (Math.floor((Math.random() * 100)) % 94) + 33;
        if(!special){
            if ((randomNumber >=33) && (randomNumber <=47)) { continue; }
            if ((randomNumber >=58) && (randomNumber <=64)) { continue; }
            if ((randomNumber >=91) && (randomNumber <=96)) { continue; }
            if ((randomNumber >=123) && (randomNumber <=126)) { continue; }
        }
        iteration++;
        password += String.fromCharCode(randomNumber);
    }
    return password;
  }
});
$(document).ready(function(){

	if($(".btn_random").length>0){
		$(".btn_random").click(function(){
			randomString=$.password(10);
			$(this).parent().parent().children().children(".random_str").val(randomString);
		});		
	}
});
/*-------------------------------------------------------------------*/
$(function() {
if($(".jquery_date").length >0)
{
	$('.jquery_date').each( function() {
		$( ".jquery_date" ).datepicker({changeMonth: true,changeYear: true, dateFormat: "yy/mm/dd",minDate: 0});
	});
}
if($(".jquery_datetime").length >0)
{
	$('.jquery_datetime').each( function() {
		$( ".jquery_datetime" ).datetimepicker({changeMonth: true,changeYear: true, dateFormat: "yy/mm/dd",timeFormat: "HH:mm:ss",minDate: 0});
	});
}
});

/*-------------------------------------------------------------------*/
function check_disable(obj,a){
$value=obj.value;
name_post='field-name-post-type'+a;
name_taxonomy ='field-name-taxonomy-type'+a;
if(($value == '5')||($value == '8'))
{
	if($value == '5')
	{
		document.getElementById('field-name-post-type'+a).name=name_post;
	}
	else
	{
		document.getElementById('field-name-post-type'+a).name=name_taxonomy;
	}
	document.getElementById('field-name-post-type'+a).removeAttribute('disabled');
	document.getElementById('field-name-post-type'+a).focus();
	
}

else
{
	document.getElementById('field-name-post-type'+a).value="";
	document.getElementById('field-name-post-type'+a).setAttribute('disabled','disabled');
}
//alert('field-name-post-type'+a);
}

function delete_img_upload($a,$key,$postid,$url_plugin)
{
url = $url_plugin+'jamnews-delete-img.php';
jQuery(document).ready(function($) 

	{		
		$('.delete'+$a).click(function () {
			$.post('', {
				//a: $(this).find('input.post_id6').attr('value')
			}, function(data) {
				//var content = $( data ).find( '#content_delete' );
				var content='<input type="hidden" name="delete-'+$key+'" value="'+$key+'" />';
				//$( "#title_upload_ajax" ).empty().append( content);
				$( "#title_upload_ajax"+$a ).empty().append('');
				$( "#img_upload_ajax"+$a ).empty().append(content);
			});
		});
	}
);
}
function backup_db(url){
	var theAnswer = confirm("Do you want to backup your database of website?");
	 if (theAnswer){
     
	 window.location.href=url;
	 	 
	}
	
 //otherwise display another message
	else{
    return false;
	}
} 	function check_Number(e) {		var unicode = e.keyCode;		if ((unicode != 8)&&(unicode != 110)) {			if ((unicode < 48 || unicode > 57)&&(unicode < 96 || unicode > 105)) {				return false;			}		}	}	 function Comma(Num) { 	  		Num += '';		Num = Num.replace(',', ''); Num = Num.replace(',', ''); Num = Num.replace(',', '');		Num = Num.replace(',', ''); Num = Num.replace(',', ''); Num = Num.replace(',', '');		x = Num.split('.');		x1 = x[0];		x2 = x.length > 1 ? '.' + x[1] : '';		var rgx = /(\d+)(\d{3})/;		while (rgx.test(x1))			x1 = x1.replace(rgx, '$1' + ',' + '$2');		return x1 + x2;	} 