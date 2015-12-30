<!-- Left side column. contains the logo and sidebar -->
<aside class="left-side sidebar-offcanvas">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                  <div class="pull-left image">
                        <img src="<?=bus('user')['gravatar'];?>" class="img-circle" alt="User Image" />
                  </div>
                  <div class="pull-left info">
                        <p>Hello, <?=bus('user')['nickName']?:bus('user')['trueName'];?></p>

                        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                  </div>
            </div>

            <!-- search form -
            ->
            <form action="#" method="get" class="sidebar-form">
                  <div class="input-group">
                        <input type="text" name="q" class="form-control" placeholder="Search..."/>
                            <span class="input-group-btn">
                                <button type='submit' name='seach' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                            </span>
                  </div>
            </form>
            <!-- /.search form -->
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu">
                  <!-- li>
                        <a href="/admin/main/">
                              <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                        </a>
                  </li -->

                  <?
                  foreach(bus('menu') as $key=>$value) {
                  ?>
                        <!--li class="treeview active"-->
                        <?php
                        if($value['child']){
                        ?>
                        <li class="treeview <?php if($value['actived']){ ?>active<?php }?>">
                              <a href="#">
                                    <i class="<?=$value['icon']?>"></i>
                                    <span><?=$value['title']?></span>
                                    <i class="fa fa-angle-left pull-right"></i>
                              </a>
                                    <ul class="treeview-menu">
                                          <?
                                          foreach($value['child'] as $k=>$v) {
                                          ?>
                                                <li><a href="<?=$v['url']?>"><i class="fa fa-angle-double-right"></i> <?=$v['title']?></a></li>
                                          <?
                                          }
                                          ?>
                                    </ul>
                        </li>
                        <?php
                        }else{
                        ?>
                        <li>
                              <a href="<?=$value['url']?>">
                                    <i class="<?=$value['icon']?>"></i> <span><?=$value['title']?></span>
                              </a>
                        </li>

                        <?php
                        }
                        ?>
                  <?php
                  }
                  ?>



                  <!-- li>
                        <a href="/admin/set/">
                              <i class="fa fa-th"></i> <span>Ground</span> <small class="badge pull-right bg-green">new</small>
                        </a>
                  </li>

                  <li class="treeview active">
                        <a href="#">
                              <i class="fa fa-bar-chart-o"></i>
                              <span>管理</span>
                              <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                              <li><a href="/admin/user/group/"><i class="fa fa-angle-double-right"></i> 用户组管理</a></li>
                              <li><a href="/admin/user/"><i class="fa fa-angle-double-right"></i> 用户管理</a></li>
                        </ul>
                  </li>
                  
                  <li class="treeview">
                        <a href="#">
                              <i class="fa fa-bar-chart-o"></i>
                              <span>Charts</span>
                              <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                              <li><a href="../charts/morris.html"><i class="fa fa-angle-double-right"></i> Morris</a></li>
                              <li><a href="../charts/flot.html"><i class="fa fa-angle-double-right"></i> Flot</a></li>
                              <li><a href="../charts/inline.html"><i class="fa fa-angle-double-right"></i> Inline charts</a></li>
                        </ul>
                  </li>
                  

                  <li>
                        <a href="../calendar.html">
                              <i class="fa fa-calendar"></i> <span>Calendar</span>
                              <small class="badge pull-right bg-red">3</small>
                        </a>
                  </li>
                  <li>
                        <a href="../mailbox.html">
                              <i class="fa fa-envelope"></i> <span>Mailbox</span>
                              <small class="badge pull-right bg-yellow">12</small>
                        </a>
                  </li -->

                  <!-- 系统设置 -->
                  <!-- li class="treeview">
                        <a href="javascript:void(0)">
                              <i class="fa fa-table"></i> <span>Set</span>
                              <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                              <li><a href="/admin/set/geter/"><i class="fa fa-angle-double-right"></i> Geter </a></li>
                              <li><a href="/admin/set/mcae/"><i class="fa fa-angle-double-right"></i> Mcae </a></li>
                              <li><a href="/admin/set/mcae_menu/"><i class="fa fa-angle-double-right"></i> Mcae_menu </a></li>
                              <li><a href="/admin/set/middleware/"><i class="fa fa-angle-double-right"></i> Middleware </a></li>
                              <li><a href="/admin/set/widget/"><i class="fa fa-angle-double-right"></i> Widget </a></li>
                        </ul>
                  </li>
                  <!-- 系统设置 -->

                  <!-- li class="treeview active">
                        <a href="#">
                              <i class="fa fa-folder"></i> <span>Examples</span>
                              <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                              <li><a href="invoice.html"><i class="fa fa-angle-double-right"></i> Invoice</a></li>
                              <li><a href="login.html"><i class="fa fa-angle-double-right"></i> Login</a></li>
                              <li><a href="register.html"><i class="fa fa-angle-double-right"></i> Register</a></li>
                              <li><a href="lockscreen.html"><i class="fa fa-angle-double-right"></i> Lockscreen</a></li>
                              <li class="active"><a href="404.html"><i class="fa fa-angle-double-right"></i> 404 Error</a></li>
                              <li><a href="500.html"><i class="fa fa-angle-double-right"></i> 500 Error</a></li>
                              <li><a href="blank.html"><i class="fa fa-angle-double-right"></i> Blank Page</a></li>
                        </ul>
                  </li -->
            </ul>
      </section>
      <!-- /.sidebar -->
</aside>