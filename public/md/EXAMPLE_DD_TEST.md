# TEST DD() FUNCTION

### Add to the routes.php file at the very bottom.

> app/Http/routes.php

```
Route::get('testauth', ['as' => 'testauth', 'uses' => 'SectionController@testAuth']);
```

## Add to SectionController.php

> app/Http/Controllers/SectionController.php

```
public function testAuth() {
$creds = Sentinel::getUser();
$auth = Sentinel::authenticate($creds);
dd($auth);
}
```