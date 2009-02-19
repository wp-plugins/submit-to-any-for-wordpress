<?php

/*

Plugin Name: Submit to Any for Wordpress

Plugin URI: http://www.jjtcomputing.co.uk/blog/

Description: Digg, Del.icio.us, Slahdot, StumbleUpon counters and submit buttons.

Version: 0.2

Author: Jonathan ELlse

Author URI: http://www.jonathanellse.co.cc/

*/



/*  Copyright 2009  Submit to Any for Wordpress  (email : submittoany@gmail.com)



    This program is free software; you can redistribute it and/or modify

    it under the terms of the GNU General Public License as published by

    the Free Software Foundation; either version 2 of the License, or

    (at your option) any later version.



    This program is distributed in the hope that it will be useful,

    but WITHOUT ANY WARRANTY; without even the implied warranty of

    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the

    GNU General Public License for more details.



    You should have received a copy of the GNU General Public License

    along with this program; if not, write to the Free Software

    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA

*/



add_filter('the_content', 'add_submittoany');



function add_submittoany($content)

{

$path= '/wp-content/plugins/submit-to-any/';

$submittoany= '<p>



<table class="submittoany" cellspacing="0" cellpadding="0" border="0" style="width: 300px; height: 50px; text-align: left; margin-left: auto; margin-right: auto;">

<tbody>

<tr>

				

<td style="text-align: center;">

<a href="'. get_bloginfo('rss_url').'" rel="nofollow"><img src="'.get_option('siteurl').$path.'/rss_sm.png" alt="RSS Feed" title="RSS Feed" style="border: 0px solid ; width: 48px; height: 48px;"/></a>

</td>



<td style="text-align: center;">

<a href="http://technorati.com/faves?add='.get_permalink().'" rel="nofollow"><img src="'.get_option('siteurl').$path.'/technorati_sm.png" alt="Add to Technorati Favorites" title="Add to Technorati Favorites"style="border: 0px solid ; width: 48px; height: 48px;"/></a>

</td>

                                

<td style="text-align: center;">

<a href="http://del.icio.us/post?url='.get_permalink().'&title='.the_title('', '', false).'" rel="nofollow"><img src="'.get_option('siteurl').$path.'/del.icio.us_sm.png" alt="Add to Del.icio.us" title="Add to Del.icio.us" style="border: 0px solid ; width: 48px; height: 48px;"/></a>

</td>

				

<td style="text-align: center;">

<a href="http://www.stumbleupon.com/submit?url='.get_permalink().'&title='.the_title('', '', false).'" rel="nofollow"><img src="'.get_option('siteurl').$path.'/stumble_sm.png" alt="Stumble It!" title="Submit to StumbleUpon" style="border: 0px solid ; width: 48px; height: 48px;"/></a>

</td>

				

<td style="text-align: center;">

<a href="http://digg.com/submit?phase=2&url='.get_permalink().'" rel="nofollow"><img src="'.get_option('siteurl').$path.'/digg_sm.png" alt="Digg It!" title="Digg This!" style="border: 0px solid ; width: 48px; height: 48px;"/></a>

</td>

				

</tr>

</tbody>

</table>



</p>';



	return $content.$submittoany;	

}
?>

<div class="wrap">
<h2>Submit to Any</h2>

<form method="post" action="options.php">
<?php wp_nonce_field('update-options'); ?>

<table class="form-table">

<tr valign="top">
<th scope="row">Give Author Credit</th>
<td><input type="text" name="submittoany_givecredit" value="<?php echo get_option('submittoany_givecredit'); ?>" /></td>
</tr>

</table>

<input type="hidden" name="action" value="update" />
<input type="hidden" name="page_options" value="submittoany_givecredit" />

<p class="submit">
<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
</p>

</form>
</div>



<?php

function submittoany_add_admin()
{
	add_options_page('Submit to Any', 'Submit to Any', 7, 'submittoany', 'submittoany_option');
}

function submittoany_install()
{ 
	add_option('submittoany_link',	"1", "Whether to give author credit");	
}


add_action('admin_menu', 'submittoany_add_admin');
register_activation_hook(__FILE__,"submittoany_install");
        
?>