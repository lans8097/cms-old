<?php
/**
 * Created by PhpStorm.
 * User: lance
 * Date: 04.09.2017
 * Time: 0:27
 */
namespace Models;

use Core\Model;

class Group extends Model
{

    public function getGroupArray($groupId)
    {
        $groupId = (int)$groupId;
        $query = "SELECT `id`,`name`, `description` FROM `user_groups` WHERE `id` ={$groupId} LIMIT 1";
        $Result = $this->Db->query($query);
        if($Result->field_count){
            return $Result->fetch_assoc();
        }else{
            return false;
        }
    }
}