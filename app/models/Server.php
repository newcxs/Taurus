<?php

class Server extends Eloquent {
    protected $table = 'server';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = ['name', 'ip', 'key', 'timestamp', 'status'];
}
