
		<!-- header logo: style can be found in header.less -->
        <?=$this->load->view('blocks/top');?>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
		<?=$this->load->view('blocks/left');?>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Products
                        <small></small>
                    </h1>
                    <ol class="breadcrumb">
						<a href="#" data-toggle="modal" data-target="#addProduct">Add New Product</a>
                    </ol>
                </section>
			
                <!-- Main content -->
				
                <section class="content">
						<!-- alert notifications -->
						<?php	
							$displayflash='hidden';
							if($this->session->flashdata('flashmsg')){
								$displayflash = '';
							}
						?>
						<div class="row <?=$displayflash;?>">
							<div class="col-md-6 col-md-offset-2">
								<div class="alert alert-dismissable <?=$this->session->flashdata('flashtype');?>">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
									<?=$this->session->flashdata('flashmsg');?>
								</div>
							</div>
						</div><!-- end notifications -->
                    
                    <!-- /.row -->

                    <!-- Main row -->
						<div class="row">
							<div class="col-xs-12">
								<div class="box">
									<div class="box-header">
										<h3 class="box-title"></h3>
									</div><!-- /.box-header -->
									<div class="box-body table-responsive">
										<table id="samtables" class="table table-bordered table-striped">
											<thead>
												<tr>
													<th>ID</th>
													<th>Type</th>
													<th>Name</th>
													<th>Model</th>
													<th>Brand</th>
													<th>Manufacturer</th>
													<th>Price</th>
													<th>Details</th>
													<th>XXX</th>
												</tr>
											</thead>
											<tbody>
												<?php foreach($products as $product): ?>
												<tr>
													<td><?php echo $product->id; ?></td>
													<td><?php echo $product->type; ?></td>
													<td><?php echo $product->name; ?></td>
													<td><?php echo $product->model; ?></td>
													<td><?php echo $product->brand; ?></td>
													<td><?php echo $product->manufacturer; ?></td>
													<td><?php echo $product->price; ?></td>
													<td><?php echo $product->details; ?></td>
													<td><a href="#" data-toggle="modal" data-target="#updateProduct<?php echo $product->id; ?>">a</a></td>
													
												</tr>
												<?php endforeach; ?>
												</tbody>
										</table>
									</div><!-- /.box-body -->
								</div><!-- /.box -->
							</div>
                    </div><!-- /.row (main row) -->

                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->
		
		
<!-- Add New Product Modal -->
<form method="post" action="products/addnewproduct" class="form-horizontal" role="form"/>
	<div class="modal fade" id="addProduct" tabindex="-1" role="dialog" aria-labelledby="addProduct" aria-hidden="true"><!-- ./modal -->
	  <div class="modal-dialog">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
			<h4 class="modal-title">Add New Product</h4>
		  </div>
		  <div class="modal-body">
			  <div class="form-group">
				<label for="InputProductType" class="col-sm-3 control-label">Type</label>
				<div class="col-sm-7">
				  <input type="text" name="type" class="form-control" id="InputProductType" placeholder="" required="required">
				</div>
			  </div>
			  <div class="form-group">
				<label for="InputProductName" class="col-sm-3 control-label">Name</label>
				<div class="col-sm-7">
				  <input type="text" class="form-control" id="InputProductName" placeholder="" required="required" name="name">
				</div>
			  </div>
			  <div class="form-group">
				<label for="InputProductModel" class="col-sm-3 control-label">Model</label>
				<div class="col-sm-7">
				  <input type="text" class="form-control" id="InputProductModel" placeholder="" required="required" name="model">
				</div>
			  </div>
			  <div class="form-group">
				<label for="InputProductBrand" class="col-sm-3 control-label">Brand</label>
				<div class="col-sm-7">
				  <input type="text" class="form-control" id="InputProductBrand" placeholder="" required="required" name="brand">
				</div>
			  </div>
			  <div class="form-group">
				<label for="InputProductManufacturer" class="col-sm-3 control-label">Manufacturer</label>
				<div class="col-sm-7">
				  <input type="text" class="form-control" id="InputProductManufacturer" placeholder="" required="required" name="manufacturer">
				</div>
			  </div>
			  <div class="form-group">
				<label for="InputProductPrice" class="col-sm-3 control-label">Price</label>
				<div class="col-sm-4">
				  <input type="number" class="form-control" id="InputProductPrice" placeholder="" required="required" name="price">
				</div>
			  </div>
			  <div class="form-group">
				<label for="InputProductDetails" class="col-sm-3 control-label">Details</label>
				<div class="col-sm-7">
				  <textarea class="form-control" rows="3" id="InputProductDetails" name="details"></textarea>
				</div>
			  </div>
			  <input type="hidden" name="added_by" value="<?=$this->session->userdata('id');?>" />
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Clear</button>
			<input type="submit" name="saveproduct" value="Save" class="btn btn-primary" />
		  </div>
		</div><!-- /.modal-content -->
	  </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
