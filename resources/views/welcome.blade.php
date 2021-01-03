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
    <body ontouchstart="" class="antialiased">
        <div id="head">
            <h1 onclick="getStatuses()" class="title">Home</h1>
            <div class="options"><span id="openOverlay" class="options-click"></span><svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"viewBox="0 0 32.055 32.055" xml:space="preserve"><g><path d="M3.968,12.061C1.775,12.061,0,13.835,0,16.027c0,2.192,1.773,3.967,3.968,3.967c2.189,0,3.966-1.772,3.966-3.967C7.934,13.835,6.157,12.061,3.968,12.061z M16.233,12.061c-2.188,0-3.968,1.773-3.968,3.965c0,2.192,1.778,3.967,3.968,3.967s3.97-1.772,3.97-3.967C20.201,13.835,18.423,12.061,16.233,12.061z M28.09,12.061c-2.192,0-3.969,1.774-3.969,3.967c0,2.19,1.774,3.965,3.969,3.965c2.188,0,3.965-1.772,3.965-3.965S30.278,12.061,28.09,12.061z"/></g></svg></div>
            <div id="popup">
                <span onclick="handleOption('addRoom')">Add room</span><br>
                <hr>
                <span onclick="handleOption('editRooms')">Edit</span>
            </div>
            <div id="backgroundOverlay"></div>
        </div>
        <div id="content">
            <div id="content-rooms"></div>
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
            let int = 10000; // 10 seconds for repeat
            fillScreen();
            getStatuses();
            setInterval(function(){getStatuses()}, int); // repeat every 10 seconds

            // handle for the options popup
            var popup = document.getElementById('popup');
            var overlay = document.getElementById('backgroundOverlay');
            var openButton = document.getElementById('openOverlay');
            document.onclick = function(e){
                if(e.target.id == 'backgroundOverlay'){
                    popup.style.display = 'none';
                    overlay.style.display = 'none';
                }
                if(e.target == openButton){
                    popup.style.display = 'block';
                    overlay.style.display = 'block';
                }
            };

            // handle for the accordion for all the room items
            var room_items = document.getElementsByClassName("room-panel");
            var i;
            for (i = 0; i < room_items.length; i++) {
                room_items[i].addEventListener("click", function() {
                    this.classList.toggle("active");
                    var panel = this.parentElement.nextElementSibling;
                    if (panel.style.maxHeight) {
                        panel.style.maxHeight = null;
                    } else {
                        panel.style.maxHeight = panel.scrollHeight + "px";
                    }
                });
            }

            function doSwitchRoom(id) {
                let thisBtn = document.getElementById(id);
                if(thisBtn.className.includes("active")) { // if is active
                    thisBtn.classList.remove("active");
                    thisBtn.classList.add("loading");
                    thisBtn.removeAttribute("onClick");
                    axiosCall("api/getroomitemsbyid/"+id).then(function(result) {
                        Object.keys(result).forEach(function (key) { //foreach item in room
                            // key = key
                            // value = result[key]
                            let itemData = result[key];
                            let updateURL = itemData.url+'/'+itemData.callout_id+'?v='; //construct a update URL
                            axiosGet(updateURL+1);
                        });
                    }).finally(() => {
                        thisBtn.setAttribute("onClick", "doSwitchRoom("+id+")");
                        thisBtn.classList.remove("active");
                        thisBtn.classList.remove("loading");
                    });
                }
                else {
                    thisBtn.classList.add("loading");
                    thisBtn.removeAttribute("onClick");
                    axiosCall("api/getroomitemsbyid/"+id).then(function(result) {
                        Object.keys(result).forEach(function (key) { //foreach item in room
                            // key = key
                            // value = result[key]
                            let itemData = result[key];
                            let updateURL = itemData.url+'/'+itemData.callout_id+'?v='; //construct a update URL
                            axiosGet(updateURL+0);
                        });
                    }).finally(() => {
                        thisBtn.setAttribute("onClick", "doSwitchRoom("+id+")");
                        thisBtn.classList.remove("loading");
                        thisBtn.classList.add("active");
                    });
                }
                getStatusRoom(id);
            }
            function doSwitch(url, btnId, roomId) {
                let thisBtn = document.getElementById('item-btn-'+btnId);
                if(thisBtn.className.includes("active")) { // if is active
                    axiosGet(url+"?v=1");
                    // TODO: set class after the request is done and successfull
                    thisBtn.classList.remove("active");
                }
                else {
                    axiosGet(url+"?v=0");
                    // TODO: set class after the request is done and successfull
                    thisBtn.classList.add("active");
                }
                getStatusRoom(roomId);
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
                                    updateStatusUI(result.s, itemData.id);
                                }).catch(error => {
                                    notify(error);
                                    console.log('error', error);
                                });
                            });
                        }).finally(() => {
                            qStatus.push(statuses);
                        });
                    });
                    setTimeout(function () {
                        Object.keys(qStatus).forEach(function (key) {
                            if(qStatus[key].includes("1")) { // if statuses includes an on state
                                let count = qStatus[key].filter((v) => (v === '1')).length;
                                updateStatusRoomUI("on",roomId[key], count);
                            }
                            else {
                                updateStatusRoomUI("off",roomId[key], 0);
                            }
                        });
                    }, 2000); // wait 2 seconds... the axios request is handled after the if statement is called so we have to do this fakka irritant
                });
                return qStatus;
            }
            function getStatusRoom(roomId) {
                var statuses = new Array();
                var qStatus = [];
                axiosCall("api/getroomitemsbyid/"+roomId).then(function(result) {
                    Object.keys(result).forEach(function (key) { //foreach item in room
                        // key = key
                        // value = result[key]
                        let itemData = result[key];
                        let statusURL = itemData.url+'/'+itemData.callout_id+'_status'; //construct a status URL
                        axiosCallCORS(statusURL).then(function(result) {
                            statuses.push(result.s.toString());
                            updateStatusUI(result.s, itemData.id);
                        }).catch(error => {
                            notify(error);
                            console.log('error', error);
                        });
                    });
                }).finally(() => {
                    qStatus.push(statuses);
                });
                setTimeout(function () {
                    Object.keys(qStatus).forEach(function (key) {
                        if(qStatus[key].includes("1")) { // if statuses includes an on state
                            let count = qStatus[key].filter((v) => (v === '1')).length;
                            updateStatusRoomUI("on",roomId, count);
                        }
                        else {
                            updateStatusRoomUI("off",roomId, 0);
                        }
                    });
                }, 1500); // wait 1.5 seconds... the axios request is handled after the if statement is called so we have to do this fakka irritant
            }

            function axiosGet(url) {
                axios.get(url, {
                    crossDomain: true,
                }).then(res => { 
                    console.log('state: '+res.data.s);
                }).catch(error => {
                    notify(error);
                    console.log('error', error);
                })
            }

            function fillScreen() {
                // remove all the DOM elements in content_rooms
                const content_rooms = document.getElementById('content-rooms');
                while (content_rooms.firstChild) {
                    content_rooms.removeChild(content_rooms.lastChild);
                }
                // get all the rooms and add them to the DOM
                axiosCall("api/rooms").then(function(result) {
                    if(result.length > 0) { //if there are any rooms
                        createCat('rooms');
                    }
                    else {
                        createNotFound(content_rooms, 'There are no rooms yet...', 'Add a new room here');
                    }
                    Object.keys(result).forEach(function (key) {
                        // key = key
                        // value = result[key]
                        let roomData = result[key];
                        let roomEl = createRoom(roomData.name, roomData.id);
                        axiosCall("api/getroomitemsbyid/"+roomData.id).then(function(result) {
                            Object.keys(result).forEach(function (key) { //foreach item in room
                                // key = key
                                // value = result[key]
                                let itemData = result[key];
                                createItem(itemData.id, itemData.name, itemData.url, itemData.callout_id, itemData.room_id, roomEl);
                            });
                        });
                    });
                }).finally(() => {
                    var acc = document.getElementsByClassName("room-panel");
                    var i;

                    for (i = 0; i < acc.length; i++) {
                    acc[i].addEventListener("click", function() {
                    this.classList.toggle("active");
                    var panel = this.parentElement.nextElementSibling;
                    if (panel.style.maxHeight) {
                    panel.style.maxHeight = null;
                    } else {
                    panel.style.maxHeight = panel.scrollHeight + "px";
                    }
                    });
                    }
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

            function updateStatusRoomUI(status, id, count) {
                let statusEl = document.getElementById('room-'+id+'-status');
                if(statusEl == null) {// this means that there is a room in the database but not on the screen so we need to refill it
                    fillScreen();
                }
                let statusBtnEl = document.getElementById(id);
                if(status == 'on') {
                    if(count<2){
                        statusEl.textContent = count+" light is on";
                    }
                    else {
                        statusEl.textContent = count+" lights are on";
                    }
                    statusBtnEl.classList.add("active");
                } else if(status == 'off') {
                    statusEl.textContent = "All lights are off";
                    statusBtnEl.classList.remove("active");
                } else if(true) {
                    statusEl.textContent = "idk";
                }
                
            }
            function updateStatusUI(status, id) {
                let statusBtnEl = document.getElementById("item-btn-"+id);
                if(status == 1) {
                    statusBtnEl.classList.add("active");
                } else if(status == 0) {
                    statusBtnEl.classList.remove("active");
                }
                
            }

            function createCat(categoryName) {
                let content_rooms = document.getElementById('content-rooms');
                let catgory = document.createElement("div");
                switch(categoryName) {
                    case 'rooms':
                        catgory.setAttribute('class', "category category-"+categoryName);
                        catgory.textContent = categoryName;
                        content_rooms.appendChild(catgory);
                        break;
                    default:
                        console.log("category "+categoryName+"not in switch statement");
                        break;
                }
            }

            function createRoom(name, id) {
                let content_rooms = document.getElementById('content-rooms');

                let room = document.createElement("div");
                room.setAttribute('class', "room");
                let room_panel = document.createElement("div");
                room_panel.setAttribute('class', "room-panel");
                let room_delete = document.createElement("div");
                room_delete.setAttribute('class', "room-delete hide");
                room_delete.setAttribute('onClick', "deleteRoom("+id+")");
                let room_title = document.createElement("h1");
                room_title.setAttribute('class', "room-name");
                room_title.textContent = name;
                let room_status = document.createElement("p");
                room_status.setAttribute('class', "room-light-status");
                room_status.setAttribute('id', "room-"+id+"-status");
                // room_status.textContent = "%lights_status%";
                let room_btn = document.createElement("button");
                room_btn.setAttribute('class', "light-switch");
                room_btn.setAttribute('id', id);
                room_btn.setAttribute('onClick', "doSwitchRoom("+id+")");

                let room_items = document.createElement("div");
                room_items.setAttribute('class', "room-items");
                room_items.setAttribute('id', "room-items-"+id);

                // append to assigned elements
                room.appendChild(room_panel);
                room.appendChild(room_delete);
                room.appendChild(room_title);
                room.appendChild(room_status);
                room.appendChild(room_btn);
                content_rooms.appendChild(room);
                content_rooms.appendChild(room_items);

                return room;
            }
            function createItem(id, name, url, callout, roomId, roomElement) {
                let room_items = document.getElementById('room-items-'+roomId);
                let options = '<div class="options-item"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"viewBox="0 0 32.055 32.055" xml:space="preserve"><g><path d="M3.968,12.061C1.775,12.061,0,13.835,0,16.027c0,2.192,1.773,3.967,3.968,3.967c2.189,0,3.966-1.772,3.966-3.967C7.934,13.835,6.157,12.061,3.968,12.061z M16.233,12.061c-2.188,0-3.968,1.773-3.968,3.965c0,2.192,1.778,3.967,3.968,3.967s3.97-1.772,3.97-3.967C20.201,13.835,18.423,12.061,16.233,12.061z M28.09,12.061c-2.192,0-3.969,1.774-3.969,3.967c0,2.19,1.774,3.965,3.969,3.965c2.188,0,3.965-1.772,3.965-3.965S30.278,12.061,28.09,12.061z"/></g></svg></div>'

                let item = document.createElement("div");
                item.setAttribute('class', "item");
                let item_title = document.createElement("h1");
                item_title.setAttribute('class', "item-name");
                item_title.textContent = name;
                let item_btn = document.createElement("button");
                item_btn.setAttribute('class', "light-switch-item");
                item_btn.setAttribute('id', 'item-btn-'+id);
                item_btn.setAttribute('onClick', "doSwitch('"+url+"/"+callout+"',"+id+","+roomId+")");

                item.appendChild(item_title);
                item.appendChild(item_btn);
                item.insertAdjacentHTML( 'beforeend', options );
                room_items.appendChild(item);
            }

            function createNotFound(element, title, content) {
                let div = document.createElement("div");
                div.setAttribute('class', "notfound");
                let div_title = document.createElement("h1");
                div_title.setAttribute('class', "notfound-title");
                div_title.textContent = title;
                let div_content = document.createElement("p");
                div_content.setAttribute('class', "notfound-content");
                div_content.textContent = content;
                let div_image = document.createElement("img");
                div_image.setAttribute('class', "notfound-image");
                div_image.setAttribute('src', "/img/hand-min.png");

                div.appendChild(div_title);
                div.appendChild(div_content);
                div.appendChild(div_image);
                element.appendChild(div);
            }

            function handleOption(type, origin) {
                switch(type) {
                    case 'addRoom':
                        let form = document.createElement("div");
                        form.setAttribute('class', "form");
                        let label = document.createElement("label");
                        label.textContent = "Room name";
                        let input = document.createElement("input");
                        input.setAttribute('id', "name");
                        input.setAttribute('type', "text");
                        input.setAttribute('focus', "text");
                        input.setAttribute('placeholder', "Livingroom");
                        let button1 = document.createElement("button");
                        button1.textContent = "Cancel";
                        button1.setAttribute('onclick', "closeForm(this)");
                        let button2 = document.createElement("button");
                        button2.setAttribute('onclick', "formSend(this)");
                        button2.textContent = "Add";
                        form.appendChild(label);
                        form.appendChild(input);
                        form.appendChild(button1);
                        form.appendChild(button2);
                        document.body.appendChild(form);
                        break;
                    case 'editRooms':
                        $: rooms = document.getElementsByClassName('room');
                        $: room_deletes = document.getElementsByClassName('room-delete');
                        for(var i = rooms.length; i--;) {
                            rooms[i].classList.add("edit");
                            room_deletes[i].classList.remove("hide");
                        }
                        break;
                    case 'editRoomsDone':
                        for(var i = rooms.length; i--;) {
                            rooms[i].classList.remove("edit");
                            room_deletes[i].classList.add("hide");
                        }
                        break;
                    default:
                        break;
                }
            }
            function deleteRoom(id) {
                if (confirm('Are you sure you want to delete this room?')) {
                    axiosCall('/api/deleteroom/'+id);
                    handleOption('editRoomsDone');
                    fillScreen();
                }
                else {
                    handleOption('editRoomsDone');
                }
            }
            function closeForm(element) {
                element.parentNode.parentNode.removeChild(element.parentNode);
            }
            function formSend(element) {
                let form = element.parentElement;
                let name = findSiblingWithId(element).value;
                axiosCall('/api/createroom/'+name);
                element.parentNode.parentNode.removeChild(element.parentNode);
                fillScreen();
            }
            function findSiblingWithId(element) {
                var siblings = element.parentNode.children,
                sibWithId = 'name';
                for(var i = siblings.length; i--;) {
                    if(siblings[i].id) {
                        sibWithId = siblings[i];
                        break;
                    }
                }

                if(sibWithId) {
                    return sibWithId;
                }
            }

            function notify(text) {
                let notification = document.createElement("div");
                notification.setAttribute('class', "notification");
                let notification_text = document.createElement("div");
                notification_text.setAttribute('class', "notification-text");
                notification_text.textContent = text;

                notification.appendChild(notification_text);
                document.body.appendChild(notification);

                setTimeout(function () {
                    document.body.removeChild(notification);
                }, 3000);
            }
        </script>
    </body>
</html>
