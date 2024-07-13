<div class="w-full mt-8 grid grid-cols-2 sm:grid-cols-3 xl:grid-cols-4 gap-2">
    @if ($categorias->count())
        @foreach ($categorias as $categoria)
        <a href="#"
            class="group max-w-md p-6 rounded-2xl shadow-lg bg-white border border-gray-300 text-black hover:border-transparent hover:bg-gradient-to-b hover:from-tertiary hover:via-primary-600 hover:to-primary-500 hover:text-white hover:shadow-primary-600 focus:border-none focus:bg-gradient-to-b focus:from-tertiary focus:via-primary-600 focus:to-primary-500 focus:text-white focus:shadow-primary-600">
            <div class="h-full flex flex-col items-center justify-center gap-1">
                <div class="w-full flex flex-col justify-center items-center">
                    @if ($categoria->url_img)
                        <div class="rounded-2xl bg-white p-2 mb-2">
                            <img class="rounded-2xl" src="{{Storage::url($categoria->url_img)}}" alt="Categoría">
                        </div>
                    @endif
                    <h4 class="font-bold text-center text-3xl max-sm:text-3xl max-sm:text-center max-md:text-2xl text-tertiary group-hover:text-white group-focus:text-white">
                        {{$categoria->nombre}}
                    </h4>
                </div>
                <div class="w-full flex">
                    <div class="w-full flex flex-wrap items-center justify-center font-semibold text-left text-lg max-sm:text-center text-gray-600 group-hover:text-white group-focus:text-white mt-1 gap-2">
                        @if (isset($subcategorias[$categoria->id]))
                            @foreach ($subcategorias[$categoria->id] as $subCategoria)
                            <span class="text-current cursor-pointer hover:underline">{{$subCategoria->nombre}}</span>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </a>  
        @endforeach
    @else
        <a href="#"
            class="group max-w-md p-6 rounded-2xl shadow-lg bg-white border border-collapse border-gray-300 text-black hover:border-none hover:bg-gradient-to-b hover:from-tertiary hover:via-primary-600 hover:to-primary-500 hover:text-white hover:shadow-primary-600 focus:border-none focus:bg-gradient-to-b focus:from-tertiary focus:via-primary-600 focus:to-primary-500 focus:text-white focus:shadow-primary-600">
            <div class="flex flex-col items-center justify-center gap-1">
                <div
                    class="w-full flex items-end justify-start max-sm:flex-col max-sm:justify-end max-sm:items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" preserveAspectRatio="none" fill="currentColor"
                        class="w-12 mr-2 fill-tertiary stroke-tertiary group-hover:stroke-white group-hover:fill-white group-focus:stroke-white group-focus:fill-white">
                        <path fill-rule="evenodd"
                            d="M9.315 7.584C12.195 3.883 16.695 1.5 21.75 1.5a.75.75 0 01.75.75c0 5.056-2.383 9.555-6.084 12.436A6.75 6.75 0 019.75 22.5a.75.75 0 01-.75-.75v-4.131A15.838 15.838 0 016.382 15H2.25a.75.75 0 01-.75-.75 6.75 6.75 0 017.815-6.666zM15 6.75a2.25 2.25 0 100 4.5 2.25 2.25 0 000-4.5z"
                            clip-rule="evenodd"></path>
                        <path
                            d="M5.26 17.242a.75.75 0 10-.897-1.203 5.243 5.243 0 00-2.05 5.022.75.75 0 00.625.627 5.243 5.243 0 005.022-2.051.75.75 0 10-1.202-.897 3.744 3.744 0 01-3.008 1.51c0-1.23.592-2.323 1.51-3.008z">
                        </path>
                    </svg>
                    <h4
                        class="font-bold text-left text-3xl max-sm:text-3xl max-sm:text-center max-md:text-2xl  text-tertiary group-hover:text-white group-focus:text-white">
                        Categoría</h4>
                </div>
                <div class="w-full flex">
                    <p
                        class="font-semibold text-left text-sm max-sm:text-center text-gray-600 group-hover:text-white group-focus:text-white mt-1">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                </div>
            </div>
        </a>
        <a href="#"
            class="group max-w-md p-6 rounded-2xl shadow-lg bg-white border border-collapse border-gray-300 text-black hover:border-none hover:bg-gradient-to-b hover:from-tertiary hover:via-primary-600 hover:to-primary-500 hover:text-white hover:shadow-primary-600 focus:border-none focus:bg-gradient-to-b focus:from-tertiary focus:via-primary-600 focus:to-primary-500 focus:text-white focus:shadow-primary-600">
            <div class="flex flex-col items-center justify-center gap-1">
                <div
                    class="w-full flex items-end justify-start max-sm:flex-col max-sm:justify-end max-sm:items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                        class="w-12 mr-2 fill-tertiary stroke-tertiary group-hover:stroke-white group-hover:fill-white group-focus:stroke-white group-focus:fill-white">
                        <path fill-rule="evenodd"
                            d="M9.315 7.584C12.195 3.883 16.695 1.5 21.75 1.5a.75.75 0 01.75.75c0 5.056-2.383 9.555-6.084 12.436A6.75 6.75 0 019.75 22.5a.75.75 0 01-.75-.75v-4.131A15.838 15.838 0 016.382 15H2.25a.75.75 0 01-.75-.75 6.75 6.75 0 017.815-6.666zM15 6.75a2.25 2.25 0 100 4.5 2.25 2.25 0 000-4.5z"
                            clip-rule="evenodd"></path>
                        <path
                            d="M5.26 17.242a.75.75 0 10-.897-1.203 5.243 5.243 0 00-2.05 5.022.75.75 0 00.625.627 5.243 5.243 0 005.022-2.051.75.75 0 10-1.202-.897 3.744 3.744 0 01-3.008 1.51c0-1.23.592-2.323 1.51-3.008z">
                        </path>
                    </svg>
                    <h4
                        class="font-bold text-left text-3xl max-sm:text-3xl max-sm:text-center max-md:text-2xl  text-tertiary group-hover:text-white group-focus:text-white">
                        Categoría</h4>
                </div>
                <div class="w-full flex">
                    <p
                        class="font-semibold text-left text-sm max-sm:text-center text-gray-600 group-hover:text-white group-focus:text-white mt-1">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                </div>
            </div>
        </a>
        <a href="#"
            class="group max-w-md p-6 rounded-2xl shadow-lg bg-white border border-collapse border-gray-300 text-black hover:border-none hover:bg-gradient-to-b hover:from-tertiary hover:via-primary-600 hover:to-primary-500 hover:text-white hover:shadow-primary-600 focus:border-none focus:bg-gradient-to-b focus:from-tertiary focus:via-primary-600 focus:to-primary-500 focus:text-white focus:shadow-primary-600">
            <div class="flex flex-col items-center justify-center gap-1">
                <div
                    class="w-full flex items-end justify-start max-sm:flex-col max-sm:justify-end max-sm:items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                        class="w-12 mr-2 fill-tertiary stroke-tertiary group-hover:stroke-white group-hover:fill-white group-focus:stroke-white group-focus:fill-white">
                        <path fill-rule="evenodd"
                            d="M9.315 7.584C12.195 3.883 16.695 1.5 21.75 1.5a.75.75 0 01.75.75c0 5.056-2.383 9.555-6.084 12.436A6.75 6.75 0 019.75 22.5a.75.75 0 01-.75-.75v-4.131A15.838 15.838 0 016.382 15H2.25a.75.75 0 01-.75-.75 6.75 6.75 0 017.815-6.666zM15 6.75a2.25 2.25 0 100 4.5 2.25 2.25 0 000-4.5z"
                            clip-rule="evenodd"></path>
                        <path
                            d="M5.26 17.242a.75.75 0 10-.897-1.203 5.243 5.243 0 00-2.05 5.022.75.75 0 00.625.627 5.243 5.243 0 005.022-2.051.75.75 0 10-1.202-.897 3.744 3.744 0 01-3.008 1.51c0-1.23.592-2.323 1.51-3.008z">
                        </path>
                    </svg>
                    <h4
                        class="font-bold text-left text-3xl max-sm:text-3xl max-sm:text-center max-md:text-2xl  text-tertiary group-hover:text-white group-focus:text-white">
                        Categoría</h4>
                </div>
                <div class="w-full flex">
                    <p
                        class="font-semibold text-left text-sm max-sm:text-center text-gray-600 group-hover:text-white group-focus:text-white mt-1">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                </div>
            </div>
        </a>
        <a href="#"
            class="group max-w-md p-6 rounded-2xl shadow-lg bg-white border border-collapse border-gray-300 text-black hover:border-none hover:bg-gradient-to-b hover:from-tertiary hover:via-primary-600 hover:to-primary-500 hover:text-white hover:shadow-primary-600 focus:border-none focus:bg-gradient-to-b focus:from-tertiary focus:via-primary-600 focus:to-primary-500 focus:text-white focus:shadow-primary-600">
            <div class="flex flex-col items-center justify-center gap-1">
                <div
                    class="w-full flex items-end justify-start max-sm:flex-col max-sm:justify-end max-sm:items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                        class="w-12 mr-2 fill-tertiary stroke-tertiary group-hover:stroke-white group-hover:fill-white group-focus:stroke-white group-focus:fill-white">
                        <path fill-rule="evenodd"
                            d="M9.315 7.584C12.195 3.883 16.695 1.5 21.75 1.5a.75.75 0 01.75.75c0 5.056-2.383 9.555-6.084 12.436A6.75 6.75 0 019.75 22.5a.75.75 0 01-.75-.75v-4.131A15.838 15.838 0 016.382 15H2.25a.75.75 0 01-.75-.75 6.75 6.75 0 017.815-6.666zM15 6.75a2.25 2.25 0 100 4.5 2.25 2.25 0 000-4.5z"
                            clip-rule="evenodd"></path>
                        <path
                            d="M5.26 17.242a.75.75 0 10-.897-1.203 5.243 5.243 0 00-2.05 5.022.75.75 0 00.625.627 5.243 5.243 0 005.022-2.051.75.75 0 10-1.202-.897 3.744 3.744 0 01-3.008 1.51c0-1.23.592-2.323 1.51-3.008z">
                        </path>
                    </svg>
                    <h4
                        class="font-bold text-left text-3xl max-sm:text-3xl max-sm:text-center max-md:text-2xl  text-tertiary group-hover:text-white group-focus:text-white">
                        Categoría</h4>
                </div>
                <div class="w-full flex">
                    <p
                        class="font-semibold text-left text-sm max-sm:text-center text-gray-600 group-hover:text-white group-focus:text-white mt-1">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                </div>
            </div>
        </a>
        <a href="#"
            class="group max-w-md p-6 rounded-2xl shadow-lg bg-white border border-collapse border-gray-300 text-black hover:border-none hover:bg-gradient-to-b hover:from-tertiary hover:via-primary-600 hover:to-primary-500 hover:text-white hover:shadow-primary-600 focus:border-none focus:bg-gradient-to-b focus:from-tertiary focus:via-primary-600 focus:to-primary-500 focus:text-white focus:shadow-primary-600">
            <div class="flex flex-col items-center justify-center gap-1">
                <div
                    class="w-full flex items-end justify-start max-sm:flex-col max-sm:justify-end max-sm:items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                        class="w-12 mr-2 fill-tertiary stroke-tertiary group-hover:stroke-white group-hover:fill-white group-focus:stroke-white group-focus:fill-white">
                        <path fill-rule="evenodd"
                            d="M9.315 7.584C12.195 3.883 16.695 1.5 21.75 1.5a.75.75 0 01.75.75c0 5.056-2.383 9.555-6.084 12.436A6.75 6.75 0 019.75 22.5a.75.75 0 01-.75-.75v-4.131A15.838 15.838 0 016.382 15H2.25a.75.75 0 01-.75-.75 6.75 6.75 0 017.815-6.666zM15 6.75a2.25 2.25 0 100 4.5 2.25 2.25 0 000-4.5z"
                            clip-rule="evenodd"></path>
                        <path
                            d="M5.26 17.242a.75.75 0 10-.897-1.203 5.243 5.243 0 00-2.05 5.022.75.75 0 00.625.627 5.243 5.243 0 005.022-2.051.75.75 0 10-1.202-.897 3.744 3.744 0 01-3.008 1.51c0-1.23.592-2.323 1.51-3.008z">
                        </path>
                    </svg>
                    <h4
                        class="font-bold text-left text-3xl max-sm:text-3xl max-sm:text-center max-md:text-2xl  text-tertiary group-hover:text-white group-focus:text-white">
                        Categoría</h4>
                </div>
                <div class="w-full flex">
                    <p
                        class="font-semibold text-left text-sm max-sm:text-center text-gray-600 group-hover:text-white group-focus:text-white mt-1">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                </div>
            </div>
        </a>
        <a href="#"
            class="group max-w-md p-6 rounded-2xl shadow-lg bg-white border border-collapse border-gray-300 text-black hover:border-none hover:bg-gradient-to-b hover:from-tertiary hover:via-primary-600 hover:to-primary-500 hover:text-white hover:shadow-primary-600 focus:border-none focus:bg-gradient-to-b focus:from-tertiary focus:via-primary-600 focus:to-primary-500 focus:text-white focus:shadow-primary-600">
            <div class="flex flex-col items-center justify-center gap-1">
                <div
                    class="w-full flex items-end justify-start max-sm:flex-col max-sm:justify-end max-sm:items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                        class="w-12 mr-2 fill-tertiary stroke-tertiary group-hover:stroke-white group-hover:fill-white group-focus:stroke-white group-focus:fill-white">
                        <path fill-rule="evenodd"
                            d="M9.315 7.584C12.195 3.883 16.695 1.5 21.75 1.5a.75.75 0 01.75.75c0 5.056-2.383 9.555-6.084 12.436A6.75 6.75 0 019.75 22.5a.75.75 0 01-.75-.75v-4.131A15.838 15.838 0 016.382 15H2.25a.75.75 0 01-.75-.75 6.75 6.75 0 017.815-6.666zM15 6.75a2.25 2.25 0 100 4.5 2.25 2.25 0 000-4.5z"
                            clip-rule="evenodd"></path>
                        <path
                            d="M5.26 17.242a.75.75 0 10-.897-1.203 5.243 5.243 0 00-2.05 5.022.75.75 0 00.625.627 5.243 5.243 0 005.022-2.051.75.75 0 10-1.202-.897 3.744 3.744 0 01-3.008 1.51c0-1.23.592-2.323 1.51-3.008z">
                        </path>
                    </svg>
                    <h4
                        class="font-bold text-left text-3xl max-sm:text-3xl max-sm:text-center max-md:text-2xl  text-tertiary group-hover:text-white group-focus:text-white">
                        Categoría</h4>
                </div>
                <div class="w-full flex">
                    <p
                        class="font-semibold text-left text-sm max-sm:text-center text-gray-600 group-hover:text-white group-focus:text-white mt-1">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                </div>
            </div>
        </a>
    @endif
</div>
