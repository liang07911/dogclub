<?php
// +----------------------------------------------------------------------
// | OneThink [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013 http://www.onethink.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: 麦当苗儿 <zuojiazi@vip.qq.com> <http://www.zjzit.cn>
// +----------------------------------------------------------------------

namespace Home\Model;
use Think\Model;

/**
 * 犬只信息基础模型
 */
class MessageModel extends Model{

    /* 用户模型自动验证 */
    protected $_validate = array(
        
        array('ear_num','','耳号已存在！',0,'unique',1), 
        array('mic_num','','芯片号已存在！',0,'unique',1),
        array('studbook','','血统证书号已存在！',0,'unique',1),
        array('mobile','','手机号已存在！',0,'unique',1),
    );
    
    //犬只录入
    public function add_do($data){
       
        $mod = M('Message');
        if (!$this->create($data)){
            return $this->getError();
        }
        else{
            $last_id  = $mod->add($data);
            $_SESSION['dog_id'] = $last_id;
            
            return $last_id;
        }
        
    }
    
    //父母犬只录入
    public function parent_add($data){
         
        $mod = M('Message');
        if (!$this->create($data)){
            return $this->getError();
        }
        else{
            $last_id  = $mod->add($data);
            //$_SESSION['dog_id'] = $last_id;
    
            return $last_id;
        }
    
    }
    
    //犬只查询
    public function dog_search($val,$keywords){
        
        $result = M('Message')->where("{$val}='{$keywords}'")->find();
        return $result;
    }
    
    //会员所属犬只查询
    public function user_select($username){
       
        $arr = M('Message')->join('dog_ucenter_member on dog_message.user_id=dog_ucenter_member.id')->field('dog_message.*')->where("dog_ucenter_member.username='{$username}'")->select();
        return $arr;
    }
    
    //会员页面所属犬只查询
    public function user_dog_select($uid){
         
        $arr = M('Message')->join('dog_ucenter_member on dog_message.user_id=dog_ucenter_member.id')->field('dog_message.*')->where("dog_ucenter_member.id='{$uid}'")->select();
        return $arr;
    }
    
    //修改犬只查询
    public function edit_select($dogid){
        
        $arr = M('Message')->where("id='{$dogid}'")->find();
        return $arr;
    }
    
    
    //修改犬只操作
    public function update_do($data){
         
        $Mess = M('Message');
        $Mess->where("id='{$data['dogid']}'")->save($data);
        return true;
    }
    
    //父母犬查询
    public function select_parent($studbook){
        $parent = M('Message')->where("studbook='{$studbook}'")->find();
        return $parent;
    }
    
    //犬只父亲查询
    public function getfather($id){
        $Mess = M('Message');
        $fatherid = $Mess->where("id='{$id}'")->getField('father');
        $fatherArr = $Mess->field('id,dog_name,pic_url')->where("id='{$fatherid}'")->find();
        return $fatherArr;
    }
    //犬只母亲查询
    public function getmother($id){
        $Mess = M('Message');
        $motherid = $Mess->where("id='{$id}'")->getField('mother');
        $motherArr = $Mess->field('id,dog_name,pic_url')->where("id='{$motherid}'")->find();
        return $motherArr;
    }
    
    //犬只家族查询
    public function family_find($where,$dogid,$father,$mother,$birthday){
        
        if ($where == 'same'){
            $wheres = " id<>'{$dogid}' and father='{$father}' and mother='{$mother}' ";
        }
        elseif ($where == 'different'){
            $wheres = " id<>'{$dogid}' and father='{$father}' and mother<>'{$mother}'";
        }elseif ($where == 'allsame'){
            $wheres = " id<>'{$dogid}' and father='{$father}' and mother='{$mother}' and birthday='{$birthday}'";
        }elseif ($where == 'somesame'){
            //$wheres = " id<>'{$dogid}' and father='{$father}' and mother='{$mother}' and birthday<>'{$birthday}'";
            $wheres = " father='{$dogid}' or mother='{$dogid}' ";
        }
        
        $Mess = M('Message');
        $arr = $Mess->where($wheres)->select();
        
        return $arr;
    }
    //父犬关联
    public function add_father($id,$last_id){
        
        $data['father'] = $id;
        M('Message')->where("id='{$last_id}'")->save($data);
        return true;
    }
    
    //母犬关联
    public function add_mother($id,$last_id){
    
        $data['mother'] = $id;
        M('Message')->where("id='{$last_id}'")->save($data);
        return true;
    }
}
