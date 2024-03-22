<aside id="logo-sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full bg-gray-50 border-r-8 border-r-gray-100/50 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
    aria-label="Sidebar">
            <div class="flex items-center justify-start rtl:justify-end py-4">
                <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar"
                    aria-controls="logo-sidebar" type="button"
                    class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                    <span class="sr-only">Open sidebar</span>
                    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path clip-rule="evenodd" fill-rule="evenodd"
                            d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                        </path>
                    </svg>
                </button>
                <a href="https://flowbite.com" class="flex ml-2">
                    <x-application-logo class="me-3" alt="FlowBite Logo" />
                </a>
            </div>
    <div class="h-full px-3 pb-4 overflow-y-auto bg-gray-50 dark:bg-gray-800">
        <ul class="space-y-2 font-medium">
            <li>
                <a href="{{ route('dashboard') }}"
                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white {{ Route::is('dashboard') ? 'bg-red-500 text-white hover:bg-red-400' : 'hover:bg-gray-100 font-normal' }} dark:hover:bg-gray-700 group">
                    <svg class="w-4 h-4 text-inherit transition duration-75 dark:text-gray-400 group-hover:text-inherit dark:group-hover:text-white"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                        <path
                            d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                        <path
                            d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                    </svg>
                    <span class="ms-3">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{ route('taken') }}"
                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white {{ Route::is('taken') ? 'bg-red-500 text-white hover:bg-red-400' : 'hover:bg-gray-100 font-normal' }} dark:hover:bg-gray-700 group">
                    <svg class="flex-shrink-0 w-4 h-4 text-inherit transition duration-75 dark:text-gray-400 group-hover:text-inherit dark:group-hover:text-white"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m20.25 7.5-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z" />
                    </svg>
                    <span class="flex-1 ms-3 whitespace-nowrap text-md">Teken Out</span>
                </a>
            </li>
            <li>
                <a href="{{ route('returns') }}"
                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white {{ Route::is('returns') ? 'bg-red-500 text-white hover:bg-red-400' : 'hover:bg-gray-100 font-normal' }} dark:hover:bg-gray-700 group">
                    <svg class="flex-shrink-0 w-4 h-4 text-inherit transition duration-75 dark:text-gray-400 group-hover:text-inherit dark:group-hover:text-white"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 21v-8.25M15.75 21v-8.25M8.25 21v-8.25M3 9l9-6 9 6m-1.5 12V10.332A48.36 48.36 0 0 0 12 9.75c-2.551 0-5.056.2-7.5.582V21M3 21h18M12 6.75h.008v.008H12V6.75Z" />
                    </svg>
                    <span class="flex-1 ms-3 whitespace-nowrap text-md">Returns</span>
                </a>
            </li>
            <li>
                <a href="{{ route('expenditures') }}"
                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white {{ Route::is('expenditures') ? 'bg-red-500 text-white hover:bg-red-400' : 'hover:bg-gray-100 font-normal' }} dark:hover:bg-gray-700 group">
                    <svg class="flex-shrink-0 w-4 h-4 text-inherit transition duration-75 dark:text-gray-400 group-hover:text-inherit dark:group-hover:text-white"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 8.25v-1.5m0 1.5c-1.355 0-2.697.056-4.024.166C6.845 8.51 6 9.473 6 10.608v2.513m6-4.871c1.355 0 2.697.056 4.024.166C17.155 8.51 18 9.473 18 10.608v2.513M15 8.25v-1.5m-6 1.5v-1.5m12 9.75-1.5.75a3.354 3.354 0 0 1-3 0 3.354 3.354 0 0 0-3 0 3.354 3.354 0 0 1-3 0 3.354 3.354 0 0 0-3 0 3.354 3.354 0 0 1-3 0L3 16.5m15-3.379a48.474 48.474 0 0 0-6-.371c-2.032 0-4.034.126-6 .371m12 0c.39.049.777.102 1.163.16 1.07.16 1.837 1.094 1.837 2.175v5.169c0 .621-.504 1.125-1.125 1.125H4.125A1.125 1.125 0 0 1 3 20.625v-5.17c0-1.08.768-2.014 1.837-2.174A47.78 47.78 0 0 1 6 13.12M12.265 3.11a.375.375 0 1 1-.53 0L12 2.845l.265.265Zm-3 0a.375.375 0 1 1-.53 0L9 2.845l.265.265Zm6 0a.375.375 0 1 1-.53 0L15 2.845l.265.265Z" />
                    </svg>
                    <span class="flex-1 ms-3 whitespace-nowrap text-md">Expenditures</span>
                </a>
            </li>
            <li>
                <a href="{{ route('supports') }}"
                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white {{ Route::is('supports') ? 'bg-red-500 text-white hover:bg-red-400' : 'hover:bg-gray-100 font-normal' }} dark:hover:bg-gray-700 group">
                    <svg class="flex-shrink-0 w-4 h-4 text-inherit transition duration-75 dark:text-gray-400 group-hover:text-inherit dark:group-hover:text-white"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M21 11.25v8.25a1.5 1.5 0 0 1-1.5 1.5H5.25a1.5 1.5 0 0 1-1.5-1.5v-8.25M12 4.875A2.625 2.625 0 1 0 9.375 7.5H12m0-2.625V7.5m0-2.625A2.625 2.625 0 1 1 14.625 7.5H12m0 0V21m-8.625-9.75h18c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125h-18c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z" />
                    </svg>

                    <span class="flex-1 ms-3 whitespace-nowrap text-md">Support</span>
                </a>
            </li>
            <li>
                <a href="{{ route('allowances') }}"
                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white {{ Route::is('allowances') ? 'bg-red-500 text-white hover:bg-red-400' : 'hover:bg-gray-100 font-normal' }} dark:hover:bg-gray-700 group">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m-3-2.818.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                      </svg>
                      

                    <span class="flex-1 ms-3 whitespace-nowrap text-md">Staff Allowance</span>
                </a>
            </li>
        </ul>

        <ul class="pt-4 mt-4 space-y-2 font-medium border-t border-gray-200 dark:border-gray-700">
            <p class="text-sm text-gray-400">REPORTS</p>
            <li>
                <button type="button"
                    class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 {{ in_array(Route::currentRouteName(), ['monthly_report']) ? 'bg-red-500 text-white hover:bg-red-400' : 'hover:bg-gray-100 font-normal' }}"
                    aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M2.25 12.75V12A2.25 2.25 0 0 1 4.5 9.75h15A2.25 2.25 0 0 1 21.75 12v.75m-8.69-6.44-2.12-2.12a1.5 1.5 0 0 0-1.061-.44H4.5A2.25 2.25 0 0 0 2.25 6v12a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9a2.25 2.25 0 0 0-2.25-2.25h-5.379a1.5 1.5 0 0 1-1.06-.44Z" />
                    </svg>

                    <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Reports</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 4 4 4-4" />
                    </svg>
                </button>
                <ul id="dropdown-example"
                    class="{{ in_array(Route::currentRouteName(), ['monthly_report']) ? '' : 'hidden' }} py-2 space-y-2">
                    <li>
                        <a href="{{ route('monthly_report') }}"
                            class="flex font-normal items-center w-full p-2 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 {{ Route::is('monthly_report') ? 'bg-gray-200 font-bold' : 'font-normal text-gray-900' }}">
                            Monthly Report
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
        <ul class="pt-4 mt-4 space-y-2 font-medium border-t border-gray-200 dark:border-gray-700">
            <p class="text-sm text-gray-400">SETTINGS</p>
            <li>
                <a href="{{ route('payment_methods') }}"
                    class="flex items-center p-2 text-gray-900 transition duration-75 rounded-lg hover:bg-gray-100 {{ (Route::is('payment_methods') || Route::is('role_clients')) ? 'bg-red-500 text-white hover:bg-red-400' : 'hover:bg-gray-100 font-normal' }} dark:hover:bg-gray-700 dark:text-white group">
                    <svg class="flex-shrink-0 w-4 h-4 text-inherit transition duration-75 dark:text-gray-400 group-hover:text-inherit dark:group-hover:text-white"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 17 20">
                        <path
                            d="M7.958 19.393a7.7 7.7 0 0 1-6.715-3.439c-2.868-4.832 0-9.376.944-10.654l.091-.122a3.286 3.286 0 0 0 .765-3.288A1 1 0 0 1 4.6.8c.133.1.313.212.525.347A10.451 10.451 0 0 1 10.6 9.3c.5-1.06.772-2.213.8-3.385a1 1 0 0 1 1.592-.758c1.636 1.205 4.638 6.081 2.019 10.441a8.177 8.177 0 0 1-7.053 3.795Z" />
                    </svg>
                    <span class="ms-3">Payment Methods</span>
                </a>
            </li>
            <li>
                <a href="{{ route('clients') }}"
                    class="flex items-center p-2 text-gray-900 transition duration-75 rounded-lg hover:bg-gray-100 {{ Route::is('clients') ? 'bg-red-500 text-white hover:bg-red-400' : 'hover:bg-gray-100 font-normal' }} dark:hover:bg-gray-700 dark:text-white group">
                    <svg class="flex-shrink-0 w-4 h-4 text-inherit transition duration-75 dark:text-gray-400 group-hover:text-inherit dark:group-hover:text-white"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 20">
                        <path
                            d="M16 14V2a2 2 0 0 0-2-2H2a2 2 0 0 0-2 2v15a3 3 0 0 0 3 3h12a1 1 0 0 0 0-2h-1v-2a2 2 0 0 0 2-2ZM4 2h2v12H4V2Zm8 16H3a1 1 0 0 1 0-2h9v2Z" />
                    </svg>
                    <span class="ms-3">Clients</span>
                </a>
            </li>
            <li>
                <a href="{{ route('staffs') }}"
                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white {{ Route::is('staffs') ? 'bg-red-500 text-white hover:bg-red-400' : 'hover:bg-gray-100 font-normal' }} dark:hover:bg-gray-700 group">
                    <svg class="flex-shrink-0 w-4 h-4 text-inherit transition duration-75 dark:text-gray-400 group-hover:text-inherit dark:group-hover:text-white"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                        <path
                            d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z" />
                    </svg>
                    <span class="flex-1 ms-3 whitespace-nowrap text-md">Staffs</span>
                </a>
            </li>
        </ul>
    </div>
</aside>
