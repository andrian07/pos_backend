<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Dev secret — rotate this before deploying to production.
$config['jwt_secret'] = '6d6fcea8541b852b4b92dc16ca34b5e399b607fdb687df189f34179cd47a881b';
$config['jwt_algo'] = 'HS256';
$config['jwt_expire'] = 8 * 60 * 60; // 8 hours
$config['jwt_issuer'] = 'pos_backend';
