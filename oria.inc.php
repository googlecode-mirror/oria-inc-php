<?php

/* * *******************************************
  Collection of usefull PHP functions library
  
  filename: oria.inc.php
  author: Oria Adam
  License: GPLv3 (Open Source)
  http://tablefield.com
  http://code.google.com/p/oria-inc-php

 * defines:
  BKSL = string with \

 **** Functions reference ****
  undo_magic_quotes($force=false)
  does: undo damage done by automagic quotes to POST GET and such
  input: $force - optional.
  false = POST GET arrays will get fixed only when magic quotes are on, and will only run once.
  true  = POST GET arrays will get fixed in any case.
  output: nothing
  notes:  function only changes POST GET etc when when magic quotes are on (get_magic_quotes_gpc) or when $force is true.
  old name = oh_no_unescape_post()

  make_seed()
  does: returns timer based random seed.
  for mt_srand() and srand()
  input: none
  output: integer based on microtime()
  notes: srand(make_seed()) and mt_... are executed on including oria,inc.php for case of old php

  jsredirect($to)
  does: redirect to a url and die
  output: echo a javascript string and set header(Location)

  reGet($to=null,$url=null)
  does: recreate a link to current page, with different GET accoarding to $to
  input:
  $to : $_GET style associative array.
  values will be escaped with urlencode().
  to remove all parameters use empty array().
  $url: current url. when missing, use PHP_SELF
  output: url string

  mailparams($params)
  * This function was exported to mailparams.inc.php
  For more info see: http://tablefield.com/mailparams or http://code.google.com/p/mailparams-php
  does: Wrapper for mail() function
  notes: Calling this function is much slower than directly calling mail(), so do not use it when bulk sending.

  decabc($i)
  does: dec2abc. count using letters a-z
  input: integer
  output: string like: a,b...z,aa,ab,ac...az,ba,bb...zz,aaa,aab...,aaz,aba,...zzz...

  randstring($length,$chars='abcdefghijklmnopqrstuvwxyz')
  does: return a random string created from $chars
  input:
  $length: integer, length of output string
  $chars: string, optional set of characters to use. default a to z.
  output: string

  chkbox($field_or_value,$post_array=null)
  does: parse checkbox from html forms
  input:
  when $post_array is given:
  $field_or_value is the html name of the checkbox form field
  when $post_array is omitted:
  $field_or_value is a value taken from the post data
  output: true/false/null
  examples:
  if (chkbox($fname,$_POST))
  if (chkbox($_POST['dagim']))

  chkBool($value,$default_null=true)
  does: parse a boolean value
  input:
  $value:
  any type of boolean value
  for example: true/false/'yes'/'n'/'true'/'false'/'f'/1/0/'1'/'0'
  $default_null:
  when true returns null for unknown values or null or ''
  when false returns original $value for unknown values or null or ''
  output:
  true/false/null/$value

  chkBoolDef($value,$default)
  does: parse a boolean value
  input:
  $value:
  any type of boolean value
  for example: true/false/'yes'/'n'/'true'/'false'/'f'/1/0/'1'/'0'
  $default:
  value to returns for unknown values or null or ''
  output:
  true/false/$default

  tmplsimple($template,$values,$prekey='$',$postkey='')
  * old name tmpsimple
  does: process simple templating system -- replace all occurances of $key in $template with $values[$key]
  input:
  $template:
  string of the tempalte to be processed
  $values:
  array with keys that should be replaced
  $prekey,$postkey:
  optional - the way to mark start and end of a key. for example, for [keys] you need $prekey='[' $postkey=']'.
  output:
  string of the processed template
  notes:
  keys are case sensitive

  assoc_explode($sep,$assign,$string,$ignoredchars=''){
  does: explode a string like "fruit=banana;drink=tea;food=yogurt" to an array of keys and values
  input:
  $sep: separator string. like ";"
  $assign: assignment string. like "="
  $string: "associative" string of keys and values
  $ignoredchars: string of chars to be trimmed from start/end of values. like " "
  output: associative array
  notes: similar to php parse_str() but does not change dots/spaces to underscores

  assoc_implode($sep,$assign,$array,$ignoredchars=''){
  does: implode an array of keys and values back into a string like "fruit=banana;drink=tea;food=yogury"
  input:
  $sep: separator string. like ";"
  $assign: assignment string. like "="
  $array: associative array
  $ignoredchars: string of chars to be trimmed from start/end of values. like " "
  output: "associative" string
  notes: similar to php http_build_query()

  assoc_get_param($sep,$assign,$param,$string,$case_sensitive=true,$ignoredchars="' "){
  does: get a single parameter from a string like "fruit=banana;drink=tea;food=yogury"
  input:
  $sep: separator string. like ";"
  $assign: assignment string. like "="
  $param: parameter name (needle)
  $string: "associative" string (haystack)
  $case_sensitive: is $param case-sensitive?
  $ignoredchars: string of chars to be trimmed from start/end of values. like " "
  output: string
  notes: uses assoc_implode()

  assoc_set_param($sep,$assign,$param,$value,$string,$case_sensitive=true,$ignoredchars="' "){
  does: change a single parameter in a string like "fruit=banana;drink=tea;food=yogury"
  input:
  $sep: separator string. like ";"
  $assign: assignment string. like "="
  $param: parameter name (needle)
  $value: new value to set
  $string: "associative" string (haystack)
  $case_sensitive: is $param case-sensitive?
  $ignoredchars: string of chars to be trimmed from start/end of values. like " "
  output: string
  notes: uses assoc_explode(),assoc_implode()

  validateWhitehat($str,$valid)
  does: white-hat validation of a string
  input: $str string to check
  $valid allowed characters
  output: true/false

  removeWhitehat($str,$valid)
  does: Remove not valid characters from a string
  Return $str without chars not listed in $valid
  input: $str string to check
  $valid allowed characters
  output: string

  removeBlackhat($str,$invalid)
  does: Remove given invalid characters from a string
  Return $str without all the chars listed in $invalid
  input: $str string to check
  $invalid - characters not allowed
  output: string

  Get($key)
  does: wrapper for $_GET
  when $key not found in $_GET return null
  input: string key
  output: $_GET[$key] or null

  Post($key)
  does: wrapper for $_POST
  when $key not found in $_POST return null
  input: string key
  output: $_POST[$key] or null

  Session($key)
  does: wrapper for $_SESSION
  when $key not found in $_SESSION return null
  input: string key
  output: $_SESSION[$key] or null

  zeros($input,$length)
  does: Add leading zeros to a number
  input: $input - a number
         $length - total length of the number
  output: string of $length characters, or the $input number with leading zeros
  notes: Examples: zeros(12,5);    // '00012'
                   zeros('321',3); // '0321'
                   zeros(321,1);   // '321'

  autofilename($dir,$name,$footer,$zeros=4,$startfrom=1)
  does: Find the next available file name. Start counting from $startfrom. 
  input: $dir - the path to look for files
         $name - base file name
         $footer - postfix of the file (usually the file extension with presceding dot, ie '.txt')
         $zeros - how many digits should the number have? to disable leading zeros set it to 0 or 1.
         $startfrom - the number to start couting from.
  output: the file name (without $dir)

  count_autofilename($dir,$name,$footer,$zeros=4,$startfrom=1)
  does: Count the number of sequencing files accoarding to their numbers
  input: see autofilename()
  output: the file 
  notes: Unlike glob(), it stops couting when the series is stopped.
         For example, a bunch of files from 01 to 07, with number 05 missing, would return 4 (and not 6 or 7 as you might expect).
         If you just want to know how many files matching the pettern, use count(glob()).

  timestamp2str($ts)
  does: Convert timestamp to the simplest readable format
  input: a string like  '20030201123456'
  output: a string like '2003/02/01 12:34:56'

  getExtension($filename)
  does: Return the extension part of a file name


  /////////////////// Sql Functions - currently only mysql supported ///////////////////

  sqlGetType()
  does: return sql server type
  input: none
  output: 'mysql'
  notes: other servers may be supported one day... i think i'll get marry by then.

  sqlGetVersion()
  does: return sql server version
  input: none
  output: string
  notes: return "SELECT VERSION()"

  sqlremovestrings($sqlexpression,$replace='')
  does: remove all strings from an sql expression, and replace them with $replace
  input: an sql expression
  output: a strings-free expression. return false in case of an error (unclosed string)
  notes: This function cannot protect against sql injections or other attacks

  sqlvalidate($sqlexpression)
  does: make sure the sql expression is balanced in terms of 'quotes' and (parantheses)
  input: an sql expression
  output: true when the sql expressions looks ok, false otherwise
  notes: This function cannot protect against sql injections or other attacks

  sqle($string)
  does: alias to mysql_real_escape_string($string)
  input: string
  output: string (no quotes here)
  notes: the only purpose of this function is to make the long name of mysql_real_escape_string shorter...
  if input is null return string NULL (without quotes)

  sqlf($string)
  does: escape a string used as sql query field name
  input: string
  output: `string` (always bounded by `back quotes`)
  if input is null return string NULL (without quotes)
  usage example: sqlRun('SELECT '.sqlf($fieldname).' FROM '.sqlf($tablename).' WHERE '.sqlf($keyname).'='.sqlv($value))

  sqlv($string)
  does: escape a string used as sql query value string
  input: string
  output: 'string' (always bounded by 'single quotes')
  if input is null return string NULL (without quotes)
  usage example: sqlRun('SELECT '.sqlf($fieldname).' FROM '.sqlf($tablename).' WHERE '.sqlf($keyname).'='.sqlv($value))

  sqln($string)
  does: escape a string used as sql query value numeric
  input: string of a number
  output: string or '00' (the string is always a number)
  notes: when $string is not numeric return '00'
  if input is null return string NULL (without quotes)
  usage example: sqlRun('SELECT `name` FROM `monkeys` WHERE `id`='.sqln($value))
 
  sqls($string)
  does: escape a string used as sql query search condition
  input: string
  output: 'string' (always bounded by 'single quotes'. % _ are escaped)
  notes: same as sqlv() plus escapes % and _
  if input is null return string NULL (without quotes)

  sqlRun($sql)
  does: execute an sql query
  input: sql query string
  output: sql result
  notes: check sqlError() to know if query went ok
  usage example: if (!sqlRun('SELECT count(*) FROM '.sqlf($tablename))) die("Error: ".sqlStyleError()); else echo "Success";

  sqlError()
  does: return last sql query command error level
  input: none
  output: error code number.
  0 = success

  sqlVar($var)
  does: return an sql variable
  input: sql var name
  output: sql var value
  notes: uses SHOW VARIABLES

  sqlStyleError($force_reply=false)
  does: return default sql html error message
  input: optional $force_reply
  when true, return an error message even when no error occured
  output: html string, or '' when no error occured
  notes: uses the following css classes: csSQLErrorBox, csSQLErrorText, csSQLLastQuery
  usage example: if (!sqlRun('SELECT count(*) FROM '.sqlf($tablename))) die("Error: ".sqlStyleError()); else echo "Success";

  sqlLastQuery()
  does: return last query executed using sqlRun
  input: nothing
  output: sql query string

  sqlLastInsertID()
  does: after INSERT command - return last auto numbered ID
  input: nothing
  output: number

  sqlLastInsert()
  alias to sqlLastInsertID()

  sqlLastID()
  alias to sqlLastInsertID()

  sqlFoundRows()
  does: return all rows found with last query's WHERE condition,
  when LIMIT is ignored
  input: nothing.
  but you must state SELECT SQL_CALC_FOUND_ROWS in your query.
  output: number, or null

  sqlAffectedRows()
  does: return number of affected rows of last query
  input: nothing
  output: number

  db_connect($dbdata,$die='db connect error. please notify the administrator.')
  does: Connect to Database
  input:
  $dbdata associative array stracture:
  type: type of database. values: mysql
  host,user,pass: database connection parameters, when connection fail try localhost.
  name: optional name of database to select. when database is missing try to create it.
  charset: optional set vars character_set_connection _client _database
  collation: optional set vars collation_connection _client _server

  $dbdata can also be an array of $dbdata objects.
  in that case the function will try to connect to each of the databases
  one after the other, until success.

  $die: can be false or string.
  by default: string "db connect error. please notify the administrator."
  false or empty: on fail the function will returns false.
  string: on fail php process will be killed by calling die($die).
  output: true/false
  can also kill php script (see $die parameter)

  **** html fixes (escape) ///////////////////

  fix4url($string)
  does: escape a string meant for url
  input: string
  output: url encoded string

  fix4html1($string)
  does: escape a string meant for html value bounded by single quotes ''
  input: string
  output: string
  ' are replaced with &#39;

  fix4html2($string)
  does: escape a string meant for html value bounded by double quotes ""
  input: string
  output: string
  " are replaced with &quot;

  fix4html3($string)
  does: escape a string meant for html value (not bounded)
  input: string
  output: string
  <> are replaced with &lt;&gt;
  line breakes are replaced with <BR>

  fix4js1($string)
  does: escape a string meant for javascript value bounded by 'single quotes'
  input: string
  output: string
  \ are replaced with \\
  ' are replaced with \'

  fix4js2($string)
  does: escape a string meant for javascript value bounded by "double quotes"
  input: string
  output: string
  \ are replaced with \\
  " are replaced with \"

 **** php5 functions on php4 ****
  microtime_float() - same as microtime(true) on php5
  getmicrotime() - alias to microtime_float()
  stripos()  - case insensitive strpos()
  strripos() - case insensitive strrpos()
  str_ireplace() - case insensitive str_replace(). its not perfect - always return lowercase!


***********************************************
 */

