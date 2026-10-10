<template>
    <nav class="flex gap-6 p-4 bg-gray-900 text-white sticky top-0 z-50">
        <RouterLink to="/">Home</RouterLink>
        <RouterLink to="/bands">My Music</RouterLink>
    </nav>
</template>

<style scoped>
    .router-link-active{
        font-weight: bold;
        border-bottom: 4px solid #A6ECE0;
    }
</style>