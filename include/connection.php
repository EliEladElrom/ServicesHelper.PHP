<?
/**
 * Connection
 *
 * @category   CategoryName
 * @package    PackageName
 * @author     Original Author <elad.ny@gmail.com>
 */

class Connection
{
    public static $dsn = array(
        'phptype'  => "mysql",
        'hostspec' => "localhost",
        'database' => "[someDatabase]",
        'username' => "root",
        'password' => ""
    );

    const PEAR_LOCATION = '/Users/elad/pear/share/pear';

    public static function connectToDatabase() {

        set_include_path(Connection::PEAR_LOCATION);
        include("DB.php");

        $dbh = DB::connect(Connection::$dsn);

        if (PEAR::isError($dbh)) {
            echo "An error occurred while trying to connect to the database server.<br>\n";
            echo "Error message: " . $dbh->getMessage() . "<br>\n";
            echo "Debug info: " . $dbh->getDebugInfo() . "<br>\n";
            die();
        }

        return $dbh;
    }

    public static function disconnect($dbh) {
        $dbh->disconnect;
    }
}