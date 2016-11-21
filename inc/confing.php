<?php

session_start();

/**
 * Connect to MySqL
 */

//
// Thrown when an error occurs.
//
class errorsServerException extends Exception {
    // custom class Exception of object
}



class ConMysql{

    private $dbhost,$dbuser,$dbpass,$db;


    function __construct($host,$user,$pass,$db){

        $this->dbhost = $host;
        $this->dbuser = $user;
        $this->dbpass = $pass;
        $this->db     = $db;
        /**
         * @throws errors
         *
         */
            try {
                $this->Connect();
                $this->selectDb();
           	} catch (errorsServerException $why) {
        	    echo $why->getMessage();
        	    }
    }

    /**
	 * make Connect
	 *
	 * @access private
	 * @return static
	 */
    private function Connect() {

        $sql =  @mysql_connect($this->dbhost,$this->dbuser,$this->dbpass);
        if(!$sql) throw new errorsServerException('<pre> Error => Not Connect !</pre>');
        else return true;

    }
    /**
	 * make selectDb
	 *
	 * @access private
	 * @return static
	 */
    private function selectDb() {

        $sql = @mysql_select_db($this->db);
        if(!$sql) throw new errorsServerException('<pre> Error => NO DATABASE SELECTED !</pre>');
        else return true;

    }



}
//run class
 new ConMysql('localhost','root','root','project');
