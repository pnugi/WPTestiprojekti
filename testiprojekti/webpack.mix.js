let mix = require('laravel-mix')

mix
  .autoload({
      'jquery': ['$', 'jQuery', 'window.jQuery'],
  })
  .options({
      processCssUrls: false,
      postCss: [require('tailwindcss/nesting'),require('tailwindcss')('tailwind.config.js')],
  })
  .postCss('assets/styles/app.css', 'bundle.css', [
      require('tailwindcss')('tailwind.config.js'),
  ])
  .postCss('assets/styles/admin.css', 'admin.css', [
      require('tailwindcss')('tailwind.config.js'),
  ])
  .js('assets/js/app.js', 'bundle.js')
  .setPublicPath('dist')
  .version()
  .webpackConfig({
      plugins: [],
      stats: {
        children: true
      }
  })
