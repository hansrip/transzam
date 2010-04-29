<?php


class TransporterTable extends UserTable
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Transporter');
    }
}