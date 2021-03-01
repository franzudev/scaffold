import Role from "$types/entities/Role";

export default interface User {
  id: number
  username: string
  email: string
  email_verified_at: Date
  birth_date: Date
  password: string
  avatar: string
  roles: Role[]
  created_at: Date
  updated_at: Date
  deleted_at: Date
}
