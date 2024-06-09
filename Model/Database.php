<?php


class Database {
    
    protected $connection;
    protected $statement;

    

    public function query( $statement, $param = [] )
    {
        $this->statement = $this->connection->prepare( $statement );

        $this->statement->execute( $param );

        return $this;
    }


    public function fetch()
    {
        return $this->statement->fetch();
    }

    public function fetchAll()
    {
        return $this->statement->fetchAll();
    }


}