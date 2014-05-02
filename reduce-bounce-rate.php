<?php
/*
Plugin Name: Reduce Bounce Rate
Plugin URI: http://wordpress.org/extend/plugins/reduce-bounce-rate/
Description: Get the real Bounce Rate and pageviews into Google Analytics.
Author: Okoth1
Version: 2.1
License: GPLv3

	This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see http://www.gnu.org/licenses/.
*/

function rbr_load_scripts($hook)
{
	global $rbr_settings_page;
	if($hook != $rbr_settings_page) 
	return;
wp_enqueue_style( 'rbr-style', plugins_url( 'reduce-bounce-rate/css/rbr-style.css' , dirname(__FILE__) ) );
wp_enqueue_script( 'rbr-jquery', plugins_url( 'reduce-bounce-rate/js/rbr-jquery.js' , dirname(__FILE__) ) );
}
add_action('admin_enqueue_scripts', 'rbr_load_scripts');

$rbr_defaults=array(
	'rbr_type'=>'gajs',
	'rbr_place'=>'footer',
	'rbr_scroll'=>'scrollyes',
	'rbr_event'=>10,
	'rbr_noevent'=>'',
	'rbr_nomaxtime'=>'',
	'rbr_time'=>900
);

function rbr_init()
{
	global $rbr_defaults;
	foreach($rbr_defaults as $optName=>$optDefault)
	{
		if(!get_option($optName))
		{
			update_option($optName,$optDefault);
		}
	}
}
add_action("init","rbr_init");

