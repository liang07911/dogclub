<?php
// +----------------------------------------------------------------------
// | OneThink [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013 http://www.onethink.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: 麦当苗儿 <zuojiazi@vip.qq.com> <http://www.zjzit.cn>
// +----------------------------------------------------------------------

namespace Home\Controller;

/**
 * 用户控制器
 * 包括用户中心，用户登录及注册
 */
class DogController extends HomeController {

	/* 用户中心首页 */
	public function index(){
	   
	}
	
	
	/* 用户主栏目 */
	public function dog_menu(){
	     
	    $uid = is_login();
	    $headurl = get_userhead($uid);   //获取用户头像
	    $this->assign('headurl',$headurl);
	    $this->display();
	}
	
	/* 用户主栏目 */
	public function dog_list(){
	
	    $this->display();
	}
	
	/* 犬只查询 */
	public function dog_search(){
	    
        if (IS_POST){
            
            $this->assign('res',1);
            $keywords = isset($_POST['keywords'])?$_POST['keywords']:'';
            $val = isset($_POST['class'])?$_POST['class']:'';
            $Mess = D('Message');
            $dogArr = $Mess->dog_search($val,$keywords);
            if (!empty($dogArr)){
                $this->assign('dogArr',$dogArr);
            }
        }
	    
	    $this->display();
	}
	
	/* 犬只录入 */
	public function dog_insert(){
	     
	    if ( !is_login() ) {
	        $this->error( '您还没有登陆');
	    }
	    $this->display();
	}
	/* 犬只录入 */
	public function add_do(){
	
	    $user_id = is_login();
	    $data = I("post.");
	    $data['user_id'] = $user_id;
	    $data['birthday'] = strtotime($data['birthday']);
	    
	    $upload = new \Think\Upload();// 实例化上传类
	    $upload->maxSize   =     3145728 ;// 设置附件上传大小
	    $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
	    $upload->rootPath  =      './Uploads/'; // 设置附件上传根目录
	    // 上传单个文件
	    if ($_FILES['pic_url']['name'] != ""){
    	    $info   =   $upload->uploadOne($_FILES['pic_url']);
    	    if(!$info) {// 上传错误提示错误信息
    	        $this->error($upload->getError());
    	    }else{// 上传成功 获取上传文件信息
    	        $path = './Uploads/'.$info['savepath'].$info['savename'];
    	        $data['pic_url'] = $path;
    	    }
	    }
	    
	    $Message = D('Message');
	    $dogid = $Message->add_do($data);
	    
	    if ($dogid > 0){
	        
	        $this->success('犬只录入成功！',U('Dog/father_search'));
	        exit();
	    }else{
	        
	        $this->error($Message->getError());
	        exit();
	    }
	}
	
	/* 犬信息修改查询 */
	public function dog_edit(){
	    
	    $uid = is_login();
	    $headurl = get_userhead($uid);   //获取用户头像
	    $this->assign('headurl',$headurl);
	    $id = isset($_GET['id'])?$_GET['id']:0;
	    if ($id){
	        $mess = D('Message');
	        $dogInfo = $mess->edit_select($id);
	        
	        $this->assign('id',$id);
	        $this->assign('dogInfo',$dogInfo);
	    }
	    $this->display();
	}
	
	/* 犬信息修改操作 */
	public function dog_update(){
	    
	    $dogid = isset($_POST['dogid'])?$_POST['dogid']:0;
	    $data = I('post.');
	    $data['birthday'] = strtotime($data['birthday']);
	    $upload = new \Think\Upload();// 实例化上传类
	    $upload->maxSize   =     3145728 ;// 设置附件上传大小
	    $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
	    $upload->rootPath  =      './Uploads/'; // 设置附件上传根目录
	    // 上传单个文件
	    
	    if ($_FILES['pic_url']['name'] != ""){
    	    $info   =   $upload->uploadOne($_FILES['pic_url']);
    	    
    	    if(!$info) {// 上传错误提示错误信息
    	        $this->error($upload->getError());
    	    }else{// 上传成功 获取上传文件信息
    	        $path = './Uploads/'.$info['savepath'].$info['savename'];
    	        $data['pic_url'] = $path;
    	    }
	    }
	    $mess = D('Message');
	    $res = $mess->update_do($data);
	    if ($res){
	        $this->success('犬只信息修改成功！',U('User/dog_list'));
	    }else
	    {
	        $this->error('犬只信息修改失败！');
	    }
	}
	
