<?php

/**
 * Class Member
 */
class Member extends AppModel
{
    public $hasMany = array('Transaction');
}
