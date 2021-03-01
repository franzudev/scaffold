import TCell from "$types/TableCell";

export default [
  {
    name: 'Id',
    dbName: 'id',
    type: '',
    orderable: true
  },
  {
    name: 'Utente',
    dbName: 'username',
    type: 'avatar',
    orderable: true
  },
  {
    name: 'Ruoli',
    dbName: 'roles.name',
    type: 'array',
    orderable: false
  },
  {
    name: 'Registrato il',
    dbName: 'created_at',
    type: 'date',
    orderable: true,
  },
  {
    name: "Azioni",
    type: 'actions',
    icons: [
      {
        class: 'fas fa-pencil-alt',
        title: 'Modifica Corsista',
        event: 'update-user'
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
] as TCell[]