	/* 父亲查询 */
	public function father_search(){
	
	    $dog_id = isset($_SESSION['dog_id'])?$_SESSION['dog_id']:0;
	    $this->assign('dog_id',$dog_id);
	    if (IS_POST){
	        
	        $this->assign('res',1);
    	    $id = is_login();
    	    $studbook = isset($_POST['studbook'])?$_POST['studbook']:'';
    	    $Message = D('Message');
    	    
    	    $father = $Message->select_parent($studbook);
    	    if(!empty($father)){
    	        
    	        $this->assign("father",$father);
    	       
    	    }
	    }
	    $this->display();
	}
	
	public function father_search2(){
	
	    $dog_id = isset($_GET['did'])?$_GET['did']:0;
	    $this->assign('dog_id',$dog_id);
	    if (IS_POST){
	         
	        $this->assign('res',1);
	        $id = is_login();
	        $studbook = isset($_POST['studbook'])?$_POST['studbook']:'';
	        $Message = D('Message');
	        	
	        $father = $Message->select_parent($studbook);
	        if(!empty($father)){
	             
	            $this->assign("father",$father);
	
	        }
	    }
	    $this->display();
	}
	//父犬关联
	public function father_link(){
	    
	    $id = isset($_GET['id'])?$_GET['id']:0;
	    $last_id = isset($_SESSION['dog_id'])?$_SESSION['dog_id']:0;
	    
	    if ($id != 0 && $last_id != 0){
	        
	        $Mess = D('Message');
	        $res = $Mess->add_father($id,$last_id);
	        if ($res){
	            $this->success('关联成功！',U('Dog/mother_search'));
	        }
	        else {
	            $this->error('关联失败！');
	        }
	    }else {
	        $this->error('系统错误！');
	    }
	}
	
	public function father_link2(){
	     
	    $id = isset($_GET['id'])?$_GET['id']:0;
	    $last_id = isset($_GET['did'])?$_GET['did']:0;
	     
	    if ($id != 0 && $last_id != 0){
	         
	        $Mess = D('Message');
	        $res = $Mess->add_father($id,$last_id);
	        if ($res){
	            $this->success('关联成功！',U('Dog/dog_content?id='.$last_id));
	        }
	        else {
	            $this->error('关联失败！');
	        }
	    }else {
	        $this->error('系统错误！');
	    }
	}
	
	/* 母亲查询 */
	public function mother_search(){
	
	    $dog_id = isset($_SESSION['dog_id'])?$_SESSION['dog_id']:0;
	    $this->assign('dog_id',$dog_id);
	    if (IS_POST){
	        
	        $this->assign('res',1);
    	    $id = is_login();
    	    $studbook = isset($_POST['studbook'])?$_POST['studbook']:'';
    	    $Message = D('Message');
    	    
    	    $mother = $Message->select_parent($studbook);
    	    if(!empty($mother)){
    	        
    	        $this->assign("mother",$mother);
    	       
    	    }
	    }
	    $this->display();
	}
	
	public function mother_search2(){
	
	    $dog_id = isset($_GET['did'])?$_GET['did']:0;
	    $this->assign('dog_id',$dog_id);
	    if (IS_POST){
	         
	        $this->assign('res',1);
	        $id = is_login();
	        $studbook = isset($_POST['studbook'])?$_POST['studbook']:'';
	        $Message = D('Message');
	        	
	        $mother = $Message->select_parent($studbook);
	        if(!empty($mother)){
	             
	            $this->assign("mother",$mother);
	
	        }
	    }
	    $this->display();
	}
	//母犬关联
	public function mother_link(){
	     
	    $id = isset($_GET['id'])?$_GET['id']:0;
	    $last_id = isset($_SESSION['dog_id'])?$_SESSION['dog_id']:0;
	     
	    if ($id != 0 && $last_id != 0){
	         
	        $Mess = D('Message');
	        $res = $Mess->add_mother($id,$last_id);
	        if ($res){
	            $this->success('关联成功！',U('Dog/over_insert'));
	        }
	        else {
	            $this->error('关联失败！');
	        }
	    }else {
	        $this->error('系统错误！');
	    }
	}
	
