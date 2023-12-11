<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    {{-- custom css  --}}
    <link rel="stylesheet" href="/css/admin-dashboard/admin-dashboard.css">
    <link rel="stylesheet" href="/css/admin-dashboard/users.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/card-recipe.css">
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet"
        type="text/css" />

        {{-- tailwind library --}}
        <script src="https://cdn.tailwindcss.com"></script>
        {{-- <script src="//unpkg.com/alpinejs" defer></script> --}}
</head>

<body>
    <div class="wrapper">
        <div class="admin-dashboard-sidebar">
            <x-admin.sidebar-dashboard></x-admin.sidebar-dashboard>
        </div>

        <div class="admin-content">
            @yield('content')
        </div>
    </div>


</body>

</html>
