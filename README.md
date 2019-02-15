Joomla! 3.9.x Bootstrap 4.3.x Template
===================

A modern and clean template for Joomla! 3.9.x and up. Built with Bootstrap 4, Font Awesome 5 and AOS using Node.js, npm, Sass, Babel, Webpack and BrowserSync. Also includes build scripts for asset optimization and easy development.

Requirements
-------------
- Mac, Linux or WSL on Windows 10
- Git
- Node.js
- npm

Install
-------------
 1. Go to the Joomla! templates directory and download the repository using the following command: `git clone https://github.com/forgeatspikker/template-b4.git templatename`. Change `templatename` to the desired name.
 2. When the download is done `cd` into your template folder and run `npm install`.
 3. If you want to use BrowerSync open `webpack.dev.js` and change `http://website.test/` to the URL of your website.
 4. Finally run either `npm run development` to start BrowserSync or `npm run production` to compile and optimize all assets.
