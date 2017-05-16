<?php
require_once ( '/home/ckww/AP/IXRlib.php' );

class autoPost
{
	private $_id;
	private $_user;
	private $_path;
	private $_url;
	private $_title;
	private $_content;
	private $_tags;
	private $_categories;
	private $_excerpt;
	private $_postData = array();
	
	public function prepPost($GLOBALS['IDENTIFIER'])
	{
	 if (!isset($GLOBALS['IDENTIFIER'])) {
	    echo 'could not find identifier ';
	    }
			$this->_id = $GLOBALS['IDENTIFIER'];
			$this->_user = $GLOBALS['USER'];
			$this->_path = $GLOBALS['PATH'];
			$this->_url = $_SERVER['SERVER_NAME'];
	}

	public function createPost($title,$body,$category,$source,$tags)
	{
	//	$customfields=array('key'=>'sourceFeed', 'value'=>$source); // Custom field
		$title = htmlentities($title,ENT_NOQUOTES,$encoding);
		$post_tags = htmlentities($tags,ENT_NOQUOTES,$encoding); 
		$post_excerpt = htmlentities($body,ENT_NOQUOTES,$encoding); 
			
		$myPost = array(
             'title'=>$title,
             'description'=>$body,
             'mt_allow_comments'=>0,
             'post_type'=>'post',	
			 'post_status'   => 'publish',
             'post_tags'=>$tags,
             'categories'=>array($category),
			// 'custom_fields' => array($customfields),
             );
			 
			$post_id = wp_insert_post($myPost, $wp_error);
			
			wp_set_post_tags( $post_id, $tags, 'true' );
			wp_set_post_categories( $post_id, $category, 'true' );
	
		return $post_id;
	}

	public function saveImage($imgurl)
	{
		//add time to the current filename
		$name = basename($imgurl);
		list($txt, $ext) = explode(".", $name);
		$name = $txt.time();
		$name = $name.".".$ext;
		//check if the files are only image / document
		if($ext == "jpg" or $ext == "png" or $ext == "gif" or $ext == "doc" or $ext == "docx" or $ext == "pdf"){
		//here is the actual code to get the file from the url and save it to the uploads folder
		//get the file from the url using file_get_contents and put it into the folder using file_put_contents
		$upload = file_put_contents($PATH."/wp-contents/uploads/".$name,file_get_contents($imgurl));
		//check success
		return $upload;
		}
	}
			
	public function uploadAttachImage($image, $postId)
	{
		// $filename should be the path to a file in the upload directory.
		$filename = $image;
		// The ID of the post this attachment is for.
		$parent_post_id = $postId;
		// Check the type of file. We'll use this as the 'post_mime_type'.
		$filetype = wp_check_filetype( basename( $filename ), null );
		// Get the path to the upload directory.
		$wp_upload_dir = wp_upload_dir();
		// Prepare an array of post data for the attachment.
		$attachment = array(
			'guid'           => $wp_upload_dir['url'] . '/' . basename( $filename ), 
			'post_mime_type' => $filetype['type'],
			'post_title'     => preg_replace( '/\.[^.]+$/', '', basename( $filename ) ),
			'post_content'   => '',
			'post_status'    => 'inherit'
		);
		// Insert the attachment.
		$attach_id = wp_insert_attachment( $attachment, $filename, $postId );
		// Make sure that this file is included, as wp_generate_attachment_metadata() depends on it.
		require_once( $url.'/wp-admin/includes/image.php' );
		// Generate the metadata for the attachment, and update the database record.
		$attach_data = wp_generate_attachment_metadata( $attach_id, $filename );
		wp_update_attachment_metadata( $attach_id, $attach_data );
		set_post_thumbnail( $postId, $attach_id );
		return ($attach_id);
	}
}