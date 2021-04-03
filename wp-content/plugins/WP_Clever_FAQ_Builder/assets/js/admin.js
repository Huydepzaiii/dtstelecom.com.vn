// from php : cfaq_data
var cfaq_isLinking = false;
var cfaq_links = new Array();
var cfaq_linkCurrentIndex = -1;
var cfaq_canvasTimer;
var cfaq_mouseX, cfaq_mouseY;
var cfaq_linkGradientIndex = 1;
var cfaq_itemWinTimer;
var cfaq_currentDomElement = false;
var cfaq_currentStep = false;
var cfaq_currentStepID = 0;
var cfaq_lock = false;
var cfaq_defaultStep = false;
var cfaq_steps = false;
var cfaq_params;
var cfaq_currentLinkIndex = 0;
var cfaq_settings;
var cfaq_formfield;
var cfaq_currentFaqID = 0;
var cfaq_actTimer;
var cfaq_currentFaq = false;
var cfaq_currentItemID = 0;
var cfaq_canSaveLink = true;
var cfaq_currentFaqID = false; 

cfaq_data = cfaq_data[0];
jQuery(document).ready(function(){   
   jQuery('#cfaq_loader').remove();
    jQuery('#wpcontent').append('<div id="cfaq_loader"><div class="cfaq_spinner"><div class="double-bounce1"></div><div class="double-bounce2"></div></div></div>');
    jQuery('#cfaq_loader .cfaq_spinner').css({
        top: jQuery(window).height() / 2 - jQuery('#wpadminbar').height() / 2
    });
    jQuery(window).resize(function () {
        jQuery('#cfaq_loader .cfaq_spinner').css({
            top: jQuery(window).height() / 2 - jQuery('#wpadminbar').height() / 2
        });
        jQuery('#cfaq_bootstraped').css({
          minHeight: jQuery('#wpcontent').height()
        });
        
    });
    jQuery('#cfaq_bootstraped').css({
      minHeight: jQuery('#wpcontent').height()
    });
    jQuery('#cfaq_stepsContainer').droppable({
        drop: function (event, ui) {
            var $object = jQuery(ui.draggable[0]);
            jQuery.ajax({
                url: ajaxurl,
                type: 'post',
                data: {
                    action: 'cfaq_saveStepPosition',
                    stepID: $object.attr('data-stepid'),
                    posX: parseInt($object.css('left')),
                    posY: parseInt($object.css('top'))
                }
            });
        }
    });
    jQuery("#cfaq_bootstraped [data-toggle='switch']").bootstrapSwitch();
    jQuery('.imageBtn').click(function () {
        cfaq_formfield = jQuery(this).prev('input');
        tb_show('', 'media-upload.php?TB_iframe=true');
        return false;
    });
    window.old_tb_remove = window.tb_remove;
    window.tb_remove = function () {
        window.old_tb_remove();
        cfaq_formfield = null;
    };
    window.original_send_to_editor = window.send_to_editor;
    window.send_to_editor = function (html) {
        if (cfaq_formfield) {
            var alt = jQuery('img', html).attr('alt');
            fileurl = jQuery('img', html).attr('src');
            if (jQuery('img', html).length == 0) {
                fileurl = jQuery(html).attr('src');
                alt = jQuery(html).attr('alt');
            }
            cfaq_formfield.val(fileurl);
            cfaq_formfield.trigger('keyup');
            tb_remove();
        } else {
            window.original_send_to_editor(html);
        }
    };
    
    jQuery('#wpwrap').css({
        height: jQuery('#cfaq_bootstraped').height() + 48
    });
    setInterval(function () {
        if (jQuery('#cfaq_winStep').css('display') == 'block') {
            jQuery('#wpwrap').css({
                height: jQuery('#cfaq_winStep').height() + 48
            });

        } else {
            jQuery('#wpwrap').css({
                height: jQuery('#cfaq_bootstraped').height() + 48
            });

        }
    }, 1000);

    cfaq_canvasTimer = setInterval(cfaq_updateStepCanvas, 30);
    jQuery(document).mousemove(function (e) {
        if (cfaq_isLinking) {
            cfaq_mouseX = e.pageX - jQuery('#cfaq_stepsContainer').offset().left;
            cfaq_mouseY = e.pageY - jQuery('#cfaq_stepsContainer').offset().top;
        }
    });
    jQuery(window).resize(cfaq_updateStepsDesign);
    cfaq_itemWinTimer = setInterval(cfaq_updateWinItemPosition, 30);
    
    if (jQuery('#cfaq_winActivation').is('[data-show="true"]') && document.referrer.indexOf('admin.php?page=cfaq_menu')<0){
      jQuery('#cfaq_winActivation .modal-dialog').hover(function(){
          jQuery(this).addClass('cfaq_hover');
      },function(){
          jQuery(this).removeClass('cfaq_hover');
      });
      cfaq_lock = true;
	  jQuery('#cfaq_closeWinActivationBtn').click(function(){
		if (!cfaq_lock) {
			jQuery('#cfaq_winActivation').modal('hide');
		}
	  });
	  jQuery('#cfaq_closeWinActivationBtn .cfaq_text').data('num',10).html('Wait 10 seconds');
	  cfaq_actTimer = setInterval(function(){
		var num = jQuery('#cfaq_closeWinActivationBtn .cfaq_text').data('num');
		num--;
		if(num>0){
			jQuery('#cfaq_closeWinActivationBtn .cfaq_text').data('num',num).html('Wait '+num+' seconds');
		} else {
			jQuery('#cfaq_closeWinActivationBtn').removeClass('disabled');
			cfaq_lock = false;
			jQuery('#cfaq_closeWinActivationBtn .cfaq_text').data('num','').html('Close');
		}
	  },1000);
    } else {
	jQuery('#cfaq_winActivation').attr('data-show','false');
	}
	jQuery('#cfaq_winActivation').on('hide.bs.modal', function (e) {
		 if (cfaq_lock && !jQuery('#cfaq_winActivation .modal-dialog').is('.cfaq_hover')) {
          e.preventDefault();
        }
	});
    jQuery(document).mousedown(function (e) {
        if (e.button == 2 && cfaq_isLinking) {
            cfaq_isLinking = false;
        }
    });
    jQuery('.form-group').each(function () {
        var self = this;
        if (jQuery(self).find('small').length > 0 && jQuery(self).find('.form-control').length > 0) {
            jQuery(this).find('.form-control').tooltip({
                title: jQuery(self).find('small').html()
            });
        }
    });
    jQuery("#cfaq_bootstraped [data-toggle='switch']").bootstrapSwitch(); 
    jQuery('#cfaq_bootstraped').find('input[type="checkbox"]').each(function () {
        if (jQuery(this).is('[data-toggle="switch"]')) {
            if (jQuery(this).closest('.form-group').find('small').length > 0) {
                jQuery(this).closest('.has-switch').tooltip({
                    title: jQuery(this).closest('.form-group').find('small').html()
                });
            }
        }
    });
    jQuery('#cfaq_stepDescription').summernote({
        height: 200,
        minHeight: null,
        maxHeight: null,
    });    
    jQuery('#cfaq_txtNewQuestion').summernote({
        height: 140,
        minHeight: null,
        maxHeight: null,
    });
    jQuery('.imageBtn').click(function () {
        cfaq_formfield = jQuery(this).prev('input');
        tb_show('', 'media-upload.php?TB_iframe=true');
        return false;
    });
   /* jQuery('#cfaq_stepsOverflow').css({
       height: jQuery(window).height() - 215 
    });*/
    jQuery('#cfaq_winActivation').modal();
    jQuery('[data-toggle="tooltip"]').tooltip();
    cfaq_loadSettings();
});

