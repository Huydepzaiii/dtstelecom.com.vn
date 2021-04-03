//cfaq_faqs = cfaq_faqs[0];
jQuery(document).ready(function(){
    cfaq_initFaqs();
});

function cfaq_initFaqs(){
    jQuery.each(cfaq_faqs.faqs,function(){
        var faq = this;
        faq.plannedSteps = new Array();
        faq.lastSteps = new Array();      
        faq.currentStep = 0;
        faq.canAnswer = true;
        faq.firstStep = 0;
        faq.firstStep = jQuery('#clever_faq[data-faqid="' + faq.id + '"] .cfaq_step[data-start="1"]').attr('data-stepid');
        if(cfaq_faqs.calledStep>0){
            jQuery('#clever_faq[data-faqid="' + faq.id + '"] .cfaq_step[data-start="1"]').hide();
            cfaq_openStep(cfaq_faqs.calledStep,faq.id);
        } else  if(faq.firstStep>0){
            cfaq_openStep(faq.firstStep,faq.id);
        }
    });
}
function cfaq_answerClicked(element){
    var $element = jQuery(element);
    $element.addClass('checked');
    var faqID = $element.closest('#clever_faq').attr('data-faqid');
    var $step = $element.closest('.clever_step');
    var faq = cfaq_getFaqByID(faqID);
    var restart = false;    
    if(faq.canAnswer){
        faq.canAnswer = false;
        setTimeout(function(){
            faq.canAnswer = true;            
        },450);
        faq.lastSteps.push(parseInt(faq.currentStep));
        var nextStepID = cfaq_findPotentialsSteps(faq.currentStep,faqID);
        if(nextStepID == 'final'){
            nextStepID = faq.firstStep;
            restart = true;
        }
        if(nextStepID){
            setTimeout(function(){
                if(restart){
                    cfaq_restart(faqID);
                }else {
                cfaq_openStep(nextStepID,faqID);                        
                }        
            },350);
        }
    }
}
function cfaq_noQuestionClicked(faqID){
    var faq = cfaq_getFaqByID(faqID);
    var $previousStep = jQuery('#clever_faq[data-faqid="' + faqID + '"] .cfaq_step[data-stepid="'+faq.currentStep+'"]');
     var $step = jQuery('#clever_faq[data-faqid="' + faqID + '"] .cfaq_contactStep'); 
     $step.slideDown();    
}
function cfaq_getFaqByID(faqID){
    var rep = false;
    jQuery.each(cfaq_faqs.faqs,function(){
        if(this.id == faqID){
            rep = this;
        }
    });    
    return rep;
}
function cfaq_previousStepClicked(faqID){
    var faq = cfaq_getFaqByID(faqID);
    var chkCurrentStep = false;
       var lastStepID = 0;
       var lastStepIndex = 0;
       jQuery.each(faq.lastSteps, function (i) {
           var stepID = parseInt(this);
           if (parseInt(stepID) == parseInt(faq.lastSteps[faq.lastSteps.length-1])) {
               chkCurrentStep = true;          
               lastStepID = stepID;
               lastStepIndex = i;     
           }
       });
       faq.lastSteps.pop();       
       if(lastStepID>0){
           cfaq_openStep(lastStepID,faqID);
       }else {          
           cfaq_restart(faqID);
       }
        
}
function cfaq_openStep(stepID,faqID){
    var faq = cfaq_getFaqByID(faqID);
    var $step = jQuery('#clever_faq[data-faqid="' + faqID + '"] .cfaq_step[data-stepid="'+stepID+'"]');
    $step.find('.cfaq_answers li a').removeClass('checked');  
    if(faq.lastSteps.length>0){
         $step.find('li.cfaq_previousStep').show();    
    } else {       
         $step.find('li.cfaq_previousStep').hide();           
    }
    
    var $previousStep = jQuery('#clever_faq[data-faqid="' + faqID + '"] .cfaq_step[data-stepid="'+faq.currentStep+'"]');
    $previousStep.slideUp();
    faq.currentStep = stepID;
    jQuery('#clever_faq[data-faqid="' + faqID + '"] .cfaq_contactStep').slideUp();
    $step.slideDown();
    
    if(!$step.is('[data-start="1"]')){        
        jQuery('body,html').animate({
            scrollTop: jQuery('#clever_faq[data-faqid="' + faqID + '"]').offset().top -40
        }, 200);
    }
    
    if($step.find('.cfaq_answers > li:not(.cfaq_noQuestion):not(.cfaq_restartFaq)').length == 1){
        $step.find('.cfaq_answers > li:not(.cfaq_noQuestion):not(.cfaq_restartFaq)').addClass('checked');
        var nextStepID = cfaq_findPotentialsSteps(faq.currentStep,faqID);
        if(nextStepID == 'final'){
            $step.find('.cfaq_restartFaq').hide();
        }
        $step.find('.cfaq_answers > li:not(.cfaq_noQuestion):not(.cfaq_restartFaq)').removeClass('checked');
    }
}
function cfaq_restart(faqID){
    var faq = cfaq_getFaqByID(faqID);
    var $previousStep = jQuery('#clever_faq[data-faqid="' + faqID + '"] .cfaq_step[data-stepid="'+faq.currentStep+'"]');
    $previousStep.slideUp();
    faq.plannedSteps = new Array();
    faq.lastSteps = new Array();      
    faq.currentStep = 0;
    jQuery('#clever_faq[data-faqid="' + faqID + '"] li>a.checked').removeClass('checked');
    jQuery('#clever_faq[data-faqid="' + faqID + '"] .cfaq_finalText').fadeOut();   
    jQuery('#clever_faq[data-faqid="' + faqID + '"] .cfaq_restartFaq').show();
    faq.firstStep = jQuery('#clever_faq[data-faqid="' + faqID + '"] .cfaq_step[data-start="1"]').attr('data-stepid');
    cfaq_openStep(jQuery('#clever_faq[data-faqid="' + faqID + '"] .cfaq_step[data-start="1"]').attr('data-stepid'),faqID);  
}

