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
//Fullcalendar and axios modules
import FullCalendar from '@fullcalendar/vue'
import dayGridPlugin from '@fullcalendar/daygrid'
import axios from 'axios'
export default {
    components: {
        FullCalendar // make the <FullCalendar> tag available
    },
    data() {
        return {
            calendarOptions: {
                plugins: [ dayGridPlugin ],
                initialView: 'dayGridMonth',
                //Dynamic Event Source
                eventSources: [
                    {
                        events(start, callback) {
                            console.log('Log at this endpoint');
                            axios.get('http://127.0.0.1:8000/events/').then(response => {
                                callback(response.data.calendardata)
                            })
                        }
                    }
                ]
            }
        }
    }
}
</script>
