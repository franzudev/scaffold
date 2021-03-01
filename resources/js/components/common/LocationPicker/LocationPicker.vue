<template>
  <div class="LocationPicker">
    <div
      ref="map"
      class="LocationPicker__map"
    />
    <input
      ref="input"
      type="text"
      class="LocationPicker__autocomplete"
    >
    <info-window
      ref="info"
      class="LocationPicker__info-window"
    />
  </div>
</template>


<script lang="ts">
import { Component, Prop, Vue, Watch } from 'vue-property-decorator'
import InfoWindow from './InfoWindow.vue'

const API_KEY = process.env.MIX_MAPS_API_KEY

@Component({
    components: { InfoWindow }
})
export default class LocationPicker extends Vue {
    @Prop({ required: true }) options!: Object
    @Prop({ default: null }) savedPlace!: any
    public geocoder: any = null
    public map: any = null
    public marker: any = null
    public infoWindow: any = null
    public autocomplete: any = null
    public place: any = null

    @Watch('place')
    public changePlace(value: any) {
        this.$emit('update:place', value);
    }

    created() {
        this.$on('location-picker-init', this.initializeMap)
    }

    public beforeDestroy() {
        this.$off('location-picker-init', this.initializeMap)
        this.marker.removeListener('dragstart', this.closeInfoWindow)
        this.marker.removeListener('dragend', this.geocodeLocation)
        this.autocomplete.removeListener('place_changed', this.moveMarker)
    }

    public mounted() {
        let config: any = {}
        if (!API_KEY) {
            console.error('[Vue Location Picker]: è necessaria una api key valida')
            return
        }

        config.libraries = 'places';
        config.callback = 'initLocationPicker';
        config.key = API_KEY;

        (global as any).initLocationPicker = () => {
            this.$emit('location-picker-init', this.options || {})
        }

        // construct the url
        let apiUrl = 'https://maps.googleapis.com/maps/api/js'
        let params = Object.keys(config).map((key) => `${encodeURIComponent(key)}=${encodeURIComponent(config[key])}`)
        let url = `${apiUrl}?${params.join('&')}`

        // create and append the script to body
        let script = document.createElement('script')
        script.src = url
        script.async = true
        script.defer = true
        document.body.appendChild(script)
    }

    public openInfoWindow() {
        this.infoWindow.open(this.map, this.marker)
    }

    public closeInfoWindow() {
        this.infoWindow.close()
    }

    public geocodeLocation(e: any) {
        this.map.panTo(e.latLng);
        (this.$refs.input as any).value = ''
        this.geocoder.geocode({ 'latLng': e.latLng }, (response: any) => {
            if (response && response.length > 0) {
                this.place = response[0];
                (this.$refs.info as any).showAddress(this.place)
            } else {
                this.place = null;
                (this.$refs.info as any).showError()
            }

            this.openInfoWindow()
        })
    }

    public moveMarker(savedPlace: any = null) {
        let place = savedPlace ? savedPlace : this.autocomplete.getPlace()
        if (!place) return;
        let location = place.geometry && place.geometry.location
        delete place.utc_offset

        if (location) {
            this.place = place
            this.map.panTo(location)
            this.marker.setPosition(location);
            (this.$refs.info as any).showAddress(place)
        }
    }

    public initializeMap(options: any) {

        this.geocoder = new google.maps.Geocoder()

        this.map = new google.maps.Map((this.$refs as any).map, Object.assign({
            center: { lat: 0, lng: 0 },
            zoom: 3,
            disableDefaultUI: true
        }, options.map))

        this.marker = new google.maps.Marker(Object.assign({
            map: this.map,
            position: this.map.getCenter(),
            draggable: true
        }, options.marker))

        this.infoWindow = new google.maps.InfoWindow(Object.assign({
            content: (this.$refs.info as any).$el
        }, options.infoWindow))

        this.autocomplete = new google.maps.places.Autocomplete((this.$refs as any).input, Object.assign({
            types: ['geocode']
        }, options.autocomplete))
        this.map.controls[google.maps.ControlPosition.TOP_LEFT].push(this.$refs.input)

        // events
        google.maps.event.addListenerOnce(this.map, 'idle', this.openInfoWindow)
        this.marker.addListener('dragstart', this.closeInfoWindow)
        this.marker.addListener('dragend', this.geocodeLocation)
        this.autocomplete.addListener('place_changed', this.moveMarker)

        this.moveMarker(this.savedPlace)
    }
}
</script>


<style>
.LocationPicker,
.LocationPicker__map {
    height: 100%;
    min-height: 500px;
}

.LocationPicker__autocomplete {
    padding: 7px 14px;
    margin: 10px;
    width: 30%;
    min-width: 300px;
    font-family: Roboto;
    font-size: 15px;
    font-weight: 300;
    text-overflow: ellipsis;
    border: 0;
    border-radius: 2px 0 0 2px;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
}

.LocationPicker > .LocationPicker__autocomplete,
.LocationPicker > .LocationPicker__info-window {
    display: none;
}
</style>