function cfaq_onGoogleFontChange(){
    if(jQuery('#cfaq_faqFields input[name="useGoogleFont"]').is(':checked')){
        jQuery('#cfaq_faqFields input[name="googleFontName"]').closest('.form-group').slideDown();
    } else {
        jQuery('#cfaq_faqFields input[name="googleFontName"]').closest('.form-group').slideUp();        
    }
}

function cfaq_onSendEmailChanged(){
    if(jQuery('#cfaq_faqFields input[name="sendEmail"]').is(':checked')){       
        jQuery('#cfaq_faqFields input[name="emailSubject"]').closest('.form-group').slideDown();
        jQuery('#cfaq_faqFields input[name="email"]').closest('.form-group').slideDown();
    } else { 
        jQuery('#cfaq_faqFields input[name="emailSubject"]').closest('.form-group').slideUp();
        jQuery('#cfaq_faqFields input[name="email"]').closest('.form-group').slideUp();   
    }
}

function cfaq_getStepByID(stepID) {
    var rep = false;
    jQuery.each(cfaq_steps, function (i) {
        if (this.id == stepID) {
            rep = this;
        }
    });
    return rep;
}
function cfaq_showLoader(){
    jQuery('body').animate({ scrollTop: 0}, 250);
    jQuery('#cfaq_loader').fadeIn();
}
function cfaq_showShortcodeWin(faqID) {
    if (!faqID) {
        faqID = cfaq_currentFaqID;
    }
    jQuery('#cfaq_shortcode_1').val('[clever_faq faq="' + faqID + '"]');
    jQuery('#cfaq_winShortcode').modal('show');
}
function cfaq_checkEmail(email) {
    if (email.indexOf("@") != "-1" && email.indexOf(".") != "-1" && email != "")
        return true;
    return false;
}
function cfaq_addStep(step) {
    var title = '';
    var startStep = 0;
    if (!step.content) {
        title = step;
    } else {
        title = step.title;
    }
    if(title.length>49){
        title = title.substr(0,46)+'...';
    }
    var newStep = jQuery('<div class="cfaq_stepBloc palette palette-clouds"><div class="cfaq_stepBlocWrapper"><h4>' + title + '</h4></div>' +
        '<a href="javascript:" class="cfaq_btnEdit" title="' + cfaq_data.texts['tip_editStep'] + '"><span class="glyphicon glyphicon-pencil"></span></a>' +
        '<a href="javascript:" class="cfaq_btnSup" title="' + cfaq_data.texts['tip_delStep'] + '"><span class="glyphicon glyphicon-trash"></span></a>' +
        '<a href="javascript:" class="cfaq_btnDup" title="' + cfaq_data.texts['tip_duplicateStep'] + '"><span class="glyphicon glyphicon-duplicate"></span></a>' +
        '<a href="javascript:" class="cfaq_btnLink" title="' + cfaq_data.texts['tip_linkStep'] + '"><span class="glyphicon glyphicon-link"></span></a>' +
        '<a href="javascript:" class="cfaq_btnStart" title="' + cfaq_data.texts['tip_flagStep'] + '"><span class="glyphicon glyphicon-flag"></span></a></div>');
    if (step.content && step.content.start == 1) {
        newStep.find('.cfaq_btnStart').addClass('cfaq_selected');
        newStep.addClass('cfaq_selected');
    }
    if (step.elementID) {
        newStep.attr('id', step.elementID);

    } else {
        newStep.uniqueId();
    }

    newStep.children('a.cfaq_btnEdit').click(function () {
        cfaq_openWinStep(jQuery(this).parent().attr('data-stepid'));
    });
    newStep.children('a.cfaq_btnLink').click(function () {
        cfaq_startLink(jQuery(this).parent().attr('id'));
    });
    newStep.children('a.cfaq_btnSup').click(function () {
        cfaq_removeStep(jQuery(this).parent().attr('data-stepid'));
    });
    newStep.children('a.cfaq_btnDup').click(function () {
        cfaq_duplicateStep(jQuery(this).parent().attr('data-stepid'));
    });
    newStep.children('a.cfaq_btnStart').click(function () {
        cfaq_showLoader();
        jQuery('.cfaq_stepBloc[data-stepid]').find('.cfaq_btnStart').removeClass('cfaq_selected');
        jQuery('.cfaq_stepBloc[data-stepid]').find('.cfaq_btnStart').closest('.cfaq_stepBloc').removeClass('cfaq_selected');
        jQuery.each(cfaq_steps, function () {
            var step = this;
            if (step.id != jQuery(this).parent().attr('data-stepid') && step.content.start == 1) {
                step.content.start = 0;
                jQuery.ajax({
                    url: ajaxurl,
                    type: 'post',
                    data: {
                        action: 'cfaq_saveStep',
                        id: step.id,
                        start: 0,
                        faqID: cfaq_currentFaqID,
                        content: JSON.stringify(step.content)
                    }
                });
            }
        });

        jQuery(this).addClass('cfaq_selected');
        jQuery(this).closest('.cfaq_stepBloc').addClass('cfaq_selected');
        var currentStep = cfaq_getStepByID(jQuery(this).parent().attr('data-stepid'));
        currentStep.content.start = 1;
        jQuery.ajax({
            url: ajaxurl,
            type: 'post',
            data: {
                action: 'cfaq_saveStep',
                id: step.id,
                start: 1,
                faqID: cfaq_currentFaqID,
                content: JSON.stringify(currentStep.content)
            },
            success: function () {
                cfaq_loadFaq(cfaq_currentFaqID);
            }
        });
    });


    newStep.draggable({
        containment: "parent",
        handle: ".cfaq_stepBlocWrapper"
    });
    newStep.children('.cfaq_stepBlocWrapper').click(function () {
        if (cfaq_isLinking) {
            cfaq_stopLink(newStep);
        }
    });
    var posX = 10, posY = 10;
    if (step.content && step.content.previewPosX) {
        posX = step.content.previewPosX;
        posY = step.content.previewPosY;
    } else {
        posX = jQuery('#cfaq_stepsOverflow').scrollLeft() + jQuery('#cfaq_stepsOverflow').width() / 2 - 64;
        posY = jQuery('#cfaq_stepsOverflow').scrollTop() + jQuery('#cfaq_stepsOverflow').height() / 2 - 64;
    }
    newStep.hide();
    jQuery('#cfaq_stepsContainer').append(newStep);
    newStep.css({
        left: (posX) + 'px',
        top: posY + 'px'
    });

    newStep.fadeIn();
    setTimeout(cfaq_updateStepsDesign, 250);
    // cfaq_updateStepsDesign();
    jQuery('.cfaq_btnWinClose').parent().click(function () {
        cfaq_closeWin(jQuery(this).parents('.cfaq_window'));
    });
    if (jQuery('#cfaq_stepsContainer .cfaq_stepBloc').length == 0) {
        startStep = 1;
    }
    if (step.id) {
        newStep.attr('data-stepid', step.id);
    } else {
        var title = '';
        if(step.content && step.content.question){
            title = step.content.title;
        }
        jQuery.ajax({
            url: ajaxurl,
            type: 'post',
            data: {
                action: 'cfaq_addStep',
                elementID: newStep.attr('id'),
                faqID: cfaq_currentFaqID,
                previewPosX: posX,
                previewPosY: posY,
                start: startStep,
                title: title
            },
            success: function (step) {
                step = jQuery.parseJSON(step);
                newStep.attr('data-stepid', step.id);
                if (step.start == 1) {
                    newStep.find('.cfaq_btnStart').addClass('cfaq_selected');
                    newStep.addClass('cfaq_selected');
                }
                cfaq_steps.push({
                    content: step
                });
            }
        });
    }
}

