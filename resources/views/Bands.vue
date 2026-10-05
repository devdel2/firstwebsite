<script setup>
import { ref, onMounted } from 'vue';

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
        <h1>Bands</h1>
        <p v-if="loading">Loading Bands...</p>
        <p v-else-if="error">Error: {{ error }}</p>
        <div v-else>
            <div v-for="band in bands" :key="band.id">
                <h2>{{ band.name }}</h2>
                <img v-if="band.images.length > 0" 
                    :src="band.images[0].url" 
                    :alt="band.name"
                >
            </div>
        </div>
    </section>
</template>