Process simple templating system -- replace all occurrences of `$key` with `$values[$key]` in `$template`

Input:
  * `$template` - Long string of the template to be processed
  * `$values` - Array with keys that should be replaced
  * `$prekey`,`$postkey` - The way that the keys are marked in the template.
For example, if the keys looks like `[mykey]` you need `$prekey='[' $postkey=']'`.
If the keys look like `$mykey` you need `$prekey`='$' $postkey=''`

Output:
> A string of the processed template.

Notes:
> Keys are case sensitive