function cfaq_saveStep() {
    cfaq_showLoader();
    var stepData = {};
    jQuery('#cfaq_stepTabGeneral').find('input,select,textarea').each(function () {
        if (!jQuery(this).is('[data-toggle="switch"]')) {
            if(jQuery(this).attr('name') != "cfaq_answer"){
                eval('stepData.' + jQuery(this).attr('name') + ' = jQuery(this).val();');
            }
        } else {
            var value = 0;
            if (jQuery(this).is(':checked')) {
                value = 1;
            }
            eval('stepData.' + jQuery(this).attr('name') + ' = value;');
        }
    });
    stepData.action = 'cfaq_saveStep';
    stepData.faqID = cfaq_currentFaqID;
    stepData.id = cfaq_currentStepID;    
    stepData.description = jQuery('#cfaq_stepDescription').code();
    var itemsList = '';
    jQuery('#cfaq_itemsTable tbody tr[data-itemid] td input[name="cfaq_answer"]').each(function(){
        itemsList += jQuery(this).val()+'°'+jQuery(this).closest('tr').attr('data-itemid')+'|';
    });
    if(itemsList.length>0){
        itemsList = itemsList.substr(0,itemsList.length-1);
    }
    stepData.itemsList = itemsList;
    jQuery('.cfaq_stepBloc[data-stepid="' + cfaq_currentFaqID + '"] h4').html(stepData.title);
    cfaq_updateStepsDesign();

    jQuery.ajax({
        url: ajaxurl,
        type: 'post',
        data: stepData,
        success: function (stepID) {
            cfaq_loadFaq(cfaq_currentFaqID);
            cfaq_closeWin(jQuery('#cfaq_winStep'));
        }
    });
}

function cfaq_removeStep(stepID) {
    var i = 0;

    jQuery('.cfaq_stepBloc[data-stepid="' + stepID + '"]').remove();
    jQuery.ajax({
        url: ajaxurl,
        type: 'post',
        data: {
            action: 'cfaq_removeStep',
            stepID: stepID
        },
        success: function () {
        }
    });
}
function cfaq_updateStepsDesign() {
    jQuery('#wpwrap').css({
        height: jQuery('#cfaq_bootstraped').height() + 48
    });
    jQuery('#cfaq_stepsCanvas').attr('width', jQuery('#cfaq_stepsContainer').outerWidth());
    jQuery('#cfaq_stepsCanvas').attr('height', jQuery('#cfaq_stepsContainer').outerHeight());
    jQuery('#cfaq_stepsCanvas').css({
        width: jQuery('#cfaq_stepsContainer').outerWidth(),
        height: jQuery('#cfaq_stepsContainer').outerHeight()
    });
    jQuery('.cfaq_stepBloc > .cfaq_stepBlocWrapper > h4').each(function () {
        jQuery(this).css('margin-top', 0 - jQuery(this).height() / 2);
    });
}

function cfaq_repositionLinkPoint(linkIndex) {
    var link = cfaq_links[linkIndex];
    var originLeft = (jQuery('#' + link.originID).offset().left - jQuery('#cfaq_stepsContainer').offset().left) + jQuery('#' + link.originID).width() / 2;
    var originTop = (jQuery('#' + link.originID).offset().top - jQuery('#cfaq_stepsContainer').offset().top) + jQuery('#' + link.originID).height() / 2;
    var destinationLeft = (jQuery('#' + link.destinationID).offset().left - jQuery('#cfaq_stepsContainer').offset().left) + jQuery('#' + link.destinationID).width() / 2;
    var destinationTop = (jQuery('#' + link.destinationID).offset().top - jQuery('#cfaq_stepsContainer').offset().top) + jQuery('#' + link.destinationID).height() / 2;
    var posX = originLeft + (destinationLeft - originLeft) / 2;
    var posY = originTop + (destinationTop - originTop) / 2;

    jQuery.each(cfaq_links, function (i) {
        if (this.originID == link.destinationID && this.destinationID == link.originID && i < linkIndex) {
            posX += 15;
            posY += 15;
        }
    });
    jQuery('.cfaq_linkPoint[data-linkindex="' + linkIndex + '"]').css({
        left: posX + 'px',
        top: posY + 'px'
    });
}
function cfaq_loadSettings() {
    jQuery.ajax({
        url: ajaxurl,
        type: 'post',
        data: {
            action: 'cfaq_loadSettings'
        },
        success: function (settings) {
            settings = jQuery.parseJSON(settings);
            cfaq_settings = settings;

            jQuery('#cfaq_loader').fadeOut();
        }
    });
}

function cfaq_duplicateStep(stepID){
    cfaq_showLoader();
  jQuery.ajax({
    url: ajaxurl,
    type: 'post',
    data: {
        action: 'cfaq_duplicateStep',
        stepID: stepID
    },
    success: function (newStepID) {
        cfaq_loadFaq(cfaq_currentFaqID);
    }
  });
}

