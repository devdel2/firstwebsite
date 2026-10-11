<script setup>
import { onMounted, shallowRef, watch } from 'vue';
import { setOptions, importLibrary } from '@googlemaps/js-api-loader';

const props = defineProps({
    bands: {
        type: Array,
        required: true
    },
    activeTrip: {
        type: Object,
        default: null
    }
});

const markers = [];

let bandMap;
let activeRoute = null;
let AdvancedMarkerElement;
let PinElement;
let Polyline;

const bandColors = {
        "Dead Set": "#2b4162",
        "Tradition": "#5b7553",
        "Daisyhead": "#e55934"
    }

function clearTrip() {
    for(const marker of markers) {
        marker.map = null;
    }

    markers.length = 0;

    if (activeRoute) {
        activeRoute.setMap(null);
        activeRoute = null;
    }
}

function drawTrip(selection) {
    if(!bandMap || !AdvancedMarkerElement || !PinElement || !Polyline) {
        console.error("Map or required classes not initialized");
        return;
    }

    clearTrip();

    if(!selection?.trip) {
        return;
    }

    const { trip, bandName } = selection;
    const selColor = bandColors[bandName] ?? '#2b4162';
    const locations = [...(trip.locations ?? [])].sort(
        (a, b) => a.sequence - b.sequence
    );

    for (const location of locations) {
        const pin = new PinElement({
            background: selColor,
            borderColor: selColor,
            glyphColor: "#F4F9E9",
            glyphText: location.sequence.toString()
        });
        
        const marker = new AdvancedMarkerElement({
            map: bandMap,
            position: {
                lat: Number(location.latitude),
                lng: Number(location.longitude)
            },
            title: location.location,
        });

        marker.append(pin);
        markers.push(marker);
    }

    const path = locations.map(location => ({
        lat: Number(location.latitude),
        lng: Number(location.longitude)
    }));

    if(path.length > 1) {
        path.push(path[0]);

        activeRoute = new Polyline({
            map: bandMap,
            path,
            geodesic: true,
            strokeColor: selColor,
            strokeOpacity: 1.0,
            strokeWeight: 4,
        });
    }
}

watch(
    () => props.activeTrip,
    selection => drawTrip(selection)
);

onMounted(async () => {
    setOptions({
        key: import.meta.env.VITE_GOOGLE_MAPS_KEY,
    })

    const { Map, Polyline: GooglePolyline } = await importLibrary("maps");
    const { AdvancedMarkerElement: GoogleAdvancedMarkerElement, PinElement: GooglePinElement } = await importLibrary('marker');

    Polyline = GooglePolyline;
    AdvancedMarkerElement = GoogleAdvancedMarkerElement;
    PinElement = GooglePinElement;

    bandMap = new Map(document.getElementById('trip-map'), {
        center: {
            lat: 39.7392,
            lng: -104.9903
        },
        zoom: 4,
        mapId: "DEMO_MAP_ID",
        gestureHandling: "cooperative"
    });

    drawTrip(props.activeTrip);
    

    // for (const band of props.bands) {
    //     const selColor = bandColors[band.spotify.name];
    //     for(const trip of band.trips) {
    //         // iterate over each location in the trip and create pins on map
    //         for (const locations of trip.locations) {
                
    //             // create the pin
    //             const pin = new PinElement({
    //                 background: selColor,
    //                 borderColor: selColor,
    //                 glyphColor: "#F4F9E9",
    //                 glyphText: locations.sequence.toString()
    //             });

    //             // create marker location
    //             const marker = new AdvancedMarkerElement({
    //                 map: bandMap,
    //                 position: {
    //                     lat: Number(locations.latitude),
    //                     lng: Number(locations.longitude)
    //                 },
    //                 title: locations.location,
    //             });

    //             // append the pin
    //             marker.append(pin);
    //         }

    //         // Polyline path creation
    //         const path = trip.locations.slice().sort((a,b) => a.sequence - b.sequence)
    //             .map(location => ({
    //                 lat: Number(location.latitude),
    //                 lng: Number(location.longitude)
    //             }));

    //         if (path.length > 1) {
    //             path.push(path[0]);
    //         }

    //         const route = new Polyline({
    //             path: path,
    //             geodesic: true,
    //             strokeColor: selColor,
    //             strokeOpacity: 1.0,
    //             strokeWeight: 4,
    //         });

    //         route.setMap(bandMap);

    //     }
    // }

});
</script>

<template>
    <div
        id="trip-map"
        style="width: 100%; height: 500px; margin-left: 1rem; margin-right: 1rem;"
    ></div>
</template>