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
?>
<div class="container">
  
	<div class="card pl-0 pr-0 pt-0" style="max-width:100%;">
	  <h5 class="card-header bg-primary info-color text-white  py-4">
		<strong>Books List</strong>
	  </h5>
    <!--Card content-->
    <div class="card-body"> 

<table id="example" class="display text-center" style="width:100%">
        <thead>
            <tr>
				<th>Index</th>
                <th>Shelf Name</th>
                <th>Capacity</th>
                <th>Shelf Location</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
		<?php 
			foreach($book_list_data as $index => $book_val){
	     ?>
			<tr>
				<td><?php echo $index+1; ?></td>
                <td><?php echo $book_val->shelf_name; ?></td>
                <td><?php echo $book_val->capacity; ?></td>
                <td><?php echo $book_val->shelf_location; ?></td>
                <td><?php $status = $book_val->status; 
					if($status ==1){
						echo '<span class="btn btn-success">Active</span>';
					}else{
						echo '<span class="btn btn-danger">Inactive</span>';
					}
				?>
				</td>
                <td><a href="edit-book?book_id=<?php echo $book_val->id; ?>" class="btn btn-warning btn-edit" >Edit</a>   <button class="btn btn-danger btn-delete" data-item="book_self" data-id="<?php echo $book_val->id; ?>">delete</button></td>
            </tr>
	     <?php  
			}
		?>

        </tbody>
        <tfoot>
            <tr>
				<th>Index</th>
                <th>Shelf Name</th>
                <th>Capacity</th>
                <th>Shelf Location</th>
                <th>Status</th>
				<th>Action</th>
            </tr>
        </tfoot>
    </table>
<!-- This file should primarily consist of HTML with a little bit of PHP. -->
</div>
  </div>
</div>