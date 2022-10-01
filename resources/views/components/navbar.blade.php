<div {{$attributes->merge(['class' => "bg-neutral-900 flex w-full space-between"])}} >
    <a href="/"" name="logo" class="w-2/12">
        <div >
            <img class="check my-5 ml-5 lg:h-20 md:h-10 sm:h-8" src="{{asset("LogoWhite.png")}}"/>
        </div>
    </a>
    <div class="sm:w-5/12 invisible sm:visible"></div>
    <div class="w-10/12 sm:w-5/12 flex xl:space-x-20 lg:space-x-14 space-x-8 justify-end items-center xl:mr-20 lg:mr-10 md:mr-5 sm:mr-10 mr-5 check">
        @auth
            @if(Auth::user()->is_admin == true && Auth::user())
            <div class="flex hover:opacity-25"> <a href="/listings/manage" class="font-regular text-white lg:text-xl sm:text-md text-sm font-sans sm:tracking-quite tracking-kinda">Manage Listing</a></div>
            <div class="flex hover:opacity-25 align-middle pt-4">
                <form method="POST" action="/logout">
                    @csrf
                    <button type="submit" class="font-regular text-white lg:text-xl sm:text-md text-sm font-sans sm:tracking-quite tracking-kinda">
                        Logout
                    </button>
                </form>
            </div>
            @elseif(Auth::user()->is_admin == false && Auth::user())
            <div class="flex hover:opacity-25 align-middle pt-4">
                <form method="POST" action="/logout">
                    @csrf
                    <button type="submit" class="font-regular text-white lg:text-xl sm:text-md text-sm font-sans sm:tracking-quite tracking-kinda">
                        Logout
                    </button>
                </form>
            </div>
            @endif
        @else
        <div class="flex hover:opacity-25"> <a href="/users/register" class="font-regular text-white lg:text-xl sm:text-md text-sm font-sans sm:tracking-quite tracking-kinda">Register</a></div>
        <div class="flex hover:opacity-25"><a href="/login" class="font-regular text-white lg:text-xl sm:text-md text-sm font-sans sm:tracking-quite tracking-kinda">Login</a></div>
        @endauth
    </div>
</div>
