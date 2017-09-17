<?php
/**
 * Created by PhpStorm.
 * User: lance
 * Date: 04.09.2017
 * Time: 0:19
 */
namespace Core\Auth;

use Core\Traits\Singleton;

class User
{
    use Singleton;

    protected $Group;
    protected $Session;
    protected $Required;
    protected $email;
    protected $date;

    public function __construct()
    {
        $this->Group = new Group();
    }

    public function getEmail()
    {
        return $this->email;
    }

}