function make_seed() {
	list($usec, $sec) = explode(' ', microtime());
	return (float) $sec + ((float) $usec * 100000);
}

mt_srand(make_seed());
srand(make_seed());

////////////////// add missing functions stripos strripos str_ireplace /////////////////////
define("BKSL", "\\");

//// fix magic quotes damage (taken from php.net)
function stripslashes_deep($value) {
	$value = is_array($value) ?
		   array_map('stripslashes_deep', $value) :
		   stripslashes($value);

	return $value;
}

// unescape POST string escaped for '"\
function undo_magic_quotes($force = false) { //old name: oh_no_unescape_post()
	global $undo_magic_quotes_done;
	if ($force || (get_magic_quotes_gpc() && empty($undo_magic_quotes_done))) {
		$undo_magic_quotes_done = true;
		$_POST = array_map('stripslashes_deep', $_POST);
		$_GET = array_map('stripslashes_deep', $_GET);
		$_COOKIE = array_map('stripslashes_deep', $_COOKIE);
		$_REQUEST = array_map('stripslashes_deep', $_REQUEST);
	}
}

// declare microtime_float according to php5 or php4
if (function_exists('stripos')) { // php5

	function microtime_float() {
		return microtime(true);
	}

} else {

	function microtime_float() {
		list($usec, $sec) = explode(" ", microtime());
		return ((float) $usec + (float) $sec);
	}

}

