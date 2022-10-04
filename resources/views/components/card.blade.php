@props(['listing'])

<div {{$attributes->merge(['class' => 'sm:w-6/12 lg:w-4/12 2xl:w-3/12 mx-auto check'])}}>
    <a href="/listings/{{$listing->id}}" class="hover:saturate-150 text-gray-300 transition-all">
        <div class="xl:mx-8 sm:mx-3 bg-neutral-800 lg:h-[422px] hover:bg-neutral-600 2xl:px-4 xl:px-2 lg:px-4 px-5 py-8 md:px-5 md:py-9 sm:py-8 mb-10 xl:py-5 lg:py-7 rounded-2xl shadow-new hover:pb-9 hover:mb-6 transition-all duration-500">
            <img src="{{$listing->picture ?  str_contains($listing->picture, 'images') ?  'storage/' . $listing->picture :  $listing->picture : asset('LogoWhite.png')}}" class="mb-6 rounded-xl xl:w-[250px] md:w-[300px] lg:h-[266px] object-cover lg:text-xl md:text-md lg:px-0 xl:mx-auto mx-auto sm:mb-4 shadow-newest">
            <p class="xl:ml-3 md:ml-0 sm:ml-3 uppercase xl:tracking-wide xl:text-xl lg:text-lg text-xl font-semibold font-mono sm:mb-1 mb-2">{{$listing->name}}</p>
            <p class="xl:ml-3 md:ml-0 sm:ml-3 xl:tracking-wider xl:text-lg lg:text-md text-lg sm:mb-1 mb-2">{{$listing->description}}</p>
            <p class="xl:ml-3 md:ml-0 sm:ml-3 xl:tracking-wider xl:text-sm lg:text-xs text-sm sm:mb-1 mb-2">Price: Rp{{$listing->price}}</p>
        </div>
    </a>
</div>
