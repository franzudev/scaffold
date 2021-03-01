import User from "$types/entities/User";

export default interface Role {
  id: number
  name: string
  display_name: string
  permissions: Permission[]
  users: User[]
  modulesPermissions: Module[]
}

interface Module {
  name: string
  display_name: string
  permissions: Permission[]
}

interface Permission {
  display_name: string
  allow: boolean
}


