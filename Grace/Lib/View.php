<?php

/**
* ��ͼ��
*/
class View {
      /**
      * ��ͼ�ļ�Ŀ¼
      * @var string
      */
      private $_tplDir;
      /**
      * ��ͼ�ļ�·��
      * @var string
      */
      private $_viewPath;
      /**
      * ��ͼ�����б�
      * @var array
      */
      private $_data = array();
      /**
      * ��tplInclude�õı����б�
      * @var array
      */
      private static $tmpData;

      /**
      * @param string $tplDir
      */
      public function __construct($tplDir=''){
            $this->_tplDir =C('app')['APP_PATH'];
            $mo =C('Router')['method_modules'];
            if($mo)$this->_tplDir .= 'Modules/'.C('app')['modulelist'][$mo].'/';
            $this->_tplDir .= 'view/';

            $this->assign('GET',\Seter\Seter::getInstance()->request->get);
            $this->assign('POST',\Seter\Seter::getInstance()->request->post);
            $this->assign('COOKIE',\Seter\Seter::getInstance()->request->cookie);
      }

      /**
      * Ϊ��ͼ��������һ��ģ�����
      * @param string $key Ҫ��ģ����ʹ�õı�����
      * @param mixed $value ģ���иñ�������Ӧ��ֵ
      * @return void
      */
      public function assign($key, $value) {
            $this->_data[$key] = $value;
      }

      public function fetch($tplFile,$data)
      {
            //$this->_data = $data;
            foreach($data as $key=>$value){
                  $this->_data[$key] = $value;
            }
            ob_start(); //����������
                  $router = C('Router');
                  $tplFile = $tplFile?:$router['tpl'];
                  $this->_viewPath = $this->_tplDir .$router['method_controller'].'/'. $tplFile . '.php';
                  unset($tplFile);
                  extract($this->_data);
                  include $this->_viewPath;
                  $html = ob_get_contents();
            ob_end_clean();

            return $html;
      }

      /**
      * ��Ⱦģ�岢���
      * @param null|string $tplFile ģ���ļ�·���������App/View/�ļ������·������������׺��������index/index
      * @return void
      */
      public function display($tplFile,$data) {
                  //$this->_data = $data;
            foreach($data as $key=>$value){
                  $this->_data[$key] = $value;
            }
            $router = C('Router');
            $tplFile = $tplFile?:$router['tpl'];
            $this->_viewPath = $this->_tplDir .$router['method_controller'].'/'. $tplFile . '.php';
            unset($tplFile);
            extract($this->_data);
            include $this->_viewPath;
      }

//      /**
//      * ������ģ���ļ��а�������ģ��
//      * @param string $path �����ViewĿ¼��·��
//      * @param array $data ���ݸ���ģ��ı����б�keyΪ��������valueΪ����ֵ
//      * @return void
//      */
      public static function tplInclude($path, $data=array()){
            //D(C());
            self::$tmpData = array(
                  'path' => C('Router')['Appbase'] . 'View/' . $path . '.php',
                  'data' => $data,
            );
            unset($path);
            unset($data);
            extract(self::$tmpData['data']);
            include self::$tmpData['path'];
      }

}
