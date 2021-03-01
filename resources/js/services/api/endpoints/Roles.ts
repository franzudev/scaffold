import { Api } from '../client';

class Roles extends Api {
  constructor() {
    super('/api/roles', 10);
  }

  public list = this._filtered;

  public all = this._getAll;

  public byId = this._getOne;

  public update = this._put;

  public create = this._post;

  public delete = this._delete;

  public getModulePermissions = this._commonGet
}

export default new Roles();
