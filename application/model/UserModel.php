<?php

namespace application\model;

class UserModel extends Model{
    // $pwFlg = true : 두번째 파라미터가 있으면 받아서 씀
    public function getUser($arrUserInfo, $pwFlg = true) {
        $sql = 
            " SELECT "
            ."      * "
            ." FROM "
            ."      user_info "
            ." WHERE "
            ."      u_id = :id "
            ." AND "
            ."      u_del_flg = 0 "
            ;

        // PW 추가한 동적 쿼리
        if($pwFlg) {
            $sql .= 
                " AND "
                ."      u_pw = :pw ";
        }

        $prepare = [
            ":id"   => $arrUserInfo["id"]
        ];

        // PW 추가한 동적 쿼리
        if($pwFlg) {
            $prepare[":pw"] = base64_encode($arrUserInfo["pw"]);
        }

        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($prepare);
            $result = $stmt->fetchAll();
        } catch(Exception $e) {
            echo "UserModel->getUser Error : ".$e->getmessage();
            exit();
        }
        return $result;
    }

    //Insert User
    public function joinUser($arrUserInfo) {
        $sql =
            " INSERT INTO "
            ."  user_info( "
            ."      u_id "
            ."      ,u_pw "
            ."      ,u_name "
            ."      ,u_phone_num "
            ."      ,u_from_date "
            ." ) "
            ." VALUES( "
            ."      :u_id "
            ."      ,:u_pw "
            ."      ,:u_name "
            ."      ,:u_phone_num "
            ."      ,NOW() "
            ." ) "
            ;
        $arr_prepare = [
                ":u_id"           => $arrUserInfo["id"]
                ,":u_pw"          => base64_encode($arrUserInfo["pw"])
                ,":u_name"        => $arrUserInfo["name"]
                ,":u_phone_num"   => $arrUserInfo["phone_num"]
            ];

        try {
            $stmt = $this->conn->prepare( $sql );
            $result = $stmt->execute( $arr_prepare );
            return $result;
        } catch ( Exception $e ) {
            return false;
        }
    }

}

?>