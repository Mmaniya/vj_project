<?php 
require "includes.php";
$action = $_POST['act'];

// 1.Add and Edit Customers

if($action == 'CreateAc'){
    ob_clean();

    /* Customers table param */
    $param['userid']           = random_number(5);
    $param['name']             = $_POST['username'];
    $param['email']            = $_POST['useremail'];
    $param['mobile']           = $_POST['mobile'];
    $param['address']          = $_POST['address'];
    $param['password']         = $_POST['password'];
    $param['account_name']     = $_POST['account_name'];
    $param['account_no']       = $_POST['account_no'];
    $param['bank_name']        = $_POST['bank_name'];
    $param['ifsc_code']        = $_POST['ifsc_code'];
    $param['branch_name']      = $_POST['branch_name'];
    $param['if_deposited']     = $_POST['deposit_amt_y_n'];
    $param['deposit_amt']      = $_POST['deposit_amt'];
    $param['deposit_date']     = $_POST['deposit_date'];
    
    $result = Table::insertData(array('tableName' => TBL_USERS, 'fields' => $param, 'showSql' => 'N'));
    // $explode = explode('::', $result);                
    // $Customersid = trim($explode[2]);
    $response = array("result" => 'Success', "data" => 'Added Successfully');
    echo json_encode($response);

    exit();

}

if ($action == 'LoginAc') {
    ob_clean();

    $resultData = MainClass::checkCredentials($_POST['userid'], $_POST['password']);
    SessionWrite('userid', $resultData[1]->userid);
    SessionWrite('name', $resultData[1]->name);  
  
    $response = array("result" => $resultData[0]);
    echo json_encode($response);


    exit();
}