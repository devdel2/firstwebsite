<script setup>
import { onMounted, ref } from 'vue';
import { setOptions, importLibrary } from '@googlemaps/js-api-loader';

const props = defineProps({
    bands: {
        type: Array,
        required: true
    }
});

const map = ref(null);

onMounted(async () => {
    setOptions({
        key: import.meta.env.VITE_GOOGLE_MAPS_KEY,
    })

    const { Map } = await importLibrary("maps");
    const { AdvancedMarkerElement, PinElement } = await importLibrary('marker');

    map.value = new Map(document.getElementById('trip-map'), {
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

    const marker = new AdvancedMarkerElement({
        map: map.value,
        position: {
            lat: 39.7392,
            lng: -104.9903
        },
        title: 'Denver'
    });

    console.log('MARKER CREATED:', marker);
    console.log('MAP:', map.value);
    console.log('MARKER POSITION:', marker.position);
    console.log('MARKER MAP:', marker.map);

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
    //                 map: map.value,
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
        style="width: 100%; height: 500px;"
    ></div>
</template>