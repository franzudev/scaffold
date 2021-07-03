import Vue from 'vue';
import { Component } from 'vue-property-decorator';
import Swal from 'sweetalert2';

@Component
export default class Notify extends Vue{
  public Toast: any = Swal.mixin({
    toast: true,
    position: 'bottom',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast: HTMLElement) => {
      toast.addEventListener('mouseenter', Swal.stopTimer)
      toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
  })

  public toastSuccess(title: string) {
    this.Toast.fire({
      icon: 'success',
      title: title
    })
  }

  public toastError(title: string) {
    this.Toast.fire({
      icon: 'error',
      title: title
    })
  }

  public toastWarning(title: string) {
    this.Toast.fire({
      icon: 'warning',
      title: title
    })
  }

  public toastInfo(title: string) {
    this.Toast.fire({
      icon: 'info',
      title: title
    })
  }

  public toastQuestion(title: string) {
    this.Toast.fire({
      icon: 'question',
      title: title
    })
  }

  public areYouSure(message: string) {
    return Swal.fire({
      title: 'Sei sicuro?',
      text: message,
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Si, cancella!',
      cancelButtonText: 'Annulla'
    })
  }
}




