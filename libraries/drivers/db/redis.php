<?php
class RedisDb extends Redis
{
    public function __construct($config)
    {
        $this->connect($config['host'], $config['port']);

        if (isset($config['password']) && $config['password'] != false) {
            $this->auth($config['password']);
        }

        $this->select($config['database']);
    }

    public function changeDB($db)
    {
        $this->select($db);

        return $this;
    }
}
