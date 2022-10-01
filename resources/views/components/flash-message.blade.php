@if(session()->has('message'))
    <div x-data="{show: true}" x-init="setTimeout(() => show = false, 2500)" x-show="show" x-transition class="rounded-b-lg lg:text-xl lg:tracking-widest md:text-md md:tracking-wider text-sm tracking-wide font-mono font-semibold fixed top-0 transform left-1/2 -translate-x-1/2 bg-white text-black lg:px-36 md:px-14 px-4 text-center py-3">
        {{session('message')}}
    </div>
@endif