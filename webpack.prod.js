const TerserPlugin = require('terser-webpack-plugin');
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const OptimizeCSSAssetsPlugin = require("optimize-css-assets-webpack-plugin");
const webpack = require("webpack");
const path = require('path');

module.exports = {
  mode: 'production',
  context: __dirname,
  entry: {
    "bundle": "./assets/bundleSrc.js",
  },
  devtool: "source-map",
  performance: {
    hints: false
  },
  optimization: {
    minimizer: [
      new TerserPlugin({
        cache: true,
        include: /\.js$/,
        sourceMap: true
      }),
      new OptimizeCSSAssetsPlugin({})
    ]
  },
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
        use: [
          MiniCssExtractPlugin.loader,
          'css-loader',
          { 
            loader: 'postcss-loader',
            options: { 
              ident: 'postcss',
              plugins: [
                require('autoprefixer')
              ] 
            } 
          },
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
  ],
}
