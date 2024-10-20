<div class="md:pl-10 md:mb-20 lg:pl-28 items-center flex flex-col-reverse md:flex-row md:space-x-10">
    <div id="controls-carousel" class="relative w-full" data-carousel="static">
        <div class="relative overflow-hidden rounded-lg h-screen md:h-96">
            @foreach ($testimonials as $index => $testimonial)
                <div class="hidden duration-700 ease-in-out" data-carousel-item @class(['active' => $index === 0])>
                    <div class="flex flex-col md:flex-row items-center justify-between md:pr-10 lg:pr-44">
                        <div data-aos="zoom-in-right" class="md:w-5/12">
                            <div class="flex items-center space-x-20 mb-5">
                                <span class="border border-gray-300 w-14 absolute"></span>
                                <h1 class="text-gray-400 tracking-widest text-sm">TESTIMONIAL</h1>
                            </div>
                            <h1 class="font-semibold text-darken text-2xl lg:pr-40">What They Say?</h1>
                            <p class="text-gray-500 my-5 lg:pr-36">{{ $testimonial->testimonial }}</p>
                            <p class="text-gray-500 my-5 lg:pr-36">- {{ $testimonial->customer_name }}</p>
                        </div>
                        <div data-aos="zoom-in-left" class="md:flex md:justify-center">
                            <div class="h-96 w-72 bg-red-400 rounded-xl relative">
                                <img src="{{ asset('storage/' . $testimonial->image) }}"
                                    alt="{{ $testimonial->customer_name }}" class="h-96 w-72 rounded-xl">
                            </div>
                            <div class="absolute top-0 -end-14 z-50 flex items-center justify-center h-full px-6 cursor-pointer group focus:outline-none"
                                data-carousel-next>
                                <span
                                    class="inline-flex items-center justify-center w-14 h-14 rounded-full shadow-md bg-white dark:bg-gray-800/30 group-hover:bg-blue-100 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                    <svg class="w-5 h-5 text-blue-400 dark:text-gray-800 rtl:rotate-180"
                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 6 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 9 4-4-4-4" />
                                    </svg>
                                    <span class="sr-only">Next</span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
