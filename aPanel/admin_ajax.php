<?php 
define('ABSPATH',  dirname(__DIR__, 1));
require ABSPATH . "/includes.php";

$action = $_POST['act'];
/*****************************/
/*      ADMIN SIGNIN         */
/*****************************/

if ($action == 'signInAdmin') {
    ob_clean();

    $resultData = Admin::checkCredentials($_POST['username'], $_POST['password']);
    SessionWrite('useremail', $resultData[1]->mobile);
    SessionWrite('username', $resultData[1]->username);    
    SessionWrite('admin_id', $resultData[1]->id);
    echo $resultData[0];
    exit();
}

if ($action == 'approved_users') {
    ob_clean();
        
    if (!empty($_POST['id'])) {
        $param['approved_status'] = 'Y';
        $where = array('id' => $_POST['id']);
        $result = Table::updateData(array('tableName' => TBL_USERS, 'fields' => $param, 'where' => $where, 'showSql' => 'N'));
        $userdtls = MainClass::get_user_detils_by_id($_POST['id']);
        $param  = array();
        $param['userid'] = $userdtls->userid;
        $param['name'] = $userdtls->name;
        $param['parent_id'] = '0';
        $param['status'] = 'Y';
        $rlst = Table::insertData(array('tableName' => TBL_APPROVED_USERS, 'fields' => $param, 'showSql' => 'N'));
        $explode = explode('::', $rlst);
        $insertid = $explode[2];
        $param=array();
            // $totalusercnt = MainClass::get_approved_user_count();
            $query = "SELECT * from ".TBL_APPROVED_USERS.""; 
            $totalusercnt = dB::mExecuteSql($query); 
            if(count($totalusercnt)>1){
                foreach($totalusercnt as $key => $val){
                        $parentid = $val->id;
                        $qry = "SELECT * FROM tbl_approved_uesrs WHERE parent_id =".$parentid;
                        $rsParent = dB::mExecuteSql($qry);
                        if(count($rsParent)<2) {
                            $param['parent_id'] = $parentid;
                            // $param['amount_credited'] = 1300 - 100;
                            $where = array('id' => $insertid);
                            $result = Table::updateData(array('tableName' => TBL_APPROVED_USERS, 'fields' => $param, 'where' => $where, 'showSql' => 'N'));

                            // LEVEL 0
                            $qry = "SELECT * FROM tbl_approved_uesrs WHERE id =".$parentid;
                            $level0 = dB::sExecuteSql($qry);  
                            $where = array();
                            $param = array();
                            if($level0->amount_credited != 6000){
                                $param['amount_credited'] = $level0->amount_credited + 100;
                                $where = array('id' => $parentid);
                                $result = Table::updateData(array('tableName' => TBL_APPROVED_USERS, 'fields' => $param, 'where' => $where, 'showSql' => 'N'));   
                            }
                            // LEVEL 1
                            $qry = "SELECT * FROM tbl_approved_uesrs WHERE id =".$level0->parent_id;
                            $level1 = dB::sExecuteSql($qry);
                            $where = array();
                            $param = array();
                            if($level1->amount_credited != 6000){
                                $param['amount_credited'] = $level1->amount_credited + 100;
                                $where = array('id' => $level1->id);
                                $result = Table::updateData(array('tableName' => TBL_APPROVED_USERS, 'fields' => $param, 'where' => $where, 'showSql' => 'N'));   
                            }
                            // LEVEL 2
                            $qry = "SELECT * FROM tbl_approved_uesrs WHERE id =".$level1->parent_id;
                            $level2 = dB::sExecuteSql($qry);
                            $where = array();
                            $param = array();
                            if($level2->amount_credited != 6000){
                                $param['amount_credited'] = $level2->amount_credited + 100;
                                $where = array('id' => $level2->id);
                                $result = Table::updateData(array('tableName' => TBL_APPROVED_USERS, 'fields' => $param, 'where' => $where, 'showSql' => 'N'));
                            }
                            // LEVEL 3
                            $qry = "SELECT * FROM tbl_approved_uesrs WHERE id =".$level2->parent_id;
                            $level3 = dB::sExecuteSql($qry);
                            $where = array();
                            $param = array();
                            if($level3->amount_credited != 6000){
                                $param['amount_credited'] = $level3->amount_credited + 100;
                                $where = array('id' => $level3->id);
                                $result = Table::updateData(array('tableName' => TBL_APPROVED_USERS, 'fields' => $param, 'where' => $where, 'showSql' => 'N'));
                            }
                            // LEVEL 4
                            $qry = "SELECT * FROM tbl_approved_uesrs WHERE id =".$level3->parent_id;
                            $level4 = dB::sExecuteSql($qry);
                            $where = array();
                            $param = array();
                            if($level4->amount_credited != 6000){
                                $param['amount_credited'] = $level4->amount_credited + 100;
                                $where = array('id' => $level4->id);
                                $result = Table::updateData(array('tableName' => TBL_APPROVED_USERS, 'fields' => $param, 'where' => $where, 'showSql' => 'N'));
                            }else{
                                $param['approved_status'] = 'C';
                                $where = array('userid' =>$level4->userid );
                                $result = Table::updateData(array('tableName' => TBL_USERS, 'fields' => $param, 'where' => $where, 'showSql' => 'N'));
                            }
                            break;  
                        }  
                            
                    }
            } else {
                // $param['amount_credited'] = 1300;
                $param['parent_id'] = 0;
                $where = array('id' => $insertid);
                $result = Table::updateData(array('tableName' => TBL_APPROVED_USERS, 'fields' => $param, 'where' => $where, 'showSql' => 'N'));  
            }

        echo $responce = $explode[0];

        }

    exit();
}

