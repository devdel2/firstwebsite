<script setup>
import { ref, onMounted } from 'vue';
import TripMap from '../js/components/TripMap.vue';

const bands = ref([]);
const loading = ref(true);
const error = ref(null);

onMounted(async ()=> {
    try {
        const response = await fetch('/api/bands');
        if(!response.ok){
            throw new Error('Failed to fetch bands');
        }
        bands.value = await response.json();
    } catch(err){
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
                <TripMap :bands="bands"/>
                <div class="max-h-125 overflow-y-auto ml-4">
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
                                    class="block text-2xl text-center hover:text-green-600 hover:italic"
                                    :href=band.spotify.external_urls.spotify
                                    target="_blank"
                                    rel="noopener noreferrer"
                                >{{ band.spotify.name }}</a>
                            </div>
                            <div class="w-2/3 px-4">
                                <h2 class="text-2xl text-center">Tours</h2>
                                <ul>
                                    <li class="py-2 cursor-pointer hover:text-green-600 hover:italic" v-for="trip in band.trips">{{ trip.name }}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </template>
        </div>
    </section>
</template>