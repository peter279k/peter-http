<?php

// include the WP_Http class for HTTP request
require_once __DIR__.'/../../wp-includes/class-requests.php';
require_once __DIR__.'/../../wp-includes/class-http.php';
require_once __DIR__.'/../../wp-includes/http.php';

spl_autoload_register(function ($class) {
    // project-specific namespace prefix
    $prefix = 'peter\\WordPress\\';

    // base directory for the namespace prefix
    $baseDir = __DIR__.'/';

    // does the class use the namespace prefix?
    $len = strlen($prefix);
    if(strncmp($prefix, $class, $len) !== 0) {
        // no, move to the next registered autoloader
        return;
    }

    // get the relative class name
    $relativeClass = substr($class, $len);

    // replace the namespace prefix with the base directory, replace namespace
    // separators with directory separators in the relative class name, append
    // with .php
    $file = $baseDir.str_replace('\\', '/', $class).'.php';
    // if the file exists, require it
    if(file_exists($file)) {
        require_once $file;
    } else {
        echo 'The class file: '.$file.' is not found.';
    }
});
