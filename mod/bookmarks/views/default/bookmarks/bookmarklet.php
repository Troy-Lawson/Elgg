<?php
/**
 * Elgg get bookmarks bookmarklet view
 *
 * @package ElggBookmarks
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 * @author Curverider <info@elgg.com>
 * @copyright Curverider Ltd 2008-2010
 * @link http://elgg.org/
 */

$page_owner = page_owner_entity();
$bookmarktext = elgg_echo("bookmarks:this");

if ($page_owner instanceof ElggGroup) {
	$bookmarktext = sprintf(elgg_echo("bookmarks:this:group"), $page_owner->name);
	$name = "group:$page_owner->guid";
} else {
	$name = $page_owner->username;
}

if (!$name && ($user = get_loggedin_user())) {
	$name = $user->username;
}

?>
<h3><?php echo elgg_echo('bookmarks:browser_bookmarklet')?></h3>
<a href="javascript:location.href='<?php echo $vars['url']; ?>pg/bookmarks/<?php echo $name; ?>/add?address='+encodeURIComponent(location.href)+'&title='+encodeURIComponent(document.title)"> <img src="<?php echo $vars['url']; ?>_graphics/elgg_bookmarklet.gif" border="0" title="<?php echo elgg_echo('bookmarks:this');?>" /> </a>
<br />
<a class="link" onclick="elgg_slide_toggle(this,'#elgg_sidebar','.bookmarklet');">Instructions</a>

<div class="bookmarklet hidden">
	<p><?php echo elgg_echo("bookmarks:bookmarklet:description"); ?></p>
	<p><?php echo elgg_echo("bookmarks:bookmarklet:descriptionie"); ?></p>
	<p><?php echo elgg_echo("bookmarks:bookmarklet:description:conclusion"); ?></p>
</div>