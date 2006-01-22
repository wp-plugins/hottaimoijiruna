<?php 
/*
Plugin Name: Hottaimoijiruna
Plugin URI: http://jamietalbot.com/wp-hacks/hottaimoijiruna/
Description: AJAX powered clock for WordPress.<br/>Licensed under the <a href="http://www.opensource.org/licenses/mit-license.php">MIT License</a>, Copyright &copy; 2005 Jamie Talbot.
Version: 0.3
Author: Jamie Talbot
Author URI: http://jamietalbot.com/
*/ 

/*
Hottaimoijiruna - AJAX powered clock for WordPress.
Copyright (c) 2005 Jamie Talbot

Permission is hereby granted, free of charge, to any person
obtaining a copy of this software and associated
documentation files (the "Software"), to deal in the
Software without restriction, including without limitation
the rights to use, copy, modify, merge, publish,
distribute, sublicense, and/or sell copies of the Software,
and to permit persons to whom the Software is furnished to
do so, subject to the following conditions:

The above copyright notice and this permission notice shall
be included in all copies or substantial portions of the
Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY
KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE
WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR
PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS
OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR
OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR
OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE
SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
*/

define ("HOTTA_DIR", "wp-content/plugins/");
define ("HOURS_FROM_GMT", 9); // Set this to your timezone
define ("HOTTA_TAG", "span"); // The tag you want the clock to appear in.

// Any extra attributes for the display tag.  Make sure there is a space at the start.
define ("HOTTA_ATTRIBUTES", ' style="display: block; text-align: center;"');

function hottaimoijiruna_server() 
{
	$zone = 3600 * HOURS_FROM_GMT;
	$ima = gmdate('l, jS F', time() + $zone) . "<br />" . gmdate('g', time() + $zone) . "<span class=\"blink\">:</span>" .  gmdate('i a', time() + $zone);
	return $ima;
}

function hottaimoijiruna()
{
?>
<!-- Hottaimoijiruna - AJAX powered clock for WordPress. -->
<!-- Copyright (c) 2005-2006 Jamie Talbot -->
<<?php echo HOTTA_TAG ?> id="jikan"<?php echo HOTTA_ATTRIBUTES ?>></<?php echo HOTTA_TAG ?>>
<script type="text/javascript" src="<?php echo get_settings('home') ?>/wp-includes/js/tw-sack.js"></script>
<script type="text/javascript">
//<![CDATA[

function imananji(milliseconds) 
{
	var timerID = 0;
	if(timerID) clearTimeout(timerID);
	if (hottaimoijiruna()) timerID = setTimeout("imananji(60000)", milliseconds);
}

function hottaimoijiruna()
{
	var script_uri = "<?php HOTTA_DIR ?>hottaimoijiruna.php";
	var jikan = document.getElementById('jikan');
	
	if (!jikan) return false;
	hotta = new sack(script_uri);
  if (hotta.failed)
	{
		jikan.innerHTML = "(Clock Disabled)"
		return false;
	}
  hotta.myResponseElement = jikan;
  hotta.method = 'POST';
  hotta.onCompletion = function() 
	{
		hotta.myResponseElement.innerHTML = hotta.response;
	};
  hotta.runAJAX('hotta=true');
  return true;
}
<?php $milliseconds = 1000 * (60 - gmdate('s', time() + (3600 * HOURS_FROM_GMT))); ?>
imananji(<?php echo $milliseconds ?>);
//]]>
</script>
<?php 
}

if (isset($_POST['hotta']) && (true ==$_POST['hotta']))
{
	echo hottaimoijiruna_server();
	exit;
}

?>