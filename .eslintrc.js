module.exports = {
    "extends": [
        "plugin:vue/recommended",
        "eslint:recommended"
    ],
    "parserOptions": {
        "parser": "@typescript-eslint/parser",
        "sourceType": "module"
    },
    "env": {
        "browser": true,
        "amd": true,
        "node": true
    },
    "settings": {
        "import/resolver": "webpack"
    },
    "rules": {
        "vue/html-closing-bracket-newline": ["error", {
            "singleline": "never",
            "multiline": "always"
        }],
        "vue/html-self-closing": ["error", {
            "html": {
                "void": "never",
                "normal": "always",
                "component": "always"
            },
            "svg": "always",
            "math": "always"
        }],
        "no-extra-boolean-cast": 0,
    }
}
