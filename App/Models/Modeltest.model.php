<?php

/**
 * Class Ms
 * hook : _init
 * ������
 */
class Modeltest extends Model
{

    public function say()
    {
        /**
         *
         * res          //����鿴����
         * AjaxReturn   //����json����
         * json         //�鿴json����
         * bool         //boolֵ����
         */


        echo 'hello';
    }



    /**
     * hook
     * ��ʼ����
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * hook
     * ������д
     */
    public function _init()
    {
//        $this->get      = $this->S->request->get;
//        $this->post     = $this->S->request->post;
//        $this->cookie   = $this->S->request->cookie;
    }

    //+=========================================================
    //״̬ ����
    //+=========================================================
    public function DefaultCoderes()
    {
        return [
            '0'     => 'ini',
            '200'   => '�����ɹ�',
        ];
    }

}
