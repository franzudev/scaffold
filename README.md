## About Scaffold

This scaffold is intended to improve the speed of the creation of a controle panel.

The Vue principal components are in the common folder:
- common
    - Forms
        - FormActions.vue
        - FormGenerator.vue
    - Pages
        - ListPage.vue
        - PageHeader.vue
    - Search
        - Search.vue
        - SearchHeader.vue
    - Table
        - Index.vue
    - Uploader
        - ImageUploader.vue
    - NoEntities.vue


# list-page

## Slots

| Name     | Description |
| -------- | ----------- |
| `header` | &nbsp;      |

## Props

| Name                           | Type       | Description |
| ------------------------------ | ---------- | ----------- |
| `entities` *required*          | `any[]`    |             |
| `search-options` *required*    | `string[]` |             |
| `columns` *required*           | `TCell[]`  |             |
| `entity-name` *required*       | `string`   |             |
| `entity-new-button` *required* | `string`   |             |
| `retrieve-entity` *required*   | `Function` |             |
| `edit-entity` *required*       | `Function` |             |
| `excel-header`                 | `string[]` |             |
| `excel-data`                   | `Function` | &nbsp;      |

## Computed Properties

| Name                | Type      | Description                                  |
| ------------------- | --------- | -------------------------------------------- |
| `capitalizedEntity` | `unknown` | **Dependencies:** `entityName`               |
| `filtersKey`        | `string`  | **Dependencies:** `capitalizedEntity`        |
| `excelSupport`      | `boolean` | **Dependencies:** `excelHeader`, `excelData` |

## Methods

### getEntity()

**Syntax**

```typescript
getEntity(): void
```

