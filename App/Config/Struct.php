<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/12/2 0002
 * Time: 20:05
 */

return [
    '�û�����'=>[
        [
            // -> user.userlist
            'controller'=> 'user',              //������
            'mothed'    => 'userlist',          //����
            'icon'      => 'fa-calendar',       //ͼ��
            'menu'      => '�û�����',          //�˵���,Ϊ���򲻷��ڲ˵�����
            'title'     => '�û�����',          //��ϸҳ����
            'subtitle'  => '���û�����ɾ��',    //��ϸҳ������
            'noticetype'=> 'info',//fa-ban info warning check            //��ʾ��Ϣ����
            'notice'    => '�����û��Ķ���֮����д���Ӧ��Ȩ��',         //��ʾ��Ϣ
            // path     => '·��ͨ������ó�', ��ҳ>�û��б�>�û�����    //���м
        ],
        [
            // -> user.userlist
            'controller'=> 'user',
            'mothed'    => 'userpw',
            'icon'      => 'fa-calendar',
            'menu'      => '�û�Ȩ��',          //�˵���,Ϊ���򲻷��ڲ˵�����
            'title'     => 'Ȩ�޷���',
            'subtitle'  => '���û���Ȩ�޽�������',
            'notice'    => '�����û��Ķ���֮����д���Ӧ��Ȩ��',
            // path     => '·��ͨ������ó�', ��ҳ>�û��б�>�û�����
            // rule     => selfdefine
        ],
    ],
    '���ݹ���'=>[

    ],
    'ϵͳ����'=>[],
];