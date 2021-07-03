# Installation

### Backend
Install dependency:
```
composer install
```
Init app's configuration:
```
cp .env.example .env
sed -i'' -e 's/APP_NAME=App/APP_NAME=[NEW_APP_NAME]/g' .env
sed -i'' -e 's/MIX_APP_URL=http://app/MIX_APP_URL=http://[APP_FOLDER]/g' .env
sed -i'' -e 's/DB_DATABASE=app/DB_DATABASE=[NEW_DATABASE_NAME/g' .env
```
Generate app's key:
```
artisan key:generate
```
Link app's storage:
```
artisan storage:link
```
Run default migration for users and roles:
```
artisan migrate:fresh --seed
```

### Frontend
Remove package-lock json relative to scaffold and set app's name:
```
rm .package-lock.json
sed -i'' -e 's/"name": "app",/"name": "[NEW_APP_NAME]",/g' .env
```
Install dependency:
```
npm install
```
Build dev assets:
```
npm run dev || npm run watch
```

## About Scaffold

This scaffold is intended to improve the speed of the creation of a control panel.

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

