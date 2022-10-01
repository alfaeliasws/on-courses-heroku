<x-layout>
    <div>
        <p class="text-white md:my-10 sm:my-8 my-5 md:mx-48 sm:mx-20 mx-10 tracking-widest md:text-4xl sm:text-2xl text-2xl uppercase font-sans font-bold">Create:</p>
        <div class="text-white min-h-min mb-10 bg-neutral-800 md:mx-48 sm:mx-20 mx-10 md:my-10 my-5 sm:px-10 px-5 rounded-3xl shadow-new">

            <form action="/listings" method="POST" enctype="multipart/form-data" class="min-h-[100px]">
                @csrf

                <div class="flex flex-wrap">

                    <div class="font-bold sm:text-2xl text-lg font-sans tracking-kinda pt-3">
                        <label for="name" class="w-full">Name:</label>
                    </div>
                    <input type="text" name="name" class="sm:pl-4 pl-2 tracking-widest h-10 w-full my-4 shadow-new rounded-xl bg-neutral-600 placeholder:opacity-70 placeholder:text-sm"
                    placeholder="Use This Format 'RACIP #number'" value="{{old('name')}}"/>
                    @error('name')
                    <p class="text-red-500 text-xs mt-1 w-full">{{$message}}</p>
                    @enderror

                    <div class="font-bold sm:text-2xl text-lg font-sans tracking-kinda pt-5 w-full mb-3">
                    <p class="mb-4">Picture:</p>
                    <label for="picture" class="upload-file text-gray-400 hover:text-gray-200 bg-neutral-600 w-full text-lg rounded-lg hover:px-6 hover:bg-neutral-400 transition-all">Choose File</label>
                    <input id="picture" type="file" name="picture"/>
                    </label>
                    <div class="text-sm mt-2 font-medium tracking-wide" id="file-upload-filename"></div>
                    </div>
                    @error('picture')
                    <p class="text-red-500 text-xs mt-1 w-full">{{$message}}</p>
                    @enderror

                    <div class="font-bold sm:text-2xl text-lg font-sans tracking-kinda pt-3">
                        <label for="tags" class="w-full">Categories:</label>
                    </div>
                    <input type="text" name="tags" class="sm:pl-4 pl-2 tracking-widest h-10 w-full my-4 shadow-new rounded-xl bg-neutral-600 placeholder:opacity-70 placeholder:text-sm"
                    placeholder="Your Category put ',' between categories " value="{{old('tags')}}"/>
                    @error('tags')
                    <p class="text-red-500 text-xs mt-1 w-full">{{$message}}</p>
                    @enderror

                    <div class="font-bold sm:text-2xl text-lg font-sans tracking-kinda pt-3">
                        <label for="price" class="w-full">Price:</label>
                    </div>
                    <input type="number" name="price" class="sm:pl-4 pl-2 tracking-widest h-10 w-full my-4 shadow-new rounded-xl bg-neutral-600 placeholder:opacity-70 placeholder:text-sm"
                    placeholder="The Price of The Course" value="{{old('price')}}"/>
                    @error('price')
                    <p class="text-red-500 text-xs mt-1 w-full">{{$message}}</p>
                    @enderror

                    <div class="font-bold sm:text-2xl text-lg font-sans tracking-kinda pt-3">
                        <label for="description" class="w-full">Description:</label>
                    </div>
                    <textarea name="description" class="h-60 pt-2 sm:pl-4 pl-2 tracking-widest w-full my-4 shadow-new rounded-xl bg-neutral-600 placeholder:opacity-70 placeholder:text-sm"
                    placeholder="Description" value="{{old('description')}}"></textarea>
                    @error('description')
                    <p class="text-red-500 text-xs mt-1 w-full">{{$message}}</p>
                    @enderror

                    <button class="bg-neutral-600 text-gray-200 py-2 px-2 rounded-lg hover:bg-neutral-400 hover:px-4 transition-all mb-5 font-mono font-semibold text-lg ">
                        Create
                    </button>
                </div>

            </form>
        </div>
    </div>
</x-layout>
