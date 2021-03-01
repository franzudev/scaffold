# FormGenerator

Generates the form with the correct input components, based on the prop inputs.

Example

```vue
<form-generator
    v-model="user"
    :inputs="inputs"
    :errors="errors"
    :is-new="isNew"
    @disable-actions="disableAction = $event"
/>

<script lang="ts">
@Component({
    components: { FormGenerator }
})
export default class Create extends Vue {
    private user: User = {} as User;
    public roles: Role[] = []
    public loading: boolean = true
    public submiting: boolean = false
    public submitingDestroy: boolean = false
    public disableAction: boolean = false
    public errors: any = {}

    protected created() {
        this.getRoles()
        if (!this.isNew) {
            this.getUser()
        }
    }

    public get isNew() {
        return location.href.includes('create')
    }

    public get inputs() {
        return {
            "Username": {
                type: 'text',
                slot: 'username',
                required: true,
                readonly: !this.isNew
            }
    }
/*
** Input structure
type: string
slot: string
show: boolean
readonly: boolean
lang: string
required: boolean
label: string
track_by: string
multiOpenDirection: string
multiPlaceHolder: string
api: any
multiple: any
configImage: any
size: number
}
*/
</script>
```

## Props

<!-- @vuese:FormGenerator:props:start -->
|Name|Description|Type|Required|Default|
|---|---|---|---|---|
|inputs|-|—|`true`|-|
|value|-|—|`true`|-|
|errors|-|—|`true`|-|
|isNew|-|—|`true`|-|
|pickerOptions|-|—|`false`|-|

<!-- @vuese:FormGenerator:props:end -->


## Events

<!-- @vuese:FormGenerator:events:start -->
|Event Name|Description|Parameters|
|---|---|---|
|input|-|-|

<!-- @vuese:FormGenerator:events:end -->


## Slots

<!-- @vuese:FormGenerator:slots:start -->
|Name|Description|Default Slot Content|
|---|---|---|
|default|-|-|

<!-- @vuese:FormGenerator:slots:end -->