function cfaq_updateStepCanvas() {
    cfaq_linkGradientIndex++;
    if (cfaq_linkGradientIndex >= 30) {
        cfaq_linkGradientIndex = 1;
    }
    var ctx = jQuery('#cfaq_stepsCanvas').get(0).getContext('2d');
    ctx.clearRect(0, 0, jQuery('#cfaq_stepsCanvas').attr('width'), jQuery('#cfaq_stepsCanvas').attr('height'));
    jQuery.each(cfaq_links, function (index) {
        var link = this;
        if (link.destinationID && jQuery('#' + link.originID).length > 0 && jQuery('#' + link.destinationID).length > 0) {
            var posX = parseInt(jQuery('#' + link.originID).css('left')) + jQuery('#' + link.originID).outerWidth() / 2 + 22;
            var posY = parseInt(jQuery('#' + link.originID).css('top')) + jQuery('#' + link.originID).outerHeight() / 2 + 22;
            var posX2 = parseInt(jQuery('#' + link.destinationID).css('left')) + jQuery('#' + link.destinationID).outerWidth() / 2 + 22;
            var posY2 = parseInt(jQuery('#' + link.destinationID).css('top')) + jQuery('#' + link.destinationID).outerHeight() / 2 + 22;
            var grd = ctx.createLinearGradient(posX, posY, posX2, posY2);

            var chkBack = false;
            var cfaq_linkGradientIndexA = cfaq_linkGradientIndex / 30;
            var gradPos1 = cfaq_linkGradientIndexA;
            var gradPos2 = cfaq_linkGradientIndexA + 0.1;
            var gradPos3 = cfaq_linkGradientIndexA + 0.2;
            ctx.lineWidth = 4;
            if (gradPos2 > 1) {
                gradPos2 = 0;
                gradPos3 = 0.2;
            }
            if (gradPos3 > 1) {
                gradPos3 = 0;
            }

            grd.addColorStop(gradPos1, "#bdc3c7");
            grd.addColorStop(gradPos2, "#1ABC9C");
            grd.addColorStop(gradPos3, "#bdc3c7");
            ctx.strokeStyle = grd;
            ctx.beginPath();
            ctx.moveTo(posX, posY);
            ctx.lineTo(posX2, posY2);
            ctx.stroke();

            if (jQuery('.cfaq_linkPoint[data-linkindex="' + index + '"]').length == 0) {
                var $point = jQuery('<a href="javascript:" data-linkindex="' + index + '" class="cfaq_linkPoint"><span class="glyphicon glyphicon-pencil"></span></a>');
                jQuery('#cfaq_stepsContainer').append($point);
                $point.click(function () {
                    cfaq_openWinLink(jQuery(this));
                });
            }
            cfaq_repositionLinkPoint(index);

        } else {
            jQuery('.cfaq_linkPoint[data-linkindex="' + index + '"]').remove();
        }
    });
    if (cfaq_isLinking) {
        var step = jQuery('#' + cfaq_links[cfaq_linkCurrentIndex].originID);
        var posX = step.position().left + jQuery('#cfaq_stepsOverflow').scrollLeft() + step.outerWidth() / 2;
        var posY = step.position().top + jQuery('#cfaq_stepsOverflow').scrollTop() + step.outerHeight() / 2;
        ctx.strokeStyle = "#bdc3c7";
        ctx.lineWidth = 4;
        ctx.beginPath();
        ctx.moveTo(posX, posY);
        ctx.lineTo(cfaq_mouseX, cfaq_mouseY);
        ctx.stroke();
    }
}
function cfaq_removeItem(itemID) {
    //cfaq_showLoader();
    jQuery('#cfaq_itemsTable tbody tr[data-itemid="'+itemID+'"] td input[name="cfaq_answer"]').closest('tr').remove();
    jQuery.ajax({
        url: ajaxurl,
        type: 'post',
        data: {
            action: 'cfaq_removeItem',
            itemID: itemID,
            stepID: cfaq_currentStepID,
            faqID: cfaq_currentFaqID
        },
        success: function () {
           
        }
    });
}
function cfaq_addItem(){
    
    var $tr = jQuery('<tr></tr>');
    $tr.append('<td><a href="javascript:">' + cfaq_data.texts.newAnswer + '</a><input type="text" class="form-control" value="' + cfaq_data.texts.newAnswer + '" style="display:none;"  name="cfaq_answer" /></td>');
    $tr.append('<td><a href="javascript:" class="btn btn-primary btn-circle"><span class="glyphicon glyphicon-pencil"></span></a>' +
            '<a href="javascript:" class="btn btn-danger btn-circle"><span class="glyphicon glyphicon-trash"></span></a></td>');
    jQuery('#cfaq_itemsTable tbody').append($tr);  
    
    jQuery.ajax({
        url: ajaxurl,
        type: 'post',
        data: {
            action: 'cfaq_addItem'
        },
        success: function (itemID) {
            $tr.attr('data-itemid',itemID);
            $tr.find('td:eq(0) > a:eq(0)').click(function(){
                cfaq_editItem(itemID);
            });
            $tr.find('td:eq(1) > a:eq(0)').click(function(){
                cfaq_editItem(itemID);
            });
            $tr.find('td:eq(1) > a:eq(1)').click(function(){
                cfaq_removeItem(itemID);
            });
        }
    });
}
function cfaq_editItem(itemID) {
    jQuery('#cfaq_itemsTable tbody tr[data-itemid="'+itemID+'"] td input[name="cfaq_answer"]').prev().hide();
    jQuery('#cfaq_itemsTable tbody tr[data-itemid="'+itemID+'"] td input[name="cfaq_answer"]').show();   
    jQuery('#cfaq_itemsTable tbody tr[data-itemid="'+itemID+'"] td input[name="cfaq_answer"]').val(jQuery('#cfaq_itemsTable tbody tr[data-itemid="'+itemID+'"] td input[name="cfaq_answer"]').prev().html());
    jQuery('#cfaq_itemsTable tbody tr[data-itemid="'+itemID+'"] td input[name="cfaq_answer"]').focusout(function(){
       
       var value = jQuery(this).val();
       if(value.length == 0){
           jQuery(this).addClass('cfaq-error');
       } else {           
           jQuery(this).removeClass('cfaq-error');
           jQuery(this).hide();
           jQuery(this).prev().html(jQuery(this).val());
            jQuery(this).prev().show();  
       }     
    });
}
function cfaq_addFaq(){
    cfaq_showLoader();
    jQuery.ajax({
        url: ajaxurl,
        type: 'post',
        data: {
            action: 'cfaq_addFaq'
        },
        success: function (faqID) {
            cfaq_loadFaq(faqID);
        }
    });
}

