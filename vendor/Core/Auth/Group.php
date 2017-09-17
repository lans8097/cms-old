<?php
/**
 * Created by PhpStorm.
 * User: lance
 * Date: 04.09.2017
 * Time: 0:19
 */
namespace Core\Auth;

use Core\Db\Db;

class Group
{
    protected $id;
    protected $name;
    protected $alt;
    protected $description;
    protected $Privileges = NULL;

    public function __construct($groupId)
    {
        $Group = new \Models\Group();
        $result = $Group->getGroupArray($groupId);

        $this->id   = $result['id'];
        $this->name = $result['name'];
        $this->description = $result['description'];
    }

}