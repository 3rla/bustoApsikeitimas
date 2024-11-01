<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Users</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    @livewireStyles
</head>

<body>

    <!-- Navbar -->
    <livewire:navbar />

    <!-- Admin Users CRUD -->
    @livewire('admin-users-table')

    <!-- Footer -->
    <livewire:footer />
    @livewireScripts
</body>

</html>
