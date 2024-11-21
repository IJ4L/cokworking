@extends('layouts.admin', ['title' => 'Dashboard - MeowCafe'])

@section('content')
    <main class="px-4 md:px-10 bg-backgroundPrimary min-h-screen w-full">
        <p class="text-xl font-bold mt-24">Dashboard</p>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-5">
            <table class="w-full text-sm text-left rtl:text-right text-gray-700 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-blue-100 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        @foreach ($reservationCounts as $category => $count)
                            <th scope="col" class="px-6 py-3">{{ $category }}</th>
                        @endforeach
                        <th scope="col" class="px-6 py-3">Overall Total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        @foreach ($reservationCounts as $count)
                            <td class="px-6 py-4">{{ $count }}</td>
                        @endforeach
                        <td class="px-6 py-4 font-bold">{{ $totalReservations }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-4">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-yellow-100">
                    <tr>
                        <th scope="col" class="px-6 py-3">No</th>
                        <th scope="col" class="px-6 py-3">Customer Name</th>
                        <th scope="col" class="px-6 py-3">Organisation</th>
                        <th scope="col" class="px-6 py-3">Whatsapp</th>
                        <th scope="col" class="px-6 py-3">Room</th>
                        <th scope="col" class="px-6 py-3">Date</th>
                        <th scope="col" class="px-6 py-3">Time</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($reservations as $reservation)
                        <tr class="bg-white border-b hover:bg-gray-50">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900">{{ $reservation->id }}</th>
                            <td class="px-6 py-4">{{ $reservation->full_name }}</td>
                            <td class="px-6 py-4">{{ $reservation->organization->name }}</td>
                            <td class="px-6 py-4">{{ $reservation->whatsapp }}</td>
                            <td class="px-6 py-4">{{ $reservation->room->name ?? 'N/A' }}</td>
                            <td class="px-6 py-4">{{ \Carbon\Carbon::parse($reservation->date)->format('d-m-Y') }}</td>
                            <td class="px-6 py-4">{{ $reservation->start_time }} - {{ $reservation->end_time }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="px-6 py-4 text-center">No reservations found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="flex justify-end ">
            <nav aria-label="Page navigation example" class="my-4">
                <ul class="inline-flex -space-x-px text-sm ">
                    @if ($reservations->onFirstPage())
                        <li>
                            <span
                                class="flex items-center justify-center px-3 h-8 text-gray-500 bg-gray-200 border border-gray-300 rounded-s-lg">Previous</span>
                        </li>
                    @else
                        <li>
                            <a href="{{ $reservations->previousPageUrl() }}"
                                class="flex items-center justify-center px-3 h-8 text-gray-500 bg-white border border-gray-300 rounded-s-lg hover:bg-gray-100">Previous</a>
                        </li>
                    @endif

                    @foreach ($reservations->links()->elements[0] as $page => $url)
                        <li>
                            <a href="{{ $url }}"
                                class="flex items-center justify-center px-3 h-8 leading-tight {{ $page == $reservations->currentPage() ? 'text-blue-600 bg-blue-50' : 'text-gray-500 bg-white hover:bg-gray-100' }} border border-gray-300">
                                {{ $page }}
                            </a>
                        </li>
                    @endforeach

                    @if ($reservations->hasMorePages())
                        <li>
                            <a href="{{ $reservations->nextPageUrl() }}"
                                class="flex items-center justify-center px-3 h-8 text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100">Next</a>
                        </li>
                    @else
                        <li>
                            <span
                                class="flex items-center justify-center px-3 h-8 text-gray-500 bg-gray-200 border border-gray-300 rounded-e-lg">Next</span>
                        </li>
                    @endif
                </ul>
            </nav>

            </class=>
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const dropdownButton = document.getElementById('dropdownOrgButton');
            const dropdownMenu = document.getElementById('dropdownOrg');
            const filterRadios = document.querySelectorAll('input[name="filter-org"]');
            const tableSearchInput = document.getElementById('table-search');

            dropdownButton.addEventListener('click', function() {
                dropdownMenu.classList.toggle('hidden');
            });

            filterRadios.forEach(radio => {
                radio.addEventListener('change', function() {
                    const selectedValue = this.value;
                    dropdownButton.textContent = selectedValue || "Select Organization";
                    dropdownMenu.classList.add('hidden');
                    applyFilters(selectedValue, tableSearchInput.value);
                });
            });

            tableSearchInput.addEventListener('input', function() {
                const selectedValue = document.querySelector('input[name="filter-org"]:checked')?.value;
                applyFilters(selectedValue, this.value);
            });

            function applyFilters(organization, search) {
                const params = new URLSearchParams();
                if (organization) {
                    params.append('organization', organization);
                }
                if (search) {
                    params.append('search', search);
                }
                window.location.search = params.toString();
            }

            // Click outside to close dropdown
            document.addEventListener('click', function(event) {
                if (!dropdownButton.contains(event.target) && !dropdownMenu.contains(event.target)) {
                    dropdownMenu.classList.add('hidden');
                }
            });
        });
    </script>
@endsection
