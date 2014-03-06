<?php
require_once(ROOT.'/vendor/phpixie/db/tests/db/DB/SQL/Parser/SQLGroupTest.php');

class MysqlGroupTest extends SQLGroupTest
{
    protected $expected = array(
        array('`a` = ?', array(1)),
        array('`a` = ? OR `b` = ? XOR NOT `c` = ?', array(1, 1, 1)),
        array('`a` = ? OR ( `b` = ? OR `c` = ? ) XOR NOT ( `d` = ? AND `e` = ? )', array(1, 1, 1, 1, 1)),
    );

    public function setUp()
    {
        parent::setUp();
        $fragmentParser = $this->db->driver('PDO')->fragmentParser('Mysql');
        $operatorParser = $this->db->driver('PDO')->operatorParser('Mysql', $fragmentParser);
        $this->groupParser = $this->db->driver('PDO')->groupParser('Mysql', $operatorParser);
    }

}
