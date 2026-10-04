<template>
    <nav class="flex gap-6 p-4 bg-gray-900 text-white">
        <RouterLink to="/">Home</RouterLink>
        <RouterLink to="/bands">Bands</RouterLink>
        <RouterLink to="/education">Education</RouterLink>
        <RouterLink to="/career">Career</RouterLink>
    </nav>
</template>

<style scoped>
    .router-link-active{
        font-weight: bold;
    }
</style>