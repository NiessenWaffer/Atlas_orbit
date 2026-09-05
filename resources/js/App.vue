<template>
    <main class="shell">
        <router-view></router-view>
    </main>
</template>

<script>
export default {
    name: 'App',
};
</script>

<style scoped>
.shell {
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #f4f7fb;
    font-family: Arial, Helvetica, sans-serif;
}
</style>
