<?php

/**
 * Class Transaction
 */
class Transaction extends AppModel
{
    public $belongsTo = array('Member');
    public $hasMany = array('TransactionItem');
}
