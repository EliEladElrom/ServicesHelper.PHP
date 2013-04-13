<?php

/**
 * User_vo
 *
 * @category   CategoryName
 * @package    PackageName
 * @author     Original Author <elad.ny@gmail.com>
 */

class User_vo
{
    public $id;
    public $username;
    public $password;

    public function __construct() {
    }

    public function setParams($array)
    {
        $this->id = $array['id'];
        $this->username = $array['username'];
        $this->password = $array['password'];
    }
}