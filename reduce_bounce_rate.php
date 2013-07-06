<?php
/*
Plugin Name: Reduce Bounce Rate
Plugin URI: http://wordpress.org/extend/plugins/reduce-bounce-rate/
Description: Reduce your bounce rate remarkably by adding some code to the footer (wp_footer() required!). No options, out-of-the-box.
Author: Okoth1
Version: 1.3
License: GPLv2

/* Javascript written by Brian Cray on April 12th, 2011 */


function reduce_bounce_rate() {
echo "<!--Begin Real Time on Site and Bounce Rate -->
<script>
var _gaq = _gaq || [];
(function (tos) {
  window.setInterval(function () {
    tos = (function (t) {
      return t[0] == 50 ? (parseInt(t[1]) + 1) + ':00' : (t[1] || '0') + ':' + (parseInt(t[0]) + 10);
    })(tos.split(':').reverse());
    window.pageTracker ? pageTracker._trackEvent('Time', 'Log', tos) : _gaq.push(['_trackEvent', 'Time', 'Log', tos]);
  }, 10000);
})('00');
</script>
<!--End Real Time on Site and Bounce Rate -->
";
}
add_action('wp_footer', 'reduce_bounce_rate', 100);
?>