export default interface Filter {
  pagination: {
    from: number,
    to: number,
    total: number,
    per_page: number,
    current_page: number,
    last_page: number
  },
  orderBy: {
    column: string,
    direction: string
  },
  search: {
    for: string,
    value: string
  }
}
