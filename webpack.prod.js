var ExtractTextPlugin = require('extract-text-webpack-plugin');
const webpack = require("webpack");
const path = require('path');

module.exports = {
  context: __dirname,
  entry: {
    "bundle": "./assets/bundleSrc.js",
  },
  devtool: "source-map",
  output: {
    path: __dirname + "/dist",
    filename: "js/[name].js",
  },
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
        test: /\.js$/,
        exclude: /(node_modules|bower_components)/,
        use: {
          loader: 'babel-loader',
          options: {
             presets: ['env']
          }
        }
      },
      {
        test: /\.(s*)css$/,
        use: ExtractTextPlugin.extract({
          fallback:'style-loader',
          use:[
            {
              loader: "css-loader",
            },
            {
              loader: "postcss-loader",
              options: {
                plugins: function() {
                  return [
                    require('autoprefixer'),
                    require('cssnano')({
                      preset: 'default'
                    })
                  ]
                }
              }
            },
            {
              loader: "sass-loader"
            }
          ]
        }),
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
      new ExtractTextPlugin({filename: '/css/master.css'}),
      new webpack.optimize.UglifyJsPlugin({
        include: /\.js$/,
        minimize: true
      })
  ],
}
