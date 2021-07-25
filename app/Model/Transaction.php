<?php

/**
 * Class Transaction
 */
class Transaction extends AppModel
{
    public $hasMany = array('TransactionItem');
}
