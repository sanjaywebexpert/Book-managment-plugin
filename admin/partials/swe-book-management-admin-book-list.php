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

<table id="example" class="display" style="width:100%">
        <thead>
            <tr>
				<th>Index</th>
                <th>shelf Name</th>
                <th>Book Title</th>
                <th>Book Price</th>
                <th>Book Description</th>
                <th>Book Cover image</th>
                <th>Language</th>
                <th>status</th>
                <th>publish Date</th>
				<th>Action</th>
            </tr>
        </thead>
        <tbody>
				<?php 
			foreach($book_data as $index => $book_val){
	     ?>
			<tr>
				<td><?php echo $index+1; ?></td>
                <td><?php 
					$shelf_id =  $book_val->shelf_id; 
					global $wpdb;
					$book_shelf_name = $wpdb->get_var(
						$wpdb->prepare( 
						"SELECT shelf_name FROM ".$this->table_activator->wp_tbl_book_shelf()." 
						WHERE id=".$shelf_id."" )
						);
						echo $book_shelf_name;
				?></td>
                <td><?php echo ucfirst($book_val->book_title); ?></td>
                <td><?php echo "&#x20B9 ".$book_val->book_price; ?></td>
                <td><?php $desc =  $book_val->book_description; 
						if(strlen($desc) > 80){
							$excerpt = substr($desc, 80);
						}else{
							$excerpt = $desc;
						}
					echo $excerpt;
				?></td>
                <td><img src="<?php echo $book_val->book_cover_image; ?>" style="with:80px;height:50px;"></td>
                <td><?php echo $book_val->language; ?></td>
                <td><?php $status = $book_val->status; 
					if($status ==1){
						echo '<span class="btn btn-success btn-sm">Active</span>';
					}else{
						echo '<span class="btn btn-danger btn-sm">Inactive</span>';
					}
				?>
				</td>
				<td><?php echo $book_val->publish_date; ?></td>
                <td><a href="admin.php?page=add-new-book&book_id=<?php echo $book_val->id; ?>" class="btn btn-warning btn-edit" >Edit</a>    <button class="btn btn-danger btn-delete btn-sm" data-item="books" data-id="<?php echo $book_val->id; ?>">delete</button></td>
            </tr>
	     <?php  
			}
		?>


        </tbody>
        <tfoot>
            <tr>
                <th>Index</th>
                <th>shelf Name</th>
                <th>Book Title</th>
                <th>Book Price</th>
                <th>Book Description</th>
                <th>Book Cover image</th>
                <th>Language</th>
                <th>status</th>
                <th>publish Date</th>
                <th>Action</th>
            </tr>
        </tfoot>
    </table>
<!-- This file should primarily consist of HTML with a little bit of PHP. -->
</div>
  </div>
</div>