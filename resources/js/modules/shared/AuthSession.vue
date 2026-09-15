<template>
    <section class="card">
        <p class="eyebrow">Phase 1</p>
        <h1>ATLAS & ORBIT Login</h1>

        <p v-if="loading" class="status">Checking active session...</p>

        <form v-else-if="!user" class="form" @submit.prevent="login">
            <label>
                Email
                <input v-model="form.email" type="email" autocomplete="email" required>
            </label>

            <label>
                Password
                <input v-model="form.password" type="password" autocomplete="current-password" required>
            </label>

            <p v-if="error" class="error">{{ error }}</p>

            <button type="submit" :disabled="submitting">
                {{ submitting ? 'Logging in...' : 'Login' }}
            </button>
        </form>

        <div v-else class="session">
            <p class="status">Logged in as {{ user.email }}</p>
            <button type="button" :disabled="submitting" @click="logout">
                {{ submitting ? 'Logging out...' : 'Logout' }}
            </button>
        </div>
    </section>
</template>

<script>
import http from '../../api/http';

export default {
    name: 'AuthSession',
    data() {
        return {
            loading: true,
            submitting: false,
            user: null,
            error: '',
            form: {
                email: '',
                password: '',
            },
        };
    },
    mounted() {
        this.fetchCurrentUser();
    },
    methods: {
        fetchCurrentUser() {
            this.loading = true;

            http.get('/current-user')
                .then((response) => {
                    this.user = response.data.user;
                })
                .catch(() => {
                    this.user = null;
                })
                .finally(() => {
                    this.loading = false;
                });
        },
        login() {
            this.submitting = true;
            this.error = '';

            http.post('/login', this.form)
                .then((response) => {
                    this.user = response.data.user;
                    this.form.password = '';
                })
                .catch((error) => {
                    this.error = error.response && error.response.data.message
                        ? error.response.data.message
                        : 'Login failed.';
                })
                .finally(() => {
                    this.submitting = false;
                });
        },
        logout() {
            this.submitting = true;
            this.error = '';

            http.get('/current-user')
                .then(() => http.post('/logout'))
                .then(() => {
                    this.user = null;
                    this.form.password = '';
                    window.location.reload();
                })
                .catch((error) => {
                    this.error = error.response && error.response.data.message
                        ? error.response.data.message
                        : 'Logout failed.';
                })
                .finally(() => {
                    this.submitting = false;
                });
        },
    },
};
</script>

<style scoped>
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
    margin: 0 0 1.5rem;
    color: #0f172a;
    font-size: 2rem;
}

.form,
.session {
    display: grid;
    gap: 1rem;
}

label {
    display: grid;
    gap: 0.4rem;
    color: #334155;
    font-weight: 700;
}

input {
    padding: 0.8rem 0.9rem;
    border: 1px solid #cbd5e1;
    border-radius: 10px;
    font: inherit;
}

button {
    padding: 0.85rem 1rem;
    border: 0;
    border-radius: 10px;
    background: #4f46e5;
    color: #ffffff;
    cursor: pointer;
    font: inherit;
    font-weight: 700;
}

button:disabled {
    cursor: wait;
    opacity: 0.65;
}

.status {
    margin: 0;
    color: #334155;
    font-size: 1.05rem;
}

.error {
    margin: 0;
    color: #b91c1c;
}
</style>