function getmicrotime() {
	return microtime_float();
}

if (!function_exists('br2nl')) {

	function br2nl($string) {
		$str = str_replace("\r\n", "\n", $string);
		return preg_replace('/\<br(\s*)?\/?\>(\n)?/i', "\n", $str);
	}

}

// declaring fnmatch: (doesnt exists on windows hosting, only on posix
if (!function_exists('fnmatch')) {

	function fnmatch($pattern, $string) {
		return preg_match("#^" . strtr(preg_quote($pattern, '#'), array('\*' => '.*', '\?' => '.')) . "$#i", $string);
	}

}
// declaring stripos: (doesnt exists as for php version 4.3.4) it should be added in php5
if (!function_exists('stripos')) {

	function stripos($haystack, $needle, $offset = 0) {
		return strpos(strtolower($haystack), strtolower($needle), $offset);
	}

}
// declaring strripos: (doesnt exists as for php version 4.3.4) it should be added in php5
if (!function_exists('strripos')) {

	function strripos($haystack, $needle, $offset = 0) {
		return strrpos(strtolower($haystack), strtolower($needle), $offset);
	}

}
// declaring strripos: (doesnt exists as for php version 4.3.4) it should be added in php5
// its not perfect - always return lowercased string!
// TBD: keep original casing
if (!function_exists('str_ireplace')) {

	function str_ireplace($haystack, $needle, $subject, $count = null) {
		if ($count === null) {
			return str_replace(strtolower($haystack), $needle, strtolower($subject));
		} else {
			return str_replace(strtolower($haystack), $needle, strtolower($subject), $count);
		}
	}

}

// redirect to a url and die
function jsredirect($to) {
	if (!headers_sent()) {
		header("Location: $to");
		exit;
	} else {
		echo "
    <script type='text/javascript'>
      document.location.href=\"" . fix4js2($to) . "\";
    </script>";
	}
}

// recreate current page link, with different GET accoarding to $newget
function reGet($newget = null, $url = null) {
	global $reGetParams;
	if ($newget === null)
		$newget = array();
	if ($url === null && !empty($reGetParams) && !empty($reGetParams['url']))
		$url = $reGetParams['url'];
	if ($url === null)
		$url = $_SERVER['PHP_SELF'];
	if (is_array($newget)) {
		$get = $_GET;
		foreach ($newget as $k => $v) {
			$get[$k] = urlencode($v);
			if ($v === null)
				unset($get[$k]);
		}
		$url.='?' . (assoc_implode('&', '=', $get));
		$url = preg_replace("/&$/", '', $url);
	}else {
		$url = $newget;
	}
	return $url;
}

