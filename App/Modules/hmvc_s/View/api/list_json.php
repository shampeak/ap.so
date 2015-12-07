<div class="tabs-vertical-env">
							
                            
                            

                            
<?php foreach($list as $key=>$value){
?>


    
    <div class="row">
    <ul class="nav tabs-vertical">
									<li class="active">
										<a href="#1<?=$key?>" data-toggle="tab">
											<i class="fa-globe visible-xs"></i>
											<span class="hidden-xs">概况</span>
										</a>
									</li>
									<li>
										<a href="#2<?=$key?>" data-toggle="tab">
											<i class="fa-picture visible-xs"></i>
											<span class="hidden-xs">GET</span>
										</a>
									</li>
									<li>
										<a href="#3<?=$key?>" data-toggle="tab">
											<i class="fa-docs visible-xs"></i>
											<span class="hidden-xs">POST</span>
										</a>
									</li>
									<li>
										<a href="#4<?=$key?>" data-toggle="tab">
											<i class="fa-video visible-xs"></i>
											<span class="hidden-xs">FILE</span>
										</a>
									</li>
									<li>
										<a href="#5<?=$key?>" data-toggle="tab">
											<i class="fa-users visible-xs"></i>
											<span class="hidden-xs">ROUTER</span>
										</a>
									</li>
									<li>
										<a href="#6<?=$key?>" data-toggle="tab">
											<i class="fa-users visible-xs"></i>
											<span class="hidden-xs">SIGN</span>
										</a>
									</li>
								</ul>
                                
                      <div class="tab-content">
									
									<!-- Sample Search Results Tab -->
									<div class="tab-pane active" id="1<?=$key?>">
<?php
	D($value['__']);
?>
									</div>
									
									<!-- Search Results Tab -->
									<div class="tab-pane" id="2<?=$key?>">
<?php
D($value['_GET']);
?>


									</div>
									
									<!-- Search Results Tab -->
									<div class="tab-pane" id="3<?=$key?>">
<?php
D($value['_POST']);
?>
									</div>
									
									<!-- Search Results Tab -->
									<div class="tab-pane" id="4<?=$key?>">
<?php
D($value['_FILE']);
?>
									</div>
									
									<!-- Search Results Tab -->
									<div class="tab-pane" id="5<?=$key?>">
<?php
D($value['router']);
?>
									</div>
                                    
									<div class="tab-pane" id="6<?=$key?>">
<?php
D($value['sign']);
?>
									</div>
								</div>          
                                
    </div>
                            
                            
         <hr>               
         <hr>               
         <hr>                   
                            
                            
                            
                            
                            
                            
								
								
								
								
<?PHP
}
?>                                 
                                
                                
							</div>
                       
                            
                            
            