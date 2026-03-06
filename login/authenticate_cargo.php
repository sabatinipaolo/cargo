<?php
header('Content-Type: application/json');

$raw  = file_get_contents('php://input');
$data = json_decode($raw, true) ?? [];

$user    = trim($data['user']    ?? '');
$password =      $data['password'] ?? '';

// semplice autenticatione per demo,
// in un'applicazione reale, dovresti usare una funzione un database e ...

if ($user === 'admin' && $password === 'password123') {
    echo '{"success": true}';
} else {
    echo '{"success": false}';
}
?>