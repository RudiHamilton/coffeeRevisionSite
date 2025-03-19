<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Revision Timeline') }}
        </h2>
    </x-slot>
    <div class="card-body m-5">
       
        <p>Welcome to your revision timeline. Revision is important but so is planning! 
            @if(!$events)
            <br>
            I see it's your first time! To get started click the create button.
            @endif
        </p>
        <br>
        <a style="background-color: #2C3E50 !important; margin-left: 10px; height: 40px;" class="btn btn-dark float-end" href="{{route('revisiontimeline.create')}}">Create +</a>
        <div id="calendar"></div>
    </div>
    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/@fullcalendar/core/main.css" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid/main.css" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/@fullcalendar/timegrid/main.css" rel="stylesheet" />
        <script> 
            document.addEventListener('DOMContentLoaded', function () {
                var calendarEl = document.getElementById('calendar');
                var calendar = new FullCalendar.Calendar(calendarEl, {
                    initialView: 'timeGridWeek',
                    slotMinTime: '5:00:00',
                    slotMaxTime: '23:00:00',
                    events: @json($events),
                });
                calendar.render();
            });
        </script>
    @endpush
</x-app-layout>