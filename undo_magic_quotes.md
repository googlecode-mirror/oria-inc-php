# Oh No! Unescape Quotes! #

undo\_magic\_quotes() undo the damage done by magic quotes on php4
Input:
  * `$force` missing or false - POST GET etc arrays will get fixed only when magic quotes are on. Also it will only run once per script execution.
  * `$force` true - POST GET etc arrays will get fixed in any case.

Output: nothing

Notes:  It only changes POST GET etc when when magic quotes are on (get\_magic\_quotes\_gpc()) or when `$force` is true. Also it runs only once per script execution.

Uses stripslashes\_deep() (which is an array-recursive version of stripslashes())