	public function mother_link2(){
	
	    $id = isset($_GET['id'])?$_GET['id']:0;
	    $last_id = isset($_GET['did'])?$_GET['did']:0;
	
	    if ($id != 0 && $last_id != 0){
	
	        $Mess = D('Message');
	        $res = $Mess->add_mother($id,$last_id);
	        if ($res){
	            $this->success('关联成功！',U('Dog/dog_content?id='.$last_id));
	        }
	        else {
	            $this->error('关联失败！');
	        }
	    }else {
	        $this->error('系统错误！');
	    }
	}
	//父亲录入
	public function father_insert(){
	    $dog_id = isset($_GET['id'])?$_GET['id']:0;
	    $act = isset($_GET['act'])?$_GET['act']:'';
	    $this->assign('dog_id',$dog_id);
	    
	    if ($act){
	        $this->assign('act',$act);
	        $this->display('father_insert2');
	    }else {
	        $this->display();
	    }
	}
	
	public function father_add(){
	    
	    $dog_id = isset($_POST['dog_id'])?$_POST['dog_id']:0;
	    $act = isset($_POST['act'])?$_POST['act']:'';
	    $user_id = is_login();
	    $data = I("post.");
	    $data['user_id'] = $user_id;
	    $data['birthday'] = strtotime($data['birthday']);
	     
	    $upload = new \Think\Upload();// 实例化上传类
	    $upload->maxSize   =     3145728 ;// 设置附件上传大小
	    $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
	    $upload->rootPath  =      './Uploads/'; // 设置附件上传根目录
	    // 上传单个文件
	    if ($_FILES['pic_url']['name'] != ""){
	        $info   =   $upload->uploadOne($_FILES['pic_url']);
	        if(!$info) {// 上传错误提示错误信息
	            $this->error($upload->getError());
	        }else{// 上传成功 获取上传文件信息
	            $path = './Uploads/'.$info['savepath'].$info['savename'];
	            $data['pic_url'] = $path;
	        }
	    }
	     
	    $Message = D('Message');
	    $dogid = $Message->parent_add($data);
	     
	    if ($dogid > 0){
	         
	        if ($dog_id){
	            $father_id['father'] = $dogid;
	            $Message->where("id='{$dog_id}'")->save($father_id);
	        }
	        if ($act){
	            $this->success('父犬录入成功！',U('Dog/dog_content?id='.$dog_id));
	            exit();
	        }else {
	            $this->success('父犬录入成功！',U('Dog/mother_search'));
	            exit();
	        }
	        
	    }else{
	         
	        $this->error($Message->getError());
	        exit();
	    }
	}
	
	//母亲录入
	public function mother_insert(){
	    
	    $dog_id = isset($_GET['id'])?$_GET['id']:0;
	    $act = isset($_GET['act'])?$_GET['act']:'';
	    
	    $this->assign('dog_id',$dog_id);
	    if ($act){
	        $this->assign('act',$act);
	        $this->display('mother_insert2');
	    }else {
	        $this->display();
	    }
	}
	
