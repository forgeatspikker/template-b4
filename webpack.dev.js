var ExtractTextPlugin = require('extract-text-webpack-plugin');
var BrowserSyncPlugin = require('browser-sync-webpack-plugin')
const webpack = require("webpack");
const path = require('path');

module.exports = {
  context: __dirname,
  entry: {
    "bundle": "./assets/bundleSrc.js"
  },
  output: {
    path: __dirname + "/dist",
    filename: "js/[name].js",
  },
  watch: true,
  module: {
    rules: [
      {
          test: require.resolve('jquery'),
          use: [{
             loader: 'expose-loader',
             options: 'jQuery'
         },{
             loader: 'expose-loader',
             options: '$'
         }]
      },
      {
        test: /\.(s*)css$/,
        use: ExtractTextPlugin.extract({
          fallback:'style-loader',
          use:[
            {
              loader: "css-loader?url=false",
            },
            {
              loader: "postcss-loader",
              options: {
                plugins: function() {
                  return [
                    require('autoprefixer'),
                  ]
                }
              }
            },
            {
              loader: "sass-loader"
            }
          ]
        })
      }
    ]
  },
  plugins: [
    new ExtractTextPlugin({filename: '/css/master.css'}),
    new BrowserSyncPlugin({
      host: 'localhost',
      port: 3000,
      proxy: 'http://localhost/modeteam/'
    })
  ],
}
