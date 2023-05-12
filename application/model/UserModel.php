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

}

?>