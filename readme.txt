=== Reduce Bounce Rate ===
Contributors: Okoth1
Tags: bounce rate, analytics, google, google analytics, statistics, stats, tracking, visit, time on site
Requires at least: 1.5.1
Tested up to: 3.5.1
Stable tag: 1.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Get the real Time On Site and Bounce Rate in Google Analytics. Simple and effective.

== Description ==

Google Analytics calculates the Time On Site based on the length of time between a user entering your site and their last page view. 

= Features =

Worst case scenario:
A visitor is very interested in one of your pages and takes 2 minutes and 13 seconds to read the article. After this he bookmarks the page and leaves. 
This visitor stayed 2 minutes and 13 seconds on your page, but never interacted with it. To Google that is a bounce! And bounced visits are marked 0:00 Time on Site. Not fair, right?

Another bad scenario:
A visitor goes to your website and stays 1 minute and 11 seconds on the first page. Then, he goes to a second page where he stays 1 minute and 12 seconds. Without any interaction on this page, he leaves. Since Google doesn't know how long your visitor stayed on the second page, Google will add only the time the visitor spent on the first page to Analytics. Not fair, right?

This plugin sets this straight. It will tell Google Analytics every 10 seconds that your visitor is still on the page and on top of that it will also let Google know there was some interaction on the page.

This plugin makes use of Google's Event Tracking API and is totally accepted by Google. The result are more accurate Time on Site and Bounce Rate statistics.

Simple and effective. Out-of-the-box.

== Installation ==

1. Upload plugin folder to the /wp-content/plugins/ directory
2. Activate the plugin through the Plugins menu in WordPress
3. See what happened to your Bounce Rates in Google Analytics after one week.

== Frequently Asked Questions ==

= I cannot find the Settings in the Menu =

You are absolutely right. There are no settings. It works out-of-the-box. No action required after the plugin's activation.

= How do I know it is working =

The script will be added to the bottom of your website. You can see the script between the "Begin Real Time on Site and Bounce Rate" and "End Real Time on Site and Bounce Rate" comments.
There is only one condition: you theme needs to make use of wp_footer(). If this is not present, the plugin will not work.

After some days, you will probably see the Bounce Rate drop in Google Analytics. Then you will know it is working.

= Does it matter whether I use the old or new tracking code? =

No.

== Screenshots ==

1. Increase in average visit duration
2. Decrease in bounce rate

== Changelog ==

= 1.1 =
* Changed screenshots
* May 11, 2013

= 1.0 =
* Initial release
* May 9, 2013