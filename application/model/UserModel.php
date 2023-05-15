<?php

namespace application\model;

class UserModel extends Model{
    public function getUser($arrUserInfo) {
        $sql = 
            " SELECT "
            ."      * "
            ." FROM "
            ."      user_info "
            ." WHERE "
            ."      u_id = :id "
            ." AND "
            ."      u_pw = :pw "
            ;

        $prepare = [
            ":id"   => $arrUserInfo["id"]
            ,":pw"  => $arrUserInfo["pw"]
        ];
        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($prepare);
            $result = $stmt->fetchAll();
        } catch(Exception $e) {
            echo "UserModel->getUser Error : ".$e->getmessage();
            exit();
        } finally {
            $this->closeConn();
        }
        return $result;
    }

    public function insertUser($arrUserInfo) {
        $sql =
            " INSERT INTO "
            ."  user_info( "
            ."      u_id "
            ."      ,u_pw "
            ."      ,u_name "
            ."      ,u_address "
            ."      ,u_phone_num "
            ."      ,u_email "
            ."      ,u_from_date "
            ." ) "
            ." VALUES( "
            ."      u_id = :u_id "
            ."      u_pw = :u_pw "
            ."      u_name = :u_name "
            ."      u_address = :u_address "
            ."      u_phone_num = :u_phone_num "
            ."      u_email = :u_email "
            ."      u_from_date = NOW() "
            ." ) "
            ;
        $arr_prepare =
            array(
                ":u_id"           => $arrUserInfo["id"]
                ,":u_pw"          => $arrUserInfo["pw"]
                ,":u_name"        => $arrUserInfo["name"]
                ,":u_address"     => $arrUserInfo["address"]
                ,":u_phone_num"   => $arrUserInfo["phone_num"]
                ,":u_email"       => $arrUserInfo["email"]
            );

        try {
            $this->conn->beginTransaction();
            $stmt = $this->conn->prepare( $sql );
            $stmt->execute( $arr_prepare );
            $result_cnt = $stmt->rowCount();
            $this->conn->commit();
        } catch ( Exception $e ) {
            $this->conn->rollback();
            echo "UserModel->joinMember Error : ".$e->getmessage();
            exit();
        } finally {
            $this->closeConn();
        }
    
        return $result_cnt;
    }

}

// ------------------------------------------------
$arr =
array(
    "id"                => "id"
    ,"pw"            => "pw"
    ,"name"          => "name"
    ,"address"       => "address"
    ,"phone_num"     => "phone_num"
);

// ------------------------------------------------

?>