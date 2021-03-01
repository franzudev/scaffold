import { Api } from '../client';

class Permissions extends Api {
    constructor() {
        super('/api/permissions', 10);
    }

    public count = this._count;
}

export default new Permissions();
