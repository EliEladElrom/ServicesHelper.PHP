<?php

/**
 * Abstract_services
 *
 *
 * @category   CategoryName
 * @package    PackageName
 * @author     Original Author <elad.ny@gmail.com>
 */

include_once 'models/services/iservices.php';

class Abstract_services implements Iservices {

    public $table_name = '';
    public $primary_key_name = '';
    public $vo_class_name = '';

    public static $dbh;

    public function setTableInformation( $table_name, $primary_key_name, $vo_class_name) {

        // connect to db
        include('include/connection.php');
        Abstract_services::$dbh = Connection::connectToDatabase();

        $this->table_name = $table_name;
        $this->primary_key_name = $primary_key_name;
        $this->vo_class_name = $vo_class_name;
    }

    public function create($data) {
        // implement
    }

    public function read($id) {

        $SqlStatement = "SELECT * FROM ".$this->table_name." WHERE ".$this->primary_key_name." = '$id'";
        $row = Abstract_services::$dbh->getRow($SqlStatement, DB_FETCHMODE_ASSOC);

        if (PEAR::isError($row)) {
            echo "An error occurred while trying to run your query: $SqlStatement<br>\n";
            echo "Error message: " . $row->getMessage() . "<br>\n";
            echo "A more detailed error description: " . $row->getDebugInfo() . "<br>\n";
        } else {
            // EE: TODO push message to firebug
            // echo 'success ' . $SqlStatement . '; ' . $row['username'];
        }

        if(!class_exists($this->vo_class_name,true)){
            throw new Exception('Class: '.$this->vo_class_name.' not found.');
        }

        $methodName = 'setParams';
        $classObj = new $this->vo_class_name();
        $classObj->$methodName($row);
        return $classObj;

        $dbh->disconnect;
    }

    public function update($data) {
        // implement
    }

    public function delete($id) {
        // implement
    }
}