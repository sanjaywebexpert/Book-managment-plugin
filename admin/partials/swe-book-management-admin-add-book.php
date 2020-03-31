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
		<strong>Add New Book</strong>
	  </h5>
    <!--Card content-->
    <div class="card-body" >
	
	<form class="border border-light" action="javascript:void(0)" name="add_book" id="add_booklist" style="color: #757575;">
		
	 <!-- Grid row -->
	  <div class="form-group row">
		<!-- Material input -->
		<label for="booktitle" class="col-sm-2 col-form-label">Select Book Self:</label>
		<div class="col-sm-10">
		  <div class="md-form mt-0">
			 <select name="book_self_id" class="form-control" required="">
				<option value="">Select Book Self</option>
				<?php 
				foreach($book_shelf_data as $shelf_data){ ?>
					<option value="<?=$shelf_data->id?>"><?=strtoupper($shelf_data->shelf_name)?></option>
				<?php }
				?>
			 </select>
		  </div>
		</div>
	  </div>
		 <!-- Grid row -->
	  <div class="form-group row">
		<!-- Material input -->
		<label for="booktitle" class="col-sm-2 col-form-label">Book Title:</label>
		<div class="col-sm-10">
		  <div class="md-form mt-0">
			<input type="text" class="form-control" name="book_title" id="book_title" required="">
		  </div>
		</div>
	  </div>
	  
	   <!-- Grid row -->
	  <div class="form-group row">
		<!-- Material input -->
		<label for="booktitle" class="col-sm-2 col-form-label">Book Price:</label>
		<div class="col-sm-10">
		  <div class="md-form mt-0">
			<input type="number" class="form-control" name="book_price" id="book_price" required="">
		  </div>
		</div>
	  </div>
	  
	   <!-- Grid row -->
	  <div class="form-group row">
		<!-- Material input -->
		<label for="booktitle" class="col-sm-2 col-form-label">Book Description:</label>
		<div class="col-sm-10">
		  <div class="md-form mt-0">
			<textarea class="form-control" name="book_description" id="book_description" required=""></textarea>
		  </div>
		</div>
	  </div>
	  		 <!-- Grid row -->
	  <div class="form-group row">
		<!-- Material input -->
		<label for="Cover" class="col-sm-2 col-form-label">Book Cover Image:</label>
		<div class="col-sm-10">
		  <div class="md-form mt-0">
			<button class="btn btn-info" id="media-upload" required="" type="button">Upload Cover Image</button>
			<span><img src="" id="show_cover_image" style="width:100px;height:100px display:none;"></span>
			<input type="hidden" class="form-control" id="cover_image" name="cover_image_url">
		  </div>
		</div>
	  </div>
	  
	  		 <!-- Grid row -->
	  <div class="form-group row">
		<!-- Material input -->
		<label for="booktitle" class="col-sm-2 col-form-label">Language:</label>
		<div class="col-sm-10">
		  <div class="md-form mt-0">
			<input type="text" class="form-control" name="language" id="language" required="">
		  </div>
		</div>
	  </div>
		 <!-- Grid row -->
		<div class="form-group row">
		<!-- Material input -->
			<label for="booktitle" class="col-sm-2 col-form-label">Publish Date:</label>
			<div class="col-sm-10">
				<div class="md-form mt-0">
					<input type="date" class="form-control" name="publish_date" id="publish_date" required="">
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
		
		  <button type="submit" class="btn btn-info btn-rounded my-4 waves-effect z-depth-0">Submit</button>
		</form>
	</div>
  </div>
</div>
