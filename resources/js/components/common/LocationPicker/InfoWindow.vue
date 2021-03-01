<template>
  <div>
    <strong>{{ title }}</strong>
    <p
      v-for="(item, key) in body"
      :key="key"
    >
      {{ item }}
    </p>
  </div>
</template>


<script lang="ts">
import { Component, Vue } from 'vue-property-decorator'

@Component({})
export default class InfoWindow extends Vue {
    public title: string = 'Istruzioni'
    public body: string[] = ['Cerca la località con la casella qui sopra, poi trascina il puntatore nel punto in cui si trova la tua struttura']

    public showAddress (place: any) {
        this.title = 'Indirizzo'
        this.body = place.formatted_address.split(',').map((item: any) => item.trim())
    }

    public showError () {
        this.title = 'Oups'
        this.body = ['Google Maps non riesce a determinare l\'indirizzo postale di questo posto.']
    }
}
</script>


<style scoped>
  div {
    font-family: monospace;
    color: #333;
  }

  p {
    margin-bottom: 0;
  }

  p:not(:first-of-type) {
    margin-top: 6px;
  }
</style>
