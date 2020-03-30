<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       http://sanjaywebexpert.com/
 * @since      1.0.0
 *
 * @package    Swe_Book_Management
 * @subpackage Swe_Book_Management/admin/partials
 */
 
 wp_enqueue_media();
?>
<div class="container">
	<div class="card pl-0 pr-0 pt-0" style="max-width:100%;">
	  <h5 class="card-header bg-primary info-color text-white  py-4">
		<strong>Add Book Self</strong>
	  </h5>
    <!--Card content-->
    <div class="card-body" >
		<form class="border border-light" action="javascript:void(0)" name="add_book_self_frm" id="add_book_self_frm" style="color: #757575;">
		
	 <!-- Grid row -->
		<div class="form-group row">
		<!-- Material input -->
			<label for="booktitle" class="col-sm-2 col-form-label">Book Self Name:</label>
			<div class="col-sm-10">
				<div class="md-form mt-0">
					<input type="text" class="form-control" name="bootk_self_name" id="bootk_self_name" required="">
				</div>
			</div>
		</div>
	  
	 <!-- Grid row -->
		<div class="form-group row">
		<!-- Material input -->
			<label for="booktitle" class="col-sm-2 col-form-label">Self capacity:</label>
			<div class="col-sm-10">
				<div class="md-form mt-0">
					<input type="number" class="form-control" name="self_capacity" id="self_capacity" required="">
				</div>
			</div>
		</div>
	 <!-- Grid row -->
		<div class="form-group row">
		<!-- Material input -->
			<label for="booktitle" class="col-sm-2 col-form-label">Self location:</label>
			<div class="col-sm-10">
				<div class="md-form mt-0">
					<input type="text" class="form-control" name="shelf_location" id="shelf_location" required="">
				</div>
			</div>
		</div>  
	  <!-- Grid row -->
		<div class="form-group row">
		<!-- Material input -->
			<label for="booktitle" class="col-sm-2 col-form-label">Status:</label>
			<div class="col-sm-10">
				<div class="md-form mt-0">
					<select class="form-control" name="status">
						<option value="1">Active</option>
						<option value="0">Inactive</option>
					</select>
				</div>
			</div>
		</div> 
		
		  <button type="submit" id="submit_add_book_self_frm" class="btn btn-info btn-rounded my-4 waves-effect z-depth-0">Submit</button>
		</form>
	</div>
  </div>
</div>
