<?php

class Verify extends Eloquent {
    protected $table = 'verify';
    protected $primaryKey = 'code';
    public $timestamps = false;
    protected $fillable = ['id', 'code'];

    static public function doVerify($code){
        $data = self::find($code);
        if(!$data) return false;
        $user = User::find($data->id);
        $user->emailverify = '1';
        $user->save();
        $data->delete();
        return true;
    }
}
