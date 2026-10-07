<script setup>
import { onMounted, ref } from 'vue';
import { setOptions, importLibrary } from '@googlemaps/js-api-loader';

const props = defineProps({
    bands: {
        type: Array,
        required: true
    }
});

//const map = ref(null);

onMounted(async () => {
    setOptions({
        key: import.meta.env.VITE_GOOGLE_MAPS_KEY,
    })

    const { Map, Polyline } = await importLibrary("maps");
    const { AdvancedMarkerElement, PinElement } = await importLibrary('marker');

    const bandMap = new Map(document.getElementById('trip-map'), {
        center: {
            lat: 39.7392,
            lng: -104.9903
        },
        zoom: 5,
        mapId: "DEMO_MAP_ID",
        gestureHandling: "cooperative"
    });

    const bandColors = {
        "Dead Set": "#2b4162",
        "Tradition": "#5b7553",
        "Daisyhead": "#e55934"
    }

    for (const band of props.bands) {
        const selColor = bandColors[band.spotify.name];
        for(const trip of band.trips) {
            // iterate over each location in the trip and create pins on map
            for (const locations of trip.locations) {
                
                // create the pin
                const pin = new PinElement({
                    background: selColor,
                    borderColor: selColor,
                    glyphColor: "#F4F9E9",
                    glyphText: locations.sequence.toString()
                });

                // create marker location
                const marker = new AdvancedMarkerElement({
                    map: bandMap,
                    position: {
                        lat: Number(locations.latitude),
                        lng: Number(locations.longitude)
                    },
                    title: locations.location,
                });

                // append the pin
                marker.append(pin);
            }

            // Polyline path creation
            const path = trip.locations.slice().sort((a,b) => a.sequence - b.sequence)
                .map(location => ({
                    lat: Number(location.latitude),
                    lng: Number(location.longitude)
                }));

            if (path.length > 1) {
                path.push(path[0]);
            }

            const route = new Polyline({
                path: path,
                geodesic: true,
                strokeColor: selColor,
                strokeOpacity: 1.0,
                strokeWeight: 4,
            });

            route.setMap(bandMap);

        }
    }

});
</script>

<template>
    <div
        id="trip-map"
        style="width: 100%; height: 500px; margin-left: 1rem; margin-right: 1rem;"
    ></div>
</template>