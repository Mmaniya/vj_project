<?php  
define('ABSPATH', dirname(__DIR__, 1));
require ABSPATH . "/includes.php";

$draw = $_POST['draw'];
$row = $_POST['start'];
$rowperpage = $_POST['length']; // Rows display per page
$columnIndex = $_POST['order'][0]['column']; // Column index
$columnName = $_POST['columns'][$columnIndex]['data']; // Column name
$columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
$searchValue = $_POST['search']['value']; 
$closeusers = $_POST['closedusers'];

$subQry = array();
if($_POST['closedusers'] == 'true'){
    $subQry[] = "approved_status ='C'";
}

if($_POST['activeusers'] == 'true'){
    $subQry[] = "approved_status ='Y'";
}

if($_POST['pendingusers'] == 'true'){
    $subQry[] = "approved_status ='N'";
}
if($columnName == '6'){
   $orderby = " ORDER BY approved_status  ".$columnSortOrder;
}else{
   $orderby = " ORDER BY id  ASC";
}

switch ($columnName) {
    case "0":
        $orderby = " ORDER BY id ".$columnSortOrder;
        break;
    case "1":
        $orderby = " ORDER BY name ".$columnSortOrder;
        break;
    case "2":
        $orderby = " ORDER BY userid ".$columnSortOrder;
        break;
    case "3":
        $orderby = " ORDER BY mobile ".$columnSortOrder;
        break;
    case "4":
        $orderby = " ORDER BY email ".$columnSortOrder;
        break;
    case "6":
        $orderby = " ORDER BY approved_status ".$columnSortOrder;
        break;
    default:
        $orderby = " ORDER BY id  ASC";
  }

if($searchValue != ''){
    $subQry[] = " name like '%".$searchValue."%' or mobile like '%".$searchValue."%' or userid like '%".$searchValue."%'";
}

if(count($subQry)>0) {
    $subQuery = " WHERE ".implode(' AND ',$subQry).""; 
}   

$query ="SELECT count(*) AS total FROM ".TBL_USERS. $subQuery. $orderby; 
$rsTotal = dB::sExecuteSql($query);	
$totalRecords = $rsTotal->total;

$query ="select count(*) as allcount from ".TBL_USERS. $subQuery. $orderby; 
$records = dB::sExecuteSql($query);	
$totalRecordwithFilter = $records->allcount;

$query ="SELECT * FROM ".TBL_USERS." $subQuery $orderby limit ".$row.",".$rowperpage.""; 
$result = dB::mExecuteSql($query);

foreach ($result as $key =>$value){

   $qry = 'SELECT * FROM tbl_approved_uesrs WHERE userid ="'.$value->userid.'"';
   $rsParent = dB::sExecuteSql($qry);

    if($value->approved_status == 'N'){
        $action  = '<a href="javascript:void(0);" onclick="approvedusers('.$value->id.')" class="btn btn-grd-success btn-sm" >Approve</a>';
    } else if($value->approved_status == 'C'){
        $action  = '<label class="label label-danger">Closed</label>';
    }else{
        $action  = '<label class="label label-inverse">Approved</label>';
    }

    if($value->if_deposited == 'Y'){
        $datas= '<hr><h5>Deposited Amount : <span style="color:#5bc0de">'.$value->deposit_amt.'/- Rs</span></h5><h5>Deposited Date : '.$value->deposit_date.'</h5>';
    }

    if($rsParent->amount_credited && $value->approved_status == 'Y'){
        $amount = '<hr><h5 style="color:green"> Earning money till date : '.$rsParent->amount_credited.'/-RS </h5>';
    }else if(empty($rsParent->amount_credited) && $value->approved_status == 'Y'){
        $amount = '<hr><h5 style="color:orange"> Earning money till date : 0 /-RS </h5>';
    }else if($rsParent->amount_credited && $value->approved_status == 'C'){
        $amount = '<hr><h5 style="color:#01dbdf"> Total Earning Money  : '.$rsParent->amount_credited.'/-RS </h5><br><h5 style="color:#01dbdf"> Account Closed Date  : '.$rsParent->existing_date.' </h5>';
    }else{
        $amount = '<hr><h5 style="color:red">Pending Approved Request.! </h5>';
    }
    $data[] = array(
        $key+1,           
        $username = '<span style="font-weight:bold;">'. ucwords($value->name) .'</span>',
        $value->userid, 
        $value->mobile,  
        $value->email,              
        $view ='<span><a href="javascript:void(0);" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal'.$value->id.'"> View <i class="fa fa-eye"></i></a><div id="myModal'.$value->id.'" class="modal fade" role="dialog"> <div class="modal-dialog"> <div class="modal-content"> <div class="modal-header"> <button type="button" class="close" style="right:20px;position:absolute" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true"><i class="fa fa-times"></i></span> </button></div> <div class="modal-body"> <h5>Name : '.$value->name.'</h5><h5>Mobile : '.$value->mobile.'</h5><h5>E-Mail : '.$value->email.'</h5><h5>Address : '.$value->address.'</h5><h5>Password : '.$value->password.'</h5><hr><h5>Account Name : '.$value->account_name.'</h5><h5>Account No : '.$value->account_no.'</h5><h5>Bank : '.$value->bank_name.'</h5><h5>Branch : '.$value->branch_name.'</h5><h5>IFSC Code : '.$value->ifsc_code.'</h5>'. $datas.''.$amount.'</div> </div> </div> </div></span>',
        $action,
       );
}

$response = array(
    "draw" => intval($draw),
    "iTotalRecords" => $totalRecords,
    "iTotalDisplayRecords" => $totalRecordwithFilter,
    "aaData" => $data,
    );

echo json_encode($response);
?>