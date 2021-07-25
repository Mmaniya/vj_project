<?php 
class MainClass {

    public function getuserexistornot(){
        $query = "SELECT *  from ".TBL_USERS." WHERE userid ='".$this->userid."'"; 
        return dB::sExecuteSql($query);   
    }

    function get_user_detils_by_id($userid){
        $query = "SELECT *  from ".TBL_USERS." WHERE id ='".$userid."'"; 
        return dB::sExecuteSql($query); 
    }


    function get_approved_user_count(){
        $query = "SELECT * from ".TBL_APPROVED_USERS.""; 
        return dB::sExecuteSql($query); 
    }

    function findUserByUserid($userid){
        $query = "SELECT * from ".TBL_APPROVED_USERS." WHERE userid ='".$userid."'";
        return dB::sExecuteSql($query); 
    }

    function get_user_id_by_group($group){
        $query = "SELECT * from ".TBL_APPROVED_USERS." WHERE parent_id ='".$group."'";
        return dB::sExecuteSql($query); 
    }
    function get_multi_user_id_by_group($group){
        $query = "SELECT * from ".TBL_APPROVED_USERS." WHERE parent_id ='".$group."'";
        return dB::mExecuteSql($query); 
    }

    public function get_user_details(){               
        $qry ="select id, count(*) total,
            sum(case when approved_status = 'Y' then 1 else 0 end) active_users,
            sum(case when approved_status = 'N' then 1 else 0 end) closed_users,
            sum(case when approved_status = '' then 1 else 0 end) waiting_users
            from ".TBL_USERS."";
        return  dB::sExecuteSql($qry);  
    }

    static function checkUserId($username) {
        $admin_qry ="select * from `".TBL_USERS."` where userid = '".$username."'"; 
           $rsUser = dB::sExecuteSql($admin_qry); 				 
           if($rsUser->id>0){ 			
               return 1;
           }else{
               return 0; 
           }
       }
   
       static function checkCredentials($username,$password) {
           $usernameExists = MainClass::checkUserId($username);			
           if($usernameExists == 1) {
                   $admin_qry ="select * from `".TBL_USERS."` where userid = '".$username."' and password='".$password."'";
                   $rsUser = dB::sExecuteSql($admin_qry);				
               if(count($rsUser)>0) {
                       $returnArr = array("Success",$rsUser); 				 						
               } else {				
                   $returnArr =  array("Invalid Password"); 
            }
               } else {
                   $returnArr =  array("Invalid UserName"); 
           }
           return $returnArr;
       }

}