<?php

class Services extends Eloquent {
    protected $table = 'services';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = ['uid', 'sid', 'type', 'data', 'stime', 'etime', 'status'];

    static public function add($uid, $sid, $type, $data, $time, $status = '0'){
        return self::create([
            'uid' => $uid,
            'sid' => $sid,
            'type' => $type,
            'data' => json_encode($data),
            'stime' => time(),
            'etime' => time() + $time * 30 * 24 * 3600,
            'status' => $status
        ]);
    }

    static public function findByUID($uid){
        return DB::table('services')->where('uid', $uid)->select()->get();
    }

    static public function findByUIDAndType($uid, $type){
        return DB::table('services')->where('uid', $uid)->where('type', $type)->select()->get();
    }

    static public function findByPID($pid){
        return DB::table('services')->where('pid', $pid)->select()->get();
    }

    static public function findBySID($sid){
        return DB::table('services')->where('sid', $sid)->select()->get();
    }
}
