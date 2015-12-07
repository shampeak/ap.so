<?php



return
    [
        'access' => [
             'rules' => [
                 [
                     'Module'   => 's',
                     'Controller' => 's',
                     'actions'  => ['login', 'signup'],      //行为 B
                     'allow'    => true,                       //deny or allow
                     'roles'    => ['?'],                      //用户 U
                 ],
                 [
                     'actions' => ['logout'],
                     'allow'    => true,
                     'roles'    => ['@'],
                 ],
             ],
     ],
 ];



