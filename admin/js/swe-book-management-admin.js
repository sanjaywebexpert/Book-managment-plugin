(function( $ ) {
	'use strict';

	/**
	 * All of the code for your admin-facing JavaScript source
	 * should reside in this file.
	 *
	 * Note: It has been assumed you will write jQuery code here, so the
	 * $ function reference has been prepared for usage within the scope
	 * of this function.
	 *
	 * This enables you to define handlers, for when the DOM is ready:
	 *
	 * $(function() {
	 *
	 * });
	 *
	 * When the window is loaded:
	 *
	 * $( window ).load(function() {
	 *
	 * });
	 *
	 * ...and/or other possibilities.
	 *
	 * Ideally, it is not considered best practise to attach more than a
	 * single DOM-ready or window-load handler for a particular page.
	 * Although scripts in the WordPress core, Plugins and Themes may be
	 * practising this, we should strive to set a better example in our own work.
	 */
	jQuery('#example').DataTable();
	 
	
	jQuery("#media-upload").click(function(){
		var image = wp.media({
			title: "Upload Book Cover Image",
			multiple:false
		}).open().on("select", function(){
			var files = image.state().get("selection").first();
			//var files = image.state().get("selection");
            var jsonFiles = files.toJSON();
            jQuery("#media-image").attr("src", jsonFiles.url);
            jQuery("#cover_image").val(jsonFiles.url);
			if(jsonFiles.url!=""){
		    jQuery("#show_cover_image").attr("src", jsonFiles.url);
			jQuery("#show_cover_image").show();
			}
            //console.log(jsonFiles);
            /*jQuery.each(jsonFiles,function(index,item){
             console.log(item.title+" , "+item.url);
             });*/
		});
	});
	
	
	// Create Book Self Js
	var ajaxurl = create_book_self.ajaxurl;
	
	jQuery("#add_book_self_frm").validate({
		submitHandler: function () {
		var	postdata = jQuery("#add_book_self_frm").serialize();
		postdata += "&action=admin_ajax_request&param=create_book_self";
		jQuery.post(ajaxurl, postdata, function(response){
			var data = jQuery.parseJSON(response);
				if(data.status ==1){
					alert(data.message);
					setTimeout(function(){
						location.reload()
					}, 300);
				}else{
					alert(data.message);
				}
			});	
		}
	});
	
	
	// Delete Book Self
	jQuery(".btn-delete").click(function(){
			var delete_id = jQuery(this).attr("data-id");
			var delete_item_type = jQuery(this).attr("data-item");
			var confirm_val = confirm("Are you sure, want to delete !");
			if(confirm_val == true ){
			var postdata = "delete_id="+delete_id;
			postdata += "&action=admin_ajax_request&param=delete_"+delete_item_type;	
				jQuery.post(ajaxurl, postdata, function(response){
					var data = jQuery.parseJSON(response);
					if(data.status ==1){
						alert(data.message);
						setTimeout(function(){
							location.reload()
						}, 300);
					}else{
						alert(data.message);
					} 
				});				
			}else{
				
			}
			
	});


	// Add Book Self
	jQuery("#add_booklist").validate({
		submitHandler: function () {
		var	postdata = jQuery("#add_booklist").serialize();
		postdata += "&action=admin_ajax_request&param=create_book";
		jQuery.post(ajaxurl, postdata, function(response){
			var data = jQuery.parseJSON(response);
				 if(data.status ==1){
					alert(data.message);
					setTimeout(function(){
						location.reload()
					}, 300);
				}else{
					alert(data.message);
				}
			});	
		}
	});
	
})( jQuery );