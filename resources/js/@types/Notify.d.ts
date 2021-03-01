import { SweetAlertResult } from "sweetalert2";

export interface Notifiable {

  Toast: any

  toastSuccess(s: string): void
  toastError(s: string): void
  toastWarning(s: string): void
  toastInfo(s: string): void
  toastQuestion(s: string): void
  areYouSure(s: string): Promise<SweetAlertResult<unknown>>

}
