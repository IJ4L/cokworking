<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reservation Room Nutrihub</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    @vite('resources/css/app.css')
</head>

<body>
    <div class="min-h-screen p-6 bg-gray-100 flex items-center justify-center relative">
        <div class="container max-w-screen-lg mx-auto">
            <div class="flex items-center mb-2">
                <a href="{{ route('landing.page') }}" class="pr-4 text-[30px]">←</a>
                <h2 class="font-semibold text-xl text-gray-600">Rsvp <span class="text-red-600">Nutrihub</span>
                    Makassar</h2>
            </div>

            <!-- Notification Section -->
            @if (session('success'))
                <div class="bg-green-500 text-white p-4 rounded-md mb-4">
                    {{ session('success') }}
                </div>
            @elseif (session('error'))
                <div class="bg-red-500 text-white p-4 rounded-md mb-4">
                    {{ session('error') }}
                </div>
            @endif

            <form action="{{ route('reservations.store') }}" method="post">
                @csrf
                <div class="bg-white rounded shadow-lg p-4 mb-6">
                    <div class="grid gap-4 text-sm grid-cols-1 lg:grid-cols-4">
                        <div class="text-gray-600">
                            <p class="font-medium text-lg">Place Details</p>
                            <p>Please fill out all the fields.</p>
                        </div>

                        <div class="lg:col-span-3">
                            <div class="grid gap-4 grid-cols-1 md:grid-cols-5">
                                <div class="md:col-span-2">
                                    <label for="start_time" class="block mb-2">Start time:</label>
                                    <input type="time" id="start_time" name="start_time"
                                        class="h-10 border mt-1 rounded px-4 w-full" required />
                                </div>

                                <div class="md:col-span-2">
                                    <label for="end_time" class="block mb-2">End time:</label>
                                    <input type="time" id="end_time" name="end_time"
                                        class="h-10 border mt-1 rounded px-4 w-full" required />
                                </div>
                            </div>

                            <div class="relative mt-2">
                                <label for="date-picker" class="block mb-2">Select Date:</label>
                                <input id="date-picker" name="date" class="h-full w-full border rounded px-5 py-3"
                                    placeholder=" " required />
                            </div>

                            <div class="md:col-span-5">
                                <label for="attendees" class="block mb-2">Number of Attendees</label>
                                <input type="number" name="attendees" id="attendees"
                                    class="h-10 border mt-1 rounded px-4 w-full" required />
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded shadow-lg p-4 mb-6">
                    <div class="grid gap-4 text-sm grid-cols-1 lg:grid-cols-4">
                        <div class="text-gray-600">
                            <p class="font-medium text-lg">Personal Details</p>
                            <p>Please fill out all the fields.</p>
                        </div>

                        <div class="lg:col-span-2">
                            <div class="grid gap-4 grid-cols-1 md:grid-cols-5">
                                <div class="md:col-span-5">
                                    <label for="full_name" class="block mb-2">Full Name</label>
                                    <input type="text" name="full_name" id="full_name"
                                        class="h-10 border mt-1 rounded px-4 w-full" required />
                                </div>

                                <div class="md:col-span-5">
                                    <label for="email" class="block mb-2">Email Address</label>
                                    <input type="email" name="email" id="email"
                                        class="h-10 border mt-1 rounded px-4 w-full" required
                                        placeholder="email@domain.com" />
                                </div>

                                <div class="md:col-span-5">
                                    <label for="whatsapp" class="block mb-2">Whatsapp</label>
                                    <input type="text" name="whatsapp" id="whatsapp"
                                        class="h-10 border mt-1 rounded px-4 w-full" required />
                                </div>

                                <div class="md:col-span-5">
                                    <label for="organisation"
                                        class="block mb-2 text-sm font-medium text-gray-900">Select an
                                        Organization</label>
                                    <select id="organization" name="organization_id" required>
                                        <option value="" disabled selected>Choose an Organization</option>
                                        <option value="1">Perguruan Tinggi</option>
                                        <option value="2">Komunitas</option>
                                        <option value="3">Media</option>
                                        <option value="4">Bisnis / UMKM</option>
                                        <option value="5">Instansi</option>
                                        <option value="6">Lainnya</option>
                                    </select>
                                </div>

                                <div class="md:col-span-5 text-right mt-6">
                                    <button type="submit"
                                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        const datepicker = flatpickr("#date-picker", {});
    </script>
</body>

</html>
