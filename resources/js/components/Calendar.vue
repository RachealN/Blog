<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <FullCalendar
                    :options="calendarOptions"
                    :eventsources="calendarOptions.eventSources"
                />
            </div>
        </div>
    </div>
</template>
<script>
import FullCalendar from '@fullcalendar/vue'
import dayGridPlugin from '@fullcalendar/daygrid'
import axios from 'axios'
export default {
    components: {
        FullCalendar
    },
    data() {
        return {
            calendarOptions: {
                plugins: [ dayGridPlugin ],
                initialView: 'dayGridMonth',

                eventSources: [
                    {
                        events(start, callback) {
                            axios.get('http://127.0.0.1:8000/events/').then(response => {
                                response.data.calendardata
                            })
                        }
                    }
                ]
            }
        }
    }
}
</script>
