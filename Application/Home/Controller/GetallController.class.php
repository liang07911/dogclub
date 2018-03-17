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
 * 前台首页控制器
 * 主要获取首页聚合数据
 */
class GetallController extends HomeController {

	//系统首页
    public function index(){
        $Message = D('Message');
        $arr = $Message->join('dog_ucenter_member on dog_message.user_id=dog_ucenter_member.id')->select();
        echo $this->ajaxReturn($arr,'json');
    }
    
    
}