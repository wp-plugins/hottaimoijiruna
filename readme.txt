=== Hottaimoijiruna ===
Tags: hottaimoijiruna, clock, date, time, ajax, timezone
Contributors: majelbstoat

Hottaimoijiruna is a continuously updating AJAX powered clock for your site, with a customisable timezone so that you can display the time of day in your part of the world.

== Installation ==

1. Upload hottaimoijiruna.php to your plugins folder, usually `wp-content/plugins/`
2. Activate the plugin on the plugin screen.
3. Use the Wordpress plugins editor and set "HOURS_FROM_GMT" appropriately for your timezone.
4. In every template that you wish for the clock to appear, give one of your elements an 'id' attribute of "Jikan".  EG: <div id="jikan">Mr Wolf</div>.  The default text is what will appear if your reader doesn't have Javascript.


== Frequently Asked Questions ==

= Can you alter the format of the returned date string? =

Not yet, but you will be able to soon.

= How does it work? =

Every minute hottaimoijiruna makes a call to the server and gets the current time.  It uses SACK, an AJAX Kit by <a href="http://www.twilightuniverse.com/">Gregory Wild-Smith</a>, that comes built in with WordPress 2.0

= It doesn't work! =

Yes it does!  See <a href="http://jamietalbot.com/about/">here</a>.  Have you activated the plugin?  Are you using Wordpress 2.0 or else have SACK installed?  Have you given an element in your template an id="jikan" attribute?  Have you got Javascript enabled?

= Will it work with Wordpress 1.x? =

For 1.2.x - no - it needs the templating system in 1.5+ to put javascript into a post or page.  For 1.5+, probably, but it needs the SACK kit that is in 2.0.  If you <a href=http://twilightuniverse.com/resources/code/sack/">download SACK</a> and put it in the wp-includes/js/ directory, it should work.

= Will it break if the user doesn't have Javascript? =

Nope.  It should degrade nicely, and just leave the default text (or nothing).

= Will it break if the XML call fails? =

Nope.  It should degrade nicely, and say "clock disabled".

= Will this run on every Wordpress page and post? =

Yes.  But if the post or page doesn't have an id="jikan" element defined, it will quit before the first call.

= Do you have an example? =

Have a look at my <a href="http://jamietalbot.com/about/">About Page</a>.

= What's with the stupid name? =

Hottaimoijiruna is Japanese.  It is what some Japanese people think you are saying when you say "What time is is now?"  Try saying it fast and you'll understand.

= So it's kind of a joke? =

Kind of.  Did you laugh?