var Contact = function() {
    var contactSend = function() {
        var form = $('#frmcontact');
        var rules = {
            fname: {required: true},
            phone: {required: true},
            email: {required: true,email:true},
            message: {required: true},
        };
        handleFormValidate(form, rules, function(form) {
            handleAjaxFormSubmit(form,true);
        });
    };

 
    return {
        //main function to initiate the module
        contactInit: function() {
            contactSend();
        },
 
    };
}();
