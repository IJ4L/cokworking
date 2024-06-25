<div class="max-w shadow-lg mx-auto flex flex-col md:flex-row">
    <div class="md:p-8 p-5 dark:bg-gray-800 bg-white rounded-t">
        <div class="px-2 flex items-center justify-between">
            <span id="monthYear" class="focus:outline-none text-base font-bold dark:text-gray-100 text-gray-800"></span>
            <div class="flex items-center">
                <button id="prevMonth" aria-label="calendar backward"
                    class="focus:text-gray-400 hover:text-gray-400 text-gray-800 dark:text-gray-100">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-left"
                        width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <polyline points="15 6 9 12 15 18" />
                    </svg>
                </button>
                <button id="nextMonth" aria-label="calendar forward"
                    class="focus:text-gray-400 hover:text-gray-400 ml-3 text-gray-800 dark:text-gray-100">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-right"
                        width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <polyline points="9 6 15 12 9 18" />
                    </svg>
                </button>
            </div>
        </div>
        <div class="flex items-center justify-between pt-12 overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr>
                        <th>
                            <div class="w-full flex justify-center">
                                <p class="text-base font-medium text-center text-gray-800 dark:text-gray-100">Mo</p>
                            </div>
                        </th>
                        <th>
                            <div class="w-full flex justify-center">
                                <p class="text-base font-medium text-center text-gray-800 dark:text-gray-100">Tu</p>
                            </div>
                        </th>
                        <th>
                            <div class="w-full flex justify-center">
                                <p class="text-base font-medium text-center text-gray-800 dark:text-gray-100">We</p>
                            </div>
                        </th>
                        <th>
                            <div class="w-full flex justify-center">
                                <p class="text-base font-medium text-center text-gray-800 dark:text-gray-100">Th</p>
                            </div>
                        </th>
                        <th>
                            <div class="w-full flex justify-center">
                                <p class="text-base font-medium text-center text-gray-800 dark:text-gray-100">Fr</p>
                            </div>
                        </th>
                        <th>
                            <div class="w-full flex justify-center">
                                <p class="text-base font-medium text-center text-gray-800 dark:text-gray-100">Sa</p>
                            </div>
                        </th>
                        <th>
                            <div class="w-full flex justify-center">
                                <p class="text-base font-medium text-center text-gray-800 dark:text-gray-100">Su</p>
                            </div>
                        </th>
                    </tr>
                </thead>
                <tbody id="calendarBody">
                    <!-- Calendar days will be inserted here -->
                </tbody>
            </table>
        </div>
    </div>

    <div class="md:py-8 py-5 md:px-16 px-5 dark:bg-gray-700 bg-gray-50 rounded-b relative">
        <div class="absolute -top-4 -right-3 md:-top-2 md:-right-2 h-8 w-8 bg-red-nut rounded-full cursor-pointer"
            onclick="showCards('table')"></div>
        <div class="px-4">
            <div class="border-b pb-4 border-gray-400 border-dashed">
                <p class="text-xs font-light leading-3 text-gray-500 dark:text-gray-300">9:00 AM</p>
                <a tabindex="0"
                    class="focus:outline-none text-lg font-medium leading-5 text-gray-800 dark:text-gray-100 mt-2">Zoom
                    call with design team</a>
                <p class="text-sm pt-2 leading-4 text-gray-600 dark:text-gray-300">Discussion on UX
                    sprint and Wireframe review</p>
            </div>
            <div class="border-b pb-4 border-gray-400 border-dashed pt-5">
                <p class="text-xs font-light leading-3 text-gray-500 dark:text-gray-300">10:00 AM</p>
                <a tabindex="0"
                    class="focus:outline-none text-lg font-medium leading-5 text-gray-800 dark:text-gray-100 mt-2">Orientation
                    session with new hires</a>
            </div>
            <div class="border-b pb-4 border-gray-400 border-dashed pt-5">
                <p class="text-xs font-light leading-3 text-gray-500 dark:text-gray-300">9:00 AM</p>
                <a tabindex="0"
                    class="focus:outline-none text-lg font-medium leading-5 text-gray-800 dark:text-gray-100 mt-2">Zoom
                    call with design team</a>
                <p class="text-sm pt-2 leading-4 text-gray-600 dark:text-gray-300">Discussion on UX
                    sprint and Wireframe review</p>
            </div>
            <p id="clickedDateDisplay" class="mt-5"></p>
        </div>
    </div>
