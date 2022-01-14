let error_map;  // the name says it all

function getLocation() {    // map
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(getPosition, onError);
    } else { 
        defaltPosition();
        error_map = "Браузърът не поддържа местополижение."
        alert(error_map);
    }
}
getLocation();

function onError(error) {   // map errors
    // switch(error.code) {
    //     case error.PERMISSION_DENIED || error.POSITION_UNAVAILABLE || error.TIMEOUT || error.UNKNOWN_ERROR:
    //     defaltPosition();
    //     break;
    // }
    switch(error.code) {
        case error.PERMISSION_DENIED:
            defaltPosition();
            error_map = "Достъпът до местополижение е отказан."
            break;
        case error.POSITION_UNAVAILABLE:
            defaltPosition();
            error_map = "Няма налично местоположение."
            break;
        case error.TIMEOUT:
            defaltPosition();
            error_map = "Времето за предоставяне на достъп до местоположението изтече."
            break;
        case error.UNKNOWN_ERROR:
            defaltPosition();
            error_map = "Неизвестна грешка. Стискам ти палци."
            break;
    }
    alert(error_map);
}

function getPosition(position) {    // map
    let x = position.coords.latitude.toFixed(6);
    let y = position.coords.longitude.toFixed(6);
    let accuracy = position.coords.accuracy;
    let z = 13;
    runPosition(x, y, z, accuracy);
}

function defaltPosition(){  // map
    let x = 42.703;
    let y = 23.30;
    let z = 6;
    runDefaltPosition(x, y, z);
}


// console.log(typeof devices_js);

let greenIcon = new L.Icon({
    iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-green.png',
    shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
    iconSize: [25, 41],
    iconAnchor: [12, 41],
    popupAnchor: [1, -34],
    shadowSize: [41, 41]
});

function runPosition(x, y, z, accuracy) {   // map

    // console.log(x + " || " + y);
    let OSM_URL = 'http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png';  
    let OSM_ATTRIB = '&copy;  <a  href="http://openstreetmap.org/copyright">OpenStreetMap</a>  contributors';  
    let osmLayer = L.tileLayer(OSM_URL,  {attribution:  OSM_ATTRIB});  

    let map = L.map('map').setView([x,  y],  z);  // z=zoom
    map.addLayer(osmLayer);

    let marker = L.marker([x, y]).addTo(map);

    let circle = L.circle([x, y], {
        // color: 'blue',
        fillColor: 'blue',
        fillOpacity: 0.15,
        radius: accuracy
    }).addTo(map);

    for (let i = 0; i < devices_js.length; i++) {

        let device_name = devices_js[i].device_name.toString();
        let devices_x = devices_js[i].coordinates.split(", ")[0];
        let devices_y = devices_js[i].coordinates.split(", ")[1];
        console.log(devices_x);

        L.marker([devices_x, devices_y], {icon: greenIcon}).addTo(map).bindPopup(device_name);
    }
    

    // L.marker([51.5, -0.09]).addTo(map);

    // map.marker([51.5, -0.09]).addTo(map)
    // .bindPopup('Device')
    // .openPopup();

}

function runDefaltPosition(x, y, z) {   // map

    let  OSM_URL = 'http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png';  
    let  OSM_ATTRIB = '&copy;  <a  href="http://openstreetmap.org/copyright">OpenStreetMap</a>  contributors';  
    let  osmLayer = L.tileLayer(OSM_URL,  {attribution:  OSM_ATTRIB});

    let  map = L.map('map').setView([x,  y],  z);  // z=zoom
    map.addLayer(osmLayer);

    // map.marker([51.5, -0.09]).addTo(map)
    // .bindPopup('Device')
    // .openPopup();


}