function cfaq_findPotentialsSteps(originStepID, faqID) {
       var faq = cfaq_getFaqByID(faqID);
       var potentialSteps = new Array();
       var conditionsArray = new Array();
       var noConditionsSteps = new Array();
       var maxConditions = 0;
       jQuery.each(faq.links, function () {
           var link = this;
           if (link.originID == originStepID) {
               var error = false;
               var errorOR = true;
               if (link.conditions && link.conditions != "[]") {
                   link.conditionsO = JSON.parse(link.conditions);
                   var errors = cfaq_checkConditions(link.conditionsO,faqID);
                   error = errors.error;
                   errorOR = errors.errorOR;
               } else {
                   noConditionsSteps.push(link.destinationID);
               }
               if ((link.operator == 'OR' && !errorOR) || (link.operator != 'OR' && !error)) {
                       link.conditionsO = JSON.parse(link.conditions);
                       conditionsArray.push({
                           stepID: parseInt(link.destinationID),
                           nbConditions: link.conditionsO.length
                       });
                       if (link.conditionsO.length > maxConditions) {
                           maxConditions = link.conditionsO.length;
                       }
                       potentialSteps.push(parseInt(link.destinationID));                    

               }
           }
       });
       if (originStepID == 0) {
           potentialSteps.push(parseInt(jQuery('#clever_faq[data-faqid="' + faqID + '"] .cfaq_step[data-start="1"]').attr('data-stepid')));
       }
       if (potentialSteps.length == 0) {
           potentialSteps.push('final');
       } else if (noConditionsSteps.length > 0 && noConditionsSteps.length < potentialSteps.length) {
           jQuery.each(noConditionsSteps, function () {
               var removeItem = this;
               potentialSteps = jQuery.grep(potentialSteps, function (value) {
                   return value != removeItem;
               });
           });
           if (maxConditions > 0) {
               jQuery.each(potentialSteps, function (stepID) {
                   jQuery.each(conditionsArray, function (condition) {
                       if (condition.stepID == stepID && condition.nbConditions < maxConditions) {
                           potentialSteps = jQuery.grep(potentialSteps, function (value) {
                               return value != stepID;
                           });
                       }
                   });
               });
           }
       }

       return potentialSteps;
   }

   function cfaq_checkConditions(conditions,faqID){
       var error = false;
       var errorOR = true;

       jQuery.each(conditions, function () {
           var condition = this;
           if (condition.interaction.substr(0, 1) != '_') {
               var stepID = condition.interaction.substr(0, condition.interaction.indexOf('_'));
               var itemID = condition.interaction.substr(condition.interaction.indexOf('_') + 1, condition.interaction.length);
               var $item = jQuery('#clever_faq[data-faqid="' + faqID + '"] [data-itemid="' + itemID + '"]');
               
                switch (condition.action) {
                    case "clicked":                         
                         if (!$item.is('.checked')) {
                            error = true;
                        }
                         if ( $item.is('.checked')) {
                             errorOR = false;
                         }

                        break;
                    case "unclicked":
                        if ($item.is('.checked')) {
                            error = true;
                        }
                        if (!$item.is('.checked')) {
                            errorOR = false;
                        }
                        break;
                   }
           }
       });

       return {
           error: error,
           errorOR: errorOR
       };        
   }
