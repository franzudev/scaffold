const path = require('path')
const TsconfigPathsPlugin = require('tsconfig-paths-webpack-plugin');

module.exports = {
  module: {
    rules: [
      {
        test: /\.tsx?$/,
        loader: "ts-loader",
        options: { appendTsSuffixTo: [/\.vue$/] },
        exclude: /node_modules/
      }
    ]
  },
  resolve: {
    plugins: [
        new TsconfigPathsPlugin({
          configFile: 'tsconfig.json'
        })
    ],
    alias: {
      $components: path.resolve(__dirname, "resources/js/components"),
      $common: path.resolve(__dirname, "resources/js/components/common"),
      $mixins: path.resolve(__dirname, "resources/js/mixins"),
      $tables: path.resolve(__dirname, "resources/js/tables"),
      $api: path.resolve(__dirname, "resources/js/services/api/endpoints"),
      $types: path.resolve(__dirname, "resources/js/@types"),
    },
    extensions: ["*", ".js", ".jsx", ".vue", ".ts", ".tsx"]
  }
}
