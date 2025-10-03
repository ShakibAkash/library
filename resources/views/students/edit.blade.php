<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Edit Student</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
    <style>main{max-width:1100px;margin:20px auto;padding:0 16px;}</style>
</head>
<body>
<main>
    <h2>Edit Student {{ $id ?? '' }}</h2>
    <p>Form coming soon.</p>
    <p><a href="{{ route('students.index') }}">Back to Students</a></p>
</main>
</body>
</html>
