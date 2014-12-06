<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {
    use UserTrait, RemindableTrait;

    protected $table = 'users';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = ['id', 'email', 'password', 'qq', 'emailverify', 'auth', 'regtime', 'regip', 'logintime', 'loginip'];

    static public function add($email, $password, $qq){
        $salt = self::salt();
        $user = User::create([
            'email' => $email,
            'password' => Hash::make($password),
            'qq' => $qq,
            'emailverify' => '0',
            'regtime' => time(),
            'regip' => self::ip(),
            'logintime' => time(),
            'loginip' => self::ip()
        ]);
        return $user->id;
    }

    static public function salt(){
        $endtime = 1356019200;
        $curtime = time();
        $newtime = $curtime-$endtime;
        $rand = rand(0, 99);
        $all = $rand.$newtime;
        $onlyid = base_convert($all, 10, 36);
        return $onlyid;
    }

    static public function ip($type = 0) {
        $type = $type ? 1 : 0;
        static $ip = NULL;
        if ($ip !== NULL) return $ip[$type];
        if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $arr = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
            $pos = array_search('unknown',$arr);
            if(false !== $pos) unset($arr[$pos]);
            $ip = trim($arr[0]);
        }elseif (isset($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        }elseif (isset($_SERVER['REMOTE_ADDR'])) {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        $long = sprintf("%u",ip2long($ip));
        $ip = $long ? array($ip, $long) : array('0.0.0.0', 0);
        return $ip[$type];
    }

    public function getRememberTokenName(){
        return null;
    }
    public function setAttribute($key, $value){
        $isRememberTokenAttribute = $key == $this->getRememberTokenName();
        if (!$isRememberTokenAttribute){
            parent::setAttribute($key, $value);
        }
    }
}
