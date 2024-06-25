<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reserevation Room Nutrihub</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    @vite('resources/css/app.css')
</head>

<body>
    <div class="min-h-screen p-6 bg-gray-100 flex items-center justify-center relative">
        <img class="absolute hidden lg:flex bottom-0 top-0 left-0 size-56" src="{{ asset('images/utils/daun.png') }}"
            alt="daun">
        <img class="absolute bottom-0 right-0 size-52 rotate-180" src="{{ asset('images/utils/daun.png') }}"
            alt="daun">
        <div class="container max-w-screen-lg mx-auto">
            <div>
                <h2 class="font-semibold text-xl text-gray-600 mb-6">Rsvp <span class="text-red-600">Nutrihub</span>
                    Makassar
                </h2>

                <div class="bg-white rounded shadow-lg p-4 px-4 md:p-8 mb-6">
                    <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 lg:grid-cols-4">
                        <div class="text-gray-600">
                            <p class="font-medium text-lg">Place Details</p>
                            <p>Please fill out all the fields.</p>
                        </div>

                        <div class="lg:col-span-3">
                            <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-5">
                                <ul
                                    class="md:col-span-5 items-center w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg sm:flex dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                    <li
                                        class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                                        <div class="flex items-center ps-3">
                                            <input id="horizontal-list-radio-license" type="radio" value=""
                                                name="list-radio"
                                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                            <label for="horizontal-list-radio-license"
                                                class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Introduction
                                                Meeting</label>
                                        </div>
                                    </li>
                                    <li
                                        class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                                        <div class="flex items-center ps-3">
                                            <input id="horizontal-list-radio-military" type="radio" value=""
                                                name="list-radio"
                                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                            <label for="horizontal-list-radio-military"
                                                class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Meeting
                                                Room</label>
                                        </div>
                                    </li>
                                    <li class="w-full dark:border-gray-600">
                                        <div class="flex items-center ps-3">
                                            <input id="horizontal-list-radio-passport" type="radio" value=""
                                                name="list-radio"
                                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                            <label for="horizontal-list-radio-passport"
                                                class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Poodcast
                                                Room</label>
                                        </div>
                                    </li>
                                </ul>

                                <form class="md:col-span-2">
                                    <label for="time"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select
                                        time:</label>
                                    <div class="relative">
                                        <div
                                            class="absolute inset-y-0 end-0 top-0 flex items-center pe-3.5 pointer-events-none">
                                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                viewBox="0 0 24 24">
                                                <path fill-rule="evenodd"
                                                    d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4a1 1 0 1 0-2 0v4a1 1 0 0 0 .293.707l3 3a1 1 0 0 0 1.414-1.414L13 11.586V8Z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                        <input type="time" id="time"
                                            class="bg-gray-50 border leading-none border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            min="09:00" max="18:00" value="00:00" required />
                                    </div>
                                </form>

                                <div class="relative h-20 w-full min-w-[200px]">
                                    <div class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select
                                        Date:</div>
                                    <div>
                                        <input id="date-picker"
                                            class="peer h-full w-full rounded-[7px] border border-blue-gray-200 bg-transparent px-5 py-3     font-sans text-sm font-normal text-blue-gray-700 outline outline-0 transition-all"
                                            placeholder=" " />
                                        <label
                                            class="before:content[' '] after:content[' '] pointer-events-none absolute left-0 -top-1.5 flex h-full w-full select-none !overflow-visible truncate text-[11px] font-normal leading-tight text-gray-500 transition-all">
                                        </label>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded shadow-lg p-4 px-4 md:p-8 mb-6">
                    <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 lg:grid-cols-4">
                        <div class="text-gray-600">
                            <p class="font-medium text-lg">Personal Details</p>
                            <p>Please fill out all the fields.</p>
                        </div>

                        <div class="lg:col-span-2">
                            <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-5">

                                <div class="md:col-span-5">
                                    <label for="full_name">Full Name</label>
                                    <input type="text" name="full_name" id="full_name"
                                        class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" />
                                </div>

                                <div class="md:col-span-5">
                                    <label for="email">Email Address</label>
                                    <input type="text" name="email" id="email"
                                        class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value=""
                                        placeholder="email@domain.com" />
                                </div>

                                <div class="md:col-span-5">
                                    <label for="address">Whatsapp</label>
                                    <input type="text" name="address" id="address"
                                        class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value=""
                                        placeholder="" />
                                </div>

                                <form class="md:col-span-5">
                                    <label for="countries"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select an
                                        option</label>
                                    <select id="countries"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option selected>Choose a Organisasion</option>
                                        <option value="PT">Perguruan Tinggi</option>
                                        <option value="KT">Komunitas</option>
                                        <option value="MD">Media</option>
                                        <option value="BU">Bisnis / UMKM</option>
                                        <option value="IS">Instansi</option>
                                        <option value="OT">Lainnya</option>
                                    </select>
                                </form>

                                <div class="md:col-span-5">
                                    <label for="address">Jabatan dalam Organisasi</label>
                                    <input type="text" name="address" id="address"
                                        class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value=""
                                        placeholder="" />
                                </div>

                                <div class="md:col-span-5 text-right mt-6">
                                    <div class="inline-flex items-end">
                                        <button
                                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Submit</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const datepicker = flatpickr("#date-picker", {});

        const calendarContainer = datepicker.calendarContainer;
        const calendarMonthNav = datepicker.monthNav;
        const calendarNextMonthNav = datepicker.nextMonthNav;
        const calendarPrevMonthNav = datepicker.prevMonthNav;
        const calendarDaysContainer = datepicker.daysContainer;

        calendarContainer.className =
            `${calendarContainer.className} bg-white p-4 border border-blue-gray-50 rounded-lg shadow-lg shadow-blue-gray-500/10 font-sans text-sm font-normal text-blue-gray-500 focus:outline-none break-words whitespace-normal`;

        calendarMonthNav.className =
            `${calendarMonthNav.className} flex items-center justify-between mb-4 [&>div.flatpickr-month]:-translate-y-3`;

        calendarNextMonthNav.className =
            `${calendarNextMonthNav.className} absolute !top-2.5 !right-1.5 h-6 w-6 bg-transparent hover:bg-blue-gray-50 !p-1 rounded-md transition-colors duration-300`;

        calendarPrevMonthNav.className =
            `${calendarPrevMonthNav.className} absolute !top-2.5 !left-1.5 h-6 w-6 bg-transparent hover:bg-blue-gray-50 !p-1 rounded-md transition-colors duration-300`;

        calendarDaysContainer.className =
            `${calendarDaysContainer.className} [&_span.flatpickr-day]:!rounded-md [&_span.flatpickr-day.selected]:!bg-gray-900 [&_span.flatpickr-day.selected]:!border-gray-900`;
    </script>

    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
</body>

</html>
