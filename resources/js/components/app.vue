<template>
    <div class="room">
        <h1 class="room-name">Bathroom</h1>
        <p class="room-light-status">All lights off</p>
        <button class="light-switch" id="2" onclick="doSwitch('http://192.168.178.250:2390/led_3?v=', this.id)"></button>
    </div>
</template>

<script>
    export default {
        data: function() {
            return {
                test: [],
            }
        },

        mounted() {
            this.getStatus();
        },

        methods: {
            getStatus: function() {
                console.log('yahoo!');
            }
        },
    }
</script>