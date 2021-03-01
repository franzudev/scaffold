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
// Categories
Vue.component('categories-index', require('./categories/Index').default)
Vue.component('categories-create', require('./categories/Create').default)

// ProductFamilies
Vue.component('product-families-index', require('./product-families/Index').default)
Vue.component('product-families-create', require('./product-families/Create').default)

// Products
Vue.component('products-index', require('./products/Index').default)
Vue.component('products-create', require('./products/Create').default)

// RelatedProducts
Vue.component('related-products-index', require('./related-products/Index').default)
Vue.component('related-products-create', require('./related-products/Create').default)

// Realizations
Vue.component('realizations-index', require('./realizations/Index').default)
Vue.component('realizations-create', require('./realizations/Create').default)

// ProductPhotos
Vue.component('product-photos-index', require('./product-photos/Index').default)
Vue.component('product-photos-create', require('./product-photos/Create').default)