// return a,b...z,aa,ab,ac...az,ba,bb...zz,aaa,aab...,aaz,aba,...zzz...
function decabc($i) {
	$s = '';
	$s.=chr(ord('a') + ($i % 26));
	while ($i >= 26) {
		$i = floor($i / 26) - 1;
		$s = chr(ord('a') + ($i % 26)) . $s;
	}
	return $s;
}

// return a lower cased random set of a-z letters
function randstring($length, $chars = 'abcdefghijklmnopqrstuvwxyz') {
	$z = strlen($chars) - 1;
	for ($s = ''; $length > 0; $length--) {
		$s.=$chars{mt_rand(0, $z)};
	}
	return $s;
}

//////////////// safe-sorting hebrew
// hebsortby() - return an english string represents the correct
// order of the hebrew string.
// Attention - mixing heb with eng letters would cause troubles.
/*
  function hebsortby($heb){
  static $alef; $alef=ord('א');
  static $taf;  $taf =ord('ת');
  static $letters=array(
  // א I ב I ג I ד I ה I ו I ז I ח I ט I י I ך I כ I ל I ם I מ I ן I נ I ס I ע I ף I פ I ץ I צ I ק I ר I ש I ת
  'A','B','C','D','E','F','G','H','I','J','K','K','L','M','M','N','N','O','P','Q','Q','R','R','S','T','U','V');
  $return='';
  for ($i=0;$i<strlen($heb);$i++){
  $l=ord($heb{$i});
  if ($l>=$alef && $l<=$taf){
  $return.=$letters[$l-$alef];
  } else {
  $return.=$heb[$i];
  }
  }
  return $return;
  }
  // backward compatibility - just in case... it also fixes final letters םןךףץ
  function hebsortby2heb($hebsortby){
  static $letters=array(
  'א','ב','ג','ד','ה','ו','ז','ח','ט','י','כ','ל','מ','נ','ס','ע','פ','צ','ק','ר','ש','ת');
  //'A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V');
  static $a; $a=ord('A');
  static $z; $z=ord('V');
  $return='';
  for ($i=0;$i<strlen($hebsortby);$i++){
  $l=ord($hebsortby{$i});
  if ($l>=$a && $l<=$z){
  $return.=$letters[$l-$a];
  } else {
  $return.=$heb[$i]; // @@ TBD Fixed - there's no such thing as $heb
  }
  }

  // fix ןםףץך
  static $alef; $alef=ord('א');
  static $taf;  $taf =ord('ת');
  for ($i=0;$i<256;$i++){
  if ($i<$alef || $i>$taf) {  // any letter other then alef-taf cause the previous heb letter to be final.
  $c=chr($i);
  $return=str_replace('נ'.$c,'ן'.$c,$return);
  $return=str_replace('כ'.$c,'ך'.$c,$return);
  $return=str_replace('פ'.$c,'ף'.$c,$return);
  $return=str_replace('צ'.$c,'ץ'.$c,$return);
  $return=str_replace('מ'.$c,'ם'.$c,$return);
  }
  }
  $return=substr($return,0,strlen($return)-1); // remove the ' ' we just added
  return $return;
  } */

/////////////////////////////////////
// return 1/0 for an html form checkbox input.
// you can directly give a value, or give a key and an array
// example: if (chkbox($fname,$_POST))
function chkbox($value, $arr = null) {
	if (is_array($arr)) {
		if (!isset($arr[$value]))
			return null;
		$value = $arr[$value];
	}
	if (!isset($value))
		return null;
	if ($value == 'on' || $value == -1 || $value == 1 || $value == 'true' || $value == true || $value == 'checked' || $value == 'selected')
		return true;
	return false;
}

// return true or false for a standart given string
function chkBool($value, $default_null = true) {
	$d = strtolower($value);
	if ($d === null || $d === '')
		return null;
	if ($d == true || $d == 1 || $d == -1 || $d == 'true' || $d == 'on' || $d == 'y' || $d == 'yes' || $d == 'yap' || $d == 'yape' || $d == 'checked' || $d == 'check' || $d == 'chk' || $d == 'select' || $d == 'selected' || $d == 'v' || $d == '+')
		return true;
	if ($d == false || $d == 0 || $d == 'false' || $d == 'off' || $d == 'n' || $d == 'no' || $d == 'not' || $d == 'nope' || $d == 'unchecked' || $d == 'uncheck' || $d == 'unchk' || $d == 'x' || $d == '-')
		return false;
	if ($default_null) {
		return null;
	} else {
		return $value;
	}
}

// return true or false for a standart given string, and $default when string is unrecognized or empty
function chkBoolDef($value, $default) {
	if ($value === null)
		return $default;
	$d = strtolower(trim($value));
	if ($d === null || $d === '')
		return $default;
	if ($d == true || $d == 1 || $d == -1 || $d == 'true' || $d == 'on' || $d == 'y' || $d == 'yes' || $d == 'yap' || $d == 'yape' || $d == 'checked' || $d == 'check' || $d == 'chk' || $d == 'select' || $d == 'selected' || $d == 'v' || $d == '+')
		return true;
	if ($d == false || $d == 0 || $d == 'false' || $d == 'off' || $d == 'n' || $d == 'no' || $d == 'not' || $d == 'nope' || $d == 'unchecked' || $d == 'uncheck' || $d == 'unchk' || $d == 'x' || $d == '-')
		return false;
	return $default;
}

//////////////// Oria explode: explode a string of aa=val1;ab=val2;ccc=value to array of [aa]=>val1 [ab]=>val2 [ccc]=>value
// fixes for supporting =,; in the keys/values (assuming chars 253,254 are not used)
function oria_get_fix($v, $sep, $assign, $ignoredchars = '') {
	return str_replace(chr(253), $sep, str_replace(chr(254), $assign, trim($v, $ignoredchars)));
}

function oria_set_fix($v, $sep, $assign, $ignoredchars = '') {
	return str_replace($sep, chr(253), str_replace($assign, chr(254), trim($v, $ignoredchars)));
}

