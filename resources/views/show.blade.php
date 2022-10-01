<x-layout>
    <div class="min-h-min bg-neutral-600 text-white">
        <div class="flex flex-wrap items-start justify-center">
            <div class="md:w-5/12 w-full flex md:py-20 py-2 md:mt-0 mt-6 flex-wrap justify-center sm:mx-0">
                <div class="w-full flex justify-center md:mb-7 mb-3 md:mx-0 mx-10">
                    <img src="{{$listing->picture ?  str_contains($listing->picture, 'images') ?  asset('storage/' . $listing->picture) :  $listing->picture : asset('/storage/RACIPTITLE1.png')}}" class="fade-2 lg:h-[400px] md:h-[280px] object-contain align-middle rounded-2xl mb-2 md:mb-0">
            </div>
                <a href="{{$listing->url}}" target="_blank" class="max-h-12 fade-1 py-2 bg-neutral-400 px-2 inline-block rounded-2xl w-full md:mx-20 mx-3 text-center shadow-new hover:brightness-150 self-center tracking-widest hover:text-black">Buy</a>
                {{-- <div class="flex w-full mt-3 mx-20 space-x-2">
                    <a href="/listings/{{$listing->id}}/edit" class="max-h-12 fade-1 py-2 bg-neutral-400 inline-block rounded-2xl w-6/12 text-center shadow-new hover:brightness-150 self-center tracking-widest hover:text-gray-300"> Edit </a>
                    <form method="POST" action="/listings/{{$listing->id}}/edit" class="w-6/12 my-4">
                        @csrf
                        @method('DELETE')
                        <button class="max-h-12 fade-1 py-2 bg-neutral-400 inline-block rounded-2xl text-center shadow-new hover:bg-red-700 self-center tracking-widest hover:text-red-50 w-full">Delete</button>
                    </form>
                </div> --}}
            </div>
            <div class="md:w-5/12 w-full flex xl:pl-0 pl-3 md:pt-20 pt-5 md:pb-20 pb-5 mx-4 flex-wrap">
                <p class="mt-2 text-4xl w-full font-semibold fade-1 font-mono tracking-widest">{{$listing->name}}</p>
                <p class="mt-2 lg:text-2xl w-full font-semibold fade-2 font-mono md:tracking-wider md:text-lg lg:tracking-widest">{{$listing->description}}</p>
                <p class="mt-2 lg:text-2xl w-full font-semibold fade-2 font-sans md:tracking-wider md:text-lg lg:tracking-kindof">Price: Rp {{$listing->price}}</p>
                <x-listing-tags :tags="$listing->tags"/>
                <div class="flex flex-wrap mt-5 text-sm fade-3">

                </div>
            </div>
        </div>
    </div>
</x-layout>
