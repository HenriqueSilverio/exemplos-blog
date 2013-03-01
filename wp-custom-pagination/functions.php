<?php

/* -----------------------------------------------------------------------------------------------------
	Custom Wordpress pagination 
	Translated and adapted by: Henrique A. Silvério - http://www.blog.henriquesilverio.com
	Based in: http://www.kriesi.at/archives/how-to-build-a-wordpress-post-pagination-without-plugin
----------------------------------------------------------------------------------------------------- */

function custom_pagination($pages = '', $range = 2) {  
	$showitems = ($range * 2)+1;  

	global $paged;
	if(empty($paged)) $paged = 1;

	if($pages == '') {
		global $wp_query;
		$pages = $wp_query->max_num_pages;
		if(!$pages)	{
			$pages = 1;
		}
	}   

	if(1 != $pages)	{
		echo "<nav class='btn-group paginator'>";
		if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."' class='btn'>Primeira</a>";
		if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."' class='btn'>&lsaquo;</a>";

		for ($i=1; $i <= $pages; $i++) {
			if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )) {
				echo ($paged == $i)? "<a class='btn current'>".$i."</a>":"<a href='".get_pagenum_link($i)."' class='btn' >".$i."</a>";
			}
		}

		if ($paged < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($paged + 1)."' class='btn'>&rsaquo;</a>";  
		if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."' class='btn'>Última</a>";
		echo "</nav>\n";
	}
}

?>