const path = require('path')

module.exports = {
    devServer: {
      proxy: 'http://laravel.test'
    },

     // output built static files to Laravel's public dir.
     // note the "build" script in package.json needs to be modified as well.
     outputDir: '../../../public/assets/app',

     publicPath: process.env.NODE_ENV === 'production'
       ? '/src'
       : '/',

     // modify the location of the generated HTML file.
     indexPath: process.env.NODE_ENV === 'production'
       ? '../../../resources/views/app.blade.php'
       : 'index.html',

         chainWebpack: config => {
           const types = ['vue-modules', 'vue', 'normal-modules', 'normal']
           types.forEach(type => addStyleResource(config.module.rule('stylus').oneOf(type)))
         },
       }

       function addStyleResource (rule) {
         rule.use('style-resource')
           .loader('style-resources-loader')
           .options({
             patterns: [
                path.resolve(__dirname, './src/styles/imports.styl'),
             ],
           })
       }


