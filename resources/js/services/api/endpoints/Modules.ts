import { Api } from '../client';

class Modules extends Api {
    constructor() {
        super('/api/modules', 10);
    }

    public getPermissions = this._commonGet
}

export default new Modules();
