module.exports = {
    "parser": "typescript-eslint-parser",
    "env": {
        "es6": true,
        "node": true
    },
    "extends": "airbnb-base",
    "globals": {
        "Atomics": "readonly",
        "SharedArrayBuffer": "readonly"
    },
    "parserOptions": {
        "ecmaVersion": 2018,
        "sourceType": "module"
    },
    "rules": {
    },
    settings: {
        "import/resolver": {
            alias: {
                map: [
                    ['@', './src']
                  ],
                  extensions: ['.ts']
            }
        }
    }
};