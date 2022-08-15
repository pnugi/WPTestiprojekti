<?php

// Include all cpt files
foreach (['cpt'] as $directory) {
    foreach (glob(__DIR__ . "/{$directory}/*") as $file) {
        require_once $file;
    }
}
