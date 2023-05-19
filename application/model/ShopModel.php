<?php

namespace application\model;

class ShopModel extends Model{

    public function getItem() {
        $sql = 
            " SELECT "
            ."      * "
            ." FROM "
            ."      item_info "
            ;

        $prepare = [];

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

}

?>