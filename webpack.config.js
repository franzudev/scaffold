const path = require('path')
const TsconfigPathsPlugin = require('tsconfig-paths-webpack-plugin');

const ASSET_PATH = (process.env.MIX_APP_ENV === 'local'? process.env.MIX_DEV_APP_URL : process.env.MIX_APP_URL) + '/';

module.exports = {
  output: {
    publicPath: ASSET_PATH
  },
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
      $services: path.resolve(__dirname, "resources/js/services"),
    },
    extensions: ["*", ".js", ".jsx", ".vue", ".ts", ".tsx"],
  }
}
