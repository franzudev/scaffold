export default [
  {
    name: 'Id',
    dbName: 'id',
    class: "d-none d-md-table-cell",
    type: '',
    orderable: true
  },
  {
    name: 'Ruolo',
    dbName: 'display_name',
    class: 'd-table-cell',
    type: '',
    orderable: true
  },
  {
    name: 'Slug',
    dbName: 'name',
    class: "d-none d-md-table-cell",
    type: '',
    orderable: true
  },
  {
    name: 'Utenti',
    dbName: 'users',
    class: "d-table-cell",
    type: 'avatar-stack',
    orderable: false
  },
  {
    name: 'Permessi',
    dbName: 'permissions',
    comparison: 'permissions_count',
    class: 'd-none d-lg-table-cell',
    type: 'progress-bar',
    orderable: false
  },
  {
    name: 'Registrato il',
    dbName: 'created_at',
    class: 'd-none d-lg-table-cell',
    type: 'date',
    orderable: true,
  },
  {
    name: "Azioni",
    type: 'actions',
    icons: [
      {
        class: 'fas fa-pencil-alt',
        title: 'Modifica Ruolo',
        event: 'update-role'
      },
      // {
      //   class: 'fas fa-graduation-cap',
      //   title: 'Aggiungi formazione a utente',
      //   event: 'link-user'
      // },
      // {
      //   class: 'fas fa-file-upload',
      //   title: 'Carica file a utente',
      //   event: 'upload-user'
      // },
    ]
  }
]
