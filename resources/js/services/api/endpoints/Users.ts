import { Api } from '../client';

class Users extends Api {
  constructor() {
    super('/api/users', 10);
  }

  public list = this._filtered;

  public byId = this._getOne;

  public login = (data: any) => this._client().post('/login', data);

  public register = (data: any) => this._client().post('/register', data);

  public createOrUpdate = this._putOrPost;

  public update = this._put;

  public create = this._post;

  public delete = this._delete;
}

export default new Users();
