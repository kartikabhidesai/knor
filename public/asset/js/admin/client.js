var Client = function() {

    var clientList = function() {

        $('.dataTables-example').DataTable({
            pageLength: 25,
            responsive: true,
            dom: '<"html5buttons"B>lTfgitp',
            buttons: [
                {extend: 'copy'},
                {extend: 'csv'},
                {extend: 'excel', title: 'ExampleFile'},
                {extend: 'pdf', title: 'ExampleFile'},
                {extend: 'print',
                    customize: function(win) {
                        $(win.document.body).addClass('white-bg');
                        $(win.document.body).css('font-size', '10px');

                        $(win.document.body).find('table')
                                .addClass('compact')
                                .css('font-size', 'inherit');
                    }
                }
            ]

        });
        
        
         $('body').on('click', '.interestedlist', function() {
            var muckId = $(this).attr('data-id');
            var data = '';
            if (muckId != "")
            {
                data = {'muckId': muckId, '_token': $("input[name=_token]").val()};
                ajaxcall(baseurl + 'company/get-intersted-userlist', data, function(output) {
                    $('#myModal_interested .modal-body').html(output);
                });
            }
        });
         $('body').on('click', '.acceptinterest', function() {
            var userInterestId = $(this).attr('data-id');
            var muckId = $(this).attr('data-muckid');
            var data = '';
            if (muckId != "")
            {
                data = {'muckId': muckId,'userInterestId':userInterestId, '_token': $("input[name=_token]").val()};
                ajaxcall(baseurl + 'company/update-interest-status', data, function(output) {
                    handleAjaxResponse(output);
                    setTimeout(function(){
                        $('#myModal_interested').modal('hide');
                    },2000);
                });
            }
        });
         $('body').on('click', '.complete', function() {
            var userInterestId = $(this).attr('data-id');
            var muckId = $(this).attr('data-muckid');
            var data = '';
            if (muckId != "")
            {
                data = {'muckId': muckId,'userInterestId':userInterestId, '_token': $("input[name=_token]").val()};
                ajaxcall(baseurl + 'company/update-interest-status-to-complete', data, function(output) {
                    handleAjaxResponse(output);
                    setTimeout(function(){
                        $('#myModal_interested').modal('hide');
                    },2000);
                });
            }
        });
         $('body').on('click', '.resetall', function() {
           
            var muckId = $(this).attr('data-muckid');
            var data = '';
            if (muckId != "")
            {
                data = {'muckId': muckId, '_token': $("input[name=_token]").val()};
                ajaxcall(baseurl + 'company/reset-interest-status', data, function(output) {
                    handleAjaxResponse(output);
                    setTimeout(function(){
                        $('#myModal_interested').modal('hide');
                    },2000);
                });
            }
        });
    };
    var clientAdd = function() {
       
        
        var form = $('#clientAdd');
        var rules = {
            person_fname: {required: true},
            person_lname: {required: true},
            person_email: {required: true,email:true},
            company_password: {required: true},
            company_confirm_password: {required: true,equalTo:'#password'},
            company_user_phone: {required: true},
            address: {required: true},
            
        };
        handleFormValidate(form, rules, function(form) {
            handleAjaxFormSubmit(form);
        });
       
    };
    var clientEdit = function() {
        var form = $('#clientEdit');
        var rules = {
           person_fname: {required: true},
           person_lname: {required: true},
           person_email: {required: true,email:true},
           company_user_phone: {required: true,number:true},
           address: {required: true},
        };
        handleFormValidate(form, rules, function(form) {
            handleAjaxFormSubmit(form);
        });
    };
    
    var clientDetail = function() {
        
        $('.dataTables-example').DataTable({
            pageLength: 25,
            responsive: true,
            dom: '<"html5buttons"B>lTfgitp',
            buttons: [
                {extend: 'copy'},
                {extend: 'csv'},
                {extend: 'excel', title: 'ExampleFile'},
                {extend: 'pdf', title: 'ExampleFile'},
                {extend: 'print',
                    customize: function(win) {
                        $(win.document.body).addClass('white-bg');
                        $(win.document.body).css('font-size', '10px');
                        $(win.document.body).find('table').addClass('compact').css('font-size', 'inherit');
                    }
                }
            ]

        });
    };
   
    var general = function(){
      
        $('body').on('click','.deletebutton',function(){
            var personId = $(this).attr('data-id');
            var dataUrl = $(this).attr('data-href');
          $('#myModal_autocomplete').modal('show');
            $('#btndelete').attr('data-url',dataUrl);
            $('#btndelete').attr('data-id',personId);
            
            
        });
        handleDelete();
    }
    
    return {
        //main function to initiate the module
        clientList: function() {
            general();
            clientList();
        },
        clientAdd: function() {
            clientAdd();
        },
        clientEdit: function() {
            clientEdit();
        },
       
    };
}();
