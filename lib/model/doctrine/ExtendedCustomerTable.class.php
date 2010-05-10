<?php


class ExtendedCustomerTable extends CustomerTable
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('ExtendedCustomer');
    }
}