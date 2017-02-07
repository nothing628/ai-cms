
Vue.http.interceptors.push((request, next) => {
    request.headers.set('X-CSRF-TOKEN', Laravel.csrfToken);
    request.headers.set('Authorization', Laravel.apiToken);
    request.headers.set('Accept', 'Application/json');

    next();
});

Vue.http.options.root = 'http://ai-cms.id';