function rbr_options() 
{ ?>

<h1>Reduce Bounce Rate Options</h1>
<hr />
<?php 
if($_POST['rbr_show'] == 'go') 
{
	$rbrtype = $_POST['rbr_type'];
	update_option('rbr_type', $rbrtype);
	
	$rbrplace = $_POST['rbr_place'];
	update_option('rbr_place', $rbrplace);
	
	$rbrscroll = $_POST['rbr_scroll'];
	update_option('rbr_scroll', $rbrscroll);
	
	$rbrnoevent = $_POST['rbr_noevent'];
	update_option('rbr_noevent', $rbrnoevent);
	
	$rbrnomaxtime = $_POST['rbr_nomaxtime'];
	update_option('rbr_nomaxtime', $rbrnomaxtime);	

	$rbrevent = $_POST['rbr_event'];
	//clean the input, only integer numbers are allowed here
	preg_match_all('/(\d+)(\D|\b|$)/smUi',$rbrevent,$m,PREG_PATTERN_ORDER);
	if(count($m[0])>0)
	{
		$rbrevent=(int)$m[1][0];
	}
	else
	{
		$rbrevent=0;
	}
	//clean the input, only integer numbers are allowed here
	update_option('rbr_event', $rbrevent);
	
	$rbrtime = $_POST['rbr_time'];
	//clean the input, only integer numbers are allowed here
	preg_match_all('/(\d+)(\D|\b|$)/smUi',$rbrtime,$m,PREG_PATTERN_ORDER);
	if(count($m[0])>0)
	{
		$rbrtime=(int)$m[1][0];
	}
	else
	{
		$rbrtime=0;
	}
	//clean the input, only integer numbers are allowed here
	update_option('rbr_time', $rbrtime);
?>
<div class="notif"><p><?php _e('<span class="bigbold">&#10004;</span> Options saved' ); ?></p></div>
<?php 
} else 
{
	$rbrtype = get_option('rbr_type');
	$rbrplace = get_option('rbr_place');
	$rbrscroll = get_option('rbr_scroll');
	$rbrevent = get_option('rbr_event');
	$rbrnoevent = get_option('rbr_noevent');
	$rbrtime = get_option('rbr_time');
	$rbrnomaxtime = get_option('rbr_nomaxtime');
}
?>
<form class="script-form" name="rbr_form" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
<fieldset>
<input type="hidden" name="rbr_show" value="go">
<h2>Tracking Code</h2>
<p>Asynchronous Syntax (ga.js) or Universal Analytics tracking code (analytics.js)</p>
<label class="trackingtype">
<input type="radio" id="radio1" name="rbr_type" <?php if($rbrtype=='gajs'){ ?> checked="checked" <?php } ?> value="gajs" size="20">
ga.js (Default)</label>
<br />
<label class="trackingtype">
<input type="radio" id="radio2" name="rbr_type" <?php if($rbrtype=='analyticsjs'){ ?> checked="checked" <?php } ?> value="analyticsjs" size="20">
analytics.js </label>
<div class="jbut">Info</div>
<div class="jslid"><span class="jtbold">How do I know what tracking code I am using?</span>
<p>Look at the page's source code.</p>
<p>The ga.js tracking code looks more or less like this</p>
<?php 
highlight_string(
"<script type='text/javascript'>
var _gaq = _gaq || [];
_gaq.push(['_setAccount', 'UA-XXXXX-X']);
_gaq.push(['_trackPageview']);
(function() {
var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
})();
</script>"); 
?>
<br />
<br />
<p>The analytics.js tracking code looks like this</p>
<?php highlight_string(
"<script>
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
ga('create', 'UA-XXXX-Y', 'auto');
ga('send', 'pageview');
</script>"); 
?>
<br />
<br />
<p> Most people use ga.js.</p>
</div>
<h2>Code placement</h2>
<p>Where do you want to put the code?</p>
<label class="place">
<input type="radio" id="radio3" name="rbr_place" <?php if($rbrplace=='footer'){ ?> checked="checked" <?php } ?> value="footer" size="20">
Footer (Recommended) </label>
<br />
<label class="place">
<input type="radio" id="radio4" name="rbr_place" <?php if($rbrplace=='header'){ ?> checked="checked" <?php } ?> value="header" size="20">
Header (make sure the code is placed after your Google Analytics tracking code) </label>
<div class="jbut">Info</div>
<div class="jslid">
<p>There are a couple of reasons why it’s better to add the plugin’s code to the footer. One is that this code should run after the Google Analytics code, which is probably in the head of your webpage. When you add the plugin’s code to the footer you’ll make sure that it runs after the Analytics code.</p>
<p>A second reason is that this code runs after your webpage has loaded. When the code is placed in the head, your webpage has to wait a little longer before it can start loading (and people can see the webpage).</p>
</div>
<h2>Scroll on page</h2>
<p>Do you want to track page scrolls?</p>
<label class="radio">
<input type="radio" id="radio5" name="rbr_scroll" <?php if($rbrscroll=='scrollyes'){ ?> checked="checked" <?php } ?> value="scrollyes" size="20">
Yes (Recommended) </label>
<br />
<label class="radio">
<input type="radio" id="radio6" name="rbr_scroll" <?php if($rbrscroll=='scrollno'){ ?> checked="checked" <?php } ?> value="scrollno" size="20">
No </label>
<div class="jbut">Info</div>
<div class="jslid">
<p>It will only fire an event the first time someone scrolls a page. It is a good indication whether people like the page or not.</p>
<p>It doesn’t say all, though. In some situations there is no scroll event. The text on your page could be so little that people don’t have to scroll. Screen resolutions also matters; your content may not fit on your screen, but maybe someone else has a huge screen with a high resolution.</p>
<p>When people scroll an event will be sent to Analytics which means there is no bounce.</p>
</div>
<h2>Fire an event</h2>
<p>Every how many seconds do you want to send the message to Analytics that people are still on the page? <span class="whole">Whole numbers only.</span></p>
<label class="textevent"> Every
<input type="text" id="text1" name="rbr_event" value="<?php echo $rbrevent;?>" size="1">
seconds</label>
<br />
<br />
<label class="textnoevent">
<input type="checkbox" id="noevent" name="rbr_noevent" <?php if($rbrnoevent=='noeventyes'){ ?> checked="checked" <?php } ?> value="noeventyes" size="20">
<span class="boldit">I don't want to use time events.</span></label>
<div class="jbut">Info</div>
<div class="jslid">
<p>Google’s limits are 10 million hits per month per property and 500 hits per session. For analytics.js is an additional limit of 200,000 hits per visitor per day. If you go over this limit, additional hits will not be processed for that session (<a class="jtbold" href="https://developers.google.com/analytics/devguides/collection/ios/limits-quotas" target="new">Limits and Quotas</a>)</p>
<p><span class="jtbold">Property</span>. Property means a group of web pages that are linked to an Google Analytics Account.<br />
<span class="jtbold">Hit</span>. A Hit may be a call to the Google Analytics system for instance by Javascript (ga.js, analytics.js), Silverlight, Flash, and Mobile. A Hit may currently be a page view, a transaction, item, or event. <br />
<span class="jtbold">Session</span>. A session is a minimum of 30 minutes long, but will not end until a visitor is inactive for at least 30 minutes. "Inactive" means, more than 30 minutes has passed since the last hit to GA for that visitor. Visitors that leave your site and return within 30 minutes are counted as part of the original session.</p>
<p>This plugin setting generates the most hits. If you want to send an event every 10 seconds to Analytics, you’ll generate 20 hits every 3 minutes for the page view and 10-seconds events only. Other events that are fired (e.g. with another tracking plugin or manual code to links) will come on top of that.<br />
You don’t need to worry if you have a relatively small number of visitors, but with large numbers of visitors you might run out of hits per month.</p>
<p>You should still be OK when you have less than 11,500 visits (sessions) a day. The 11,500 visits created 27,000 pageviews and 300,000 events. Multiply this with 30 and you’re still below 10 million hits per month. Please let me know if you have other ideas about the calculation.</p>
<p>If you exceed this limit you could set the event time to a higher number. Less events will then be fired. You could also reduce the maximum tracking time (next setting).</p>
</div>
<h2>Maximum Tracking Time</h2>
<p>How long do you want to track people on a single page (in seconds). <span class="whole">Whole numbers only.</span></p>
<label class="texttime"> Log for
<input type="text" id="text2" name="rbr_time" value="<?php echo $rbrtime;?>" size="3">
seconds. </label>
<br />
<br />
<label class="textnomaxtime">
<input type="checkbox" id="nomaxtime" name="rbr_nomaxtime" <?php if($rbrnomaxtime=='nomaxtimeyes'){ ?> checked="checked" <?php } ?> value="nomaxtimeyes" size="20">
<span class="boldit">I don't want to set a Maximum Tracking Time.</span></label>
<div class="jbut">Info</div>
<div class="jslid">
<p>Default is 15 minutes.</p>
<p>You should look at the Avg. Time on Page stats to find out what Maximum Tracking Time is right for your website. Large content or a video website need a bigger Maximum Tracking Time than a website with one-liners.</p>
</div>
<br />
<br />
<button type="submit" class="button-primary">Save options</button>
</fieldset>
</form>
<?php
}
function rbr_settings() 
{
	global $rbr_settings_page;
	$rbr_settings_page = add_options_page("rbr", "Reduce Bounce Rate", 'manage_options', "rbr", "rbr_options");
}
add_action('admin_menu', 'rbr_settings');

function rbr_scripts() 
{
	$rbrtype = get_option('rbr_type');
	if(!is_admin() && $rbrtype=='gajs')
	{
		$rbrplace = get_option('rbr_place');
		wp_enqueue_script('rbr_scripts', plugins_url('js/gajs.js',__FILE__), array('jquery'),'',($rbrplace=='footer'));
	} else 
		{
			$rbrplace = get_option('rbr_place');
			wp_enqueue_script('rbr_scripts', plugins_url('js/analyticsjs.js',__FILE__), array('jquery'),'',($rbrplace=='footer'));
		}
}
add_action('wp_enqueue_scripts', 'rbr_scripts', 999);

function rbr_st_control_vars() 
{
	if(!is_admin())
	{
		$rbrscroll = (get_option('rbr_scroll')=="scrollyes");
		$rbrevent = get_option('rbr_event');
		$rbrtime = get_option('rbr_time');
		$rbrnoevent = (get_option('rbr_noevent')=="noeventyes");
		$rbrnomaxtime = (get_option('rbr_nomaxtime')=="nomaxtimeyes");
?>
<script type="text/javascript">
var trackScrolling=<?php echo ($rbrscroll===true)?'true':'false';?>;
var stLogInterval=<?php echo $rbrevent?>*1000;
var cutOffTime=<?php echo $rbrtime?>;
var trackNoEvents=<?php echo ($rbrnoevent===true)?'true':'false';?>;
var trackNoMaxTime=<?php echo ($rbrnomaxtime===true)?'true':'false';?>;
<?php
	if(is_singular())
{?>
var docTitle='<?php echo str_replace("'","\'",the_title('','',false));?>';
<?php
}?>
</script>
<?php
	}
}
add_action('wp_head','rbr_st_control_vars',1);
?>