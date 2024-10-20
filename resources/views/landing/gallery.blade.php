<section id="event" class="md:h-screen bg-[#F7F9F2] py-10 md:py-8">
    <h1 class="font-bold text-darken text-center my-3 text-2xl">What We <span class="text-orange">Cover</span></h1>
    <div class="container h-full max-w-screen-xl mx-auto px-4">
        <div class="flex items-center justify-center space-x-10 lg:space-x-5 mb-12 mt-6">
            <a onclick="selectedCategory('events')"
                class="events px-6 py-2 text-gray-900 font-normal text-xl rounded-lg hover:bg-gray-200 hover:text-gray-400 transition ease-in-out cursor-pointer">Events</a>
            <a onclick="selectedCategory('collaborations')"
                class="collaborations px-6 py-2 text-gray-900 font-normal text-xl rounded-lg hover:bg-gray-200 hover:text-gray-400 transition ease-in-out cursor-pointer">Collaborations</a>
        </div>

        <div id="controls-carousel" class="relative h-5/6 w-full" data-carousel="static">
            <div class="relative h-56 overflow-hidden rounded-lg md:h-full">
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4 justify-center px-4 md:px-10 lg:px-56">
                    @foreach ($events as $event)
                        <div class="event-item {{ $event->type == 'event' ? 'event' : 'collaboration' }} hidden">
                            <img src="{{ asset('storage/' . $event->url) }}" alt="Event image"
                                class="mb-4 md:h-80 lg:mb-4 rounded-md object-cover hover:opacity-75 transition ease-in-out duration-500"
                                style="height: 300px; width: auto;">
                        </div>
                    @endforeach
                </div>
            </div>
            <!-- Carousel navigation buttons -->
            <button type="button"
                class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                data-carousel-prev>
                <span
                    class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-black dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg class="w-4 h-4 text-black dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 1 1 5l4 4" /> 
                    </svg>
                    <span class="sr-only">Previous</span>
                </span>
            </button>
            <button type="button"
                class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                data-carousel-next>
                <span
                    class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-black dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg class="w-4 h-4 text-black dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 9 4-4-4-4" />
                    </svg>
                    <span class="sr-only">Next</span>
                </span>
            </button>
        </div>
    </div>
</section>

<script>
    selectedCategory('events');

    function selectedCategory(category) {
        const eventButton = document.querySelector('.events');
        const collaborationButton = document.querySelector('.collaborations');

        const eventItems = document.querySelectorAll('.event-item');

        eventItems.forEach(item => {
            if (category === 'events') {
                item.classList.toggle('hidden', item.classList.contains('collaboration'));
                eventButton.classList.add('bg-orange');
                collaborationButton.classList.remove('bg-orange');
            } else {
                item.classList.toggle('hidden', item.classList.contains('event'));
                collaborationButton.classList.add('bg-orange');
                eventButton.classList.remove('bg-orange');
            }
        });
    }
</script>
