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

    map.marker([51.5, -0.09]).addTo(map)
    .bindPopup('Device')
    .openPopup();

}

function runDefaltPosition(x, y, z) {   // map

    let  OSM_URL = 'http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png';  
    let  OSM_ATTRIB = '&copy;  <a  href="http://openstreetmap.org/copyright">OpenStreetMap</a>  contributors';  
    let  osmLayer = L.tileLayer(OSM_URL,  {attribution:  OSM_ATTRIB});

    let  map = L.map('map').setView([x,  y],  z);  // z=zoom
    map.addLayer(osmLayer);

    map.marker([51.5, -0.09]).addTo(map)
    .bindPopup('Device')
    .openPopup();


}
