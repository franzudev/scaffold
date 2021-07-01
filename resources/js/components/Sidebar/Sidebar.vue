<template>
  <button
    class="sidebar-minimizer brand-minimizer"
    type="button"
    @click="toggleStorage"
  />
</template>

<script>
export default {
  mounted () {
    this.addMinimizedClass()
  },
  methods: {
    toggleStorage () {
      if (localStorage.getItem("sidebarMinimized")) {
        localStorage.removeItem("sidebarMinimized");
      } else {
        localStorage.setItem("sidebarMinimized", true);
      }
    },
    addMinimizedClass () {
      if (localStorage.getItem("sidebarMinimized")) {
        document.body.classList.add("brand-minimized", "sidebar-minimized")
      }
    }
  }
}
</script>
