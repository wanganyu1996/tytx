<?php
// 本类由系统自动生成，仅供测试用途
namespace Home\Controller;
use Think\Controller;
class GoController extends IndexController {
    //通话记录
    /**
     * time_type 查询时间标志 当天记录-1 昨天记录-2 最近一周-7 最近一月-30 某一天-99 自定义-100
       oneDay 某一天
       startDate 开始日期  自定义显示区
       endDate 结束日期
       mobile 手机号
       userId 用户编号 坐席
       minTime 最小时间 时长
       maxTime 最大时间
       //callType
  
      state//类型 呼入 呼出

      mode 方式 任务 手拨
      $where['id'] = array('gt',1);
     $where['_string'] = ' (name like "%thinkphp%")  OR ( title like "%thinkphp") '
     */
    public function showInfo(){
        $model=D('Calllog');
        if(IS_POST){
             $data=I('post.');
             $data['calltime']=strtotime($data['calltime']);
             $data['talktime']=strtotime(date('Y-m-d').$data['talktime'])-strtotime(date('Y-m-d 00:00:00'));
             if($_FILES['recordsrc']['error']==0){
                 $config = array(
                     'rootPath'=>'./Public/Uploads/',
        );
                 $upload = new \Think\Upload($config);// 实例化上传类
                 $upload->saveName = make_char(8).'-'.make_char(4)."-".make_char(4)."-".make_char(4)."-".make_char(12);
                 $info=$upload->uploadOne($_FILES['recordsrc']);
               
                 if(!$info) {// 上传错误提示错误信息     
                        $this->error($upload->getError());    
                 }else{
                     
                     // 上传成功 获取上传文件信息         
                    $data['recordsrc']=$info['savepath'].$info['savename'];   
                  }
                 
             }
             $rst=$model->where(array('id'=>array('eq',$data['id'])))->save($data);
             //dump($rst);
             if($rst===FASLE){
                 $this->error("修改数据失败！");
             }
           
         }
         $where=array();
        if(IS_GET){
            
            $time_type=$_GET['time_type'];
            if(!empty($time_type)){
                 if($time_type==1){
                     // unset($_GET['p']);
                     $start=strtotime(date('Y-m-d  00:00:00'));
                     $end=strtotime(date('Y-m-d  H:i:s'));
                     $where['calltime']=array('between',array($start,$end));//当天记录
                     
                 }else if($time_type==2){
                     $start=strtotime(date('Y-m-d  00:00:00'))-24*3600;
                     $end=strtotime(date('Y-m-d  00:00:00'));
                     $where['calltime']=array('between',array($start,$end));//昨天记录
                 }else if($time_type==7){
                     $start=strtotime(date('Y-m-d 23:59:59'))-7*24*3600;
                     $end=strtotime(date('Y-m-d  H:i:s'));
                    $where['calltime']=array('between',array($start,$end));//最近一周
                 }else if($time_type==30){
                     $start=strtotime(date('Y-m-d 23:59:59'))-30*24*3600;
                     $end=strtotime(date('Y-m-d  H:i:s'));
                     $where['calltime']=array('between',array($start,$end));//最近一周
                 }else if($time_type==99){
                       $oneDay=$_GET['oneDay'];
                    if(!empty($oneDay)){//某一天
                      $start=strtotime(date("$oneDay 00:00:00"));
                      $end=strtotime(date("$oneDay 23:59:59"));
                      $where['calltime']=array('between',array($start,$end));
                   }
                 }else if($time_type==100){
                  $startDate=$_GET['startDate'];
                  $endDate=$_GET['endDate'];
                    if($startDate&&$endDate){
                        $where['calltime']=array('between',array(strtotime("$startDate"),strtotime("$endDate")));
                    }
            
                    else if($startDate){
                        $where['calltime']=array('egt',strtotime("$startDate"));
                    }
                    else if($endDate){
                       $where['calltime']=array('elt',strtotime("$endDate"));
                    }
                   }
                 }
          
            $phone=$_GET['mobile'];
            if($phone){
                $where['callednum']=array('like','%'.$phone.'%');
            }
            $userId=$_GET['userId'];
            if($userId){
                $where['tablename']=array('eq',$userId);
            }
            $minTime=$_GET['minTime'];
            $maxTime=$_GET['maxTime'];
            if($minTime&&$maxTime){
                //unset($where['calltime']);
                $where['talktime']=array('between',array($minTime,$maxTime));
            }
            
            else if($minTime){
               // unset($where['calltime']);
                $where['talktime']=array('egt',$minTime);
            }
            else if($maxTime){
                $where['talktime']=array('elt',$maxTime);
            }
            $state=$_GET['state'];
            if($state)
                $where['callmode']=array('eq',$state);//呼叫方式
            $mode=$_GET['mode'];
            if($mode)
                $where['calltype']=array('eq',$mode);//外呼类型
            if($_GET['output']==true){
                $data=M('Calllog')->where($where)->field('callednum,calltime,answertime,endtime,talktime,tablename,telfare,callmode,calltype,recordsrc')->order("calltime desc")->select();
               //dump($data);
                header('Content-Type: application/octet-stream');
                //header('Content-Type:application/force-download');
                header("content-Disposition:filename=cdr_data.csv");
                echo "联系号码,拨打时间,接听时间,结束时间,通话时长,坐席名称,话费(元),呼叫方式,外呼类型,录音名称"."\r\n";
                foreach($data as $k=>$v){
                    echo $v['callednum'].",".date("Y-m-d H:i:s",$v['calltime']).",".date('Y-m-d H:i:s',$v['answertime']).",".date('Y-m-d H:i:s',$v['endtime']).",";
                    echo gmstrftime('%H:%M:%S', $v['talktime']).",".$v['tablename'].",".$v['telfare'].",";
                    if($v['callmode']==1){
                        echo "呼出".",";
                    }else if($v['callmode']==2){
                        echo "呼入".",";
                    }
                    if($v['calltype']==1){
                        echo "任务".",";
                    }else if($v['calltype']==2){
                        echo "手动".",";
                    }
                    echo $v['recordsrc']."\r\n";
                }
                unset($_GET['output']);
                die();
            }
        }
       // dump($where);
        $count=$model->where($where)->count();
        $pageSize=C('PAGE_SIZE');
        
        $page=new \Think\Page($count, $pageSize);
        $page->rollPage = 8;
        $page->lastSuffix=false;
	    $page -> setConfig('prev', '上一页');
	  
	   
	    $page -> setConfig('next', '下一页');
	    $page -> setConfig('first', '首页');
	    $page -> setConfig('last', '尾页');
	    $page -> setConfig('theme', '%FIRST%%UP_PAGE%%LINK_PAGE%%DOWN_PAGE%%END%');
	   // $page -> setConfig('theme', '%FIRST%%UP_PAGE%%LINK_PAGE%%DOWN_PAGE%%END%');
     
        $show       = $page->show();
        //dump($show);
       //dump($where);
        $data=$model->where($where)->limit($page->firstRow.','.$page->listRows)->order("calltime desc")->select();
        //dump($sql);
        $list=$model->field(' distinct tablename ')->select();
        $this->assign('list',$list);
        $this->assign('count',$count);
        $this->assign('show',$show);
        $this->assign('data',$data);
        $this->display();
    }
   public function add(){
       if(IS_POST){
           $model=M('Calllog');
           $data=I('post.');
           $data['calltime']=strtotime($data['calltime']);
           if($_POST['answertime']){
               $data['answertime']=strtotime($data['answertime']);
           }
           if($_POST['endtime']){
               $data['endtime']=strtotime($data['endtime']);
           }
          if($_FILES['record']['error']==0){
               $config = array(
                   'rootPath'=>'./Public/Uploads/',
               );
               $upload = new \Think\Upload($config);// 实例化上传类
               $upload->saveName = make_char(8).'-'.make_char(4)."-".make_char(4)."-".make_char(4)."-".make_char(12);
               $info=$upload->uploadOne($_FILES['record']);
                
               if(!$info) {// 上传错误提示错误信息
                   $this->error($upload->getError());
               }else{
                   // 上传成功 获取上传文件信息
                   $data['recordsrc']=$info['savepath'].$info['savename'];
               }
           }
           if(($rst=$model->add($data))===FALSE){
               $this->error("数据添加失败！");
           }
           redirect(U('showinfo'));
       }
       
   }    
    //导出文件
    public function output(){
       $data=M('Calllog')->field('callednum,calltime,answertime,endtime,talktime,tablename,telfare,callmode,calltype,recordsrc')->select();
       //header('Content-Type: application/octet-stream');
      header('Content-Type:application/force-download');
        header("content-Disposition:filename=cdr_data.csv");
         echo "联系号码,拨打时间,接听时间,结束时间,通话时长,坐席名称,话费(元),呼叫方式,外呼类型,录音名称"."\r\n";
          foreach($data as $k=>$v){
              echo $v['callednum'].",".date("Y-m-d H:i:s",$v['calltime']).",".date('Y-m-d H:i:s',$v['answertime']).",".date('Y-m-d H:i:s',$v['endtime']).",";
              echo gmstrftime('%H:%M:%S', $v['talktime']).",".$v['tablename'].",".$v['telfare'].",";
              if($v['callmode']==1){
                  echo "呼出".",";
              }else if($v['callmode']==2){
                  echo "呼入".",";
              }
              if($v['calltype']==1){
                   echo "任务".",";
              }else if($v['calltype']==2){
                   echo "手动".",";
              }
              echo $v['recordsrc']."\r\n";
              
                //dump($v);
          }
    }
    public function edit(){
        if(IS_AJAX){
             $id=(int)I('post.id');
             $data=M('Calllog')->field('id,calltime,callnum,callednum,talktime,telfare,tablename,callmode,calltype')->find($id);
             $data['talktime']=gmstrftime('%H:%M:%S', $data['talktime']);
             $data['calltime']=date("Y-m-d H:i:s",$data['calltime']);
             echo json_encode($data);
        }
    }
   public function inputCsv(){
       $model=M('Calllog');
       if($_FILES['csv']['error']==0){
           $config = array(
               'rootPath'=>'./Public/Uploads/',
               'savePath'=>'CSV/',
               'exts'=>array('csv')
           );
           $upload = new \Think\Upload($config);// 实例化上传类
           $info=$upload->uploadOne($_FILES['csv']);
       
           if(!$info) {// 上传错误提示错误信息
               $this->error($upload->getError());
           }else{
               // 上传成功 获取上传文件信息
               //echo $info['savepath'].$info['savename'];\
               $filename="./Public/Uploads/".$info['savepath'].$info['savename'];
               $handle=fopen($filename,'r');
               if(!$handle){
                   $this->error("导入信息失败！");
               }
               $i=0;
               while($info=fgetcsv($handle,1000,',')){
                   
                   $i++;
                   if($i==1){
                     continue;
                   }
                 
                      $data['callnum']=$info[0];
                      $data['callednum']=$info[0];
                      $data['calltime']=strtotime($info[1]);
                      $data['answertime']=strtotime($info[2]);
                      $data['endtime']=strtotime($info[3]);
                      $data['talktime']=strtotime(date('Y-m-d').$info[4])-strtotime(date('Y-m-d 00:00:00'));
                      $data['tablename']=$info[5];
                      $data['telfare']=$info[6];
                       if($info[7]=="呼出"){
                            $data['callmode']=1;
                       }else if($info[7]=="呼入"){
                           $data['callmode']=2;
                       }
                       if($info[8]=="任务"){
                           $data['calltype']=1;
                       }else if($info[8]=="手动"){
                           $data['calltype']=2;
                       }
                       $data['recordsrc']=$info[9];
                         $rst=$model->add($data);
                       if($rst===FALSE){
                           $this->error("添加失败！");
                       }
                    }
                    redirect(U('showinfo'));
               fclose($handle);
           }
       }
   }
   public function downmp3(){
       
       $ar=array();
       while(count($ar)<4)
       {
           $ar[]=rand(1,10);
           $ar=array_unique($ar);
       }
       $s=implode("",$ar);
       $id=(int)$_GET['id'];
       $model=M('Calllog');
       $data=$model->field('calltime,callednum,recordsrc')->find($id);
       //$Str=$data['recordsrc'];
       // $file_name=substr(strrchr($Str, "/"), 1);
       $file_name=date('Ymdhis',$data['calltime'])."_".$data['callednum']."_25362_".$s.".mp3";
      header("Content-Type:text/html;charset=utf8");
    //如果文件是中文.
    //原因 php文件函数，比较古老，需要对中文转码 gb2312
    $file_name=iconv("utf-8","gb2312",$file_name);
    //绝对路径
    $file_path="./Public/Uploads/".$data['recordsrc'];
    //如果你希望绝对路径

    //1.打开文件
    if(!file_exists($file_path)){
        $this->error("文件不存在！");
        return ;
    }
    $fp=fopen($file_path,"r");

    //获取下载文件的大小
    $file_size=filesize($file_path);
   
    //返回的文件
    header("Content-type: application/octet-stream");
    //按照字节大小返回
    header("Accept-Ranges: bytes");
    //返回文件大小
    header("Accept-Length: $file_size");
    //这里客户端的弹出对话框，对应的文件名
    header("Content-Disposition: attachment; filename=".$file_name);
    //向客户端回送数据

    $buffer=1024;
    //为了下载的安全，我们最好做一个文件字节读取计数器
    $file_count=0;
    //这句话用于判断文件是否结束
    while(!feof($fp) && ($file_size-$file_count>0) ){
        $file_data=fread($fp,$buffer);
        //统计读了多少个字节
        $file_count+=$buffer;
        //把部分数据回送给浏览器;
        echo $file_data;
    }
    //关闭文件
    fclose($fp);
   }
   public function outPutRar(){
       //文件保存失败！请联系管理员!
       $data['success']=true;
       $data['msg']="打包失败！";
       echo json_encode($data);
   }
   public  function del(){
       $id=I('get.id');
       $model=M('Calllog');
       $rst=$model->where('id='.$id)->delete();
       if($rst==false)
            $this->error("删除数据失败！");
       redirect(U('showinfo'));
   }
   public function showPlay(){
       $id=I('get.tenantId');
       $model=M('Calllog');
       $d=$model->field('recordsrc')->find($id);
       $data['success']=true;
       $data['msg']=$d['recordsrc'];
       $data['recordsrc']=$d['recordsrc'];
       echo json_encode($data);
   }
}