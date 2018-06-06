<?php
namespace Home\Model;
use \Think\Model;
class  AdminModel extends Model{
    protected $_validate=array();
    public function chkCode($code)
    {
        $verify=new \Think\Verify();
        return $verify->check($code);
    }
}