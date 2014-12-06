<?php

class Setting extends Eloquent {
    protected $table = 'setting';
    protected $primaryKey = 'key';
    public $timestamps = false;
    protected $fillable = ['key', 'value'];
}
