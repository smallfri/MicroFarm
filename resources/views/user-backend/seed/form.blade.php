
				<!-- Content area -->
				<div class="content">

				
					<!-- Form horizontal -->
					<div class="panel panel-flat">
						<div class="panel-heading">
							<h5 class="panel-title">Seed Selection</h5>
							<div class="heading-elements">
								<ul class="icons-list">
			                		<li><a data-action="collapse"></a></li>
			                	</ul>
		                	</div>
						</div>

						<div class="panel-body">
							@if ($errors->any())
								<ul class="alert alert-danger">
									@foreach ($errors->all() as $error)
										<li>{{ $error }}</li>
									@endforeach
								</ul>
							@endif
									<div class="col-lg-4 col-md-4 col-sm-12 clearfix">
										 {!! Form::label('supplier', 'Supplier Name', ['class' => 'col-md-4 control-label']) !!}
											<div class="col-md-6">       
												{!!Form::select('supplier',$supplier,'null',array('class'=>'form-control selectTag','id'=>'supplier'));!!}
												
											</div>	
									</div>
									
								

							<div class="col-md-12 col-sm-12 ">
								
								<div class="col-md-2 col-sm-2">
									<div class="tab-content">
										<div class="tab-pane active" id="solid-justified-tab1-1">
												<?php 
												
															$userSeeds = array();
															foreach($userseed as $userseeds)
														 		$userSeeds[] = 	$userseeds->user_seed_id;
														?>
														<div id="dvLoading" style="display:none"></div>
												<div id="seedlist" class="form-group {{ $errors->has('user_seed_id') ? 'has-error' : ''}}">
													
												{{--@foreach($seed as $seeds)
												<div class="checkbox">
													<label>
														
													
														<input type="checkbox" class="control-primary" name="user_seed_id[]" id="user_seed_id" value="{{$seeds->id}}" 
														  	@if(in_array($seeds->id,$userSeeds))
														  		checked="checked"
															@endif 
														>
														{{$seeds->name}}
												
													</label>
												</div>
													@endforeach--}}
											
												
											</div>
										</div>	
									</div>
								</div>	<!-- end of col-2 -->

								
							</div>
							<div class="col-md-12 col-sm-12 supplier-btn">
								
							</div>
						</div>	
					</div>
				</div>
<?php 
$userSeeds = '[' . implode(', ', $userSeeds) . ']';
?>
@push('script-head')
<script type="text/javascript">
var userSeeds = <?php echo $userSeeds ?>;

	
$('#supplier').change(function(){
	
    var supplierID = $(this).val();    
    if(supplierID){
		$('#dvLoading').show();
        $.ajax({
           type:"GET",
           url:"{{url('seed/supplierseed')}}/"+supplierID,

           success:function(res){               
            if(res){
				$('.supplier-btn').empty();
                $("#seedlist").empty();
                $.each(res.seed,function(key,value){
					 if(value.seedname.length>0){ 		
	
						exists = (userSeeds.indexOf(value.seedname[0].id) > -1);
						
						var check = '';
						
						if(exists){
							check = 'checked="checked"';
						}
						$("#seedlist").append('<div class="checkbox"><label><input type="checkbox" class="control-primary"'+check+' name="user_seed_id[]" id="user_seed_id" value="'+value.seedname[0].id+'">'+value.seedname[0].name+'</label></div>');
					 } 

                });
				var count=$('input:checkbox').length;
				if(count==0){
					  $("#seedlist").empty();
					  $('.supplier-btn').append('<div class="text-center">No Seeds Found</div>');
				}else{
					$('.supplier-btn').append('<div class="text-right"><button type="submit" class="btn btn-1 pull-left"><div class="ladda-progress">Submit</div></button></div>');
				}
          
            }else{
               $("#seedlist").empty();
			    $('.supplier-btn').remove();
            }
			$('#dvLoading').hide();
           }
		   
        });
    }else{
        $("#seedlist").empty();
    }      
   });
 $('#supplier')
    .trigger('change');
  

</script>
@endpush