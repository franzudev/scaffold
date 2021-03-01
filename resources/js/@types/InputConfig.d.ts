export interface InputConfig {
    type: string
    slot: string
    show: boolean
    lang: string // picker
    required: boolean
    options: any[]
    label: string
    track_by: string
    config: any // image TODO get some info from .env
}
