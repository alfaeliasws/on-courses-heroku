<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>On-Courses</title>
    <link rel = "icon" type = "image/png" href = "{{url('LogoWhite.png')}}">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Source+Code+Pro:wght@200;300;400;500;600;700&family=Source+Sans+Pro:wght@200;300;400;600;700&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-neutral-700 justify-between min-w-screen min-h-screen">
    <x-navbar class="shadow-inherit"/>
    <div class="mb-auto">
        {{$slot}}
    </div>
    <div class="sticky top-[100vh] min-h-[100px] text-center py-9 w-full bg-neutral-900 check mt-auto">
        <div class="mx-10">
            <p class="text-sm font-regular text-white mx-2 sm:text-md tracking-kindof js-show-on-scroll">Designed and Created By:</p>
            <p class="text-sm font-regular text-white mx-2 sm:text-md tracking-large uppercase pb-2">ALFAELIAS</p>
            <p class="font-regular text-white text-sm mx-2 sm:text-md tracking-kindof opacity-20">Technology used in creating this website:</p>
            <p class="font-regular text-white text-sm mx-5 sm:text-md tracking-kindof opacity-20 pb-5">Figma (UI Design), PHP Laravel (Web Development Framework), Tailwindcss (Styling Framework) & Mysql (Database)</p>
        </div>
    </div>
<x-flash-message/>
<script defer src="{{asset('animation.js')}}"></script>
</body>
</html>
