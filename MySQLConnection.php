<?php    
    class MySQLConnection{
        protected $host;
        protected $user;
        protected $password;
        protected $database;
        protected $connection;
        public function __construct($h,$u,$p,$db)
        {
            $this->host=$h;
            $this->user=$u;
            $this->password=$p;
            $this->database=$db;
            $this->connection=mysqli_connect($this->host,$this->user,$this->password,$this->database);
        }
        public function getHost()
        {
            return $this->host;
        }
        public function setHost($h)
        {
            $this->host=$h;
        }
        public function getUser()
        {
            return $this->user;
        }
        public function setUser($u)
        {
            $this->user=$u;
        }
        public function getPassword()
        {
            return $this->password;
        }
        public function setPassword($p)
        {
            $this->password=$p;
        }
        public function getDatabase()
        {
            return $this->database;
        }
        public function setDatabase($db)
        {
            $this->database=$db;
        }
        public function getConnection()
        {
            return $this->connection;
        }
        public function setConnection($cn)
        {
            $this->connection=$cn;
        }
        public function close_connection()
        {
            mysqli_close($this->connection);
        }
    }
?>