// explode a string like "fruit=banana;drink=tea;food=yogurt" to an array of keys and values
function assoc_explode($sep, $assign, $string, $ignoredchars = ' ') {
	$ret = array();
	$string = trim($string, $ignoredchars);
	if ($string == '')
		return $ret;
	$pairs = explode($sep, $string);
	foreach ($pairs as $pair) {
		$pair = trim($pair, $ignoredchars);
		if ($pair != '') {
			$ar = explode($assign, $v);
			if (count($ar) == 0) {
				
			} else if (count($ar) == 1) {
				$k = oria_get_fix($pair, $sep, $assign, $ignoredchars = '');
				$v = null;
			} else if (count($ar) == 2) {
				$k = oria_get_fix($ar[0], $sep, $assign, $ignoredchars = '');
				$v = oria_get_fix($ar[1], $sep, $assign, $ignoredchars = '');
			} else {
				$k = oria_get_fix(substr($pair, 0, strpos($assign, $pair)), $sep, $assign, $ignoredchars = '');
				$v = oria_get_fix(substr($pair, 1 + strpos($assign, $pair)), $sep, $assign, $ignoredchars = '');
			}
			if ($k != '')
				$ret[$k] = $v;
		}
	}
	return $ret;
}

// implode an array of keys and values back into a string like "fruit=banana;drink=tea;food=yogury"
function assoc_implode($sep, $assign, $array, $ignoredchars = '') {
	$str = '';
	if (!is_array($array)) {
		trigger_error("assoc_implode: 3rd parameter is not an array", E_USER_WARNING);
		return '';
	}
	foreach ($array as $k => $v) {
		$k = oria_set_fix($k, $sep, $assign, $ignoredchars);
		$v = oria_set_fix($v, $sep, $assign, $ignoredchars);
		$str.=$k . $assign . $v . $sep;
	}
	return $str;
}

// get a single parameter from a string like "fruit=banana;drink=tea;food=yogury"
function assoc_get_param($sep, $assign, $param, $string, $case_sensitive = true, $ignoredchars = " ") {
	$string = trim($string, $ignoredchars);
	if ($string == '')
		return null;
	$m = assoc_explode($sep, $assign, $string, $ignoredchars);
	if (!$case_sensitive) {
		$m = array_change_key_case($m, CASE_LOWER);
		$param = strtolower($param);
	}
	if (array_key_exists($param, $m))
		return $m[$param];
	return null;
}

// change a single parameter in a string like "fruit=banana;drink=tea;food=yogurt"
function assoc_set_param($sep, $assign, $param, $value, $string, $case_sensitive = true, $ignoredchars = " ") {
	$m = assoc_explode($sep, $assign, $string, $ignoredchars);
	if (!$case_sensitive) {
		foreach ($m as $k => $v) {
			if (strtolower($param) == strtolower($k)) {
				if ($value === null) {
					unset($m[$k]);
				} else {
					$m[$k] = $value;
				}
			}
		}
	} else { // case sensitive
		if ($value === null) {
			if (array_key_exists($param, $m))
				unset($m[$param]);
		} else {
			$m[$param] = $value;
		}
	}
	return assoc_implode($sep, $assign, $m);
}

// process simple templating system -- replace all occurances of $key in $template with $values[$key]
// keys are case sensitive
function tmplsimple($template, $values, $prekey = '$', $postkey = '') {
	foreach ($values as $k => $v) {
		$template = str_replace($prekey . $k . $postkey, $v, $template);
	}
	return $template;
}

////////////////// String functions ////////////////////
// Return false when there's a char in $str not listed in $valid
function validateWhitehat($str, $valid) {
	if (is_array($valid))
		$valid = implode('', $valid);
	for ($i = 0; $i < strlen($str); $i++) {
		if (strpos($valid, $str{$i}) === false)
			return false;
	}
	return true;
}

// Return $str without all the chars not listed in $valid
function removeWhitehat($str, $valid) {
	if (is_array($valid))
		$valid = implode('', $valid);
	$ret = '';
	$valid = "$valid"; // convert to string
	for ($i = 0; $i < strlen($str); $i++)
		if (strrpos($valid, '' . $str{$i}) !== FALSE)
			$ret.=$str{$i};
	return $ret;
}

// Return $str without all the chars listed in $invalid
function removeBlackhat($str, $invalid) {
	if (is_array($invalid))
		$invalid = implode('', $invalid);
	$ret = '';
	$invalid = "$invalid"; // convert to string
	for ($i = 0; $i < strlen($str); $i++)
		if (strrpos($invalid, '' . $str{$i}) === FALSE)
			$ret.=$str{$i};
	return $ret;
}

//////////////// echos($msg,$style) - echo with style ////////////////////////
// oristyle - return styled html text (like echos)
function oristyle($msg, $style = 'msg', $linebreak = "<br>\n") {
	global $DEBUG;
	global $echos_styles;
	if ($DEBUG || (stripos($style, 'dbg') === false)) {
		return $echos_styles[$style] . $msg . $echos_styles[$style . '/'] . $linebreak;
	} else {
		return '';
	}
}

// echos - echo with style....
// using the global array $echos_styles to define the prefix and postfix of a style.
function echos($msg, $style = 'msg', $linebreak = "<br>\n") {
	global $DEBUG;
	if ($DEBUG || (stripos($style, 'dbg') === false)) {
		echo "<span class='$style'>$msg</span>$linebreak";
	}
}

/////////// echos styles
// if you want to define a new style, it is very important that you include both
// prefix of the style, as normal 'key', and the postfix as 'key/'.
///////////////////// Get/Post without the need of using isset - if it wasnt set returns null //////////
function Get($key) {  // return null if key not found in $_GET
	if (array_key_exists($key, $_GET)) {
		return trim($_GET[$key]);
	} else {
		return null;
	}
}

function Post($key) {  // return null if key not found in $_POST
	if (array_key_exists($key, $_POST)) {
		return trim($_POST[$key]);
	} else {
		return null;
	}
}

function Session($key) {  // return null if key not found in $_SESSION
	if (array_key_exists($key, $_SESSION)) {
		return trim($_SESSION[$key]);
	} else {
		return null;
	}
}

