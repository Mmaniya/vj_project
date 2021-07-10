
/**************************
 *     Room               *
 **************************/
 customertable();
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
                        // data.searchByBranch = $('#get_booth').val();
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
                        notify('top', 'right', 'fa fa-check', 'success', 'animated fadeInLeft', 'animated fadeOutLeft', records.data);
                    } else {
                        notify('top', 'right', 'fa fa-times', 'danger', 'animated fadeInLeft', 'animated fadeOutLeft', records.data);
                    }
                }
            });
        }
    });
}


function hide_room_details() {
    $('.ajaxResponce').show();
    $('.room_form').hide();
    // room_main_table();
}



// room_main_table();
function room_main_table() {
    
    $('.preloader').show();
    param = { 'act': 'rooms_table' };
    ajax({
        a: 'rooms_table',
        b: $.param(param),
        c: function() {},
        d: function(data) {
            $('.preloader').hide();
            $('#rooms_table').show();
            $('#rooms_table').html(data);
        }
    });
}

function add_edit_room(id) {
    $('.preloader').show();
    $('.room_form').show();
    param = { 'act': 'add_edit_room', 'room_id': id };
    ajax({
        a: 'room_form',
        b: $.param(param),
        c: function() {},
        d: function(data) {
            $('.preloader').hide();
            $('.ajaxResponce').hide();
            $('#room_details').html(data);
        }
    });
}

function delete_room(id) {
    param = { 'act': 'remove_room', 'id': id };
    Swal.fire({
        title: "Are you sure?",
        text: "You want to delete this room?",
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
                a: "room_ajax",
                b: param,
                c: function() {},
                d: function(data) {
                    $('.preloader').hide();
                    var records = JSON.parse(data);
                    if (records.result == 'Success') {
                        hide_room_details();
                        room_main_table();
                        notify('top', 'right', 'fa fa-check', 'success', 'animated fadeInLeft', 'animated fadeOutLeft', records.data);
                    } else {
                        notify('top', 'right', 'fa fa-times', 'danger', 'animated fadeInLeft', 'animated fadeOutLeft', records.data);
                    }
                }
            });
        }
    });
}

function statusroom(id) {
    var ischecked = $('.status_update_' + id).is(':checked');
    if (!ischecked) { status = 'I'; } else { status = 'A'; }
    param = { 'act': 'room_status_change', 'status': status, 'id': id };
    Swal.fire({
        title: "Are you sure?",
        text: "You want to change status?",
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
                a: "room_ajax",
                b: param,
                c: function() {},
                d: function(data) {
                    $('.preloader').hide();
                    var records = JSON.parse(data);
                    if (records.result == 'Success') {
                        room_main_table();
                        notify('top', 'right', 'fa fa-check', 'success', 'animated fadeInLeft', 'animated fadeOutLeft', records.data);
                    } else {
                        notify('top', 'right', 'fa fa-times', 'danger', 'animated fadeInLeft', 'animated fadeOutLeft', records.data);
                    }
                }
            });
        } else {
            if (ischecked) { $('.status_update_' + id).prop('checked', false); } else {
                $('.status_update_' + id).prop('checked', true);
            }
        }
    });
}

/**************************
 *   End  room        *
 **************************/