function cfaq_loadFaq(faqID) {
    cfaq_currentFaqID = faqID;
    jQuery('#cfaq_btnLogsFaq').attr('data-faqid', faqID);
    cfaq_showLoader();
    jQuery('#cfaq_stepsContainer .cfaq_stepBloc,.cfaq_loadSteps,.cfaq_linkPoint').remove();
    jQuery('#cfaq_logsBtn').attr('data-faqid', faqID);
    jQuery('#cfaq_btnPreview').attr('href', cfaq_data.websiteUrl + '?cfaq_action=preview&faq=' + faqID);
    jQuery.ajax({
        url: ajaxurl,
        type: 'post',
        data: {
            action: 'cfaq_loadFaq',
            faqID: faqID
        },
        success: function (rep) {
            
            rep = JSON.parse(rep);
            cfaq_currentFaq = rep;
            cfaq_params = rep.params;
            cfaq_steps = rep.steps;
            cfaq_questions = rep.questions;
            
            jQuery('#cfaq_faqFields').find('input,select,textarea').each(function () {
                if (jQuery(this).is('[data-toggle="switch"]')) {
                     var value = false;
                    eval('if(rep.faq.' + jQuery(this).attr('name') + ' == 1 && jQuery(this).attr(\'checked\') != \'checked\'){jQuery(this).trigger(\'click\');}');
                    eval('if(rep.faq.' + jQuery(this).attr('name') + ' == 0 && jQuery(this).attr(\'checked\') == \'checked\'){jQuery(this).trigger(\'click\');}');
                } else {
                    eval('jQuery(this).val(rep.faq.' + jQuery(this).attr('name') + ');');
                }
            });
            
                     
            jQuery.each(rep.steps, function (index) {
                var step = this;
                step.content = JSON.parse(step.content);
                cfaq_addStep(step);
            });
            jQuery.each(rep.links, function (index) {
                var link = this;
                link.originID = jQuery('.cfaq_stepBloc[data-stepid="' + link.originID + '"]').attr('id');
                link.destinationID = jQuery('.cfaq_stepBloc[data-stepid="' + link.destinationID + '"]').attr('id');
                link.conditions = JSON.parse(link.conditions);
                cfaq_links[index] = link;
            });
            jQuery('#cfaq_newQuestions tbody').html('');
            jQuery.each(rep.questions, function (index) {
                jQuery('#cfaq_newQuestions tbody').append('<tr data-questionid="'+this.id+'"><td>'+this.date+'</td><td>'+this.question+'</td><td>'+this.email+'</td>'+
                        '<td><a href="javascript:" onclick="cfaq_createQuestion('+this.id+',\''+this.question+'\');" class="btn btn-primary btn-circle"><span class="glyphicon glyphicon-plus"></span></a>'+
                        '<a href="javascript:" onclick="cfaq_removeQuestion('+this.id+');" class="btn btn-danger btn-circle"><span class="glyphicon glyphicon-trash"></span></a></td></tr>');
            });
            
            jQuery('#cfaq_txtNewQuestion').code(rep.faq.txtNewQuestion);
            jQuery('#cfaq_panelPreview').show();
            jQuery('#cfaq_panelFaqsList').hide();            
            jQuery('#cfaq_loader').delay(1000).fadeOut();
            
             jQuery('.colorpick').each(function () {
                var $this = jQuery(this);
                if (jQuery(this).prev('.cfaq_colorPreview').length == 0) {
                    jQuery(this).before('<div class="cfaq_colorPreview" style="background-color:#' + $this.val().substr(1, 7) + '"></div>');
                }
                jQuery(this).prev('.cfaq_colorPreview').click(function () {
                    jQuery(this).next('.colorpick').trigger('click');
                });
                jQuery(this).colpick({
                    color: $this.val().substr(1, 7),
                    onChange: function (hsb, hex, rgb, el, bySetColor) {
                        jQuery(el).val('#' + hex);
                        jQuery(el).prev('.cfaq_colorPreview').css({
                            backgroundColor: '#' + hex
                        });
                    }
                });
            });
            
            jQuery('#cfaq_faqFields input[name="useGoogleFont"]').bootstrapSwitch('onSwitchChange',cfaq_onGoogleFontChange);
            jQuery('#cfaq_faqFields input[name="sendEmail"]').bootstrapSwitch('onSwitchChange',cfaq_onSendEmailChanged);
            
            cfaq_onGoogleFontChange();
            cfaq_onSendEmailChanged();
            
           
            cfaq_updateStepsDesign();
            setTimeout(function () {
                cfaq_updateStepsDesign();
            }, 250);
        }
    });
}
function cfaq_createQuestion(faqID,question){
    cfaq_addStep({
        title: question,
        content: {
            question: question,
            title: question
        }
    });
}
function cfaq_removeFaq(faqID){
    cfaq_showLoader();
    jQuery.ajax({
        url: ajaxurl,
        type: 'post',
        data: {
            action: 'cfaq_removeFaq',
            faqID: faqID
        },
        success: function () {
            cfaq_returnToList();
        }
    });

}
function cfaq_returnToList(){    
    cfaq_showLoader();
    document.location.href = document.location.href;
}

function cfaq_updateWinItemPosition() {
    if (jQuery('#cfaq_winStep').css('display') != 'none') {
        var $item = jQuery('#' + jQuery('#cfaq_itemWindow').attr('data-item'));
        if ($item.length > 0) {
            jQuery('#cfaq_itemWindow').css({
                top: $item.offset().top - jQuery('#cfaq_bootstraped.cfaq_bootstraped').offset().top + $item.outerHeight() + 12,
                left: $item.offset().left - jQuery('#cfaq_bootstraped.cfaq_bootstraped').offset().left
            });
        } else {
            jQuery('#cfaq_itemWindow').fadeOut();
        }
    } else {
        jQuery('#cfaq_itemWindow').fadeOut();
    }
}

function cfaq_existInDefaultStep(itemID) {
    var rep = false;
    jQuery.each(cfaq_defaultStep.interactions, function () {
        var interaction = this;
        if (interaction.itemID == itemID) {
            rep = true;
        }
    });
    return rep;
}

function cfaq_closeWin(win) {
    win.fadeOut();
    jQuery('#cfaq_stepsContainer').slideDown();

    setTimeout(function () {
        cfaq_updateStepsDesign();
    }, 250);
}

function cfaq_startLink(stepID) {
    cfaq_isLinking = true;
    cfaq_linkCurrentIndex = cfaq_links.length;
    cfaq_links.push({
        originID: stepID,
        destinationID: null
    });

}

