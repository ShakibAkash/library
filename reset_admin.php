<?php
// Reset admin password
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

$user = App\Models\User::where('email', 'admin@gmail.com')->first();
if ($user) {
    $user->password = bcrypt('admin123');
    $user->save();
    echo "Password reset successfully for admin@gmail.com\n";
} else {
    echo "User not found\n";
}
