const BrowserSyncPlugin = require('browser-sync-webpack-plugin');
const TerserPlugin = require('terser-webpack-plugin');
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const OptimizeCSSAssetsPlugin = require("optimize-css-assets-webpack-plugin");
const webpack = require("webpack");
const path = require('path');

module.exports = {
  mode: 'development',
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
        use: [
          MiniCssExtractPlugin.loader,
          'css-loader',
          'sass-loader',
        ],
      },
      {
        test: /\.(gif|png|jpe?g|svg)$/i,
        use: [
          {
            loader: 'file-loader',
            options: {
              name: 'images/[name].[ext]',
            }
          },
          {
            loader: 'image-webpack-loader',
            options: {
              bypassOnDebug: true,
            }
          }
        ],
      }
    ]
  },
  plugins: [
    new MiniCssExtractPlugin({
      filename: '/css/master.css'
    }),
    new BrowserSyncPlugin({
      host: 'localhost',
      port: 3000,
      proxy: 'http://website.test/' // Add website dev url here
    })
  ],
}