function cfaq_stopLink(newStep) {
    cfaq_isLinking = false;
    var chkLink = false;
    jQuery.each(cfaq_links, function () {
        if (this.originID == cfaq_links[cfaq_linkCurrentIndex].originID && this.destinationID == newStep.attr('id')) {
            chkLink = this;
        }
    });
    if (!chkLink) {
        cfaq_showLoader();
        cfaq_links[cfaq_linkCurrentIndex].destinationID = newStep.attr('id');
        jQuery.ajax({
            url: ajaxurl,
            type: 'post',
            data: {
                action: 'cfaq_newLink',
                faqID: cfaq_currentFaqID,
                originStepID: jQuery('#' + cfaq_links[cfaq_linkCurrentIndex].originID).attr('data-stepid'),
                destinationStepID: jQuery('#' + cfaq_links[cfaq_linkCurrentIndex].destinationID).attr('data-stepid')
            },
            success: function (linkID) {
                cfaq_links[cfaq_linkCurrentIndex].id = linkID;
                cfaq_loadFaq(cfaq_currentFaqID);
            }
        });
    } else {
        jQuery.grep(cfaq_links, function (value) {
            return value != chkLink;
        });
    }
}

function cfaq_removeAllSteps() {
    cfaq_showLoader();    
    jQuery.ajax({
        url: ajaxurl,
        type: 'post',
        data: {
            action: 'cfaq_removeAllSteps',
            faqID: cfaq_currentFaqID
        },
        success: function () {
            cfaq_loadFaq(cfaq_currentFaqID);
        }
    });
}
function cfaq_openWinStep(stepID) {
    cfaq_currentStepID = stepID;
    cfaq_showLoader();

    jQuery('#cfaq_winStep').find('.switch [data-toggle="switch"]').bootstrapSwitch('destroy');
    jQuery('#cfaq_winStep').find('.switch > div > :not([data-toggle="switch"])').remove();
    jQuery('#cfaq_winStep').find('.switch [data-toggle="switch"]').unwrap().unwrap();
    jQuery('.cfaq_stepIDUrl').html(stepID);

    jQuery('#cfaq_itemsTable tbody').html('');
    if (cfaq_currentStepID == 0) {
        jQuery('#cfaq_itemsList').hide();
    } else {
        jQuery.ajax({
            url: ajaxurl,
            type: 'post',
            data: {
                action: 'cfaq_loadStep',
                stepID: stepID
            },
            success: function (rep) {
                rep = jQuery.parseJSON(rep);
                step = rep.step;
                cfaq_currentStep = rep;

                jQuery('#cfaq_stepTabGeneral').find('input,select,textarea').each(function () {
                    if (jQuery(this).is('[data-toggle="switch"]')) {
                         var value = false;
                        eval('if(step.' + jQuery(this).attr('name') + ' == 1 && jQuery(this).attr(\'checked\') != \'checked\'){jQuery(this).trigger(\'click\');}');
                        eval('if(step.' + jQuery(this).attr('name') + ' == 0 && jQuery(this).attr(\'checked\') == \'checked\'){jQuery(this).trigger(\'click\');}');
                    } else {
                        eval('jQuery(this).val(step.' + jQuery(this).attr('name') + ');');
                    }
                });
                jQuery('#cfaq_stepDescription').code(step.description);
                jQuery.each(rep.items, function () {
                    var item = this;
                    var $tr = jQuery('<tr data-itemid="' + item.id + '"></tr>');
                    $tr.append('<td><a href="javascript:"  onclick="cfaq_editItem(' + item.id + ');">' + item.title + '</a><input type="text" class="form-control" value="' + item.title + '" style="display:none;" name="cfaq_answer" /></td>');
                    $tr.append('<td style="min-width: 130px;"><a href="javascript:" onclick="cfaq_editItem(' + item.id + ');" class="btn btn-primary btn-circle"><span class="glyphicon glyphicon-pencil"></span></a>' +
                            '<a href="javascript:" onclick="cfaq_removeItem(' + item.id + ');" class="btn btn-danger btn-circle"><span class="glyphicon glyphicon-trash"></span></a></td>');
                    jQuery('#cfaq_itemsTable tbody').append($tr);

                });
                jQuery('#cfaq_itemsTable tbody').sortable({
                    helper: function (e, tr) {
                        var $originals = tr.children();
                        var $helper = tr.clone();
                        $helper.children().each(function (index)
                        {
                            jQuery(this).width($originals.eq(index).width());
                        });
                        return $helper;
                    },
                    stop: function (event, ui) {
                        var items = '';
                        jQuery('#cfaq_itemsTable tbody tr[data-itemid]').each(function (i) {
                            items += jQuery(this).attr('data-itemid') + ',';
                        });
                        if (items.length > 0) {
                            items = items.substr(0, items.length - 1);
                        }
                        jQuery.ajax({
                            url: ajaxurl,
                            type: 'post',
                            data: {
                                action: 'cfaq_changeItemsOrders',
                                items: items
                            }
                        });
                    }
                });
                jQuery('#cfaq_itemsList').show();

                jQuery('#cfaq_btns').html('');
                jQuery('#cfaq_winStep').show();
                jQuery('#cfaq_stepsContainer').slideUp();
                jQuery('#cfaq_loader').fadeOut();
                
                jQuery('#wpwrap').css({
                    height: jQuery('#cfaq_winStep').height() + 48
                });
                

            }
        });
    }

}

function cfaq_openWinLink($item) {
    cfaq_currentLinkIndex = $item.attr('data-linkindex');
    jQuery('#cfaq_winLink').attr('data-linkindex', $item.attr('data-linkindex'));
    jQuery('.cfaq_conditionItem').remove();
    var stepID = jQuery('#' + cfaq_links[$item.attr('data-linkindex')].originID).attr('data-stepid');
    var step = cfaq_getStepByID(stepID);
    var destID = jQuery('#' + cfaq_links[$item.attr('data-linkindex')].destinationID).attr('data-stepid');
    var destination = cfaq_getStepByID(destID);

    jQuery('#cfaq_linkInteractions').show();
    jQuery('#cfaq_linkOriginTitle').html(step.title);
    jQuery('#cfaq_linkDestinationTitle').html(destination.title);

    jQuery.each(cfaq_links[cfaq_currentLinkIndex].conditions, function () {
        cfaq_addLinkInteraction(this);
    });
    jQuery('#cfaq_linkOperator').val(cfaq_links[cfaq_currentLinkIndex].operator);
    jQuery('#cfaq_winLink').fadeIn(250);

    setTimeout(cfaq_updateStepsDesign, 255);
    setTimeout(function () {
        jQuery('#wpwrap').css({
            height: jQuery('#cfaq_bootstraped').height() + 48
        });
    }, 300);

}

