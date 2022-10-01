<x-layout>
    <div>
        <p class="text-white md:my-10 sm:my-8 my-5 md:mx-48 sm:mx-20 mx-10 tracking-widest md:text-4xl sm:text-2xl text-2xl uppercase font-sans font-bold">Register:</p>
        <div class="text-white min-h-min bg-neutral-800 py-8 md:mx-48 sm:mx-20 mx-10 md:my-10 my-5 px-10 rounded-3xl shadow-new">

            <form action="/users" method="POST" enctype="multipart/form-data" class="min-h-[100px]">
                @csrf

                <div class="flex flex-wrap">

                    <div class="font-bold sm:text-2xl text-lg font-sans tracking-kinda pt-3">
                        <label for="username" class="w-full">Username:</label>
                    </div>
                    <input type="text" name="username" class="sm:pl-4 pl-2 tracking-widest h-10 w-full my-4 shadow-new rounded-xl bg-neutral-700 placeholder:opacity-70 placeholder:text-sm"
                    placeholder="Your unique username" value="{{old('series')}}"/>
                    @error('username')
                    <p class="text-red-500 text-xs mt-1 w-full">{{$message}}</p>
                    @enderror

                    <div class="font-bold sm:text-2xl text-lg font-sans tracking-kinda pt-3">
                        <label for="username" class="w-full">Firstname:</label>
                    </div>
                    <input type="text" name="firstname" class="sm:pl-4 pl-2 tracking-widest h-10 w-full my-4 shadow-new rounded-xl bg-neutral-700 placeholder:opacity-70 placeholder:text-sm"
                    placeholder="Your firstname" value="{{old('series')}}"/>
                    @error('firstname')
                    <p class="text-red-500 text-xs mt-1 w-full">{{$message}}</p>
                    @enderror

                    <div class="font-bold sm:text-2xl text-lg font-sans tracking-kinda pt-3">
                        <label for="lastname" class="w-full">Lastname:</label>
                    </div>
                    <input type="text" name="lastname" class="sm:pl-4 pl-2 tracking-widest h-10 w-full my-4 shadow-new rounded-xl bg-neutral-700 placeholder:opacity-70 placeholder:text-sm"
                    placeholder="Your lastname" value="{{old('series')}}"/>
                    @error('lastname')
                    <p class="text-red-500 text-xs mt-1 w-full">{{$message}}</p>
                    @enderror

                    <div class="font-bold sm:text-2xl text-lg font-sans tracking-kinda pt-3">
                        <label for="email" class="w-full">Email:</label>
                    </div>
                    <input type="text" name="email" class="sm:pl-4 pl-2 tracking-widest h-10 w-full my-4 shadow-new rounded-xl bg-neutral-700 placeholder:opacity-70 placeholder:text-sm"
                    placeholder="Your email" value="{{old('series')}}"/>
                    @error('email')
                    <p class="text-red-500 text-xs mt-1 w-full">{{$message}}</p>
                    @enderror

                    <div class="font-bold sm:text-2xl text-lg font-sans tracking-kinda pt-3">
                        <label for="lastname" class="w-full">Password:</label>
                    </div>
                    <input type="password" name="password" class="sm:pl-4 pl-2 tracking-widest h-10 w-full my-4 shadow-new rounded-xl bg-neutral-700 placeholder:opacity-70 placeholder:text-sm"
                    placeholder="Type your password" value="{{old('series')}}"/>
                    @error('lastname')
                    <p class="text-red-500 text-xs mt-1 w-full">{{$message}}</p>
                    @enderror

                    <div class="font-bold sm:text-2xl text-lg font-sans tracking-kinda pt-3">
                        <label for="password_confirmation" class="w-full">Confirm Password:</label>
                    </div>
                    <input type="password" name="password_confirmation" class="sm:pl-4 pl-2 tracking-widest h-10 w-full my-4 shadow-new rounded-xl bg-neutral-700 placeholder:opacity-70 placeholder:text-sm"
                    placeholder="Confirm your password" value="{{old('series')}}"/>
                    @error('password_confirmation')
                    <p class="text-red-500 text-xs mt-1 w-full">{{$message}}</p>
                    @enderror

                    <button class="bg-neutral-700 text-gray-200 my-3 py-2 px-2 rounded-lg hover:bg-neutral-500 hover:px-4 transition-all mb-5 font-mono font-semibold text-lg ">
                        Sign Up
                    </button>

                </div>

            </form>
        </div>
    </div>
</x-layout>
