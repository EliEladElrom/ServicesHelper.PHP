<?php

/**
 * User_service
 *
 *
 * @category   CategoryName
 * @package    PackageName
 * @author     Original Author <elad.ny@gmail.com>
 */

include_once 'models/services/abstract_services.php';
include_once 'models/vo/User_vo.php';

class User_service extends abstract_services {

    const TABLE_NAME  = 'user';
    const PRIMARY_KEY_NAME = 'email';
    const VO_CLASS_NAME = 'User_vo';

    public function __construct() {
        $this->setTableInformation($this::TABLE_NAME,$this::PRIMARY_KEY_NAME,$this::VO_CLASS_NAME);
    }

    // EE: additional methods will be declared here

    public function validateUser($email, $password) {

    }
}

?>