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
?>