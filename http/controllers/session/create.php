<?php

use Core\Session;

require view('session/create.view.php', [
    Session::get('errors'),
]);