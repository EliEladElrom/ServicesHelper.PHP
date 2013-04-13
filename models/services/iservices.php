<?php

/**
 * Abstract_services
 *
 *
 * @category   CategoryName
 * @package    PackageName
 * @author     Original Author <elad.ny@gmail.com>
 */

interface Iservices {
    function create($data);
    function read($id);
    function update($data);
    function delete($id);
}