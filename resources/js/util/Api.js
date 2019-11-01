class Api {
    constructor(endpoint) {
        this.baseUrl = '/api/' + endpoint;
    }

    get all() {
        return this.baseUrl + 'all';
    }

    byId(resourceId) {
        return this.baseUrl + resourceId;
    }
}

export default Api;
