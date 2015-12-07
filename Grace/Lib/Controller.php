<?php


/**
 * ��������
 */
class Controller {
      /**
       * ��ͼʵ��
       * @var View
       */
      private $_view;
      //����
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
       * ���캯������ʼ����ͼʵ��������hook
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
//        // ����ע��
            $this->singleton('S', function ($c) {
                  return \Seter\Seter::getInstance();
            });

//
//        /**
//         * ����������ֻ�����ײ�� route������ײ㣬������conf�н��б���������
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

      public function G($str = ''){       //OK,��ȡ���̻����ݵ�·���ֶ�
            return $this->Geter->get($str);
      }

      /**
       * ǰ��hook
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
//  '*'     //����
//  '@'     //��½�û�
//  'A'     //����Ա
//  'G'     //�ο�
//  '?'     //��ѯ���ݿ�
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
       * ��Ⱦģ�岢���
       * @param null|string $tpl ģ���ļ�·��
       * ����Ϊ�����App/View/�ļ������·������������׺��������index/index
       * �������Ϊ�գ���Ĭ��ʹ��$controller/$action.php
       * �������������"/"����Ĭ��ʹ��$controller/$tpl
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
       * Ϊ��ͼ��������һ��ģ�����
       * @param string $name Ҫ��ģ����ʹ�õı�����
       * @param mixed $value ģ���иñ�������Ӧ��ֵ
       * @return void
       */
    protected function assign($name,$value){
        $this->_view->assign($name,$value);
    }

      /**
       * ��������json��ʽ��������������ִֹͣ�д���
       * @param array $data Ҫ���������
       */
      protected function ajaxReturn($data){
            echo json_encode($data);
            exit;
      }

      /**
       * �ض�����ָ��url
       * @param string $url Ҫ��ת��url
       * @param void
       */
      protected function redirect($url){
            header("Location: $url");
            exit;
      }




















//��ʼ����ע��
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
//��������ע��






}

