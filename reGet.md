Create a link to current page, with changes to GET accoarding to `$to`

input:
  * `$to` - A `$_GET` style associative array.
> > Values will be escaped with urlencode().
> > To remove a parameter give it a null value.
  * `$url` - Optional. Current url. When missing, `PHP_SELF` will be used.

output:

> A url string