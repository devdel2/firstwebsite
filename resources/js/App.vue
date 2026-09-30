<script setup lang="ts">
import Router from './router';

</script>

<template>
    <nav>
        <RouterLink to="/">Home</RouterLink>
        <RouterLink to="/bands">Bands</RouterLink>
        <RouterLink to="/education">Education</RouterLink>
    </nav>
    <main>
        <RouterView />
    </main>
</template>