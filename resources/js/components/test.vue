<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                        I'm an example component.
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },

        data(){

        },

        created(){
            this.fetchEvents();

        },

        methods:{
            fetchEvents(){
                console.log('log this here please')
                fetch('api/fullcalendar')
                    .then(res => res.json())
                    .then(res => {
                        // console.log(res.data)

                    })

            }
        }
    }
</script>
