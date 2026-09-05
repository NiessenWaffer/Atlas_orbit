import axios from 'axios';

const csrfToken = document.head.querySelector('meta[name="csrf-token"]');

const http = axios.create({
    baseURL: window.appBasePath || '',
    withCredentials: true,
    headers: {
        Accept: 'application/json',
        'X-Requested-With': 'XMLHttpRequest',
        ...(csrfToken ? { 'X-CSRF-TOKEN': csrfToken.content } : {}),
    },
});

export default http;
