const mix = require('laravel-mix')
const path = require('path')

let source = path.resolve(__dirname) + '/resources'
const dist = 'public'

mix
  // css
  .css(source + '/css/user.css', dist + '/platform/css').version()

  // js
  .js(source + '/js/user.js', dist + '/platform/js').version()
