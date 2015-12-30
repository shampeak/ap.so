<!-- User Account: style can be found in dropdown.less -->
<li class="dropdown user user-menu">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="glyphicon glyphicon-user"></i>
            <span><?=bus('user')['nickName']?:bus('user')['trueName'];?> <i class="caret"></i></span>
      </a>
      <ul class="dropdown-menu">
            <!-- User image -->
            <li class="user-header bg-light-blue">
                  <img src="<?=bus('user')['gravatar'];?>" class="img-circle" alt="User Image" />
                  <p>
                        <?=bus('user')['nickName']?:bus('user')['trueName'];?> - <?php echo bus('group')['groupName']?>
                        <small>Member since <?=bus('user')['createAt']?></small>
                  </p>
            </li>
            <!-- Menu Body -->
            <!-- li class="user-body">
                  <div class="col-xs-4 text-center">
                        <a href="#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                        <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                        <a href="#">Friends</a>
                  </div>
            </li>
            <!-- Menu Footer-->
            <li class="user-footer">
                  <div class="pull-left">
                        <a href="/admin/main/profile" class="btn btn-default btn-flat">Profile</a>
                  </div>
                  <div class="pull-right">
                        <a href="/admin/auth/logout/" class="btn btn-default btn-flat">Sign out</a>
                  </div>
            </li>
      </ul>
</li>