///////////////////// remember website vars in $_SERVER //////////////////
global $websitename;
if ($websitename == '' && !empty($_SERVER['HTTP_HOST']))
	$websitename = $_SERVER['HTTP_HOST'];

// set a var
function sitevarSet($name, $value) {
	global $DEBUG;
	global $websitename;
	if (!isset($_SERVER[$websitename . '_vars']))
		$_SERVER[$websitename . '_vars'] = array();
	$_SERVER[$websitename . '_vars'][$name] = $value;
}

// get a var
function sitevarGet($name) {
	global $DEBUG;
	global $websitename;
	if (!isset($_SERVER[$websitename . '_vars']))
		$_SERVER[$websitename . '_vars'] = array();
	if (!isset($_SERVER[$websitename . '_vars'][$name])) {
		if ($DEBUG)
			echos("no such sitevar $name", 'dbg'); return false;
	}
	return $_SERVER[$websitename . '_vars'][$name];
}

// set a var reference
function sitevarSetPtr($name, &$value) {
	global $DEBUG;
	global $websitename;
	if (!isset($_SERVER[$websitename . '_vars']))
		$_SERVER[$websitename . '_vars'] = array();
	$_SERVER[$websitename . '_vars'][$name] = &$value;
}

// set a ptr to a reference of the site var
function sitevarGetPtr($name, &$ptr) {
	global $DEBUG;
	global $websitename;
	if (!isset($_SERVER[$websitename . '_vars']))
		$_SERVER[$websitename . '_vars'] = array();
	if (!isset($_SERVER[$websitename . '_vars'][$name])) {
		if ($DEBUG)
			echos("no such sitevar $name", 'dbg'); return false;
	}
	return $ptr = &$_SERVER[$websitename . '_vars'][$name];
}

// check if a site var was set
function sitevarExists($name) {
	global $websitename;
	if (!isset($_SERVER[$websitename . '_vars']))
		$_SERVER[$websitename . '_vars'] = array();
	return isset($_SERVER[$websitename . '_vars'][$name]);
}

/////////////////// Sql Functions
global $sql_last_error, $sql_last_query, $sql_last_insert_id, $sql_found_rows;

function sqlGetType() {
	return 'mysql';
}

function sqlVar($var) {
	$res = mysql_query("SHOW VARIABLES LIKE " . sqls($var) . ";");
	if ($res) {
		if ($row = mysql_fetch_row($res)) {
			return $row[0];
		}
	}
	return null;
}

function sqlGetVersion() {
	$res = mysql_query("SELECT VERSION();");
	$res = mysql_fetch_row($res);
	$res = $res[0];
	return $res;
}

function sqlremovestrings($sqlexpression,$replace='') {
	// TODO: support ANSI_QUOTES mode
	$out=''; // a strings-free expression to validate
	$instr=false; // are we currently inside a string?
	for($i=0;$i<strlen($sqlexpression);$i++) {
		$c=$sqlexpression{$i}; // get current char
		if ($c=="'") { // start/end of a string
			$instr = !$instr;
			if (!$instr) $out.=$replace; // just finished a string, add the replacement to output
		} else {
			if ($c=="\\") { // escape character
				if ($instr)
					$i++; // skip next char
			}
			if (!$instr) $out.=$c;
		}
	}
	if ($instr) // unclosed string
		return false;
	return $out;
}

function sqlvalidate($sqlexpression,&$error='') {
	/////// first remove all strings to make life easier //////
	$sqlexpression=sqlremovestrings($sqlexpression);
	if ($sqlexpression===false)  // unclosed string
		return ($error='11: Unclosed string') && false;
	/////// validate parantheses
	$brackets=preg_replace('@[^\(\)]+@','',$sqlexpression); // leave only parantheses
	while (strpos($brackets,'()')!==false) { 
		$brackets=str_replace('()','',$brackets); // slowly remove all matching parantheses one by one (pair by pair)
	}
	if (strlen($brackets)>0) // a bracket had no matching bracket!
		return ($error='21: No matching bracket') && false;

	////// look for invalid table/field names characters
	// TODO: support ANSI_QUOTES mode
	$instr=false; // are we currently inside a backtick?
	$prevc=''; // previous char
	for($i=0;$i<strlen($sqlexpression);$i++) {
		$c=$sqlexpression{$i}; // get current char
		if ($c=="`") { // start/end of a string
			$instr = !$instr;
			// * Database, table, and column names cannot end with space characters.
			if ($instr==false && $prevc==' ')
				return ($error='31: Object name cannot end with a space (`xxx `)') && false;
			if ($prevc=='`' && !$instr) // detect `` outside a string (because `bla``blo` is ok, but an empty `` is not)
				return ($error='32: Object name cannot be empty (``)') && false;
		} else {
			// * Database and table names cannot contain “/”, “\”, “.”, or characters that are not permitted in file names. 
			if ($instr && ((strpos("/\\.,\n\r\0",$c)!==false)))
				return ($error='33: Object name cannot contain the character #'.ord($c)) && false;
			// Starting with a space is not a good idea neither
			if ($instr && $c==' ' && $prevc=='`')
				return ($error='34: Object name cannot start with a space (` xxx`)') && false;
		}
		$prevc=$c;
	}
	if ($instr)
		return ($error='30: Object name not closed (`xxx)') && false;
	$error='';
	return true;
}

function sqle($str) {	 // alias to mysql_real_escape_string() - fix quotes and other chars for sql
	if ($str === null)
		return 'NULL';
	return mysql_real_escape_string($str);
}

function sqlf($str) {	 // fix quotes for sql - fields - remove any `
	if ($str === null)
		return 'NULL';
	return "`" . mysql_real_escape_string(str_replace('`', '', $str)) . "`";
}

function sqlv($str) {	 // fix quotes for sql - values - always bounded by '
	if ($str === null)
		return 'NULL';
	return "'" . mysql_real_escape_string($str) . "'";
}