function cfaq_addLinkInteraction(data) {
    var $item = jQuery('<tr class="cfaq_conditionItem"></tr>');
    var $select = jQuery('<select class="cfaq_conditionSelect form-control"></select>');
    jQuery.each(cfaq_steps, function () {
        var step = this;
        jQuery.each(step.items, function () {
            var item = this;           
            var itemID = step.id + '_' + item.id;
            $select.append('<option value="' + itemID + '" data-type="' + item.type + '">' + step.title + ' : " ' + item.title + ' "</option>');
        });
    });
   
    var $operator = jQuery('<select class="cfaq_conditionoperatorSelect form-control"></select>');
    $select.change(function () {
        var stepID = $select.val().substr(0, $select.val().indexOf('_'));
        var itemID = $select.val().substr($select.val().indexOf('_') + 1, $select.val().length);
        var item = false;
        jQuery.each(cfaq_steps, function () {
            var step = this;
            if (step.id == stepID) {
                jQuery.each(step.items, function () {
                    if (this.id == itemID) {
                        item = this;
                    }
                });
            }
        });
        var operator = jQuery(this).parent().parent().find('.cfaq_conditionoperatorSelect');
        operator.find('option').remove();
        if ($select.find('option:selected').is('[data-static]')) {
            var options = cfaq_conditionGetOperators({
                type: $select.find('option:selected').attr('data-type')
            }, $select);
        } else {
            var options = cfaq_conditionGetOperators(item, $select);
        }
        jQuery.each(options, function () {
            operator.append('<option value="' + this.value + '"  data-variable="' + this.hasVariable + '">' + this.text + '</option>');
        });
        $operator.change();
    });
    if (data) {
        $select.val(data.interaction);
    }
    $select.change();
    if ($select.find('option:selected').is('[data-static]')) {
        var options = cfaq_conditionGetOperators({
            type: $select.find('option:selected').attr('data-type')
        }, $select);
    } else {
        var stepID = $select.val().substr(0, $select.val().indexOf('_'));
        var itemID = $select.val().substr($select.val().indexOf('_') + 1, $select.val().length);
        var item = false;
        jQuery.each(cfaq_steps, function () {
            var step = this;
            if (step.id == stepID) {
                jQuery.each(step.items, function () {
                    if (this.id == itemID) {
                        item = this;
                    }
                });
            }
        });
        var options = cfaq_conditionGetOperators(item, $select);
    }
    jQuery.each(options, function () {
        $operator.append('<option value="' + this.value + '" data-variable="' + this.hasVariable + '">' + this.text + '</option>');
    });

    $operator.change(function () {
        cfaq_linksUpdateFields(jQuery(this));
    });
    var $col1 = jQuery('<td></td>');
    $col1.append($select);
    $item.append($col1);
    var $col2 = jQuery('<td></td>');
    $col2.append($operator);
    $item.append($col2);
    $item.append('<td></td><td><a href="javascript:" class="cfaq_conditionDelBtn" onclick="cfaq_conditionRemove(this);"><span class="glyphicon glyphicon-remove"></span></a> </td>');
    if (data) {
        $operator.val(data.action);
        $operator.change();
        if (data.value) {
            $operator.closest('.cfaq_conditionItem').find('.cfaq_conditionValue').val(data.value);
        }
        setTimeout(function () {
            cfaq_linksUpdateFields($operator, data);
            if (data.value) {
                $operator.closest('.cfaq_conditionItem').find('.cfaq_conditionValue').val(data.value);
            }
        }, 500);
    }
    jQuery('#cfaq_conditionsTable tbody').append($item);
}

function cfaq_conditionGetOperators(item, $select) {
    var options = new Array();
    options.push({
        value: 'clicked',
        text: cfaq_data.texts['isSelected']
    });
    options.push({
        value: 'unclicked',
        text: cfaq_data.texts['isUnselected']
    });            
    return options;
}

function cfaq_conditionRemove(btn) {
    var $btn = jQuery(btn);
    $btn.closest('.cfaq_conditionItem').remove();
}

function cfaq_linkSave() {
    if (cfaq_canSaveLink) {
        cfaq_canSaveLink = false;
        setTimeout(function () {
            cfaq_canSaveLink = true;
        }, 1500);
        cfaq_links[cfaq_currentLinkIndex].conditions = new Array();
        jQuery('.cfaq_conditionItem').each(function () {
            cfaq_links[cfaq_currentLinkIndex].conditions.push({
                interaction: jQuery(this).find('.cfaq_conditionSelect').val(),
                action: jQuery(this).find('.cfaq_conditionoperatorSelect').val(),
                value: jQuery(this).find('.cfaq_conditionValue').val()
            });
        });
        cfaq_links[cfaq_currentLinkIndex].operator = jQuery('#cfaq_linkOperator').val();

        var cloneLinks = cfaq_links.slice();
        jQuery.each(cloneLinks, function () {
            this.originID = jQuery('#' + this.originID).attr('data-stepid');
            this.destinationID = jQuery('#' + this.destinationID).attr('data-stepid');
        });
        jQuery.ajax({
            url: ajaxurl,
            type: 'post',
            data: {
                action: 'cfaq_saveLinks',
                faqID: cfaq_currentFaqID,
                links: JSON.stringify(cloneLinks)
            },
            success: function () {
                cfaq_closeWin(jQuery('#cfaq_winLink'));
                cfaq_loadFaq(cfaq_currentFaqID);
            }
        });
    }

}


function cfaq_linkDel() {
    if (cfaq_canSaveLink) {
        cfaq_canSaveLink = false;
        setTimeout(function () {
            cfaq_canSaveLink = true;
        }, 1500);
        cfaq_links.splice(jQuery.inArray(cfaq_links[cfaq_currentLinkIndex], cfaq_links), 1);
        var cloneLinks = cfaq_links.slice();
        jQuery.each(cloneLinks, function () {
            this.originID = jQuery('#' + this.originID).attr('data-stepid');
            this.destinationID = jQuery('#' + this.destinationID).attr('data-stepid');
        });
        jQuery.ajax({
            url: ajaxurl,
            type: 'post',
            data: {
                action: 'cfaq_saveLinks',
                faqID: cfaq_currentFaqID,
                links: JSON.stringify(cloneLinks)
            },
            success: function () {
                cfaq_closeWin(jQuery('#cfaq_winLink'));
                cfaq_loadFaq(cfaq_currentFaqID);
            }
        });
    }
}

