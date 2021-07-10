$('.payment').hide();
function paymentselectionoption(val){
    if(val == 'Y'){
        $('.payment').show();
    }else{
        $('.payment').hide();
    }
}

$("form#userAccount").submit(function() {
   var username =  jQuery('input[name="username"]').val();
   var useremail =  jQuery('input[name="useremail"]').val();
   var mobile =  jQuery('input[name="mobile"]').val();
   var address =  jQuery('input[name="address"]').val();
   var password =  jQuery('input[name="password"]').val();
   var account_name =  jQuery('input[name="account_name"]').val();
   var account_no =  jQuery('input[name="account_no"]').val();
   var bank_name =  jQuery('input[name="bank_name"]').val();
   var ifsc_code =  jQuery('input[name="ifsc_code"]').val();
   var branch_name =  jQuery('input[name="branch_name"]').val();
   var deposit_amt_y_n =  jQuery('select[name="deposit_amt_y_n"]').val();
   var deposit_amt =  jQuery('input[name="deposit_amt"]').val();
   var deposit_date =  jQuery('input[name="deposit_date"]').val();

   if(username == ''){
    alert('Enter User Name.!');
    return false;
   }

   if(useremail == ''){
    alert('Enter User Email.!');
    return false;
   }
   if(mobile == ''){
    alert('Enter User Mobile.!');
    return false;
   }
   if(address == ''){
    alert('Enter User Address.!');
    return false;
   }
   if(password == ''){
    alert('Enter User Password.!');
    return false;
   }
   if(account_name == ''){
    alert('Enter User Account Name.!');
    return false;
   }
   if(account_no == ''){
    alert('Enter User Account No.!');
    return false;
   }
   if(bank_name == ''){
    alert('Enter User Bank Name.!');
    return false;
   }  
   if(ifsc_code == ''){
    alert('Enter User IFSC Code.!');
    return false;
   }  
   if(branch_name == ''){
    alert('Enter User Branch Name.!');
    return false;
   }  
   if(deposit_amt_y_n == ''){
    alert('Select Amount Type.!');
    return false;
   }

   if(deposit_amt_y_n != '' && deposit_amt_y_n == 'Y' && deposit_amt == ''){
    alert('Enter Deposit Amount.!');
    return false;
   }
   if(deposit_amt_y_n != '' && deposit_amt_y_n == 'Y' && deposit_date ==''){
    alert('Select Deposit Date.!');
    return false;
   }

        var formData = $('form#userAccount').serialize();
        $.ajax({
        url: 'user-ajax.php',
        type: 'POST',
        data: formData,        
        success: function(data) {
            var records = JSON.parse(data);
            if (records.result == 'Success') {
                    Swal.fire({
                        position: 'top-end',
                        type: 'success',
                        title: 'Successfully Submited',
                        showConfirmButton: false,
                        timer: 1500
                      });
                  
            } else {
                Swal.fire({
                    position: 'top-end',
                    type: 'error',
                    title: 'Try Again.!',
                    showConfirmButton: false,
                    timer: 1500
                  });
            }
        }
    });
});

$("form#userAccountLogin").submit(function() {
    var userid =  jQuery('input[name="userid"]').val();
    var password =  jQuery('input[name="password"]').val();
  
 
    if(userid == ''){
     alert('Enter User Id.!');
     return false;
    }
    if(password == ''){
     alert('Enter User Password.!');
     return false;
    }
   
    var formData = $('form#userAccountLogin').serialize();
    $.ajax({
        url: 'user-ajax.php',
        type: 'POST',
        data: formData,        
        success: function(data) {
            var records = JSON.parse(data);
            if (records.result == 'Success') {
                    Swal.fire({
                        position: 'top-end',
                        type: 'success',
                        title: 'Successfully Login',
                        showConfirmButton: false,
                        timer: 1500
                    });
                    setTimeout(function(){
                        window.location="myprofile.php";
                    },2000);
            } else {
                Swal.fire({
                    position: 'top-end',
                    type: 'error',
                    title: 'Try Again.!',
                    showConfirmButton: false,
                    timer: 1500
                });
            }
        }
     });
 });