if($action == 'customerstatics'){ 

    $qry ="select id, count(*) total,
    sum(case when approved_status = 'Y' then 1 else 0 end) active_users,
    sum(case when approved_status = 'C' then 1 else 0 end) closed_users,
    sum(case when approved_status = 'N' then 1 else 0 end) waiting_users
    from ".TBL_USERS."";
    $result = dB::sExecuteSql($qry);  
    ?>
    <div class="row">
        <div class="col-xl-3 col-md-4">
            <div class="card bg-c-yellow update-card">
                <div class="card-block">
                    <div class="row align-items-end">
                        <div class="col-12">
                            <h6 class="text-white m-b-10">Total Users</h6>
                            <h4 class="text-white">
                                <?php echo $result->total; ?>
                            </h4>
                        </div>
                
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-4">
            <div class="card bg-c-green update-card">
                <div class="card-block">
                    <div class="row align-items-end">
                        <div class="col-12">
                            <h6 class="text-white m-b-10">Active Users</h6>
                            <h4 class="text-white">
                                <?php echo $result->active_users; ?>
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-4">
            <div class="card bg-c-lite-green update-card">
                <div class="card-block">
                    <div class="row align-items-end">
                        <div class="col-12">
                            <h6 class="text-white m-b-10">Closed Users</h6>
                            <h4 class="text-white">
                                <?php echo $result->closed_users; ?>
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-4">
            <div class="card bg-c-pink update-card">
                <div class="card-block">
                    <div class="row align-items-end">
                        <div class="col-12">
                            <h6 class="text-white m-b-10">Waiting Users</h6>
                            <h4 class="text-white">
                                <?php echo $result->waiting_users; ?>
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
 <?php }

    if($action == 'accountstatics'){ 
    
    $qry = "SELECT sum(deposit_amt) as total FROM `tbl_users`";
    $result = dB::sExecuteSql($qry);   ?>
    <div class="row">
        <div class="col-xl-3 col-md-4">
            <div class="card bg-c-green update-card">
                <div class="card-block">
                    <div class="row align-items-end">
                        <div class="col-12">
                            <h6 class="text-white m-b-10">Credited Amount</h6>
                            <h4 class="text-white">
                                <?php echo $result->total; ?>/-Rs
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>