<?php

// Clear all session variables
// Destroy the session
// Optionally, you can also unset the session cookie to ensure it is fully terminated
\Core\Session::destroy();

header('location: /login');
exit;