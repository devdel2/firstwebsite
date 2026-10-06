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
        <h1 class="text-5xl">My Music</h1>
        <div class="flex">
            <TripMap :bands="bands"/>
            <p v-if="loading">Loading Bands...</p>
            <p v-else-if="error">Error: {{ error }}</p>
            <div v-else>
                <div v-for="band in bands" :key="band.id">
                    <div class="rounded-lg flex border-4 w-1/3 box-border p-4 m-4">
                        <div class="w-1/3">
                            <img class="rounded-full w-32 h-32 mx-auto" v-if="band.spotify.images.length > 0" 
                                :src="band.spotify.images[0].url" 
                                :alt="band.spotify.name"
                            >
                            <h2 class="text-2xl text-center">{{ band.spotify.name }}</h2>
                        </div>
                        <div class="w-2/3">
                            <h2 class="text-2xl text-center">Tours</h2>
                            <ul>
                                <li v-for="trip in band.trips">{{ trip.name }}</li>
                            </ul>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </section>
</template>