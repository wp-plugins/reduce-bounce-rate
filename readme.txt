=== Reduce Bounce Rate ===
Contributors: Okoth1
Tags: bounce rate, seo, analytics, google, google analytics, statistics, stats, tracking, time on site
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=okoth1%40gmail%2ecom&item_name=Okoth1&item_number=plugin¤cy_code=USD&bn=PP%2dDonationsBF%3abtn_donateCC_LG%2egif%3aNonHosted
Requires at least: 2.6
Tested up to: 4.3
Stable tag: 3.2.3
License: GPLv3
License URI: http://www.gnu.org/licenses/gpl-3.0.html

Get the real Bounce Rate and Time On Site in Google Analytics. Simple and effective.

== Description ==
Get the real Time On Site and Bounce Rate in Google Analytics. Google Analytics calculates the Time On Site based on the length of time between a user entering your site and their last page view. This won't give you the REAL Time on Site and Bounce Rate stats.


= FEATURES =
* Compatible with Google Analytics by Yoast
* Old and new tracking codes are supported
* Code placement choice between header and footer
* Track page scrolls
* Change time event frequency
* Set maximum tracking time
* Disable for administrator role


**Worst case scenario**
A visitor is very interested in one of your pages and takes 2 minutes and 13 seconds to read the article. After this he bookmarks the page and leaves. 
This visitor stayed 2 minutes and 13 seconds on your page, but never interacted with it. To Google that is a bounce! And bounced visits are marked 0:00 Time on Site. Not fair, right?

**Another bad scenario**
A visitor goes to your website and stays 1 minute and 11 seconds on the first page. Then, he goes to a second page where he stays 1 minute and 12 seconds. Without any interaction on this page, he leaves. Since Google doesn't know how long your visitor stayed on the second page, Google will add only the time the visitor spent on the first page to Analytics. Not fair, right?

>This plugin sets this straight. It will tell Google Analytics every 10 seconds that your visitor is still on the page and that there was some interaction on that page. Your page will be “unbounced”.

It's all based on a script made by Brian Cray and is totally accepted by Google (see [Other Notes]( http://wordpress.org/plugins/reduce-bounce-rate/other_notes/) for more info). The results are more accurate Time on Site and Bounce Rate statistics.


== Installation ==
1. Upload plugin folder to the /wp-content/plugins/ directory
1. Activate the plugin through the Plugins menu in WordPress
1. See what happens to your Bounce Rates in Google Analytics after a day.


== Other Notes ==
**Useful links**

* [Original code by Brian Cray]( http://briancray.com/posts/time-on-site-bounce-rate-get-the-real-numbers-in-google-analytics)

* [Google suggests the main plugin's method]( http://analytics.blogspot.com/2012/07/tracking-adjusted-bounce-rate-in-google.html)


== Frequently Asked Questions ==
= Where can I find the Settings Page? =

Dashboard -> Settings -> Reduce Bounce Rate.

= Does it work out-of-the-box? =

Yes, if you use the Universal Analytics (analytics.js). If you are still using the older ga.js tracking code or if Yoast's WordpPress SEO plugin is active, you have go to the Settings Page to choose the one you use. There you can fine-tune how and when you want to send or block info to Analytics.

= How do I know it is working? =

Check you page source for a line that ends with: /wp-content/plugins/reduce-bounce-rate/js/analyticsjs.js'></script> for analytics.js, /wp-content/plugins/reduce-bounce-rate/js/gajs.js'></script> for ga.js and /wp-content/plugins/reduce-bounce-rate/js/ga4wpjs.js'></script> for working together with WordPress SEO.

By default, the script will be added to the bottom of the page. If this line is not present, your theme might not have wp_footer() in the footer.php.

After a day, you should see the Bounce Rate drop in Google Analytics. Then you'll know for sure it's working.

= Does it this plugin work for the Universal Analytics (analytics.js) and the (older) Asynchronous Syntax tracking code (ga.js)? =

Yes. By default the plugin works for analytics.js. Just change it to ga.js on the Settings Page to make it work for ga.js.

= Can I set the maximum tracking time? =

Yes, on the Settings Page.

= Can I choose the time event frequency myself? =

Yes, on the Settings Page.

= Will Google still like me after I manipulated the Analytics stats? =
Yes. This plugin uses the same tweak Google suggested on it's own Blog (see [Other Notes]( http://wordpress.org/plugins/reduce-bounce-rate/other_notes/) for the link to the page). 

= Will I loose my PageRank by using this plugin? =
No. Google Analytics doesn't have anything to do with PageRank. Google doesn't use any statistics from your Analytics pages for page ranking. Google has it's own way of getting the stats it wants to use. This also means that you cannot influence your PageRank with this plugin.

== Screenshots ==
1. Increase in average visit duration (plugin installed on April 28)
2. Decrease in bounce rate (plugin installed on April 28)
3. Settings Page


== Changelog ==
= 3.2.3 =
* Checked with WP 4.3
* All good!
* August 8, 2015

= 3.2.2 =
* Included ga4wpjs.js in the tags dir
* Checked with WP 4.2.1
* All good!
* May 2, 2015

= 3.2.1 =
* analytics.js has become default instead of ga.js
* adjusted FAQ text 
* Checked with WP 4.2
* All good!
* April 21, 2015

= 3.2 =
* Fixed "Uncaught TypeError: undefined is not a function" error.
* March 20, 2015

= 3.1 =
* Checked with WP 4.1.1
* All good!
* February 25, 2015

= 3.1 =
* Compatible with Google Analytics by Yoast plugin
* Added option on Options page to choose for working with Google Analytics by Yoast plugin
* Changed default tracking script from ga.js to analytics.js
* Checked with WP 4.1.0
* All good!
* December 17, 2014


= 3.0 =
* Added option to disable plugin
* Added option to remove plugin code when user is an Admin
* Greetings to the animals!
* October 4, 2014

= 2.4 =
* Added plugin icon
* Checked with WP 4.0
* All good!
* September 4, 2014

= 2.3 =
* Checked with WP 3.9.2
* All good!
* August 7, 2014

= 2.2 =
* Added Settings link on Plugin page.
* Checked with WP 3.9.1
* All good!
* May 9, 2014

= 2.1 =
* Minified the javascript and css files.
* Checked with WP 3.9
* All good!
* May 2, 2014

= 2.0 =
* Completely rewritten the plugin
* Added Settings Page
* Added option old or new tracking code
* Added option code placement
* Added option scroll tracking
* Added option choice time event frequency
* Added option maximum tracking time
* Added screenshot Settings Page
* Checked with WP 3.8.2
* All good!
* April 10, 2014

= 1.5 =
* Checked WP 3.8
* All good!
* December 13, 2013

= 1.4 =
* Checked WP 3.7
* All good!
* October 23, 2013

= 1.3 =
* Fixed error: ReferenceError: _gaq is not defined
* Thanks to Martin for noticing it
* July 6, 2013

= 1.2 =
* Checked WP 3.6
* All good!
* June 22, 2013

= 1.1 =
* Change screenshots
* May 11, 2013

= 1.0 =
* Initial release
* May 9, 2013


== Upgrade Notice ==
= 2.0 =
The plugin is completely rewritten. There is a Settings Page to fine-tune how and when you want to send info to Analytics. Checked with WP 3.8.2. All good!

= 1.5 =
Checked with WP 3.8. All good!

= 1.4 =
Checked with WP 3.7. All good!

= 1.3 =
Fixed error: _gaq is not defined

= 1.2 =
Checked with WP 3.6. All good!

= 1.1 =
Added screenshots