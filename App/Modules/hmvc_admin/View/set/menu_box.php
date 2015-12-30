<div class="row">
<div class="col-md-12">
                  <form>
                        <div class="row">
							  <div class="col-md-2">
									MCA :
							  </div>
							  <div class="col-md-10">
								  <div class="form-group">
									 MCA : <?=$res['mca']?>
								  </div>
							  </div>



							<div class="col-md-2">
								图标 :
							</div>
							<div class="col-md-10">
								<div class="form-group">
									<input type="text" class="form-control dialogicon" id="" value="<?=$res['icon']?>">
								</div>
							</div>

							<div class="col-md-2">
								title :
							</div>
							<div class="col-md-10">
								<div class="form-group">
									<input type="text" class="form-control dialogtitle" id="" value="<?=$res['title']?>">
								</div>
							</div>


								<div class="col-md-2">
									subtitle :
								</div>
								<div class="col-md-10">
									<div class="form-group">
										<input type="text" class="form-control dialogsubtitle" id="" value="<?=$res['subtitle']?>">
									</div>
								</div>

								<div class="col-md-2">
									parid :
								</div>
								<div class="col-md-10">
									<div class="form-group">
										<input type="text" class="form-control dialogpreid" id="" value="<?=$res['preid']?>">
									</div>
								</div>

								<div class="col-md-2">
									url :
								</div>
								<div class="col-md-10">
									<div class="form-group">
										<input type="text" class="form-control dialogurl" id="" value="<?=$res['url']?>">
									</div>
								</div>


						</div>
                        
                        
                        <div class="row">
                              <div class="col-md-2"> 
                                    描述 :
                              </div>
							<div class="col-md-10">
								<div class="form-group">
									<input type="text" class="form-control dialogdes" id="" value="<?=$res['des']?>">
									<input type="hidden" class="dialogid" value="<?php echo $res['id'];?>">
								</div>
							</div>
                        </div>


                  </form>

</div>
</div>

<script type="text/dialog">
	  $(document).ready(function(){
			$('.modal_ok').click(function(){

				  var res = $.ajax({
						url : '/admin/set/menu/box/',
						type: 'post',
						data: {
							'icon' 		: $('.dialogicon').val(),
							'title' 	: $('.dialogtitle').val(),
							'subtitle' 	: $('.dialogsubtitle').val(),
							'preid' 	: $('.dialogpreid').val(),
							'url' 		: $('.dialogurl').val(),
							'des' 		: $('.dialogdes').val(),
							'id' 		: $('.dialogid').val(),
						},
						dataType: "json",
						async:false,
						cache:false
				  }).responseJSON;
				  //console.log(res);
				  //==========================

				  if(res.code<0){
						alert(res.msg);
						return false;
				  }else{

						location.reload();
						return true;
				  }
			});


	  })
</script>