function cfaq_linksUpdateFields($operatorSelect, data) {

    $operatorSelect.closest('.cfaq_conditionItem').find('.cfaq_conditionValue').parent().remove();
    if ($operatorSelect.closest('.cfaq_conditionItem').find('.cfaq_conditionoperatorSelect option:selected').attr('data-variable') == "textfield") {
        if ($operatorSelect.closest('.cfaq_conditionItem').find('.cfaq_conditionValue').length == 0) {
            $operatorSelect.closest('.cfaq_conditionItem').children('td:eq(2)').html('<div><input type="text" placeholder="http://..." class="cfaq_conditionValue form-control" /> </div>');
        }
    }

    if ($operatorSelect.closest('.cfaq_conditionItem').find('.cfaq_conditionoperatorSelect option:selected').attr('data-variable') == "numberfield") {
        if ($operatorSelect.closest('.cfaq_conditionItem').find('.cfaq_conditionValue').length == 0) {
            $operatorSelect.closest('.cfaq_conditionItem').children('td:eq(2)').html('<div><input type="number" class="cfaq_conditionValue form-control" /> </div>');
        }
    }
    if ($operatorSelect.closest('.cfaq_conditionItem').find('.cfaq_conditionoperatorSelect option:selected').attr('data-variable') == "pricefield") {
        if ($operatorSelect.closest('.cfaq_conditionItem').find('.cfaq_conditionValue').length == 0) {
            $operatorSelect.closest('.cfaq_conditionItem').children('td:eq(2)').html('<div><input type="number" step="any" class="cfaq_conditionValue form-control" /> </div>');
        }
    }

    if ($operatorSelect.closest('.cfaq_conditionItem').find('.cfaq_conditionoperatorSelect option:selected').attr('data-variable') == "datefield") {
        if ($operatorSelect.closest('.cfaq_conditionItem').find('.cfaq_conditionValue').length == 0) {
            $operatorSelect.closest('.cfaq_conditionItem').children('td:eq(2)').html('<div><input type="text" step="any" class="cfaq_conditionValue form-control"/> </div>');
            $operatorSelect.closest('.cfaq_conditionItem').find('.cfaq_conditionValue').datepicker({
                dateFormat: 'yy-mm-dd'
            });
        }
    }
    if ($operatorSelect.closest('.cfaq_conditionItem').find('.cfaq_conditionoperatorSelect option:selected').attr('data-variable') == "select") {
        var optionsSelect = '';
        var $select = $operatorSelect.closest('.cfaq_conditionItem').find('.cfaq_conditionSelect');
        var stepID = $select.val().substr(0, $select.val().indexOf('_'));
        var itemID = $select.val().substr($select.val().indexOf('_') + 1, $select.val().length);

        var optionsString = '';
        jQuery.each(cfaq_currentFaq.steps, function () {
            if (this.id == stepID) {
                jQuery.each(this.items, function () {
                    if (this.id == itemID) {
                        optionsString = this.optionsValues;
                    }
                });
            }
        });
        var optionsArray = optionsString.split('|');
        jQuery.each(optionsArray, function () {
            var value = this;
            if (value.indexOf(';;') > 0) {
                var valueArray = value.split(';;');
                value = valueArray[0];
            }
            if (value.length > 0) {
                optionsString += '<option value="' + value + '">' + value + '</option>';
            }
        });

        if ($operatorSelect.closest('.cfaq_conditionItem').find('.cfaq_conditionValue').length == 0) {
            $operatorSelect.closest('.cfaq_conditionItem').children('td:eq(2)').html('<div><select class="cfaq_conditionValue form-control">' + optionsString + '</select> </div>');
        }
    }

    if (data && data.value) {
        $operatorSelect.closest('.cfaq_conditionItem').find('.cfaq_conditionValue').val(data.value);
    }
}
function cfaq_duplicateFaq(faqID) {
    cfaq_showLoader();
    jQuery.ajax({
        url: ajaxurl,
        type: 'post',
        data: {action: 'cfaq_duplicateFaq', faqID: faqID},
        success: function (rep) {
            document.location.href = document.location.href;
        }
    });
}
function cfaq_selectPre(input) {
    jQuery(input).select();
}
function cfaq_saveFaq(){    
    if(jQuery('#cfaq_faqFields input[name="sendEmail"]').is(':checked') && !cfaq_checkEmail(jQuery('#cfaq_faqFields input[name="email"]').val())){
        jQuery('#cfaq_faqFields input[name="email"]').closest('.form-group').addClass('has-error');
    } else {
        jQuery('#cfaq_faqFields input[name="email"]').closest('.form-group').removeClass('has-error');
        cfaq_showLoader();
        var faqData = {};
        jQuery('#cfaq_faqFields').find('input,select,textarea').each(function () {      
            if (!jQuery(this).is('[data-toggle="switch"]')) {           
                eval('faqData.' + jQuery(this).attr('name') + ' = jQuery(this).val();');
            } else {
                var value = 0;
                if (jQuery(this).is(':checked')) {
                    value = 1;
                }
                eval('faqData.' + jQuery(this).attr('name') + ' = value;');
            }        
        });

        faqData.action = 'cfaq_saveFaq';
        faqData.faqID = cfaq_currentFaqID;
        faqData.txtNewQuestion = jQuery('#cfaq_txtNewQuestion').code();
        jQuery.ajax({
            url: ajaxurl,
            type: 'post',
            data: faqData,
            success: function () {
                jQuery('#cfaq_loader').fadeOut();
            }
        });
    }
}
function cfaq_exportFaqs() {
    cfaq_showLoader();
    jQuery.ajax({
        url: ajaxurl,
        type: 'post',
        data: {
            action: 'cfaq_exportFaqs'
        },
        success: function (rep) {
            jQuery('#cfaq_loader').fadeOut();
            if (rep == '1') {
                jQuery('#cfaq_winExport').modal('show');
            } else {
                alert(cfaq_data.texts['errorExport']);
            }
        }
    });

}
function cfaq_importFaqs() {
    cfaq_showLoader();
    jQuery('#cfaq_winImport').modal('hide');
    var formData = new FormData(jQuery('#cfaq_winImportFaq')[0]);

    jQuery.ajax({
        url: ajaxurl,
        type: 'post',
        xhr: function () {
            var myXhr = jQuery.ajaxSettings.xhr();
            return myXhr;
        },
        success: function (rep) {
            if (rep != '1') {
                jQuery('#cfaq_loader').fadeOut();
                alert(cfaq_data.texts['errorImport']);
            } else {
                document.location.href = document.location.href;
            }
        },
        data: formData,
        cache: false,
        contentType: false,
        processData: false
    });
}

function cfaq_removeQuestion(questionID){
    jQuery('#cfaq_newQuestions tr[data-questionid="'+questionID+'"]').slideUp();
    setTimeout(function(){
        jQuery('#cfaq_newQuestions tr[data-questionid="'+questionID+'"]').remove();     
    },500);
    jQuery.ajax({
       url: ajaxurl,
       type: 'post',
       data: {
           action: 'cfaq_removeQuestion',
           questionID: questionID
       },
       success: function(){
       }
    });
}