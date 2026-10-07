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

    console.log("props.bands: " + JSON.stringify(props.bands));

    for (const band of props.bands) {
        const selColor = bandColors[band.spotify.name];
        console.log("Selected Color: " + selColor);
        console.log("Band Obj: " + JSON.stringify(band));
        for(const trip of band.trips) {
            console.log("Trip object: " + JSON.stringify(trip));
            // iterate over each location in the trip and create pins on map
            for (const locations of trip.locations) {

                // create the pin
                const pin = new PinElement({
                    backgroundColor: selColor,
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
        }
    }

    // for(const band in props.bands){
    //     const selColor = bandColors[props.bands[band].spotify.name];
    //     for (const trip in props.bands[band].trips){
    //         for (const location in props.bands[band].trips[trip].locations){
    //             const pin = new PinElement({
    //                 background: selColor,
    //                 borderColor: selColor,
    //                 glyphColor: "#F4F9E9",
    //                 glyphText: props.bands[band].trips[trip].locations[location].sequence.toString()
    //             });
    //             const marker = new AdvancedMarkerElement({
    //                 map: bandMap,
    //                 position: {
    //                     lat: Number(props.bands[band].trips[trip].locations[location].latitude),
    //                     lng: Number(props.bands[band].trips[trip].locations[location].longitude)
    //                 },
    //                 title: props.bands[band].trips[trip].locations[location].location,
    //             });
    //             marker.append(pin);
    //         }
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