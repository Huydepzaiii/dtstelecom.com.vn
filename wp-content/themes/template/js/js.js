var curScrollTop=0;jQuery(window).scroll(function(){if(jQuery(window).scrollTop()>600){jQuery('.dv-menu').addClass('transf');}else{jQuery('.dv-menu').removeClass('transf');}if(jQuery(window).scrollTop()>100){jQuery('.dv-menu').addClass('dv-small-menu');}else{jQuery('.dv-menu').removeClass('dv-small-menu');}if(jQuery(window).scrollTop()<curScrollTop){jQuery('.dv-menu').removeClass('transf');}curScrollTop=jQuery(window).scrollTop();});$('body').click(function(e){$(".dv-pos-timkiem").hide();$(".dv-pos-timkiem").attr("data","0");$(".rs_data").attr("data","0");$(".dv-js-mua").hide();});$(".dv-pos-timkiem").click(function(event){event.stopPropagation();});function SHOW_timkiem(){event.stopPropagation();var check=$(".dv-pos-timkiem").attr("data");if(check=="0"){$(".dv-pos-timkiem").attr("data","1");$(".dv-pos-timkiem").show();}else{$(".dv-pos-timkiem").attr("data","0");$(".dv-pos-timkiem").hide();}}function CHECK_send_lienhe(){if($(".ip_lienhe_name").val()==''){$(".ip_lienhe_name").focus();alert("Bạn chưa nhập họ tên!");return false;}if($(".ip_lienhe_dienthoai").val()==''){$(".ip_lienhe_dienthoai").focus();alert("Bạn chưa nhập số điện thoại!");return false;}if($(".ip_lienhe_noidung").val()==''){$(".ip_lienhe_noidung").focus();alert("Bạn chưa nhập nội dung!");return false;}if($(".ip_lienhe_captcha").val()==''){$(".ip_lienhe_captcha").focus();alert("Bạn chưa nhập mã bảo vệ!");return false;}return true;}function SHOW_all_hd(cls_sh,cls_hide){$(cls_hide).hide(300);$(cls_sh).show(300);}function SHOW_nd_js(obj,cls){$(".ul-tit a").removeClass("active");$(obj).addClass("active");$(".dv-tm-cont > div").removeClass("active");$(cls).addClass("active");}$(".dv-tm-cont li").click(function(){var attr_cls=$(this).attr("class");if(attr_cls=="active"){$(this).attr("class","");}else{$(this).attr("class","active");}});function KIEMTRA_tenmien(){var names=$('#domain_names').val();var cls=$('.ul-tit .active').data('id');var ext='';$('.dv-tm-cont .'+cls).find('.active').each(function(){ext+=$(this).html()+",";});if(!names){$('#domain_names').focus();alert('Bạn chưa nhập tên miền!');return false;}if(!ext){alert('Bạn chưa chọn tên mở rộng!');return false;}$('.dv-kq-tm').html('<img src="main_img/loadingAnimation.gif"/>');jQuery.ajax({type:"POST",url:"/check-domain/",data:"name="+names+"&ext="+ext,success:function(output){$(".dv-kq-tm").html(output);}});}function XEM_whois(obj,domain){$(obj).addClass("load");jQuery.ajax({type:"POST",url:"/whois-domain/",data:"domain="+domain,success:function(output){$(obj).removeClass("load");$(".dv-popup").html('<div class="dv-cont-pop" onclick="REMO_whois()"></div><div class="dv-pop-child">'+output+'</div>');}});}function REMO_whois(){$(".dv-popup").html("");}function TIMKIEM_gd(cls){var key=$(cls).val();if(key!=''){key=key.replace("#","");key=key.replace(/\#/g,"");key=key.replace(/ /g,"+");key=key.replace(/http:\/\//g,"");key=key.replace(/https:\/\//g,"");key=key.replace(/\//g,"");key=key.replace(/\.thietkewebnhanh\.vn/g,"");key=key.replace(/www\./g,"");window.location.href="/kho-giao-dien/?key="+key;}else{$(cls).focus();}}$(document).ready(function(){$('.key_timkiem').keypress(function(event){var keycode=(event.keyCode?event.keyCode:event.which);if(keycode=='13'){TIMKIEM_gd(".key_timkiem");}});});$(document).ready(function(){$('.key_timkiem_2').keypress(function(event){var keycode=(event.keyCode?event.keyCode:event.which);if(keycode=='13'){TIMKIEM_gd(".key_timkiem_2");}});});function LAY_chuso(cls){var str=$(cls).val();str=str.toLowerCase();str=str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g,"a");str=str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g,"e");str=str.replace(/ì|í|ị|ỉ|ĩ/g,"i");str=str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g,"o");str=str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g,"u");str=str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g,"y");str=str.replace(/đ/g,"d");str=str.replace(/!|@|\$|%|\^|\*|\(|\)|\+|\=|\<|\>|\?|\/|,|\.|\:|\'| |\"|\&|\#|\[|\]|\;|\||\{|\}|~/g,"");str=str.replace(/^\-+|\-+$/g,"");str=str.replace(/\–/g,"");str=str.replace(/\\/g,"");str=str.replace(/[^a-zA-Z0-9]+/g,"");str=str.replace(/ + /g,"");$(cls).val(str);}function CHECK_email(email){var regex=/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;if(regex.test(email)){return true;}return false;}function CHECK_goi(id,thoigian,price){$(".cls-checkgoi").removeClass("active");$(".cls-checkgoi-"+id).addClass("active");LOAD_nam_mua(id);$(".js_goidv").val(id);$(".text_nammua").html(thoigian);$(".right-price").html(price);$(".jss_so_nam_mua").val(1)}function SHOW_name_mua(obj){if($(obj).attr("data")==0){$(".dv-js-mua").show();$(obj).attr("data","1");}else{$(".dv-js-mua").hide();$(obj).attr("data","0");}}$(".rs_data").click(function(event){event.stopPropagation();});function ADD_nammua(text,val,price){$(".text_nammua").text(text);$(".jss_so_nam_mua").val(val);$(".rs_data").attr("data","0");$(".dv-js-mua").hide();$(".right-price").html(price);}function LOAD_nam_mua(val){jQuery.ajax({type:"POST",url:"/check-price-name/",data:{"val":val},success:function(output){$(".dv-js-mua").html(output);}});}LOAD_nam_mua('1');function CHECK_dangky(obj){var goidichvu=$(".js_goidv").val();var ho_ten=$(".ho_ten").val();var so_dien_thoai=$(".so_dien_thoai").val();var dia_chi=$(".dia_chi").val();var email=$(".email").val();var check_val=$(".check_val").val();var magiaodien=$(".magiaodien").val();magiaodien=magiaodien.replace(/\#/g,"");var jss_so_nam_mua=$(".jss_so_nam_mua").val();var cmnd=$(".cmnd").val();var cls_mabaove=$(".cls_mabaove").val();var cls_code=$(".cls_code").val();var send=$(obj).attr("data");$(obj).addClass("active");if(!CHECK_email(email)){alert("Địa chỉ email không hợp lệ!");$(".email").focus();return false;}else if(cls_mabaove==''){alert("Bạn chưa nhập mã bảo vệ!");$(".cls_mabaove").focus();return false;}else
if(send==0){$(".dvpopup-dk").show();$(".dvpopup-dk-load").show();$(obj).attr("data","1");jQuery.ajax({type:"POST",url:"/dang-ky-su-dung/",data:{"check_val":check_val,"goidichvu":goidichvu,"ho_ten":ho_ten,"so_dien_thoai":so_dien_thoai,"dia_chi":dia_chi,"email":email,"check_id":glo_name_js,"magiaodien":magiaodien,"jss_so_nam_mua":jss_so_nam_mua,"cmnd":cmnd,"cls_mabaove":cls_mabaove,"cls_code":cls_code},success:function(output){console.log(output);if(output=='-aa10')alert("Mã bảo vệ không đúng!.");else if(output=='-aa100')alert("Lỗi đăng ký, vui lòng F5 trình duyệt và thử lại!.");else if(output=='err')alert("Lỗi chọn giao diện!!! Quý khách liên hệ với QBT để được giúp đở.");else if(output==-1)alert("Mã giao diện không tồn tại!!! Quý khách liên hệ với QBT để được giúp đở.");else{$('body,html').animate({scrollTop:0},800);$(".dv-cont-child-dangky").hide();$(".accept_dk").show();try{output=JSON.parse(output);}catch(e){alert("Lỗi đăng ký, vui lòng thử lại sau!!!");}$(".r_goidichvu").html(output.goi_dv);$(".r_url_site").html(output.link_demo);$(".r_admin_site").html(output.link_admin);$(".r_thoihan_mua").html(output.thoihanmua);$(".r_magd").html(output.ma_giaodien);$(".r_admin").html(output.user);$(".r_mkadmin").html(output.matkhau);$(".r_chiphi").html(output.chiphi);}$(".dvpopup-dk").hide();$(".dvpopup-dk-load").hide();$(obj).attr("data","0");$(obj).removeClass("active");}});}};function CLOSE_popup(){$(".JS_popup").html("");}function THEM_popup(name,url){$(".JS_popup").html('<div class="dv-iframe-cont " onclick="CLOSE_popup()"></div><div class="dv-iframe"><div class="tit"><span>'+name+'</span> <a class="pop-de " onclick="CLOSE_popup()"></a></div><iframe src="'+url+'"></iframe></div>');}function CHANGE_cart(key,sl){$(".cls-cart-list").hide();jQuery.ajax({type:"POST",url:"/update-cart/",data:{"key":key,"sl":sl},success:function(output){window.location.reload();}});};$(function(){$(".btn-menu").click(function(e){$(".menu-run ul").removeClass("menu-height-0");$(".menu-run ul").removeClass("menu-height-active");$(".menu-run ul").removeClass("menu-height-opaciti");$(".menu-run ul li").removeClass("menu-li-active");$(".menu-run ul li").removeClass("menu-li-active-vback");if($(this).attr('data')==0){$(".menu-run>ul").addClass("active");$(this).attr('data','1');}else{$(".menu-run>ul").removeClass("active");$(this).attr('data','0');}$(".menu-run ul").removeClass("menu-height-0");$(".menu-run ul").removeClass("menu-height-active");$(".menu-run ul li").removeClass("menu-li-active");e.stopPropagation();});$('body').click(function(e){if($(".btn-menu").attr('data')==1){$(".menu-run ul").removeClass("menu-height-0");$(".menu-run ul").removeClass("menu-height-active");$(".menu-run ul").removeClass("menu-height-opaciti");$(".menu-run ul li").removeClass("menu-li-active");$(".menu-run ul li").removeClass("menu-li-active-vback");$(".menu-run>ul").removeClass("active");$(".btn-menu").attr('data','0');}});$(function(){$(".menu-run ul").find('ul').prepend('<li class="dl-back js-menu-back"><span class="cur " onclick="GO_menu_back(this)">[Back]</span></li>');})
$(".menu-run li a").click(function(e){var witd=$(window).width();if(witd<1000){if(e.clientX>(witd-70)){$(".menu-run ul").removeClass("menu-height-0");$(".menu-run ul").removeClass("menu-height-active");$(".menu-run ul").removeClass("menu-height-opaciti");$(".menu-run ul li").removeClass("menu-li-active");$(this).parents("ul").addClass("menu-height-0");$(this).parents("ul").addClass("menu-height-opaciti");$(this).parents("ul").eq(0).find("ul").addClass("menu-height-0");$(this).parents("li").eq(0).find("ul").first().removeClass("menu-height-0");$(this).parents("li").eq(0).find("ul").first().addClass("menu-height-active");$(this).parents("li").eq(0).addClass("menu-li-active");$(this).parents("li").eq(0).find("ul").first().parents("li").addClass("menu-li-active");return false;}}});var _old=jQuery.Event.prototype.stopPropagation;jQuery.Event.prototype.stopPropagation=function(){this.target.nodeName!=='button'&&_old.apply(this,arguments);};});function GO_menu_back(obj){$(".menu-run ul").removeClass("menu-height-0");$(".menu-run ul").removeClass("menu-height-active");$(".menu-run ul").removeClass("menu-height-opaciti");$(".menu-run ul li").removeClass("menu-li-active");$(".menu-run ul li").removeClass("menu-li-active-vback");$(obj).parents("ul").addClass("menu-height-0");$(obj).parents("ul").parents("ul").addClass("menu-height-opaciti");$(obj).parents("ul").find("ul").first().parents("li").addClass("menu-li-active-vback");$(obj).parents("ul").eq(0).parents("ul").eq(0).addClass("menu-height-active");event.stopPropagation();};