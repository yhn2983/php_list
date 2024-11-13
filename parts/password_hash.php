<?php
$pw="123456";

$hash="$2y$10$9ZUF9e4.Ke1erop3uUVmxuA3h8zHBuvjcnmX3DNfc8aApFcmQrGsG";

var_dump(password_verify($pw,$hash));

