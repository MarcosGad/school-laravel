<div>
    <div>
        <div id='calendar-container' wire:ignore>
            <div id='calendar'></div>
        </div>
    </div>
    @push('scripts')
        <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.3.1/main.min.js'></script>

        <script>
            document.addEventListener('livewire:load', function() {
                var Calendar = FullCalendar.Calendar;
                var Draggable = FullCalendar.Draggable;
                var calendarEl = document.getElementById('calendar');
                var checkbox = document.getElementById('drop-remove');
                var data =   @this.events;
                var calendar = new Calendar(calendarEl, {
                    events: JSON.parse(data),
                    dateClick(info)  {
                        var title = prompt('ادخل عنوان الحدث ');
                        //var date = new Date(info.dateStr);
                        var d = new Date(info.dateStr);
                        var curr_date = d.getDate();
                        var curr_month = d.getMonth() + 1; //Months are zero based
                        var curr_year = d.getFullYear();
                        if(curr_date <= 9){
                          var date = curr_year + "-" + curr_month + "-0" + curr_date;
                        }else {
                          var date = curr_year + "-" + curr_month + "-" + curr_date;
                        }
                        console.log(date);
                        var rand = (Math.random() + 1).toString(36).substring(7);
                        if(title != null && title != ''){
                            calendar.addEvent({
                                title: title,
                                start: date,
                                event_number: rand,
                                allDay: true
                            });
                            var eventAdd = {title:title,start:date,event_number:rand};
                        @this.addevent(eventAdd);
                            alert('تم اضافة الحدث بنجاح');
                        }else{
                            alert('من فضلك ادخل عنوان الحدث');
                        }
                    },
                    editable: true,
                    selectable: true,
                    displayEventTime: false,
                    droppable: true, // this allows things to be dropped onto the calendar
                    drop: function(info) {
                        // is the "remove after drop" checkbox checked?
                        if (checkbox.checked) {
                            // if so, remove the element from the "Draggable Events" list
                            info.draggedEl.parentNode.removeChild(info.draggedEl);
                        }
                    },
                    eventDrop: info => @this.eventDrop(info.event, info.oldEvent),
                    loading: function(isLoading) {
                        if (!isLoading) {
                            // Reset custom events
                            this.getEvents().forEach(function(e){
                                if (e.source === null) {
                                    e.remove();
                                }
                            });
                        }
                    }
                });
                calendar.render();
            @this.on(`refreshCalendar`, () => {
                calendar.refetchEvents()
            });
            });
        </script>
        <link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.3.1/main.min.css' rel='stylesheet' />
    @endpush
</div>
