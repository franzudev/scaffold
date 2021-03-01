export default interface TCell {
  name: string
  dbName: string
  comparison: string
  type: 'avatar' | 'avatar-stack' | 'progress-bar' | 'date' | 'actions' | 'array'
  class: string
  orderable: boolean
}
