import Api from './Api';

class ApiUsers extends Api {
    constructor() {
        super('user/');
    }

    getAllByType(userType) {
        return this.all + '?userType=' + userType;
    }

    getAllByPageAndType(page, userType) {
        return this.getAllByType(userType) + '&page=' + page;
    }
}

export default ApiUsers;
