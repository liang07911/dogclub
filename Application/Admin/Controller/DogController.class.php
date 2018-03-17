<?php
// +----------------------------------------------------------------------
// | OneThink [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013 http://www.onethink.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: 麦当苗儿 <zuojiazi@vip.qq.com> <http://www.zjzit.cn>
// +----------------------------------------------------------------------

namespace Admin\Controller;

/**
 * 后台用户控制器
 * @author 麦当苗儿 <zuojiazi@vip.qq.com>
 */
class DogController extends AdminController {

    /**
     * 用户管理首页
     * @author 麦当苗儿 <zuojiazi@vip.qq.com>
     */
    public function index(){
       
        $Dog = D('Message');
        $list   = $this->lists('Message');
        foreach ($list as $k => $v){
            $father = $Dog->where("id='{$v[father]}'")->getField('dog_name');
            $mother = $Dog->where("id='{$v[mother]}'")->getField('dog_name');
            $list[$k]['father'] = $father;
            $list[$k]['mother'] = $mother;
        }
        int_to_string($list);
        
        $this->assign('_list', $list);
        $this->meta_title = '犬只信息';
        $this->display();
    }

}
