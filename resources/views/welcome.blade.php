<?php header('Access-Control-Allow-Origin: *'); ?>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta name="apple-mobile-web-app-capable" content="yes">
        <link rel="apple-touch-startup-image" href="launch.png">
        <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
        <meta name="apple-mobile-web-app-title" content="Bana">

        <link href="splashscreens/iphone5_splash.png" media="(device-width: 320px) and (device-height: 568px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
        <link href="splashscreens/iphone6_splash.png" media="(device-width: 375px) and (device-height: 667px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
        <link href="splashscreens/iphoneplus_splash.png" media="(device-width: 621px) and (device-height: 1104px) and (-webkit-device-pixel-ratio: 3)" rel="apple-touch-startup-image" />
        <link href="splashscreens/iphonex_splash.png" media="(device-width: 375px) and (device-height: 812px) and (-webkit-device-pixel-ratio: 3)" rel="apple-touch-startup-image" />
        <link href="splashscreens/iphonexr_splash.png" media="(device-width: 414px) and (device-height: 896px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
        <link href="splashscreens/iphonexsmax_splash.png" media="(device-width: 414px) and (device-height: 896px) and (-webkit-device-pixel-ratio: 3)" rel="apple-touch-startup-image" />
        <link href="splashscreens/ipad_splash.png" media="(device-width: 768px) and (device-height: 1024px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
        <link href="splashscreens/ipadpro1_splash.png" media="(device-width: 834px) and (device-height: 1112px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
        <link href="splashscreens/ipadpro3_splash.png" media="(device-width: 834px) and (device-height: 1194px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
        <link href="splashscreens/ipadpro2_splash.png" media="(device-width: 1024px) and (device-height: 1366px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />

        <title>Bana</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    </head>
    <body class="antialiased">
        <div id="head">
            <h1 onclick="getStatuses()" class="title">Home</h1>
        </div>
        <div id="content">
            <div id="content-rooms"></div>
            <!-- <div class="room">
                <h1 class="room-name">Livingroom</h1>
                <p class="room-light-status">All lights off</p>
                <button class="light-switch" id="1" onclick="doSwitch('http://192.168.178.250:2390/led_1?v=', this.id)"></button>
            </div>
            <div class="room">
                <h1 class="room-name">Bedroom</h1>
                <p class="room-light-status">All lights off</p>
                <button class="light-switch" id="2" onclick="doSwitch('http://192.168.178.250:2390/led_3?v=', this.id)"></button>
            </div> -->
        </div>
        <div id="app"></div>
        <div id="menu">
            <ul class="icons-wrapper space-between">
                <li><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg></li>
                <li><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-maximize"><path d="M8 3H5a2 2 0 0 0-2 2v3m18 0V5a2 2 0 0 0-2-2h-3m0 18h3a2 2 0 0 0 2-2v-3M3 16v3a2 2 0 0 0 2 2h3"></path></svg></li>
                <li><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-compass"><circle cx="12" cy="12" r="10"></circle><polygon points="16.24 7.76 14.12 14.12 7.76 16.24 9.88 9.88 16.24 7.76"></polygon></svg></li>
                <li><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell"><path d="M22 17H2a3 3 0 0 0 3-3V9a7 7 0 0 1 14 0v5a3 3 0 0 0 3 3zm-8.27 4a2 2 0 0 1-3.46 0"></path></svg></li>
                <li><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-settings"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg></li>
            </ul>
        </div>
        <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
        <!-- <script src="{{ mix('js/app.js') }}"></script> -->
        <script>
            doData();
            getStatuses();
            
            
            function doSwitch(url, btnId) {
                let thisBtn = document.getElementById(btnId);
                if(thisBtn.className.includes("active")) { // if is active
                    axiosGet(url+1);
                    // TODO: set class after the request is done and successfull
                    thisBtn.classList.remove("active");
                }
                else {
                    axiosGet(url+0);
                    // TODO: set class after the request is done and successfull
                    thisBtn.classList.add("active");
                }
                getStatuses();
            }
            function doStatuses(statusArr) {
                console.log(statusArr);
                Object.keys(statusArr).forEach(function (key) {
                    if(statusArr[key].includes("1")) { // if statuses includes an on state
                        console.log("contains: 1");
                    }
                    else {
                        console.log("if statement says no!");
                    }
                });
            }
            function getStatuses() {
                var qStatus = [];
                var roomId = [];
                axiosCall("api/rooms").then(function(result) {
                    Object.keys(result).forEach(function (key) { //foreach room
                        // key = key
                        // value = result[key]
                        var statuses = new Array();
                        let roomData = result[key];
                        roomId.push(roomData.id);
                        axiosCall("api/getroomitemsbyid/"+roomData.id).then(function(result) {
                            Object.keys(result).forEach(function (key) { //foreach item in room
                                // key = key
                                // value = result[key]
                                let itemData = result[key];
                                let statusURL = itemData.url+'/'+itemData.callout_id+'_status'; //construct a status URL
                                axiosCallCORS(statusURL).then(function(result) {
                                    statuses.push(result.s.toString());
                                });
                            });
                        }).finally(() => {
                            qStatus.push(statuses);
                        });
                    });
                    console.log(roomId);
                    setTimeout(function () {
                        Object.keys(qStatus).forEach(function (key) {
                            if(qStatus[key].includes("1")) { // if statuses includes an on state
                                console.log("contains: 1 with ID: "+roomId[key]);
                                updateStatusUI("on",roomId[key]);
                            }
                            else {
                                console.log("if statement says no! with ID: "+roomId[key]);
                                updateStatusUI("off",roomId[key]);
                            }
                        });
                    }, 2000);
                });
                return qStatus;
            }

            function axiosGet(url) {
                axios.get(url, {
                    crossDomain: true,
                }).then(res => { 
                    console.log('state: '+res.data.s);
                }).catch(error => {
                    console.log('error', error);
                })
            }

            function doData() {
                // remove all the DOM elements in content_rooms
                const content_rooms = document.getElementById('content-rooms');
                while (content_rooms.firstChild) {
                    content_rooms.removeChild(content_rooms.lastChild);
                }
                // get all the rooms and add them to the DOM
                axiosCall("api/rooms").then(function(result) {
                    Object.keys(result).forEach(function (key) {
                        // key = key
                        // value = result[key]
                        let roomData = result[key];
                        createRoom(roomData.name, roomData.id);
                    });
                });
            }

            async function axiosCall(url) {
                const response = await axios.get(url)
                return response.data
            }

            async function axiosCallCORS(url) {
                const response = await axios.get(url, {crossDomain: true,})
                return response.data
            }

            function updateStatusUI(status, id) {
                let statusEl = document.getElementById('room-'+id+'-status');
                let statusBtnEl = document.getElementById(id);
                if(status == 'on') {
                    statusEl.textContent = "All lights are on";
                    statusBtnEl.classList.add("active");
                } else if(status == 'off') {
                    statusEl.textContent = "All lights are off";
                    statusBtnEl.classList.remove("active");
                } else if(true) {
                    statusEl.textContent = "idk";
                }
                
            }

            function createRoom(name, id) {
                let n_url = "doSwitch('http://192.168.178.60:2390/led_3?v=', this.id)";

                let content_rooms = document.getElementById('content-rooms');

                let room = document.createElement("div");
                room.setAttribute('class', "room");
                let room_title = document.createElement("h1");
                room_title.setAttribute('class', "room-name");
                room_title.textContent = name;
                let room_status = document.createElement("p");
                room_status.setAttribute('class', "room-light-status");
                room_status.setAttribute('id', "room-"+id+"-status");
                room_status.textContent = "%lights_status%";
                let room_btn = document.createElement("button");
                room_btn.setAttribute('class', "light-switch");
                room_btn.setAttribute('id', id);
                room_btn.setAttribute('onClick', n_url);

                // append to assigned elements
                room.appendChild(room_title);
                room.appendChild(room_status);
                room.appendChild(room_btn);
                content_rooms.appendChild(room);
            }
        </script>
    </body>
</html>
