window.Popper = require('popper.js').default

try {
  window.$ = window.jQuery = require('jquery')
  require('bootstrap')
} catch (e) {}

require ('slick-carousel')

require('./header')
require ('./accordion')
require ('./select')
require ('./config-slick')
