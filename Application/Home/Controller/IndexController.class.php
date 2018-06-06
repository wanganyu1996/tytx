<?php
// 本类由系统自动生成，仅供测试用途
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function __construct(){
        parent::__construct();
        $adminId=session('id');
        //dump($adminId);
       // $adminId=1;
        if(!$adminId)
            redirect(U("login/login"));
        $url=MODULE_NAME.'/'.CONTROLLER_NAME.'/'.ACTION_NAME;
        $where='module_name="'.MODULE_NAME.'"AND controller_name="'.CONTROLLER_NAME.'" AND action_name="'.ACTION_NAME.'"';
        if(CONTROLLER_NAME=='Index')
            return TRUE;
        if($adminId==1)
            $sql="select count(*) has from tytx_privilege where ".$where;
        else
            $sql='select count(a.role_id) has
            from tytx_role_privilege  a
            left join tytx_privilege b on a.pri_id=b.id
            left join tytx_admin_role c on a.role_id=c.role_id
            where c.admin_id='.$adminId.' AND '.$where;
           $db=M();
           
          $pri=$db->query($sql);
        // die();
          if($pri[0]['has']<1)
             $this->error("无权访问！");
          //  $this->display();
    }
    public function index(){
        S('btn',null);
        $adminId=session('id');
        if($adminId==1)
            $sql="select * from tytx_privilege";
        else 
            $sql="select  b.*
                 from  tytx_role_privilege a 
                  left join tytx_privilege b on a.pri_id=b.id
                  left join tytx_admin_role c on a.role_id=c.role_id
                where c.admin_id=".$adminId;
           $db=M();
           $pri=$db->query($sql);
           $btn=array();
           if(S('btn')==null){
               foreach($pri as $k=>$v){
                   if($v['parent_id']==0){
                       foreach($pri as $k1=>$v1){
                            if($v['id']==$v1['parent_id']){
                                 $v['children'][]=$v1;
                            }
                       }
                       $btn[]=$v;
                   }
               }
           S('btn',$btn,C('cacheTime'));
           }else{
               $btn=S('btn');
           }
           $sysModel=M('System');
           $sysData=$sysModel->find(1);
           
           $userModel=M('Username');
           $userData=$userModel->find(1);
           //dump($sysData);
           $this->assign("btn",$btn);
           $this->assign("money",$sysData['balance']);
           $this->assign("username",$userData['username']);
           $this->display();
          
    }
    public function menu1(){
        $this->display();
    }
    public function welcome(){
        $this->display();
    }
    public  function changePwd(){
        $id=session('id');
         
        if($_GET){
            $admModel=M('Admin');
            $pwd=I('get.newPwd');
            if($pwd){
               $data['password']=md5($pwd.C('MD5_KEY'));
               $admModel->where(array('id'=>array('eq',$id)))->save($data);
               $data['msg']='修改成功！';
            }
            $username=I('get.username');
            if($username){
                $userModel=M('Username');
                $data['username']=$username;
                $userModel->where(array('id'=>array('eq',$id)))->save($data);
                $data['msg']='修改成功！';
            }
            //$f="1";
            echo json_encode($data);
        }
    }
    public function logout(){
        session(null);
        redirect(U("Login/login"));
    }
    public function editMoney(){
         if(IS_AJAX){
             $sysModel=M('System');
             $money=I("post.money");
             $data['balance']=$money;
             $sysModel->where(array(id=>array('eq',1)))->save($data);
             $data['success']="余额为修改成功！";
             echo json_encode($data);
         }
    }
}