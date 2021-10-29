import { Api } from "../services/api/client";

export interface InputConfig {
    type: string
    slot: string
    show?: boolean
    lang?: string // picker
    required?: boolean
    readonly?: boolean
    api?: Api | null
    size?: number
    options?: any[]
    config?: any // image TODO get some info from .env
    // multiselect options
    label?: string
    track_by?: string
    multiple?: boolean
    multiOpenDirection?: string
    multiPlaceHolder?: string

}

export interface InputConfigObject {
    [index: string]: InputConfig
}
