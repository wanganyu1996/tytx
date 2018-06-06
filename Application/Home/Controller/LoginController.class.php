<?php
// 本类由系统自动生成，仅供测试用途
namespace Home\Controller;
use Think\Controller;
class LoginController extends Controller {
    public function login(){
        if(IS_AJAX){
            $info=I('post');
            $data['tenantCode']=I('post.tenantCode');//企业编号
            $data['agentName']=I('post.agentName');//员工编号
            $data['password']=I('post.password');//登录密码
            $loginCode=I('post.loginCode');//验证码
            $admModel=D('Admin');
          
            $tenantCode=$admModel->where(array('tenantCode'=>array('eq',$data['tenantCode'])))->field('tenantCode')->find();
            if(!empty( $data['tenantCode'])){
                if(empty($tenantCode)){
                    $data['success']=false;
                    $data['msg']="您输入的企业编号不存在！";
                    echo json_encode($data);
                    die();
                }
            }else{
                $data['success']=false;
                $data['msg']="企业编号不能为空！";
                echo json_encode($data);
                die();
            }
            if(!empty($loginCode)){
                if($admModel->chkCode($loginCode)===FALSE){
                    $data['success']=false;
                    $data['msg']="验证码错误！";
                    echo json_encode($data);
                    die();
                }
            }else{
                $data['success']=false;
                $data['msg']="验证码不能为空！";
                echo json_encode($data);
                die();
            }
            $agentName=$admModel->where(array('agentName'=>array('eq',$data['agentName'])))->field('id,agentName,password')->find();
            if(empty($agentName['agentName'])){
                $data['success']=false;
                $data['msg']="您输入的员工编号不存在！";
                echo json_encode($data);
                die();
            }
            if(md5($data['password'].C('MD5_KEY'))!=$agentName['password']){
                $data['success']=false;
               $data['msg']="密码错误！再输入错误4次该账号将会被将会被锁定！";
                echo json_encode($data);
                die();
            }
            //session(array('name'=>'session_id','expire'=>3600*24));
            session('id',$agentName['id']);
            $data['success']=true;
            $data['msg']="登录成功！";
            echo json_encode($data);
            die();
        }
        $this->display();
    }
    public function loginImage(){
        $verfiy=new \Think\Verify(array(
                 'length'=>4,
                 'useNoise'=>FALSE,
                 'useCurve'=>FALSE,
                  'bg'=>array(255,255,255),
                 'fontSize'=>14,
                 'fontttf '=>'6.ttf',
                  'imageW'=>100,
                   'imageH'=>30
             ));
       
        $verfiy->entry();
    }
	
}