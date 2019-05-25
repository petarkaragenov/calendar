@extends('layouts.layout')

@section('content')
        
        <div class="calendar-grid has-background-black-ter">
            <div class="calendar-grid-header">
                <button class="has-background-black-ter has-text-grey-light" id="prev"><i class="fas fa-arrow-left fa-5x"></i></button>
                <div class="month has-text-grey-light"></div>
                <button class="has-background-black-ter has-text-grey-light" id="next"><i class="fas fa-arrow-right fa-5x"></i></button>
            </div>
            <div class="calendar-grid-days has-text-white-bis">
                <div class="calendar-grid-days-single">Mon</div>
                <div class="calendar-grid-days-single">Tue</div>
                <div class="calendar-grid-days-single">Wed</div>
                <div class="calendar-grid-days-single">Thu</div>
                <div class="calendar-grid-days-single">Fri</div>
                <div class="calendar-grid-days-single">Sat</div>
                <div class="calendar-grid-days-single">Sun</div>
            </div>
            <div class="calendar-grid-content">
            </div>
        </div>
@endsection

@section('scripts')
    <script>
        let currentMonth = new Date().getMonth();
        let year = new Date().getFullYear();
        const calendar = Array.from(document.querySelectorAll('.calendar-grid-content'));
        const calendar_month = Array.from(document.querySelectorAll('.month'));
        const days = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
        const months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

        function getDayFromDate(currentMonth, i, year) {
            return new Date(year + '-' + currentMonth + '-' + i).getDay()
        }

        function getMonthName(month) {
            return months[month];
        }

        function loadCalendar(month, year) {
            calendar[0].innerHTML = '';
            calendar_month[0].innerHTML = getMonthName(month);
            for (let i=1; i <= new Date(year, currentMonth+1, 0).getDate(); i++) {
                @foreach ($apps as $app)
                    if (i == "{{ substr($app->on, 8, 2) }}" && currentMonth+1 == "{{ substr($app->on, 5, 2) }}" && year == "{{ substr($app->on, 0, 4) }}") {
                        calendar[0].innerHTML += `
                            <a href="/appointments/${year}-${(currentMonth+1 < 10) ? '0' + (currentMonth+1) : (currentMonth+1)}-${(i < 10) ? '0' + i : i}" style="grid-column-start: ${getDayFromDate(currentMonth+1, i, year)}" class="calendar-grid-item has-background-danger">
                                <span class="has-text-grey-light">${i}</span>
                            </a>`;                        
                        continue
                    }
                @endforeach
                calendar[0].innerHTML += `
                    <a href="/appointments/${year}-${(currentMonth+1 < 10) ? '0' + (currentMonth+1) : (currentMonth+1)}-${(i < 10) ? '0' + i : i}" style="grid-column-start: ${getDayFromDate(currentMonth+1, i, year)}" class="calendar-grid-item">
                        <span class="has-text-grey-light">${i}</span>
                    </a>`;
            }
        }

        document.getElementById('next').addEventListener('click', function() {
            currentMonth++;
            if (currentMonth === 12) {
                currentMonth = 0;
                year++;
            }
            loadCalendar(currentMonth, year);
        })

        document.getElementById('prev').addEventListener('click', function() {
            currentMonth--;
            if (currentMonth === -1) {
                currentMonth = 12;
                year--;
            }
            loadCalendar(currentMonth, year);
        })

        loadCalendar(currentMonth, year);
    </script>
@endsection