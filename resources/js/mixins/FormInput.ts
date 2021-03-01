import Vue from 'vue';
import Component  from "vue-class-component";
import { Prop } from "vue-property-decorator";
import { InputConfig } from "$types/InputConfig";

@Component
export default class FormInputMixin extends Vue{
    @Prop({ required: true }) entity!: any
    @Prop({ required: true }) errors!: any
    @Prop({ required: true }) config!: InputConfig
    @Prop({ default: false }) isNew!: boolean

    public type: string = ''
    public slot: string = ''
    public show: boolean = true
    public readonly: boolean = false
    public lang: string = ''
    public required: boolean = true
    // public options: any[] = []
    public label: string = 'name'
    public track_by: string = 'id'
    public multiOpenDirection: string = 'bottom'
    public multiPlaceHolder: string = 'Scegli opzione'
    public api: any = null
    public multiple: any = false
    public configImage: any = null
    public size: number = 0

    public created () {
        for (const [key, value] of Object.entries(this.config)) {
            if (key === 'config') {
                this.configImage = value
            } else {
                (this as any)[key] = value
            }
        }
    }

    get key() {
        return this.$vnode.key
    }

    get customSize() {
        return this.size ? `col-sm-12 col-lg-${this.size}` : 'col-12'
    }

}
