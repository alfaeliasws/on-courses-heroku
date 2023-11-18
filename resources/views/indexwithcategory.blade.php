<x-layout>
    <div class="min-h-screen z-0 bg-neutral-300 shadow-skill rounded-b-xl">
        <div class="xl:h-[550px] h-[900px] lg:h-[600px] md:h-[700px] sm:h-[800px] bg-neutral-300 flex flex-wrap">
            <div class="flex lg:w-7/12 md:w-full text-center sm:w-full lg:text-left md:text-center sm:text-center flex-wrap xl:my-32 sm:px-20 px-12 lg:my-20">
                    <p class="fade lg:text-4xl md:text-xl tracking-wider w-full font-bold font-mono md:mt-10 sm:mt-10 mt-5 lg:mt-0 text-neutral-800">On-Courses</p>
                    <p class="fade-1 lg:text-lg md:text-md tracking-wider leading-8 w-full pt-1 uppercase font-mono text-neutral-800">
                        Find your passion by learning here <br> This is where you find what you want to do in life</p>
                    <p class="text-neutral-800 fade-2 lg:text-regular md:text-sm lg:leading-8 md:leading-9 w-full font-mono">
                        Please be ready to overcome the world, join us and we will make sure that you will be commited in what you will do in life!
                    </p>
            </div>
            <div class="flex lg:w-5/12 w-full sm:mt-10 mt-10 px-auto sn:pl-5 pl-0 2xl:justify-center md:justify-center sm:justify-center lg:mt-0 lg:items-center justify-center">
                <img src="{{asset("LogoBlack.png")}}" class="rounded-lg fade-3 shadow-skill xl:h-[400px] lg:h-[350px] sm:h-[300px] h-[300px] object-contain"/>
            </div>
        </div>

        <div class="text-white" id="title                                                                                                                           ">

            <p class="check w-full text-neutral-800 text-center xl:mt-20 sm:mt-10 mt-10 lg:text-4xl md:text-2xl font-semibold font-mono uppercase tracking-wider mb-5">Online Courses</p>

            @if((Auth::user()?->is_admin == true) || (Auth::user()?->is_admin === 0))
            <div class="w-full flex flex-wrap text-white mb-10 justify-center">
                <div class="min-w-min my-4 rounded-lg shadow-new transition-all hover:text-black bg-neutral-600 hover:bg-neutral-300 flex  mx-3 " id="free">
                    <a href="/?free=free" onclick="free()" class="mx-3 py-4 tracking-widest hover:">Show Free Courses</a>
                </div>

                <div class="min-w-min my-4 rounded-lg shadow-new transition-all hover:text-black bg-neutral-600 hover:bg-neutral-300 flex  mx-3 " id="free">
                    <a href="/?desc=desc" onclick="free()" class="mx-3 py-4 tracking-widest hover:">Sort By High Price</a>
                </div>

                <div class="min-w-min my-4 rounded-lg shadow-new transition-all hover:text-black bg-neutral-600 hover:bg-neutral-300 flex  mx-3 " id="free">
                    <a href="/?asc=asc" onclick="free()" class="mx-3 py-4 tracking-widest hover:">Sort By Low Price</a>
                </div>

                <div class="min-w-min my-4 rounded-lg shadow-new transition-all hover:text-black bg-neutral-600 hover:bg-neutral-300 flex  mx-3 " id="free">
                    <a href="/#title" id="categoryButton" class="mx-3 py-4 tracking-widest hover:">Hide Categories</a>
                </div>

                <div class="min-w-min my-4 rounded-lg shadow-new transition-all hover:text-black bg-neutral-600 hover:bg-neutral-300 flex  mx-3 " id="free">
                    <a href="/indexwithall/#title" onclick="popular()" class="mx-3 py-4 tracking-widest hover:">Show Popular Categeory</a>
                </div>
            </div>

            <div id="container" class="min-h-min">

                <div class="flex flex-wrap justify-center mt-5" id="category">
                    <p class="w-full text-center mb-4 text-black font-mono tracking-kinda text-lg">All Categories</p>
                    @foreach($tags as $tag)
                    <li class="fade font-mono flex items-center justify-center bg-neutral-800 text-white rounded-xl py-2 tracking-wide hover:bg-neutral-400 transition-all hover:tracking-kindof px-3 mr-2 text-xs">
                        <a href="/?tag={{$tag}}">{{$tag}}</a>
                    </li>
                    @endforeach
                </div>
            </div>

            @else
            @endif

            <x-search />

            <div class="flex flex-wrap xl:mx-28 lg:mx-18 md:mx-16 sm:mx-10 mx-10">

                @unless(count($listings) == 0)

                @foreach($listings as $listing)
                <x-card :listing="$listing"/>
                @endforeach

                @else

            </div>
            <p class="w-full text-center text-neutral-800 min-h-min py-10 font-mono font-bold text-2xl">No Listings Found</p>
            @endunless
        </div>


    </div>

    <div class="text-white w-full min-w-screen">
        <div class="mt-6 p-4">
            {{-- {{$listings->links()}} --}}
        </div>
    </div>

</x-layout>
