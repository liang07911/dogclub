<?php
// +----------------------------------------------------------------------
// | OneThink [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013 http://www.onethink.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: ����� <zuojiazi@vip.qq.com> <http://www.zjzit.cn>
// +----------------------------------------------------------------------

/**
 * ϵͳ���ļ�
 * ����ϵͳ���������
 */
return array(
    /* ģ��������� */
    'AUTOLOAD_NAMESPACE' => array('Addons' => ONETHINK_ADDON_PATH), //��չģ���б�
    'DEFAULT_MODULE'     => 'Home',
    'MODULE_DENY_LIST'   => array('Common', 'User'),
    //'MODULE_ALLOW_LIST'  => array('Home','Admin'),

    /* ϵͳ���ݼ������� */
    'DATA_AUTH_KEY' => '4PL^z`FQ5=S~+v,O1Dhy<u3r9k"pBEW]TcA{|b[K', //Ĭ�����ݼ���KEY

    /* �������� */
    'SHOW_PAGE_TRACE' => false,

    /* �û�������� */
    'USER_MAX_CACHE'     => 1000, //��󻺴��û���
    'USER_ADMINISTRATOR' => 1, //����Ա�û�ID

    /* URL���� */
    'URL_CASE_INSENSITIVE' => true, //Ĭ��false ��ʾURL���ִ�Сд true���ʾ�����ִ�Сд
    'URL_MODEL'            => 3, //URLģʽ
    'VAR_URL_PARAMS'       => '', // PATHINFO URL��������
    'URL_PATHINFO_DEPR'    => '/', //PATHINFO URL�ָ��

    /* ȫ�ֹ������� */
    'DEFAULT_FILTER' => '', //ȫ�ֹ��˺���

    /* ���ݿ����� */
    'DB_TYPE'   => 'mysqli', // ���ݿ�����
    'DB_HOST'   => 'qdm17013333.my3w.com', // ��������ַ
    'DB_NAME'   => 'qdm17013333_db', // ���ݿ���
    'DB_USER'   => 'qdm17013333', // �û���
    'DB_PWD'    => 'ylf879654321',  // ����
    'DB_PORT'   => '3306', // �˿�
    'DB_PREFIX' => 'dog_', // ���ݿ��ǰ׺

    /* �ĵ�ģ������ (�ĵ�ģ�ͺ������ã��������) */
    'DOCUMENT_MODEL_TYPE' => array(2 => '����', 1 => 'Ŀ¼', 3 => '����'),
);
