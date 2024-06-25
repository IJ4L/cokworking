<div id="reservation" class="mb-28 md:mt-24 lg:h-screen flex flex-col justify-center items-center">
    <div data-aos="flip-down" class="text-center max-w-screen-md mx-auto">
        <h1 class="text-3xl font-bold mb-4">Reservation <span class="text-orange">interest?</span></h1>
        <p class="text-gray-500">Skilline is a platform that allows educators to create online classes whereby they
            can
            store the course materials online; manage assignments, quizzes and exams; monitor due dates; grade
            results
            and provide students with feedback all in one place.</p>
    </div>
    <div data-aos="fade-up"
        class="flex flex-col md:flex-row justify-center space-y-5 md:space-y-0 md:space-x-6 lg:space-x-10 mt-7">
        <div id="card" class="card relative md:w-5/12 cursor-pointer" onclick="showTable('card', 'table')">
            <img class="rounded-2xl md:h-72 object-cover" src="{{ asset('images/outdoor.jpg') }}" alt="">
        </div>
        <div id="card2" class="card relative md:w-5/12 cursor-pointer" onclick="showTable('card2', 'table')">
            <img class="rounded-2xl md:h-72 object-cover" src="{{ asset('images/indoor_2.jpg') }}" alt="">
        </div>
        <div id="card3" class="card relative md:w-5/12 cursor-pointer" onclick="showTable('card3', 'table')">
            <img class="rounded-2xl md:h-72 object-cover" src="{{ asset('images/studio.jpg') }}" alt="">
        </div>
    </div>

    <div id="table" class="hidden mt-4">
        @include('partials.calender')
    </div>
</div>

<script>
    function showTable(clickedCardId, tableId) {
        const cards = document.querySelectorAll('.card');
        cards.forEach(card => {
            card.classList.add('hidden');
            if (card.id === clickedCardId) {
                console.log(card.id);
            }
        });
        document.getElementById(tableId).classList.remove('hidden');
    }
</script>
