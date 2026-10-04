<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config['base_url']    = 'http://localhost/pos_backend/';

$config['index_page'] = '';
$config['uri_protocol'] = 'REQUEST_URI';
$config['url_suffix'] = '';
$config['language'] = 'english';
$config['charset'] = 'UTF-8';
$config['enable_hooks'] = FALSE;
$config['subclass_prefix'] = 'MY_';

$config['composer_autoload'] = FCPATH . 'vendor/autoload.php';

$config['permitted_uri_chars'] = 'a-z 0-9~%.:_\-@\=';

$config['enable_query_strings'] = FALSE;
$config['controller_trigger'] = 'c';
$config['function_trigger'] = 'm';
$config['directory_trigger'] = 'd';

$config['allow_get_array'] = TRUE;

$config['log_threshold'] = 1;
$config['log_path'] = '';
$config['log_file_extension'] = '';
$config['log_file_permissions'] = 0644;
$config['log_date_format'] = 'Y-m-d H:i:s';

$config['error_views_path'] = '';
$config['cache_path'] = '';
$config['cache_query_string'] = FALSE;

$config['encryption_key'] = 'pos_backend_b3f1c9a6d7e8f4012ab35c90de6f71aa';

/*
|--------------------------------------------------------------------------
| Session Variables
|--------------------------------------------------------------------------
| Used by the web admin panel only (session-based login). The mobile API
| is stateless and relies on JWT bearer tokens instead (see config/jwt.php).
*/
$config['sess_driver'] = 'files';
$config['sess_cookie_name'] = 'pos_backend_session';
$config['sess_samesite'] = 'Lax';
$config['sess_expiration'] = 7200;
$config['sess_save_path'] = NULL;
$config['sess_match_ip'] = FALSE;
$config['sess_time_to_update'] = 300;
$config['sess_regenerate_destroy'] = FALSE;

$config['cookie_prefix']   = '';
$config['cookie_domain']   = '';
$config['cookie_path']     = '/';
$config['cookie_secure']   = FALSE;
$config['cookie_httponly'] = TRUE;
$config['cookie_samesite'] = 'Lax';

$config['standardize_newlines'] = FALSE;
$config['global_xss_filtering'] = FALSE;

/*
|--------------------------------------------------------------------------
| Cross Site Request Forgery
|--------------------------------------------------------------------------
| CSRF protection is ON, which protects the web admin's session-based login
| form (CI3's form_open() helper auto-injects the token, so it "just works").
|
| The mobile API (under 'api/') is excluded: it's a stateless JSON API
| authenticated with a JWT Bearer token, not cookies/forms, so the CSRF
| cookie+hidden-field mechanism doesn't apply to it and would otherwise
| block every request from the Flutter app.
*/
$config['csrf_protection'] = TRUE;
$config['csrf_token_name'] = 'pos_csrf_token';
$config['csrf_cookie_name'] = 'pos_csrf_cookie';
$config['csrf_expire'] = 7200;
$config['csrf_regenerate'] = TRUE;
$config['csrf_exclude_uris'] = array('api/.*');

$config['compress_output'] = FALSE;
$config['time_reference'] = 'local';
$config['rewrite_short_tags'] = FALSE;
$config['proxy_ips'] = '';