function sqln($str) {	 // fix quotes for sql - numeric values - always bounded by ' always a number
	if ($str === null)
		return 'NULL';
	if (strtolower($str) == 'null' || $str === null || $str === "\0" || $str === "\\0")
		return 'NULL';
	if (!is_numeric($str)) {    // sql security - check that $str is really a number as it should
		trigger_error("sql-num error: not a number", E_USER_WARNING);
		return '00';
	} else {
		return $str;
	}
}

function sqls($str) {	 // fix quotes for sql search. same as sqlv(), plus escapes % and _
	if ($str === null)
		return 'NULL';
	return "'" . str_replace(array('_', '%'), array('\_', '\%'), mysql_real_escape_string($str)) . "'";
}

function sqlSetCollation($collation, $charset) {
	if (!empty($collation)) {
		$res = mysql_query("SHOW VARIABLES LIKE '%collation\_%';");
		while ($row = mysql_fetch_row($res)) {
			mysql_query("SET $row[0]='$collation';");
		}
	}
	if (!empty($charset)) {
		$res = mysql_query("SHOW VARIABLES LIKE '%character\_set\_%';");
		while ($row = mysql_fetch_row($res)) {
			mysql_query("SET $row[0]='$charset';");
		}
		mysql_query("SET CHARACTER SET '$charset';");
	}
	return true;
}

function sqlRun($sql) {
	global $DEBUG;
	global $sql_last_error, $sql_last_query, $sql_last_insert_id, $sql_found_rows, $sql_show_every_query, $sql_dont_run_queries;
	if ($sql_dont_run_queries) {
		if ($sql_show_every_query)
			echo oristyle($sql, 'sql');
		return null;
	}

	// for security purposes, allow only 1 sql sentence each time and dont allow -- remarks
	$sql = trim($sql);
	if ($sql == '') {
		error_log("sqlRun called with empty query (" . var_export($sql, 1) . ")");
		return false;
	}
	if ($sql{strlen($sql) - 1} == ';')
		$sql = substr($sql, 0, strlen($sql) - 1);
	// dont treat \' as '
	$temp = str_replace(BKSL . "'", '', $sql);

	// search for ; only out of strings
	// remove all strings for the test
	$temp = preg_replace("/'.+'/", '', $temp);
	if (strpos($temp, '--') !== FALSE || strpos($temp, ';') !== FALSE) {
		error_log("sqlRun Security: ; or -- found. sql cancelled. sql=($sql)");
		if ($DEBUG)
			echos("sqlRun Security: sql cancelled.", 'err');
		return false;
	}

	$sql = $sql . ';';
	$sql_last_query = $sql;
	//    mysql_query("SET NAMES 'utf8'");
	$result = mysql_query($sql);
	if (strtolower(substr($sql, 0, 6)) == 'insert' || strtolower(substr($sql, 0, 7)) == 'replace')
		$sql_last_insert_id = mysql_insert_id();
	if (!$result) {
		$sql_last_error = mysql_error();
		if ($DEBUG)
			echo sqlStyleError();
	}else {
		$sql_last_error = '';
		if ($DEBUG && $sql_show_every_query)
			echo oristyle($sql_last_query, 'sql');
	}
	if (stripos($sql, "SQL_CALC_FOUND_ROWS") !== false) {
		$sql_found_rows = mysql_query("SELECT FOUND_ROWS()");
		$sql_found_rows = mysql_fetch_row($sql_found_rows);
		$sql_found_rows = $sql_found_rows[0];
	} else {
		$sql_found_rows = null;
	}
	return $result;
}

function sqlError() {
	global $sql_last_error;
	return $sql_last_error;
}

function sqlStyleError($force_reply = false) {
	global $sql_last_error, $sql_last_query;
	if ($sql_last_error == '' && !$force_reply)
		return '';
	$ret = "<div class=csSQLErrorBox>MySQL Error <span class=csSQLErrorText>$sql_last_error</span> <span class=csSQLLastQuery>$sql_last_query</span></div>";
	return $ret;
}

function sqlLastQuery() {
	global $sql_last_query;
	return $sql_last_query;
}

function sqlLastInsertID() {
	global $sql_last_insert_id;
	return $sql_last_insert_id;
}

function sqlLastInsert() {
	global $sql_last_insert_id;
	return $sql_last_insert_id;
}

function sqlLastID() {
	global $sql_last_insert_id;
	return $sql_last_insert_id;
}

function sqlFoundRows() {
	global $sql_found_rows;
	return $sql_found_rows;
}

function sqlAffectedRows() {
	return mysql_affected_rows();
}

function db_connect($dbdata, $die = 'db connect error. please notify the administrator.') {
	if (is_array($dbdata) && count($dbdata) > 0 && (!array_key_exists('name', $dbdata))) {
		// try each and every dbdata settings in array
		for ($i = 0; $i < count($dbdata); $i++) {
			if (@db_connect($dbdata[$i], false))
				return true;
		}
		if (!empty($die))
			die($die);
		return false;
	} else {

		if (array_key_exists('type', $dbdata) && $dbdata['type'] != '' && $dbdata['type'] != "mysql") {
			trigger_error("Unhandled server type=$dbdata[type] (only mysql currently supported)", E_USER_WARNING);
			if (!empty($die))
				die($die);
			return false;
		}

		if (!mysql_connect($dbdata['host'], $dbdata['user'], $dbdata['pass'])) {
			trigger_error("Failed to Connect to MySql Server: host=$dbdata[host] user=$dbdata[user] pass #" . (strlen($dbdata['pass'])), E_USER_WARNING);
			if (!empty($die))
				die($die);
			return false;
		}
		if (!empty($dbdata['collation']) || !empty($dbdata['collation'])) {
			sqlSetCollation($dbdata['collation'], $dbdata['charset']);
		}
		if (!empty($dbdata['name'])) {
			if (!mysql_select_db($dbdata['name'])) {
				// failed to select so try to create it
				if (sqlRun("CREATE DATABASE `$dbdata[name]`")) {
					trigger_error("DB Created $dbdata[name]", E_USER_NOTICE);
				} else {
					trigger_error("Failed to Create DB $dbdata[name]", E_USER_WARNING);
				}
				if (!mysql_select_db($dbdata['name'])) {
					trigger_error("Failed to Select DB $dbdata[name]", E_USER_WARNING);
					if (!empty($die))
						die($die);
					return false;
				}
			}
		}

		return true;
	}
}

