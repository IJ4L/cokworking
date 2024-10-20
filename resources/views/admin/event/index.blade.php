@extends('layouts.admin', ['title' => 'Dashboard - MeowCafe'])

@section('content')
    <main
        class="flex flex-col md:flex-row items-start justify-between px-4 md:px-10 bg-backgroundPrimary min-h-screen w-full">
        <div class="mt-24 w-full md:w-3/5">
            <p class="text-xl font-bold">Events & Collaborations</p>
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4 py-4">
                @foreach ($events as $event)
                    <div class="relative group">
                        <img src="{{ asset('storage/' . $event->url) }}" alt="Event Image"
                            class="object-cover rounded-lg h-64 w-full">
                        <p
                            class="absolute bottom-0 left-0 bg-primary rounded-tr-lg rounded-bl-lg text-white text-sm p-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            {{ ucfirst($event->type) }}
                        </p>
                        <button
                            class="absolute top-0 right-0 bg-white rounded-tr-lg rounded-bl-lg pr-3 pl-2 pt-2 pb-3 text-red-500 hover:text-red-700 focus:outline-none"
                            onclick="openModal({{ $event->id }})">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M 10 2 L 9 3 L 3 3 L 3 5 L 21 5 L 21 3 L 15 3 L 14 2 L 10 2 z M 4.3652344 7 L 5.8925781 20.263672 C 6.0245781 21.253672 6.877 22 7.875 22 L 16.123047 22 C 17.121047 22 17.974422 21.254859 18.107422 20.255859 L 19.634766 7 L 4.3652344 7 z">
                                </path>
                            </svg>
                        </button>
                    </div>
                @endforeach
            </div>
        </div>

        <form class="w-full md:w-1/3 py-6 mt-6 md:mt-28 bg-white border rounded-lg h-fit border-borderPrimary"
            action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="flex items-center justify-between px-8">
                <p class="text-lg font-bold">Events & Collaborations</p>
                <button type="submit" class="px-4 py-2 bg-primary text-white rounded-md">Simpan</button>
            </div>
            <div class="border-b border-b-borderPrimary w-full my-4"></div>
            <div class="px-4">
                <label for="image-upload" id="drag-area"
                    class="w-full h-[300px] md:h-[400px] bg-backgroundPrimary border-2 border-[#D9D9D9] border-dashed rounded-lg overflow-hidden cursor-pointer flex justify-center items-center">
                    <input id="image-upload" name="image" type="file" hidden accept="image/*" />
                    <div id="image-viewer"
                        class="flex flex-col items-center justify-center w-full h-full bg-center bg-no-repeat bg-cover">
                        <img id="selected-image" src="{{ asset('images/imagePlaceholder.png') }}" alt="Placeholder"
                            class="hidden w-full h-full object-contain" />
                        <p class="text-[18px]">Tarik dan lepas atau <span class="text-primary">pilih gambar</span></p>
                        <p class="text-base text-black/25">Mendukung JPG, JPEG, dan PNG</p>
                        @error('image')
                            <span class="text-lg text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                </label>
            </div>

            <div class="mt-5 px-5">
                <p class="text-lg font-semibold">Pilih Kategori:</p>
                <div class="flex items-center">
                    <input type="radio" id="event" name="category" value="event" class="mr-2" required>
                    <label for="event" class="mr-4">Event</label>
                    <input type="radio" id="collaboration" name="category" value="collaboration" class="mr-2" required>
                    <label for="collaboration">Kolaborasi</label>
                </div>
            </div>
        </form>
    </main>

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
                        class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                        Yes, I'm sure
                    </button>
                </form>
                <button type="button"
                    class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700"
                    onclick="closeModal()">No, cancel</button>
            </div>
        </div>
    </div>

    <!-- Alert -->
    <div id="alert" class="fixed bottom-0 right-0 m-6 flex items-center p-4 mb-4 text-blue-800 rounded-lg bg-blue-50"
        role="alert" style="display: none;">
        <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
            viewBox="0 0 20 20">
            <path
                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
        </svg>
        <span class="sr-only">Info</span>
        <div class="ms-3 text-sm font-medium">
            A simple info alert with an <a href="#" class="font-semibold underline hover:no-underline">example
                link</a>. Give it a click if you like.
        </div>
        <button type="button"
            class="ms-auto -mx-1.5 -my-1.5 bg-blue-50 text-blue-500 rounded-lg focus:ring-2 focus:ring-blue-400 p-1.5 hover:bg-blue-200 inline-flex items-center justify-center h-8 w-8"
            onclick="document.getElementById('alert').style.display='none';">
            <span class="sr-only">Close</span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
            </svg>
        </button>
    </div>

    <script>
        // Image upload functionality
        document.getElementById('image-upload').addEventListener('change', function(event) {
            const file = event.target.files[0];
            const imageViewer = document.getElementById('image-viewer');
            const selectedImage = document.getElementById('selected-image');

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    selectedImage.src = e.target.result;
                    selectedImage.classList.remove('hidden');
                    imageViewer.style.backgroundImage = `url(${e.target.result})`;
                };
                reader.readAsDataURL(file);
            } else {
                selectedImage.classList.add('hidden');
                imageViewer.style.backgroundImage = 'none';
            }
        });

        function openModal(eventId) {
            document.getElementById('popup-modal').classList.remove('hidden');
            document.getElementById('delete-form').action =
                `/events/${eventId}`;
        }

        function closeModal() {
            document.getElementById('popup-modal').classList.add('hidden');
        }
    </script>
@endsection
