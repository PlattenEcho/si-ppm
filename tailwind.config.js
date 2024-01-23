/** @type {import('tailwindcss').Config} */
module.exports = {
  
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./resources/**/*.css",
    "./node_modules/flowbite/**/*.js",
    './vendor/rappasoft/laravel-livewire-tables/resources/views/**/*.blade.php',
    './app/Http/Livewire/**/*Table.php', 
    './vendor/power-components/livewire-powergrid/resources/views/**/*.php',
    './vendor/power-components/livewire-powergrid/src/Themes/Tailwind.php',
    './vendor/wire-elements/modal/resources/views/*.blade.php',
    './storage/framework/views/*.php',
    './vendor/wire-elements/modal/src/ModalComponent.php',
  ],
  experimental: {
    optimizeUniversalDefaults: true
  },
  options: {
    safelist: [
      'sm:max-w-2xl'
    ]
  },
  presets: [
    // require("./vendor/wireui/wireui/tailwind.config.js"),
    require("./vendor/power-components/livewire-powergrid/tailwind.config.js"), 
  ],
  theme: {
    fontFamily: {
      'body': [
        'Inter', 
        'ui-sans-serif', 
        'system-ui',
        // other fallback fonts
      ],
      'sans': [
        'Inter', 
        'ui-sans-serif', 
        'system-ui',
        // other fallback fonts
      ]
    },
    extend: {colors: {
      primary: {"50":"#eff6ff","100":"#dbeafe","200":"#bfdbfe","300":"#93c5fd","400":"#60a5fa","500":"#3b82f6","600":"#2563eb","700":"#1d4ed8","800":"#1e40af","900":"#1e3a8a","950":"#172554"}
    }

},
  },
  plugins: [
    require('flowbite/plugin'),
  ],

}
