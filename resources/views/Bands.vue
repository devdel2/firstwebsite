<script setup>
import { ref, onMounted } from 'vue';
import TripMap from '../js/components/TripMap.vue';

const bands = ref([]);
const loading = ref(true);
const error = ref(null);
const activeTrip = ref(null);

onMounted(async ()=> {
    try {
        const response = await fetch('/api/bands');
        if(!response.ok){
            throw new Error('Failed to fetch bands');
        }
        bands.value = await response.json();
        const defaultBand = bands.value.find(
            band => band.trips?.length > 0
        );
        if(defaultBand) {
            activeTrip.value = {
                trip: defaultBand.trips[0],
                bandName: defaultBand.spotify?.name ?? defaultBand.artist_name
            };
        }
    } catch(err){
        console.error("Error loading bands: ", err);
        error.value = err.message;
    } finally {
        loading.value = false;
    }
});
</script>

<template>
    <section>
        <h1 class="text-5xl m-4">My Music</h1>
        <div class="flex flex-row-reverse mx-4 p-4 border-4 bg-gray-400 rounded-lg">
            <p v-if="loading">Loading Bands...</p>
            <p v-else-if="error">Error: {{ error }}</p>
            <template v-else>
                <TripMap :bands="bands" :active-trip="activeTrip"/>
                <div class="max-h-125 overflow-y-scroll ml-4">
                    <div v-for="band in bands" :key="band.id">
                        <div class="rounded-lg flex flex-col md:flex-row border-4 box-border p-4 mb-4 mx-auto bg-white">
                            <div>
                                <div class="w-36 h-36">
                                    <img class="rounded-full w-full h-full object-cover" v-if="band.spotify.images.length > 0" 
                                        :src="band.spotify.images[0].url" 
                                        :alt="band.spotify.name"
                                    >
                                </div>
                                <a 
                                    class="block text-2xl text-center underline hover:text-green-600 hover:italic hover:no-underline"
                                    :href=band.spotify.external_urls.spotify
                                    target="_blank"
                                    rel="noopener noreferrer"
                                >{{ band.spotify.name }}</a>
                                <div class="flex flex-row justify-center gap-4 mt-2">
                                    <a :href=band.spotify.external_urls.spotify target="_blank" rel="noopener noreferrer" class="block">
                                        <img class="mx-auto" src="../../public/images/socials/spotify.svg" alt="Spotify Logo">
                                    </a>
                                    <a :href=band.instagram target="_blank" rel="noopener noreferrer" class="block">
                                        <img class="mx-auto" src="../../public/images/socials/instagram.svg" alt="Instagram Logo">
                                    </a>
                                    <a :href=band.youtube target="_blank" rel="noopener noreferrer" class="block">
                                        <img class="mx-auto" src="../../public/images/socials/youtube.svg" alt="YouTube Logo">
                                    </a>
                                </div>  
                            </div>
                            <div class="w-2/3 px-4">
                                <h2 class="text-2xl text-center">Tours</h2>
                                <ul>
                                    <li v-for="trip in band.trips"
                                        :key="trip.id"
                                        class="py-2 cursor-pointer hover:text-green-600 hover:italic"
                                        @mouseenter="activeTrip = { trip: trip, bandName: band.spotify?.name ?? band.artist_name }">
                                        {{ trip.name }}
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </template>
        </div>
    </section>
</template>