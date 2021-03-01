<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav accordion" id="sidebarAccordion">
            <li class="nav-item">
                <a class="nav-link" href="/dashboard">
                    <i class="nav-icon icon-speedometer"></i> Dashboard
                </a>
            </li>
            @can('read-users')
                <li class="nav-title">Anagrafiche</li>
            @endcan
            @can('read-users')
                <sidebar-navlink
                        model="users"
                        icon="icon-people"
                        model-label="Utenti"
                        @can('create-users')
                        :can-create="true"
                        @endcan
                        is-active="{{ Request::segment(1) === 'users' }}"
                ></sidebar-navlink>
            @endcan
            @can('read-categories')
                <sidebar-navlink
                        model="categories"
                        icon="icon-layers"
                        model-label="Categoria"
                        @can('create-categories')
                        :can-create="true"
                        @endcan
                        is-active="{{ Request::segment(1) === 'categories' }}"
                ></sidebar-navlink>
            @endcan
            @can('read-product-families')
                <sidebar-navlink
                        model="product-families"
                        icon="icon-layers"
                        model-label="Famiglia Prodotti"
                        @can('create-product-families')
                        :can-create="true"
                        @endcan
                        is-active="{{ Request::segment(1) === 'product-families' }}"
                ></sidebar-navlink>
            @endcan
            @can('read-products')
                <sidebar-navlink
                        model="products"
                        icon="icon-diamond"
                        model-label="Prodotti"
                        @can('create-products')
                        :can-create="true"
                        @endcan
                        is-active="{{ Request::segment(1) === 'products' }}"
                ></sidebar-navlink>
            @endcan
            {{-- new slot --}}

            @can('read-users')
                <li class="nav-title">Impostazioni</li>
            @endcan
            @can('read-users')
                <sidebar-navlink
                        model="roles"
                        icon="icon-key"
                        model-label="Ruoli"
                        @can('create-roles')
                        :can-create="true"
                        @endcan
                        is-active="{{ Request::segment(1) === 'roles' }}"
                ></sidebar-navlink>
            @endcan
        </ul>
    </nav>
    <sidebar></sidebar>
</div>
