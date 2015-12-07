<?php

/**
* 视图类
*/
class View {
      /**
      * 视图文件目录
      * @var string
      */
      private $_tplDir;
      /**
      * 视图文件路径
      * @var string
      */
      private $_viewPath;
      /**
      * 视图变量列表
      * @var array
      */
      private $_data = array();
      /**
      * 给tplInclude用的变量列表
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

           // $this->assign('GET',\Seter\Seter::getInstance()->request->get);
            //$this->assign('POST',\Seter\Seter::getInstance()->request->post);
            //$this->assign('COOKIE',\Seter\Seter::getInstance()->request->cookie);
      }

      /**
      * 为视图引擎设置一个模板变量
      * @param string $key 要在模板中使用的变量名
      * @param mixed $value 模板中该变量名对应的值
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
            ob_start(); //开启缓冲区
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
      * 渲染模板并输出
      * @param null|string $tplFile 模板文件路径，相对于App/View/文件的相对路径，不包含后缀名，例如index/index
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
//      * 用于在模板文件中包含其他模板
//      * @param string $path 相对于View目录的路径
//      * @param array $data 传递给子模板的变量列表，key为变量名，value为变量值
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
