var mymap = L.map('map').setView([23.634501, -102.552784], 5);
const tilesProvider = 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png'
L.tileLayer(tilesProvider, {
    maxZoom: 15,
    minZoom: 5
}).addTo(mymap);
let marker = L.marker([19.512556, -98.882896]).addTo(mymap);


