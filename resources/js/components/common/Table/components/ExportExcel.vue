<template>
  <div class="col-auto">
    <button
      title="Stampa excel"
      class="btn btn-outline-primary"
      @click="exportExcel"
    >
      <i
        v-if="exporting"
        class="fas fa-spinner fa-spin"
      />
      <i
        v-else
        class="fas fa-file-excel"
      />
    </button>
  </div>
</template>

<script lang="ts">
import { Component, Prop, Vue } from 'vue-property-decorator'
import Swal from "sweetalert2";


@Component({
    name: 'ExportExcel'
})
export default class ExportExcel extends Vue {
    @Prop({ required: true }) rows!: Object[]
    @Prop({ required: true }) totalRows!: Number
    @Prop({ required: true }) perPage!: Number
    @Prop({ required: true }) changeSize!: Function
    @Prop({ required: true }) header!: string[]
    @Prop({ required: true }) dataTable!: Function

    private exporting: Boolean = false

    private exportExcel() {
        this.exporting = true
        if (this.rows.length < this.totalRows) {
            Swal.fire({
                    title: "Esporta Excel",
                    text: 'Vuoi esportare i risultati visibili o tutte le pagine della griglia?',
                    icon: 'warning',
                    showCancelButton: true,
                    showDenyButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Tutte',
                    denyButtonText: 'Pagina corrente',
                    cancelButtonText: 'Annulla'
                })
                .then((value: any) => {
                    if (value.isConfirmed) {
                        let perPage = this.perPage
                        this.changeSize(this.totalRows)
                            .then(() => {
                                this.printExcel(this.rows)
                            })
                            .finally(() => this.changeSize(perPage))
                    } else if (value.isDenied) {
                        this.printExcel()
                    } else {
                        this.exporting = false
                    }
                })
        } else {
            this.printExcel()
        }
    }

    private printExcel(rows: any = null) {
        import(<any>'./vendor/Export2Excel')
            .then(excel => {
                let data = rows ? rows : this.rows
                let datatable = data.map(this.dataTable as any)
                try {
                    excel.export_json_to_excel({
                        header: this.header,
                        data: datatable,
                        filename: 'registro-' + new Date().toDateString(),
                        autoWidth: true,
                        bookType: 'xlsx'
                    })
                } catch (e) {
                    Swal.fire("Errore di stampa!", "C'è stato un errore nella stampa, riprova o contatta l'assistenza", "error");
                }
            })
            .finally(() => (this.exporting = false))
    }
}
</script>

<style scoped>

</style>
