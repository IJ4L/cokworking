@extends('layouts.admin', ['title' => 'Create Testimonial - MeowCafe'])

@section('content')
    <main class="p-7 bg-backgroundPrimary min-h-screen w-full mt-[70px]">
        <div class="flex items-center justify-between">
            <div class="flex items-center">
                {{-- <a href="{{ route('testimonials.index') }}" class="px-4 text-[30px]">←</a> --}}
                <p class="text-3xl font-bold">Add Testimonial</p>
            </div>
            <div class="flex gap-2">
                <button type="submit" form="form"
                    class="inline-flex justify-center h-full py-3 text-base font-bold text-white rounded-md bg-blue-500 w-36">
                    <p class="-mb-[2px]">Add</p>
                </button>

            </div>
        </div>

        <form id="form" method="POST" action="{{ route('testimonials.store') }}" enctype="multipart/form-data"
            class="grid grid-cols-5 font-semibold mt-7 gap-x-8 text-md">
            @csrf
            <div class="flex flex-col col-span-3 gap-6 px-8 py-6 bg-white border rounded-lg border-borderPrimary">
                <div class="flex flex-col gap-3">
                    <label for="customer_name">Customer Name</label>
                    <input type="text" id="customer_name" name="customer_name" placeholder="Input customer name"
                        class="px-5 py-2 border rounded-md border-borderPrimary bg-backgroundPrimary" />
                    @error('customer_name')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex flex-col gap-3">
                    <label for="testimonial">Testimonial</label>
                    <textarea id="testimonial" name="testimonial" placeholder="Input testimonial"
                        class="px-5 py-2 border rounded-md border-borderPrimary bg-backgroundPrimary" rows="4"></textarea>
                    @error('testimonial')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <section class="col-span-2 py-6 bg-white border rounded-lg h-fit border-borderPrimary">
                <p class="px-8 text-lg font-bold">Testimonial Image</p>
                <div class="h-[1px] border-b border-b-borderPrimary w-full my-4"></div>
                <div class="px-4">
                    <label for="image-upload" id="drag-area"
                        class="w-full h-[280px] bg-backgroundPrimary border-2 border-[#D9D9D9] border-dashed rounded-lg overflow-hidden cursor-pointer flex justify-center items-center">
                        <input id="image-upload" name="image" type="file" hidden accept="image/*" />
                        <div id="image-viewer"
                            class="flex flex-col items-center justify-center w-full h-full bg-center bg-no-repeat bg-cover">
                            <img id="selected-image" src="{{ asset('images/imagePlaceholder.png') }}" alt="Placeholder"
                                class="hidden" />
                            <p class="text-[18px]">Tarik dan lepas atau <span class="text-primary">pilih gambar</span></p>
                            <p class="text-base text-black/25">Mendukung JPG, JPEG, dan PNG</p>
                            @error('image')
                                <span class="text-lg text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                    </label>
                </div>
            </section>
        </form>
    </main>
@endsection

@section('scripts')
    <script>
        document.getElementById('image-upload').addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const img = document.getElementById('selected-image');
                    img.src = e.target.result;
                    img.classList.remove('hidden');
                }
                reader.readAsDataURL(file);
            }
        });
    </script>
@endsection
