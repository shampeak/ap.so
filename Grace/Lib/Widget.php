<?php

/**
 * Widget��
 * ʹ��ʱ��̳д��࣬��дinvoke����������invoke�����е���display
 */
class Widget {
    /**
     * ��ͼʵ��
     * @var View
     */
    protected $_view;
    /**
     * Widget��
     * @var string
     */
    protected $_widgetName;

    /**
     * ���캯������ʼ����ͼʵ��
     */
    public function __construct(){
        $this->_widgetName = get_class($this);
        $dir = C('APP_FULL_PATH') . '/Widget/Tpl/';
        $this->_view = new View($dir);
    }

    /**
     * �����߼�
     * @param mixed $data ����
     */
    public function invoke($data){

    }

    /**
     * ��Ⱦģ��
     * @param string $tpl ģ��·�������Ϊ������������Ϊģ����
     */
    protected function display($tpl='',$data = []){
        if($tpl == ''){
            $tpl = $this->_widgetName;
        }
        $tpl = '../'.$tpl;
        $this->_view->display($tpl,$data);
    }

    /**
     * Ϊ��ͼ��������һ��ģ�����
     * @param string $name Ҫ��ģ����ʹ�õı�����
     * @param mixed $value ģ���иñ�������Ӧ��ֵ
     * @return void
     */
    protected function assign($name,$value){
        $this->_view->assign($name,$value);
    }
}
