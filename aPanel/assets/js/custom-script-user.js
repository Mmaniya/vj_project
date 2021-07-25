$(function() {
    customertable();
    customerstatics();
});


function customerstatics(){
    param = { 'act': 'customerstatics'};
    ajax({
        a: "admin_ajax",
        b: param,
        c: function() {},
        d: function(data) {
            $('.preloader').hide();
            $('.customerstatics').html(data);
        }
    });
    param = { 'act': 'accountstatics'};
    ajax({
        a: "admin_ajax",
        b: param,
        c: function() {},
        d: function(data) {
            $('.preloader').hide();
            $('.accountstatics').html(data);
        }
    });
}
function customertable(){
    $('#users-table').DataTable( {
        'processing': true,
        'serverSide': true,
        'responsive': true,
        'serverMethod': 'post',
        'bDestroy': true,
        'aaSorting': [[0, "asc"]],
        'ajax': {
                'url':' users-table.php',
                'data': function(data){
                }
            }
    } );

    $('#closed-users-table').DataTable( {
        'processing': true,
        'serverSide': true,
        'responsive': true,
        'serverMethod': 'post',
        'bDestroy': true,
        'aaSorting': [[0, "asc"]],
        'ajax': {
                'url':' users-table.php',
                'data': function(data){
                        data.closedusers = true;
                }
            }
    } );

    $('#active-users-table').DataTable( {
        'processing': true,
        'serverSide': true,
        'responsive': true,
        'serverMethod': 'post',
        'bDestroy': true,
        'aaSorting': [[0, "asc"]],
        'ajax': {
                'url':' users-table.php',
                'data': function(data){
                        data.activeusers = true;
                }
            }
    } );

    $('#pending-users-table').DataTable( {
        'processing': true,
        'serverSide': true,
        'responsive': true,
        'serverMethod': 'post',
        'bDestroy': true,
        'aaSorting': [[0, "asc"]],
        'ajax': {
                'url':' users-table.php',
                'data': function(data){
                        data.pendingusers = true;
                }
            }
    } );


}

function approvedusers(id){
    param = { 'act': 'approved_users', 'id': id };
    Swal.fire({
        title: "Are you sure?",
        text: "You want to approve this users?",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Yes",
        cancelButtonText: "No",
        closeOnConfirm: false,
        closeOnCancel: false
    }).then((result) => {
        if (result.value) {
            $('.preloader').show();
            ajax({
                a: "admin_ajax",
                b: param,
                c: function() {},
                d: function(data) {
                    $('.preloader').hide();
                    // var records = JSON.parse(data);
                    if (data == 'Success') {
                        customertable();
                        customerstatics();
                        notify('top', 'right', 'fa fa-check', 'success', 'animated fadeInLeft', 'animated fadeOutLeft', records.data);
                    } else {
                        notify('top', 'right', 'fa fa-times', 'danger', 'animated fadeInLeft', 'animated fadeOutLeft', records.data);
                    }
                }
            });
        }
    });
}




