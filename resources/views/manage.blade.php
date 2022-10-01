<x-layout>
    <div>
        <p class="text-white md:my-10 sm:my-8 my-5 lg:mx-48 md:mx-20 sm:mx-10 mx-10 tracking-widest md:text-4xl sm:text-2xl text-2xl uppercase font-sans font-bold">Admin Dashboard:</p>
        <div class="text-white min-h-min sm:min-w-min mb-10 py-4 bg-neutral-900 lg:mx-48 lg:mx-20 sm:mx-10 mx-10 md:my-10 my-5 px-5 rounded-3xl shadow-new">
        @unless($listings->isEmpty())
        @foreach($listings as $listing)
            <div class="hidden sm:flex sm:flex-nowrap flex-wrap w-full bg-neutral-800 h-[20px] rounded-lg mt-3 mb-3 space-x-3 py-8 px-2">
                <div class = "w-3/12 mx-5 items-center flex" >
                    <a href="/listings/{{$listing->id}}" class="text-gray-200 hover:brightness-200 hover:font-bold hover:tracking-kinda transition-all font-mono font-semibold">{{$listing->name}}</a>
                </div>
                <div class="md:w-3/12 flex items-center">
                    <a href="/create" class="transition-all hover:tracking-kindof tracking-widest bg-neutral-400 py-1 px-10 rounded-lg shadow-newest hover:bg-neutral-400"> Create </a>
                </div>
                <div class="md:w-3/12 flex items-center ml-3">
                    <a href="/listings/{{$listing->id}}/edit" class="transition-all hover:tracking-kindof tracking-widest bg-neutral-400 py-1 px-10 rounded-lg shadow-newest hover:bg-neutral-400"> Edit </a>
                </div>
                    <div class="md:w-3/12 self-center">
                        <form method="POST" action="{{route('deleteRoute',['listing' => $listing->id])}}" class="my-auto">
                            @csrf
                            @method('DELETE')
                            <button class="transition-all hover:tracking-kindof tracking-widest bg-neutral-400 py-1 px-8 rounded-lg shadow-newest hover:bg-red-700 flex-none" >Delete</button>
                    </form>
                </div>
            </div>
            <div class="sm:hidden flex w-full bg-neutral-800 min-h-min py-3 rounded-lg mt-3 mb-3">
                <div class = "w-5/12 justify-center flex items-center" >
                    <a href="/listings/{{$listing->id}}" class="text-gray-200 hover:brightness-200 hover:font-bold hover:tracking-kinda transition-all font-mono font-semibold">{{$listing->name}}</a>
                </div>
                <div class="w-7/12 flex flex-wrap py-3 pr-2 space-y-3">
                    <a href="/create" class="w-full transition-all text-center hover:tracking-kindof tracking-widest bg-neutral-400 py-1 px-10 rounded-lg shadow-newest hover:bg-neutral-400"> Create </a>
                    <a href="/listings/{{$listing->id}}/edit" class="text-center w-full transition-all hover:tracking-kindof tracking-widest bg-neutral-400 py-1 px-10 rounded-lg shadow-newest hover:bg-neutral-400"> Edit </a>
                    <form method="POST" action="/listings/{{$listing->id}}" class="w-full">
                        @csrf
                        @method('DELETE')
                        <button class="w-full transition-all text-center hover:tracking-kindof tracking-widest bg-neutral-400 py-1 px-8 rounded-lg shadow-newest hover:bg-red-700 flex-none" >Delete</button>
                    </form>
                </div>
            </div>
            @endforeach
        @endunless
        @if($listings->isEmpty())
        <div class="font-mono font-semibold tracking-kinda text-center w-full min-h-[200px] py-5">
            <p class="mt-5 mb-8 pb-5"> Haven't Create Any Listings Yet? Create Here!</p>
            <div class="mb-20">
                <a href="/create" class="transition-all hover:tracking-kindof tracking-widest bg-neutral-600 py-3 px-5 rounded-lg shadow-newest hover:bg-neutral-400"> Create </a>
            </div>
        </div>
        @endif
    </div>
    <div class="text-white font-mono flex-wrap flex min-h-min sm:min-w-min mb-10 py-4 bg-neutral-900 lg:mx-48 lg:mx-20 sm:mx-10 mx-10 md:my-10 my-5 px-5 rounded-3xl shadow-new">
        <p class="mt-5 mb-8 pb-5 w-full text-center">Statistic </p>
        <div class="mb-20 text-center w-full">
            <a href="/manage/statistic" class="transition-all hover:tracking-kindof tracking-widest bg-neutral-600 py-3 px-5 rounded-lg shadow-newest hover:bg-neutral-400"> Get Simple Statistic </a>
        </div>
    </div>
    <div class="text-white font-mono flex-wrap flex min-h-min sm:min-w-min mb-10 py-4 bg-neutral-900 lg:mx-48 lg:mx-20 sm:mx-10 mx-10 md:my-10 my-5 px-5 rounded-3xl shadow-new">
        <p class="mt-5 mb-8 pb-5 w-full text-center">Users </p>
        <div class="mb-20 text-center w-full">
            <a href="/manage/users" class="transition-all hover:tracking-kindof tracking-widest bg-neutral-600 py-3 px-5 rounded-lg shadow-newest hover:bg-neutral-400"> Get User </a>
        </div>
    </div>
</x-layout>