</div>

<script>
    function showCards(tableId) {
        const cards = document.querySelectorAll('.card');
        cards.forEach(card => {
            card.classList.remove('hidden');
        });
        document.getElementById(tableId).classList.add('hidden');
    }

    document.addEventListener('DOMContentLoaded', function() {
        const monthYear = document.getElementById('monthYear');
        const calendarBody = document.getElementById('calendarBody');
        const prevMonth = document.getElementById('prevMonth');
        const nextMonth = document.getElementById('nextMonth');

        let currentDate = new Date();
        let selectedDate = null;
        let currentYear = currentDate.getFullYear();
        let currentMonth = currentDate.getMonth();
        let selected = null;

        function renderCalendar() {
            const year = currentDate.getFullYear();
            const month = currentDate.getMonth();
            const firstDayOfMonth = new Date(year, month, 1).getDay();
            const lastDateOfMonth = new Date(year, month + 1, 0).getDate();
            const lastDayOfLastMonth = new Date(year, month, 0).getDate();

            monthYear.textContent = currentDate.toLocaleDateString('default', {
                month: 'long',
                year: 'numeric'
            });

            calendarBody.innerHTML = '';

            let date = 1;
            let nextMonthDate = 1;
            for (let i = 0; i < 6; i++) {
                let row = document.createElement('tr');

                for (let j = 0; j < 7; j++) {
                    let cell = document.createElement('td');
                    let cellText = '';

                    if (i === 0 && j < (firstDayOfMonth + 6) % 7) {
                        cellText = lastDayOfLastMonth - (firstDayOfMonth + 6) % 7 + j + 1;
                        cell.classList.add('text-gray-400');
                    } else if (date > lastDateOfMonth) {
                        cellText = nextMonthDate++;
                        cell.classList.add('text-gray-400');
                    } else {
                        cellText = date;
                        date++;
                    }

                    cell.classList.add('pt-4');
                    let cellDiv = document.createElement('div');
                    cellDiv.classList.add('px-2', 'py-2', 'cursor-pointer', 'flex', 'w-full', 'justify-center');
                    cellDiv.textContent = cellText;
                    cellDiv.setAttribute('data-date', cellText.toString());
                    cell.appendChild(cellDiv);
                    row.appendChild(cell);
                }

                calendarBody.appendChild(row);
            }


            calendarBody.querySelectorAll('td').forEach(cell => {
                cell.addEventListener('click', function() {
                    const prevSelectedCell = calendarBody.querySelector('.bg-indigo-500');
                    if (prevSelectedCell) {
                        prevSelectedCell.classList.remove('bg-indigo-500', 'text-white',
                            'rounded-full');
                    }

                    this.classList.add('bg-indigo-500', 'text-white', 'rounded-full');

                    selectedDate = this.querySelector('[data-date]').getAttribute('data-date');
                    console.log(`Clicked date: ${selectedDate}-${month + 1}-${year}`);

                    selected = `${selectedDate}-${month + 1}-${year}`;
                    document.getElementById('clickedDateDisplay').textContent = selected;
                });
            });
        }

        prevMonth.addEventListener('click', function() {
            currentDate.setMonth(currentDate.getMonth() - 1);
            currentYear = currentDate.getFullYear();
            currentMonth = currentDate.getMonth();
            renderCalendar();
        });

        nextMonth.addEventListener('click', function() {
            currentDate.setMonth(currentDate.getMonth() + 1);
            currentYear = currentDate.getFullYear();
            currentMonth = currentDate.getMonth();
            renderCalendar();
        });

        renderCalendar();
    });
</script>