</form>
<!-- /.Add New Product Modal -->


<!-- product individual modal-->
<?php foreach($products as $product): ?>
<form method="post" action="products/updateproduct" class="form-horizontal" role="form"/>
	<div class="modal fade" id="updateProduct<?php echo $product->id; ?>" tabindex="-1" role="dialog" aria-labelledby="updateProduct" aria-hidden="true"><!-- modal -->
	  <div class="modal-dialog">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
			<h4 class="modal-title">Update Product</h4>
		  </div>
		  <div class="modal-body">
			  <div class="form-group">
				<label for="InputProductType" class="col-sm-3 control-label">Type</label>
				<div class="col-sm-7">
				  <input type="text" name="type" class="form-control" id="InputProductType" value="<?=$product->type;?>" required="required">
				</div>
			  </div>
			  <div class="form-group">
				<label for="InputProductName" class="col-sm-3 control-label">Name</label>
				<div class="col-sm-7">
				  <input type="text" class="form-control" id="InputProductName" value="<?=$product->name;?>" required="required" name="name">
				</div>
			  </div>
			  <div class="form-group">
				<label for="InputProductModel" class="col-sm-3 control-label">Model</label>
				<div class="col-sm-7">
				  <input type="text" class="form-control" id="InputProductModel" value="<?=$product->model;?>" required="required" name="model">
				</div>
			  </div>
			  <div class="form-group">
				<label for="InputProductBrand" class="col-sm-3 control-label">Brand</label>
				<div class="col-sm-7">
				  <input type="text" class="form-control" id="InputProductBrand" value="<?=$product->brand;?>" required="required" name="brand">
				</div>
			  </div>
			  <div class="form-group">
				<label for="InputProductManufacturer" class="col-sm-3 control-label">Manufacturer</label>
				<div class="col-sm-7">
				  <input type="text" class="form-control" id="InputProductManufacturer" value="<?=$product->manufacturer;?>" required="required" name="manufacturer">
				</div>
			  </div>
			  <div class="form-group">
				<label for="InputProductPrice" class="col-sm-3 control-label">Price</label>
				<div class="col-sm-4">
				  <input type="number" class="form-control" id="InputProductPrice" value="<?=$product->price;?>" required="required" name="price">
				</div>
			  </div>
			  <div class="form-group">
				<label for="InputProductDetails" class="col-sm-3 control-label">Details</label>
				<div class="col-sm-7">
				  <textarea class="form-control" rows="3" id="InputProductDetails" name="details"><?=$product->details;?></textarea>
				</div>
			  </div>
			  <input type="hidden" name="added_by" value="<?=$this->session->userdata('id');?>" />
			  <input type="hidden" name="product_id" value="<?=$product->id;?>" />
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
			<input type="submit" name="deleteproduct" value="Delete" class="btn btn-danger"/>
			<input type="submit" name="updateproduct" value="Update" class="btn btn-primary" />
		  </div>
		</div><!-- /.modal-content -->
	  </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
</form>
<?php endforeach; ?>
<!-- /. product individual modal-->
<!-- page script -->
        


        