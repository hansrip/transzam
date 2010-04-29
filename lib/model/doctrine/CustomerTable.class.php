<?php


class CustomerTable extends UserTable
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Customer');
    }
}