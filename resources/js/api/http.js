import axios from 'axios';

const csrfToken = document.head.querySelector('meta[name="csrf-token"]');
let activeCsrfToken = csrfToken ? csrfToken.content : '';

const http = axios.create({
    baseURL: window.appBasePath || '',
    withCredentials: true,
    headers: {
        Accept: 'application/json',
        'X-Requested-With': 'XMLHttpRequest',
        ...(activeCsrfToken ? { 'X-CSRF-TOKEN': activeCsrfToken } : {}),
    },
});

export function setCsrfToken(token) {
    if (!token) {
        return;
    }

    activeCsrfToken = token;
    http.defaults.headers.common['X-CSRF-TOKEN'] = token;

    if (csrfToken) {
        csrfToken.content = token;
    }
}

if (csrfToken) {
    setCsrfToken(csrfToken.content);
}

http.interceptors.request.use((config) => {
    if (activeCsrfToken) {
        config.headers['X-CSRF-TOKEN'] = activeCsrfToken;
    }

    return config;
});

http.interceptors.response.use((response) => {
    if (response.data && response.data.csrf_token) {
        setCsrfToken(response.data.csrf_token);
    }

    return response;
});

export default http;
