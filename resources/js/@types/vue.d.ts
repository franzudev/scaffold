import Vue from 'vue'
import { Notifiable } from "$types/Notify";
import { Emitter } from "mitt";

declare module 'vue/types/vue' {
  interface Vue extends Notifiable{
    $host: string
    $screen: { width: number }
    $bus: Emitter<any>
    $moment: any
  }
}
