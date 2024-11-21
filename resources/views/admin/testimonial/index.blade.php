@extends('layouts.admin', ['title' => 'Testimonials - MeowCafe'])

@section('content')
    <main class="px-4 md:px-10 bg-backgroundPrimary min-h-screen w-full ">
        <div class="flex items-start justify-between mt-24">
            <h1 class="text-xl font-bold">Testimonials</h1>
            <a href="{{ route('testimonials.create') }}"
                class="inline-flex items-center justify-center h-full py-3 text-base font-bold text-white rounded-md bg-blue-500 w-40">
                Add Testimonial
            </a>
        </div>

        <div class="mt-5">
            {{-- @if (session('success'))
                <div class="bg-green-500 text-white p-4 rounded-md mb-4">
                    {{ session('success') }}
                </div>
            @endif --}}

            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">Customer Name</th>
                            <th scope="col" class="px-6 py-3">Testimonial</th>
                            <th scope="col" class="px-6 py-3">Image</th>
                            <th scope="col" class="px-6 py-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($testimonials as $testimonial)
                            <tr
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $testimonial->customer_name }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $testimonial->testimonial }}
                                </td>
                                <td class="px-6 py-4">
                                    @if ($testimonial->image)
                                        <img src="{{ asset('storage/' . $testimonial->image) }}" alt="Testimonial Image"
                                            class="h-20 w-20 object-cover">
                                    @else
                                        No Image
                                    @endif
                                </td>
                                <td class="px-6 py-4">

                                    <button
                                        class=" top-0 right-0 bg-white rounded-tr-lg rounded-bl-lg pr-3 pl-2 pt-2 pb-3 text-red-500 hover:text-red-700 focus:outline-none"
                                        onclick="openDeleteModal({{ $testimonial->id }})"">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                d="M 10 2 L 9 3 L 3 3 L 3 5 L 21 5 L 21 3 L 15 3 L 14 2 L 10 2 z M 4.3652344 7 L 5.8925781 20.263672 C 6.0245781 21.253672 6.877 22 7.875 22 L 16.123047 22 C 17.121047 22 17.974422 21.254859 18.107422 20.255859 L 19.634766 7 L 4.3652344 7 z">
                                            </path>
                                        </svg>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Custom Pagination -->
            <div class="flex justify-end mt-4">
                <nav aria-label="Page navigation example">
                    <ul class="inline-flex -space-x-px text-sm">
                        @if ($testimonials->onFirstPage())
                            <li>
                                <span
                                    class="flex items-center justify-center px-3 h-8 text-gray-500 bg-gray-200 border border-gray-300 rounded-s-lg">Previous</span>
                            </li>
                        @else
                            <li>
                                <a href="{{ $testimonials->previousPageUrl() }}"
                                    class="flex items-center justify-center px-3 h-8 text-gray-500 bg-white border border-gray-300 rounded-s-lg hover:bg-gray-100">Previous</a>
                            </li>
                        @endif

                        @foreach ($testimonials->links()->elements[0] as $page => $url)
                            <li>
                                <a href="{{ $url }}"
                                    class="flex items-center justify-center px-3 h-8 leading-tight {{ $page == $testimonials->currentPage() ? 'text-blue-600 bg-blue-50' : 'text-gray-500 bg-white hover:bg-gray-100' }} border border-gray-300">
                                    {{ $page }}
                                </a>
                            </li>
                        @endforeach

                        @if ($testimonials->hasMorePages())
                            <li>
                                <a href="{{ $testimonials->nextPageUrl() }}"
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
            </div>
        </div>

        <!-- Modal -->
        <div id="popup-modal" tabindex="-1"
            class="hidden fixed inset-0 z-50 bg-black bg-opacity-50 flex items-center justify-center">
            <div class="relative p-4 w-full max-w-md max-h-full bg-white rounded-lg shadow">
                <button type="button"
                    class="absolute top-3 right-2.5 flex items-center justify-center text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8"
                    onclick="closeModal()">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="p-4 mt-4 text-center">
                    <h3 class="mb-5 text-lg font-normal text-gray-500">Are you sure you want to delete this item?</h3>
                    <form id="delete-form" action="" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                            Yes, I'm sure
                        </button>
                    </form>
                    <button type="button"
                        class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700"
                        onclick="closeModal()">No, cancel</button>
                </div>
            </div>
        </div>
    </main>

    <script>
        let deleteModal = document.getElementById('popup-modal');
        let deleteForm = document.getElementById('delete-form');

        function openDeleteModal(id) {
            deleteModal.classList.remove('hidden');
            deleteForm.action = `/testimonials/${id}`;
        }

        function closeModal() {
            deleteModal.classList.add('hidden');
        }

        window.onclick = function(event) {
            if (event.target === deleteModal) {
                closeModal();
            }
        };
    </script>
@endsection
