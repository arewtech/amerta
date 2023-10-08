<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Amerta</title>
<link rel="stylesheet" href="https://rsms.me/inter/inter.css" />
<link href="{{ asset('frontend') }}/assets/css/swiper-bundle.min.css" rel="stylesheet" />
<link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
<link
    href="{{ setting('app_logo') !== null ? asset('storage/' . setting('app_logo')) : 'https://ui-avatars.com/api/?name=' . auth()->user()->name . '&color=7F9CF5&background=EBF4FF' }}"
    rel="icon">
<!-- Alpine -->
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
<!-- Fonts -->
@vite('resources/css/app.css')