////// fill zeros before a number
function zeros($input, $length) {
	return str_pad($input, $length, '0', STR_PAD_LEFT);    // its ok, str_pad doesnt truncate longer numbers
}

// start counting numbers until a file name is available. return base file name (without $dir)
function autofilename($dir, $name, $footer, $zeros = 4, $startfrom = 1) {
	clearstatcache();  // must do it so the info would be current and not cached
	$i = $startfrom;
	while (file_exists($dir . $name . zeros($i, $zeros) . $footer))
		$i++;
	return $name . zeros($i, $zeros) . $footer;
}

// get the extension part of the filename
function getExtension($filename) {
	$path = pathinfo($filename);
	return $path['extension'];
}

// return the number of files found fitting to the numbering and format
// unlike glob(), it stops when the series is stopped.
// for example, a bunch of files from 01 to 07, with number 05 missing, would return 4.
// thus, if the count starting from 0 - the function would return 0.
// if you just want to know how many files matching the pettern, use count(glob()).
function count_autofilename($dir, $name, $footer, $zeros = 4, $startfrom = 1) {
	clearstatcache();  // must do it so the info would be current and not cached
	$i = $startfrom;
	while (file_exists($dir . $name . zeros($i, $zeros) . $footer))
		$i++;
	return $i - $startfrom;
}

// insert symbols into a time stamp string
// 20030201123456 --> 2003/02/01 12:34:56
function timestamp2str($ts) {
	$s = '';
	$s.= substr($ts, 0, 4);  // year
	$s.='-' . substr($ts, 4, 2);  // month
	$s.='-' . substr($ts, 6, 2);  // day
	$s.=' ' . substr($ts, 8, 2);  // hour
	$s.=':' . substr($ts, 10, 2);  // minute
	$s.=':' . substr($ts, 12, 2);  // second
	return $s;
}

/////////// fixes - fix ' " quotes and such

function fix4url($str) {
	return urlencode($str);
}

function fix4html1($str) {	  // fix quotes for html - values bounded by '
	return str_replace("'", '&#39;', $str);
	//return htmlspecialchars($str,ENT_QUOTES); // not 100%
}

function fix4html2($str) {	  // fix quotes for html - values bounded by "
	return str_replace('"', '$quot;', $str);
	//return htmlspecialchars($str,ENT_COMPAT); // not 100%
}

function fix4html3($str) {	  // fix <> for html - replace < with &lt;
	return str_replace('<', '&lt;', $str);
	//return htmlspecialchars($str); // not 100%
}

function fix4js1($str) {	 // fix quotes for javascript - values bounded by '
	$str = str_replace(BKSL, BKSL . BKSL, $str);
	$str = str_replace("'", BKSL . "'", $str);
	return $str;
}

function fix4js2($str) {	 // fix quotes for javascript - values bounded by "
	$str = str_replace(BKSL, BKSL . BKSL, $str);
	$str = str_replace('"', BKSL . '"', $str);
	return $str;
}

/////// Auto Buttons, Anchors

function oria_butlink($label, $href, $target = '', $params = '', $class = 'but') {
	// buttons method:
	//    if (strtolower($target)=='_current') $target='';
	//    return button($label,gohref($href,$win_name),$params,$class);
	// links method:
	return oria_link($label, $href, $target, $params, $class);
}

function oria_button($label, $cmd, $params = '', $class = 'but') {
	if ($class != '')
		$class = "class='$class'";
	return "<button $class onClick=\"{$cmd}\" $params>$label</button>";
}

function oria_link($label, $cmd, $target = '', $params = '', $class = 'but') {
	if ($class != '')
		$class = " class='$class' ";
	if ($target != '')
		$target = " target='$target' ";
	if (false && strtolower(substr($cmd, 0, 11)) == 'javascript:') { // cancelled cause not working good
		$link = " href='javascript:void(0);' onClick=\"" . fix4html2(substr($cmd, 11)) . "\" ";
	} else {
		$link = " href=\"" . fix4html2($cmd) . "\" ";
	}
	return "<a $class $link $target $params>$label</a>";
}

function gohref($href, $win_name = '') {
	if (strtolower($win_name) == '_current')
		$win_name = '';
	if ($win_name == '') {
		return "document.location.href='" . fix4js1($href) . "';";
	} else {
		return "window.open('" . fix4js1($href) . "','" . fix4js1($win_name) . "');";
	}
}

function jumpto($href, $do_jump, $msg = '') {
	global $DEBUG;
	if ($msg == '')
		$msg = Trans('Continue');
	if ($do_jump) {
		if ($DEBUG) {
			echo oria_butlink("If we weren't on debug-mode, i'd jump here", $href);
		} else {
			echo "<script type='text/javascript'>document.location.href='" . fix4js1($href) . "';</script>";
		}
	} else {
		echo oria_butlink($msg, $href);
	}
}

function oria_jumpback($times, $do_jump) {
	global $DEBUG;
	if ($do_jump) {
		if ($DEBUG) {
			echo oria_button("If we weren't on debug-mode, i'd jump back $times", "window.history.go(-{$times});");
		} else {
			echo "<script type='text/javascript'>window.history.go(-{$times});</script>";
		}
	} else {
		echo oria_button(Trans('Go Back'), "window.history.go(-{$times});");
	}
}

function checkbackto($do_jump, $msg = '') {
	if ($msg == '')
		$msg = Trans('Continue');
	$backto = Post('backto');
	if ($backto == '')
		$backto = Get('backto');
	if ($backto != '') {
		if ($do_jump)
			echo oria_jumpto($backto, $msg);
		else
			echo oria_butlink($msg, $backto);
	}
}
