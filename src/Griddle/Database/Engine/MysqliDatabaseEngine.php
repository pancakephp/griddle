<?php
/**
 * @author      Aaron Lord <aaronlord1@gmail.com>
 * @copyright   (c) 2013 Aaron Lord
 */
namespace Griddle\Database\Engine;

class MySQLiDatabaseEngine implements DatabaseEngineInterface
{
    public function query()
    {
        return $this;
    }

    public function execute()
    {
        return array('some', 'fake', 'data');
    }
}