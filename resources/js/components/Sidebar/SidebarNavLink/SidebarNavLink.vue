<template>
  <li class="nav-item nav-dropdown">
    <a
      class="nav-link nav-dropdown-toggle"
      href="#"
    >
      <i :class="`nav-icon ${icon}`" /> {{ modelLabel }}
    </a>
    <ul class="nav-dropdown-items">
      <li class="nav-item">
        <a
          class="nav-link child"
          :href="`/${model}`"
        >
          <i class="nav-icon icon-list" /> Lista
        </a>
      </li>
      <li
        v-if="canCreate"
        class="nav-item"
      >
        <a
          class="nav-link child"
          :href="`/${model}/create`"
        >
          <i class="nav-icon icon-plus" /> Crea
        </a>
      </li>
    </ul>
  </li>
  <!--<li class="nav-item" :id="`${model}Heading`">
        <span
            ref="collapse"
            class="nav-link"
            data-toggle="collapse"
            :data-target="`#${model}`"
            :aria-controls="`#${model}`"
            :aria-expanded="(isActive)"
            @click.prevent
        >
            <i :class="`nav-icon ${icon}`"></i>
            {{ modelLabel }}
        </span>
        <div :id="`${model}`" class="collapse" :class="{'show': isActive }"
             :aria-labelledby="`${model}Heading`" data-parent="#sidebarAccordion">
            <a class="nav-link child" :href="`/${model}`">
                <i class="nav-icon icon-list"></i> Lista
            </a>
            <a v-if="canCreate" class="nav-link child" :href="`/${model}/create`">
                <i class="nav-icon icon-plus"></i> Crea
            </a>
        </div>
    </li>-->
</template>

<script lang="ts">
  import { Component, Prop, Vue } from 'vue-property-decorator'

  @Component({
    name: 'sidebar-navlink'
  })
  export default class SidebarNavLink extends Vue {
    @Prop({ required: true }) model!: string
    @Prop({ required: true }) icon!: string
    @Prop({ required: true }) modelLabel!: string
    @Prop({ required: true }) isActive!: boolean
    @Prop({ required: false, default: false }) canCreate!: boolean

    get subPathOf() {
      return location.href.indexOf(`/${this.model}/connect`) > -1
    }
  }
</script>
