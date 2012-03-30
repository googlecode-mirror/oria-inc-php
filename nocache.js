// nocache.js
// Disable browser caching by redirecting to current page with a timer parameter
// This file should be included in <head> (not body)
// To skip the nocache redirection add '&nocachenow=-1' or '&nocache=0' to your page query string
// Does not support POST requests pages!!! so DO NOT include this file when showing a POST form result
// License: GPLv3
// http://tablefield.com

function nocachenow() {
	var tolerance=3;    // seconds to tolerate cache. should be larger for slower connections. min 2 seconds.
	var now=Math.floor((new Date()).getTime()/1000); // seconds since 1970-01-01
	now=now-1325541600; // seconds since 2012-01-03 (my birthday!)

	var url=document.location.toString().replace(/[\?#].*$/,''); // get current url without cmdline or hash
	var hash=document.location.hash.toString(); // get hash (with leading # if any)
	var cmd=document.location.search.toString().replace(/^\?/,''); // get query string (cmdline) without leading ?
	
	if (cmd=='') {
		// first run - nocache timer wasn't added yet - add it now
		document.location.replace(url+'?&nocachenow='+now+hash); // the '?&' is mandatory for next phase, do not change to '?'
	} else {
		// second or more loading of current page
		var cmdnow=(cmd.match(/[&]nocachenow=([^&]*)/i) || ['','0'])[1];
		cmdnow=1*cmdnow;
		if (cmdnow<0) return; // wait, nocachenow==-1 ? it means skip nocachenow for this page...
		if (now-cmdnow > tolerance) // also go off when cmdnow==0 or other small numbers
		{
			cmd=cmd.replace(/&nocachenow=[^&]*/ig,''); // remove current nocachenow parameter from cmd
			document.location.replace(url + '?' + cmd + '&nocachenow='+now.toString()+hash);
		}
	}
}
if (document.location.search.toString().indexOf('nocache=0')<0)
	nocachenow();