	public function mother_add(){
	     
	    $dog_id = isset($_POST['dog_id'])?$_POST['dog_id']:0;
	    $act = isset($_POST['act'])?$_POST['act']:'';
	    $user_id = is_login();
	    $data = I("post.");
	    $data['user_id'] = $user_id;
	    $data['birthday'] = strtotime($data['birthday']);
	
	    $upload = new \Think\Upload();// 实例化上传类
	    $upload->maxSize   =     3145728 ;// 设置附件上传大小
	    $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
	    $upload->rootPath  =      './Uploads/'; // 设置附件上传根目录
	    // 上传单个文件
	    if ($_FILES['pic_url']['name'] != ""){
	        $info   =   $upload->uploadOne($_FILES['pic_url']);
	        if(!$info) {// 上传错误提示错误信息
	            $this->error($upload->getError());
	        }else{// 上传成功 获取上传文件信息
	            $path = './Uploads/'.$info['savepath'].$info['savename'];
	            $data['pic_url'] = $path;
	        }
	    }
	
	    $Message = D('Message');
	    $dogid = $Message->parent_add($data);
	
	    if ($dogid > 0){
	
	        if ($dog_id){
	            $mother_id['mother'] = $dogid;
	            $Message->where("id='{$dog_id}'")->save($mother_id);
	        }
	        if ($act){
	            $this->success('母犬录入成功！',U('Dog/dog_content?id='.$dog_id));
	            exit();
	        }else {
	            $this->success('母犬录入成功！',U('Dog/over_insert'));
	            exit();
	        }
	        
	    }else{
	
	        $this->error($Message->getError());
	        exit();
	    }
	}
	/* 录入完成 */
	public function over_insert(){
	
	    $id = isset($_SESSION['dog_id'])?$_SESSION['dog_id']:0;
	    $this->assign('id',$id);
	    $this->display();
	}
	
	/* 犬只详情 */
	public function dog_content(){
	
	    $id = isset($_GET['id'])?$_GET['id']:0;
	    
	    if ($id){
	        $mess = D('Message');
	        $dogInfo = $mess->edit_select($id);  //查询犬只详情
	        
	        //查询犬只亲属
	        $fatherArr = $mess->getfather($id);
	        $motherArr = $mess->getmother($id);
	        //爷爷奶奶
	        $grfatherArr =  $mess->getfather($fatherArr['id']);
	        $grmotherArr =  $mess->getmother($fatherArr['id']);
	        //姥爷姥姥
	        $grpaArr = $mess->getfather($motherArr['id']);
	        $grmaArr = $mess->getmother($motherArr['id']);
	        
	        $uid = is_login();
	        $headurl = get_userhead($uid);   //获取用户头像
	        $this->assign('headurl',$headurl);
	        
	        $user_id = $mess->where("id='{$id}'")->getField('user_id');
	        if ($uid == $user_id){
	            $this->assign('show',1);
	        }
	        
	        $this->assign('fatherArr',$fatherArr);
	        $this->assign('motherArr',$motherArr);
	        $this->assign('grfatherArr',$grfatherArr);
	        $this->assign('grmotherArr',$grmotherArr);
	        $this->assign('grpaArr',$grpaArr);
	        $this->assign('grmaArr',$grmaArr);
	        
	        $this->assign('id',$id);
	        $this->assign('dogInfo',$dogInfo);
	    }
	    $this->assign('res',0);
	    $this->display();
	}
	/* 犬家族查询 */
	public function find_family(){
	    
	    if (IS_POST){
	        $where = isset($_POST['where'])?$_POST['where']:"";
	        $dogid = isset($_POST['dogid'])?$_POST['dogid']:"";
	        $father = isset($_POST['father'])?$_POST['father']:"";
	        $mother = isset($_POST['mother'])?$_POST['mother']:"";
	        $birthday = isset($_POST['birthday'])?$_POST['birthday']:"";
	       
	        $mess = D('Message');
	        if ($father && $mother){
	            $dogArr = $mess->family_find($where,$dogid,$father,$mother,$birthday);
	        }
	        
	        //thinkphp输出json数据到模板js中
	        $this->ajaxReturn($dogArr,'json');
	    }
	    
	}
	
	/* 会员查询 */
	public function user_search(){
	     
	    if ( !is_login() ) {
	        $this->error( '您还没有登陆');
	    }else {
	        if (IS_POST){
	            
	            $this->assign('res',1);
	            $username = isset($_POST['username'])?$_POST['username']:'';
	            $Mess = D('Message');
	            $dogArr = $Mess->user_select($username);
	            
	            if (!empty($dogArr)){
	                $this->assign('dogArr',$dogArr);
	            }
	        }
	    }
	    $this->display();
	}

	

}
