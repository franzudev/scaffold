import Vue from 'vue'
import { Notifiable } from "$types/Notify";

declare module 'vue/types/vue' {
  interface Vue extends Notifiable{
    $host: string
  }
}
