<aside id="default-sidebar" 
    {{-- :class="sidebar ? 'fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0 transform-none' : 'fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0'" --}}
    :class="sidebar ? 'fixed top-0 left-0 z-40 w-64 h-screen transition-all' : 'fixed top-0 left-0 z-40 w-16 sm:w-64 h-screen transition-all'"
    aria-label="Sidebar"
    x-transition
    x-on:click.outside="sidebar = (window.visualViewport.width >= 680)? true : false"
    >
    <div class="h-full px-3 py-4 overflow-y-auto bg-primary-600">
        <div class="w-full mb-4">
            <a href="{{ route('home') }}/"
                x-show="sidebar"
                class="block cursor-pointer p-1.5 font-sans text-base font-medium leading-relaxed text-inherit antialiased rounded-lg bg-white">                
                <img class="w-40 sm:w-40 m-auto" src="{{ asset('img/flamaire-logo-2.png') }}" alt="" srcset="">
            </a>
            <button aria-controls="default-sidebar" type="button" x-show="!sidebar" x-on:click="sidebar = !sidebar" class="inline-flex items-center p-2 text-sm text-white rounded-lg sm:hidden hover:text-primary-600 hover:bg-white focus:outline-none focus:ring-2 focus:ring-white">
                <span class="sr-only">Open sidebar</span>
                <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
                </svg>
            </button>
        </div>
        <ul class="space-y-2 font-medium">
            <li>
                <a href="{{ route('dashboard') }}/" wire:navigate.hover class="flex items-center p-2 text-white rounded-lg hover:text-tertiary hover:bg-secondary-200 group">
                    <svg class="w-5 h-5 text-white transition duration-75 group-hover:text-tertiary" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                        <path d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z"/>
                        <path d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z"/>
                    </svg>
                    <span class="ms-3" x-show="sidebar">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="#" wire:navigate.hover class="flex items-center p-2 text-white rounded-lg hover:text-tertiary hover:bg-secondary-200 group">
                    <svg class="w-5 h-5 text-white transition duration-75 group-hover:text-tertiary" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd" d="M8 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4H6Zm7.25-2.095c.478-.86.75-1.85.75-2.905a5.973 5.973 0 0 0-.75-2.906 4 4 0 1 1 0 5.811ZM15.466 20c.34-.588.535-1.271.535-2v-1a5.978 5.978 0 0 0-1.528-4H18a4 4 0 0 1 4 4v1a2 2 0 0 1-2 2h-4.535Z" clip-rule="evenodd"/>
                    </svg>                      
                    <span class="ms-3" x-show="sidebar">Usuarios</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin-categorias') }}/" wire:navigate.hover class="flex items-center p-2 text-white rounded-lg hover:text-tertiary hover:bg-secondary-200 group">
                    <svg class="w-5 h-5 text-white transition duration-75 group-hover:text-tertiary" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd" d="M5.005 10.19a1 1 0 0 1 1 1v.233l5.998 3.464L18 11.423v-.232a1 1 0 1 1 2 0V12a1 1 0 0 1-.5.866l-6.997 4.042a1 1 0 0 1-1 0l-6.998-4.042a1 1 0 0 1-.5-.866v-.81a1 1 0 0 1 1-1ZM5 15.15a1 1 0 0 1 1 1v.232l5.997 3.464 5.998-3.464v-.232a1 1 0 1 1 2 0v.81a1 1 0 0 1-.5.865l-6.998 4.042a1 1 0 0 1-1 0L4.5 17.824a1 1 0 0 1-.5-.866v-.81a1 1 0 0 1 1-1Z" clip-rule="evenodd"/>
                        <path d="M12.503 2.134a1 1 0 0 0-1 0L4.501 6.17A1 1 0 0 0 4.5 7.902l7.002 4.047a1 1 0 0 0 1 0l6.998-4.04a1 1 0 0 0 0-1.732l-6.997-4.042Z"/>
                    </svg>
                    <span class="ms-3" x-show="sidebar">Categorías</span>
                </a>
            </li>
        </ul>
        <ul class="pt-4 mt-4 space-y-2 font-medium border-t border-gray-200">
            <li>
                <a href="{{ route('user-logout') }}/" class="flex items-center p-2 text-white rounded-lg hover:text-tertiary hover:bg-secondary-200 group">
                    <svg class="flex-shrink-0 w-5 h-5 text-white transition duration-75 group-hover:text-tertiary" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H8m12 0-4 4m4-4-4-4M9 4H7a3 3 0 0 0-3 3v10a3 3 0 0 0 3 3h2"/>
                    </svg>
                    <span class="flex-1 ms-3 whitespace-nowrap" x-show="sidebar">Logout</span>
                </a>
            </li>
        </ul>
    </div>
 </aside>