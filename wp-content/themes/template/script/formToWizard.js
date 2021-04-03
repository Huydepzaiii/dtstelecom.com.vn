/* Created by jankoatwarpspeed.com */

(function($) {
    $.fn.formToWizard = function(options) {
        options = $.extend({  
            submitButton: "" 
        }, options); 
        
        var element = this;

        var steps = $(element).find("fieldset");
        var count = steps.size();
        var submmitButtonName = "#" + options.submitButton;
        $(submmitButtonName).hide();

        // 2
        $(element).before("<ul id='steps'></ul>");

        steps.each(function(i) {
            $(this).wrap("<div id='step" + i + "'></div>");
            $(this).append("<p id='step" + i + "commands'></p>");

            // 2
            var name = $(this).find("legend").html();
            $("#steps").append("<li id='stepDesc" + i + "'>Step " + (i + 1) + "<span>" + name + "</span></li>");

            if (i == 0) {
                createNextButton(i);
                selectStep(i);
            }
            else if (i == count - 1) {
                $("#step" + i).hide();
                createPrevButton(i);
            }
            else {
                $("#step" + i).hide();
                createPrevButton(i);
                createNextButton(i);
            }
        });

        function createPrevButton(i) {
            var stepName = "step" + i;
            $("#" + stepName + "commands").append("<a href='#' id='" + stepName + "Prev' class='prev'>< Back</a>");

            $("#" + stepName + "Prev").bind("click", function(e) {
                $("#" + stepName).hide();
                $("#step" + (i - 1)).show();
                $(submmitButtonName).hide();
                selectStep(i - 1);
            });
        }

        function createNextButton(i) {
		 
		 
            var stepName = "step" + i;
            $("#" + stepName + "commands").append("<a href='#' id='" + stepName + "Next' class='next'>Next ></a>");

            $("#" + stepName + "Next").bind("click", function(e) {
			    if(i==0)
				{				   
					
					var $txt_name=document.getElementById("txt_ho_ten").value;
					var $txt_di_dong=document.getElementById("txt_di_dong").value;
					var $txt_email=document.getElementById("txt_email").value;
					var $txt_dia_chi=document.getElementById("txt_dia_chi").value;
					var $txt_tinh_thanh=document.getElementById("txt_tinh_thanh").value;
				    var $txt_quan_huyen=document.getElementById("txt_quan_huyen").value;
				
				
					if($txt_name=="")
					{
					  alert("Bạn chưa điền họ tên");
					  return;
					}
					if($txt_di_dong=="")
					{
					  alert("Bạn chưa điền số điện thoại");
					  return;
					}
					if($txt_di_dong.length <9 || $txt_di_dong.length >11 )
					{
					  alert("Số điện thoại phải lớn hơn 9 số và nhỏ hơn 11");
					  return;
					} 	
					if($txt_email=="")
					{
					  alert("Bạn chưa điền số Email");
					  return;
					}				   
					if($txt_dia_chi=="")
					{
					  alert("Bạn chưa điền địa chỉ");
					  return;
					}
					if($txt_tinh_thanh=="")
					{
					  alert("Bạn chưa điền tỉnh thành");
					  return;
					} 
					if($txt_quan_huyen=="")
					{
					  alert("Bạn chưa điền quận/huyện");
					  return;
					} 						
					$check=document.getElementById("dang_nhap_check_1").checked;
					if($check==true)
					{ 
					   var $txt_ten_nguoi_nhan=document.getElementById("txt_ten_nguoi_nhan").value;
						if($txt_ten_nguoi_nhan=="")
						{
						  alert("Bạn chưa điền tên người nhận");
						  return;
						}
						
					}
					$check_1=document.getElementById("dang_nhap_check_2").checked;
					if($check_1==true)
					{ 
					   var $txt_ten_cong_ty=document.getElementById("txt_ten_cong_ty").value;
						if($txt_ten_cong_ty=="")
						{
						  alert("Bạn chưa điền tên công ty");
						  return;
						}
						 var $txt_dia_chi_cong_ty=document.getElementById("txt_dia_chi_cong_ty").value;
						if($txt_dia_chi_cong_ty=="")
						{
						  alert("Bạn chưa điền địa chỉ công ty");
						  return;
						}
						 var $txt_ma_so_thue=document.getElementById("txt_ma_so_thue").value;
						if($txt_ma_so_thue=="")
						{
						  alert("Bạn chưa điền mã số thuế");
						  return;
						}
						
					}
				}
                $("#" + stepName).hide();
                $("#step" + (i + 1)).show();
                if (i + 2 == count)
                    $(submmitButtonName).show();
                selectStep(i + 1);
				
            });
			
			
        }

        function selectStep(i) {
            $("#steps li").removeClass("current");
            $("#stepDesc" + i).addClass("current");
        }

    }
})(jQuery);



 