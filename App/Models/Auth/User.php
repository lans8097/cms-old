<?php
/**
 * Created by PhpStorm.
 * User: lance
 * Date: 04.09.2017
 * Time: 0:27
 */
namespace Models;

use Core\Model;

class User extends Model
{

    public function getUserArray($userId)
    {
        $userId = (int)$userId;
        $query = "SELECT `id`,`email`,`group_id`,`first_name` FROM `users` WHERE `id` ={$userId} LIMIT 1";
        $Result = $this->Db->query($query);
        if($Result->field_count){
            return $Result->fetch_assoc();
        }else{
            return false;
        }
    }

}