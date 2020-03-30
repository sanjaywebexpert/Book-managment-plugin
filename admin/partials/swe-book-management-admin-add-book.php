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
		<label for="booktitle" class="col-sm-2 col-form-label">Book Title:</label>
		<div class="col-sm-10">
		  <div class="md-form mt-0">
			<input type="text" class="form-control" name="book_title" id="bootk_title" required="">
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
	  
	  <div class="form-group row">
		<!-- Material input -->
		<label for="Cover" class="col-sm-2 col-form-label">Book type</label>
		<div class="col-sm-10">
		  <div class="md-form mt-0">
			<div class="form-check">
		   <?php $level_array = array('entertainment', 'novel', 'biograpgy', 'education', 'sports');
			foreach($level_array as $level){
				?>
				<label><input type="checkbox" name="book_type[]" class="form-control" value="<?php echo $level ?>"><?php echo ucfirst($level); ?></label>
			<?php }
		   ?>
		   </div>
		  </div>
		</div>
	  </div>
		
		  <button type="submit" class="btn btn-outline-info btn-rounded my-4 waves-effect z-depth-0">Submit</button>
		</form>
	</div>
  </div>
</div>
