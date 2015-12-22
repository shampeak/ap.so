<!-- Content Header (Page header) -->
<section class="content-header">
      <h1>
            <?php echo bus('mymca')['title'];?>
      <small><?php echo bus('mymca')['subtitle'];?></small>
      </h1>
      <ol class="breadcrumb">
            <?php
                  $list = bus('mypath');
                  if($list[0]['mca'] !=  bus('mcaroot')){
                        $pa = [
                              'name'      => 'Home',
                              'url'       => '/'.str_replace('.','/',bus('mcaroot')),
                              'icon'      => 'fa fa-dashboard',
                        ];
                  }else{
                        $pa = current($list);
                        array_shift($list);
                  }
                  $re[] = $pa;
                  foreach($list as $key=>$value){
                        $re[] = $value;
                  }
            ?>
<?php
foreach($re as $value){
      echo '<li class=""> <i class="'.$value['icon'].'"></i> <a href="'.$value['url'].'">'.$value['name'].'</a></li>';
}
?>
      </ol>
</section>