function cfaq_sendQuestion(faqID){
    var faq = cfaq_getFaqByID(faqID);
    var error = false;
    var questionField = jQuery('#clever_faq[data-faqid="' + faqID + '"] .cfaq_contactStep').find('textarea[name="question"]');
    var emailField = jQuery('#clever_faq[data-faqid="' + faqID + '"] .cfaq_contactStep').find('input[name="email"]');
    questionField.removeClass('cfaq_error');
    emailField.removeClass('cfaq_error');
    if(questionField.val().length <3){
        error = true;
        questionField.addClass('cfaq_error');
    }
    if(!cfaq_checkEmail(emailField.val())){
        error = true;
        emailField.addClass('cfaq_error');
    }
    if(!error){
        jQuery.ajax({
            url: cfaq_faqs.ajaxurl,
            type:'post',
            data:{
                action: 'cfaq_sendQuestion',
                question: questionField.val(),
                email: emailField.val(),
                faqID: faqID
            },
            success: function(){          
                questionField.val('');                
                jQuery('#clever_faq[data-faqid="' + faqID + '"] .cfaq_step').slideUp();
                jQuery('#clever_faq[data-faqid="' + faqID + '"] .cfaq_contactStep').slideUp();
                setTimeout(function(){
                    jQuery('#clever_faq[data-faqid="' + faqID + '"] .cfaq_finalText').fadeIn();                      
                    setTimeout(function(){
                        cfaq_restart(faqID);                      
                    },faq.resetDelay*1000);
                },400);
                
            }
        });
    }
}
function cfaq_checkEmail(email) {
    if (email.indexOf("@") != "-1" && email.indexOf(".") != "-1" && email != "")
        return true;
    return false;
}
function cfaq_closeContactStep(faqID){
    jQuery('#clever_faq[data-faqid="' + faqID + '"] .cfaq_contactStep').slideUp();    
    jQuery('body,html').animate({
        scrollTop: jQuery('#clever_faq[data-faqid="' + faqID + '"]').offset().top -40
    }, 200);
}
function cfaq_restartFaqClicked(faqID){
    var faq = cfaq_getFaqByID(faqID);
    jQuery('#clever_faq[data-faqid="' + faqID + '"] .cfaq_step').slideUp();
    jQuery('#clever_faq[data-faqid="' + faqID + '"] .cfaq_contactStep').slideUp();
    cfaq_restart(faqID);
}