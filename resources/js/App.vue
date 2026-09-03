<template>
    <main class="shell">
        <section class="card">
            <p class="eyebrow">Phase 0</p>
            <h1>ATLAS & ORBIT</h1>
            <p class="status">{{ message }}</p>
        </section>
    </main>
</template>

<script>
import axios from 'axios';

export default {
    name: 'App',
    data() {
        return {
            message: 'Checking backend connection...',
        };
    },
    mounted() {
        axios
            .get('/api/health-check')
            .then((response) => {
                this.message = response.data.message;
            })
            .catch(() => {
                this.message = 'Health check failed.';
            });
    },
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

.card {
    width: min(32rem, calc(100vw - 2rem));
    padding: 2rem;
    border-radius: 16px;
    background: #ffffff;
    box-shadow: 0 20px 50px rgba(15, 23, 42, 0.08);
}

.eyebrow {
    margin: 0 0 0.5rem;
    color: #4f46e5;
    font-size: 0.875rem;
    font-weight: 700;
    letter-spacing: 0.08em;
    text-transform: uppercase;
}

h1 {
    margin: 0 0 0.75rem;
    color: #0f172a;
    font-size: 2rem;
}

.status {
    margin: 0;
    color: #334155;
    font-size: 1.05rem;
}
</style>
