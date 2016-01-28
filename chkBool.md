Try to parse an input value to boolean.

# chkBool($value,$default\_null=true) #

Input:
  * `$value` - true/false/'y'/'yes'/'n'/'no'/'true'/'false'/'t'/'f'/1/0/'1'/'0'
  * `$default_null` - Optional. What to return when value is unfamiliar? When `true` return null. When `false return untouched `$value`

Output: true/false/null/`$value`

# chkBoolDef($value,$default) #

Input:
  * `$value` - true/false/'y'/'yes'/'n'/'no'/'true'/'false'/'t'/'f'/1/0/'1'/'0'
  * `$default` - What to return when value is unfamiliar?

Output: true/false/`$default`