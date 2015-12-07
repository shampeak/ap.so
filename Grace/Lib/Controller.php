<?php


/**
 * 控制器类
 */
class Controller {
      /**
       * 视图实例
       * @var View
       */
      private $_view;
      //配置
      public $router;
      public $env;
      public $app;
      public $rules;
      public $headers;
      public $params;
      public $Geter;

      //
      public $data = [];
      public $accessRules = [];

      /**
       * 构造函数，初始化视图实例，调用hook
       */
      public function __construct(){
            $this->Geter = \G\Geter::getInstance();

            $this->router     = C('Router');
            $this->env        = C('env');
            $this->app        = C('app');
            $this->rules      = C('rules');
            $this->headers    = C('headers');
            $this->params = $this->router['params'];

            $this->env['bt']   = $_SERVER['REQUEST_TIME_FLOAT'];
            $this->env['ip']   = $this->env['REMOTE_ADDR'];
            $this->env['mem']   = memory_get_usage();

//
//        // 依赖注入
            $this->singleton('S', function ($c) {
                  return \Seter\Seter::getInstance();
            });

//
//        /**
//         * 无依赖或者只抵赖底层的 route属于最底层，可以在conf中进行变量的配置
//         * /

            $this->singleton('db', function ($c) {
                  return $this->S->db;
            });
            $this->singleton('table', function ($c) {
                  return $this->S->table;
            });
            $this->singleton('Model', function ($c) {
                  return $this->S->model;
            });

            $this->singleton('request', function ($c) {
                  return $this->S->request;
            });
//            $this->singleton('user', function ($c) {
//                  return $this->S->user;
//            });

            $this->singleton('rbac', function ($c) {
                  return $this->S->rbac;
            });
            $this->_view = new View();
      }

      public function G($str = ''){       //OK,获取到固化数据的路由字段
            return $this->Geter->get($str);
      }

      /**
       * 前置hook
       */
      public function _init(){
            header("Content-Type:text/html; charset=utf-8");
            //$this->rbac->run($this->getaccessRules());
      }

      /**
       * @return array
       * rbac
       */
      protected function getaccessRules()
      {
            $this->accessRules['Module']    = $this->router['method_modules'];
            $this->accessRules['Controller']= $this->router['method_controller'];
            $this->accessRules['Action']    = $this->router['method_action'];
            $this->accessRules['rules']     = RULES();
            $this->accessRules['behaviors'] =  $this->behaviors();
            return $this->accessRules;
      }

      protected function behaviors()
      {
//  '*'     //所有
//  '@'     //登陆用户
//  'A'     //管理员
//  'G'     //游客
//  '?'     //查询数据库
            return [
                'access' => [
                    'only' => ['login_test', 'logout_test', 'signup_test'],
                    'rules' => [
                        [
                            'actions' => ['login_test'],
                            'allow' => true,
                            'roles' => ['@'],
                        ],
                        [
                            'actions' => ['login_test'],
                            'deny' => true,
                            'roles' => ['A'],
                        ],
                    ],
                ],
            ];
      }

      /**
       * 渲染模板并输出
       * @param null|string $tpl 模板文件路径
       * 参数为相对于App/View/文件的相对路径，不包含后缀名，例如index/index
       * 如果参数为空，则默认使用$controller/$action.php
       * 如果参数不包含"/"，则默认使用$controller/$tpl
       * @return void
       */
      protected function display($tpl='',$data = []){
            $tpl = $tpl?:$this->router['tpl'];
            if(method_exists($this, '__DisplayPre'))  $this->__DisplayPre();                          //hook

            $this->_view->display($tpl,$data);
      }

      protected function fetch($tpl='',$data = []){
            $tpl = $tpl?:$this->router['tpl'];
            if(method_exists($this, '__DisplayPre'))  $this->__DisplayPre();                          //hook

            return $this->_view->fetch($tpl,$data);
      }

      /**
       * 为视图引擎设置一个模板变量
       * @param string $name 要在模板中使用的变量名
       * @param mixed $value 模板中该变量名对应的值
       * @return void
       */
    protected function assign($name,$value){
        $this->_view->assign($name,$value);
    }

      /**
       * 将数据用json格式输出至浏览器，并停止执行代码
       * @param array $data 要输出的数据
       */
      protected function ajaxReturn($data){
            echo json_encode($data);
            exit;
      }

      /**
       * 重定向至指定url
       * @param string $url 要跳转的url
       * @param void
       */
      protected function redirect($url){
            header("Location: $url");
            exit;
      }




















//开始依赖注入
      /**
       * Ensure a value or object will remain globally unique
       * @param  string  $key   The value or object name
       * @param  Closure        The closure that defines the object
       * @return mixed
       */
      public function singleton($key, $value)
      {

            $this->set($key, function ($c) use ($value) {
                  static $object;
                  if (null === $object) {
                        $object = $value($c);
                  }
                  return $object;
            });
      }

      /**
       * Set data key to value
       * @param string $key   The data key
       * @param mixed  $value The data value
       */
      public function set($key, $value)
      {
            $this->data[$this->normalizeKey($key)] = $value;
      }

      public function get($key, $default = null)
      {
            if ($this->has($key)) {
                  $isInvokable = is_object($this->data[$this->normalizeKey($key)]) && method_exists($this->data[$this->normalizeKey($key)], '__invoke');
                  return $isInvokable ? $this->data[$this->normalizeKey($key)]($this) : $this->data[$this->normalizeKey($key)];
            }
            return $default;
      }

      public function __get($key)
      {
            return $this->get($key);
      }

      protected function normalizeKey($key)
      {
            return $key;
      }
      public function has($key)
      {
            return array_key_exists($this->normalizeKey($key), $this->data);
      }
//结束依赖注入






}

