<?php
// +----------------------------------------------------------------------
// | OneThink [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013 http://www.onethink.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: 麦当苗儿 <zuojiazi@vip.qq.com> <http://www.zjzit.cn>
// +----------------------------------------------------------------------

namespace Home\Controller;
use User\Api\UserApi;

/**
 * 用户控制器
 * 包括用户中心，用户登录及注册
 */
class UserController extends HomeController {

	/* 用户中心首页 */
	public function index(){
	    
	    $uid = is_login();
	    $Member = D('Member');
	    $userInfo = $Member->userUpdate($uid);
	    
	    $headurl = get_userhead($uid);   //获取用户头像
	    $this->assign('headurl',$headurl);
	    $this->assign('userinfo',$userInfo);
		$this->display();
	}
	
	/* 修改用户资料 */
	public function update_do(){
	    $uid = is_login();
	   
	    $Member = D('Member');
	    if (IS_POST){
	        $data = I('post.');
	        $province = isset($_POST['province'])?$_POST['province']:'';
	        $city = isset($_POST['city'])?$_POST['city']:'';
	        $pc = isset($_POST['pc'])?$_POST['pc']:'';
	        $address = isset($_POST['address'])?$_POST['address']:'';
	        if ($province != 0 && $city != 0){
	           $data['address'] = $pc.' '.$address;
	        }
	        $upload = new \Think\Upload();// 实例化上传类
	        $upload->maxSize   =     3145728 ;// 设置附件上传大小
	        $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
	        $upload->rootPath  =      './Uploads/'; // 设置附件上传根目录
	        // 上传单个文件
	        
	        if ($_FILES['headurl']['name'] != ""){
	            $info   =   $upload->uploadOne($_FILES['headurl']);
	            if(!$info) {// 上传错误提示错误信息
	                $this->error($upload->getError());
	            }else{// 上传成功 获取上传文件信息
	                $path = './Uploads/'.$info['savepath'].$info['savename'];
	                $data['headurl'] = $path;
	            }
	        }
	        
    	    if ($Member->update_do($uid,$data)){
    	        
    	        $this->success('资料修改成功!');
    	    }else
    	    {
    	        $this->error('资料修改失败或未改变!');
    	    }
	    }
	}
	
	
	/* 用户所有犬只列表主 */
	public function dog_list(){
	
	    $uid = is_login();
	    $dogArr = D('Message')->user_dog_select($uid);
	    
	    if (is_array($dogArr)){
	        $this->assign('dogArr',$dogArr);
	    }
	    
	    $uid = is_login();
	    $headurl = get_userhead($uid);   //获取用户头像
	    $this->assign('headurl',$headurl);
	    $this->display();
	}
	

	/* 注册页面 */
	public function register($username = '', $password = '', $repassword = '', $email = '',$mobile = '', $verify = ''){
        if(!C('USER_ALLOW_REGISTER')){
            $this->error('注册已关闭');
        }
		if(IS_POST){ //注册用户
			/* 检测验证码 */
			/* if(!check_verify($verify)){
				$this->error('验证码输入错误！');
			} */

			/* 检测密码 */
			if($password != $repassword){
				$this->error('密码和重复密码不一致！');
			}			

			/* 调用注册接口注册用户 */
            $User = new UserApi;
			$uid = $User->register($username, $password, $email, $mobile);
			if(0 < $uid){ //注册成功
				//TODO: 发送验证邮件
				$this->success('注册成功！',U('login'));
			} else { //注册失败，显示错误信息
				$this->error($this->showRegError($uid));
			}

		} else { //显示注册表单
			$this->display();
		}
	}

	/* 登录页面 */
	public function login($username = '', $password = '', $verify = ''){
		if(IS_POST){ //登录验证
			/* 检测验证码 */
			/* if(!check_verify($verify)){
				$this->error('验证码输入错误！');
			} */

			/* 调用UC登录接口登录 */
			$user = new UserApi;
			$uid = $user->login($username, $password);
			if(0 < $uid){ //UC登录成功
				/* 登录用户 */
				$Member = D('Member');
				if($Member->login($uid)){ //登录用户
					//TODO:跳转到登录前页面
					$this->success('登录成功！',U('Home/User/index'));
				} else {
					$this->error($Member->getError());
				}

			} else { //登录失败
				switch($uid) {
					case -1: $error = '用户不存在或被禁用！'; break; //系统级别禁用
					case -2: $error = '密码错误！'; break;
					default: $error = '未知错误！'; break; // 0-接口参数错误（调试阶段使用）
				}
				$this->error($error);
			}

		} else { //显示登录表单
			$this->display();
		}
	}

	/* 退出登录 */
	public function logout(){
		if(is_login()){
			D('Member')->logout();
			$this->success('退出成功！', U('User/login'));
		} else {
			$this->redirect('User/login');
		}
	}

	/* 验证码，用于登录和注册 */
	public function verify(){
		$verify = new \Think\Verify();
		$verify->entry(1);
	}

	/**
	 * 获取用户注册错误信息
	 * @param  integer $code 错误编码
	 * @return string        错误信息
	 */
	private function showRegError($code = 0){
		switch ($code) {
			case -1:  $error = '用户名长度必须在16个字符以内！'; break;
			case -2:  $error = '用户名被禁止注册！'; break;
			case -3:  $error = '用户名被占用！'; break;
			case -4:  $error = '密码长度必须在6-30个字符之间！'; break;
			case -5:  $error = '邮箱格式不正确！'; break;
			case -6:  $error = '邮箱长度必须在1-32个字符之间！'; break;
			case -7:  $error = '邮箱被禁止注册！'; break;
			case -8:  $error = '邮箱被占用！'; break;
			case -9:  $error = '手机格式不正确！'; break;
			case -10: $error = '手机被禁止注册！'; break;
			case -11: $error = '手机号被占用！'; break;
			default:  $error = '未知错误';
		}
		return $error;
	}


    /**
     * 修改密码提交
     * @author huajie <banhuajie@163.com>
     */
    public function profile(){
		if ( !is_login() ) {
			$this->error( '您还没有登陆',U('User/login') );
		}
        if ( IS_POST ) {
            //获取参数
            $uid        =   is_login();
            $password   =   I('post.old');
            $repassword = I('post.repassword');
            $data['password'] = I('post.password');
            empty($password) && $this->error('请输入原密码');
            empty($data['password']) && $this->error('请输入新密码');
            empty($repassword) && $this->error('请输入确认密码');

            if($data['password'] !== $repassword){
                $this->error('您输入的新密码与确认密码不一致');
            }

            $Api = new UserApi();
            $res = $Api->updateInfo($uid, $password, $data);
            if($res['status']){
                $this->success('修改密码成功！');
            }else{
                $this->error($res['info']);
            }
        }else{
            $uid = is_login();
            $headurl = get_userhead($uid);   //获取用户头像
            $this->assign('headurl',$headurl);
            $this->display();
        }
    }

}
