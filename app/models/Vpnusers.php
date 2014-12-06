<?php

class Vpnusers extends Eloquent {
    protected $table = 'vpnusers';
    protected $primaryKey = 'account';
    public $timestamps = false;
    protected $fillable = ['account', 'pwd'];
}
