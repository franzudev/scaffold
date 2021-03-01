// Layout
Vue.component('sidebar', require('./Sidebar/Sidebar').default);
Vue.component('sidebar-navlink', require('./Sidebar/SidebarNavLink/SidebarNavLink').default);

// Dashboard
// TODO momentaneously not used
// Vue.component('users-count', require('./dashboard/UsersCount').default);
// Vue.component('roles-count', require('./dashboard/RolesCount').default);

// Profile
Vue.component('profile', require('./profile/Profile').default);
Vue.component('profile-password', require('./profile/Password').default);

// Users
Vue.component('users-index', require('./users/Index.vue').default);
Vue.component('users-create', require('./users/Create.vue').default);

// Roles
Vue.component('roles-index', require('./roles/Index').default);
Vue.component('roles-create', require('./roles/Create').default);
Vue.component('roles-edit', require('./roles/Edit').default);

Vue.component('no-entities', require('./common/NoEntities').default)

