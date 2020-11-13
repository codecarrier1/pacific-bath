const mix = require('laravel-mix');
const BROWSERSYNC_URL = process.env.MIX_BROWSERSYNC_URL;
const BROWSERSYNC_ENABLED = process.env.MIX_BROWSERSYNC_ENABLED;
let tailwindcss = require('tailwindcss');
/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */


mix.js('resources/js/app.js', 'public/js')
    .extract(['vue'])
    .sass('resources/sass/app.scss', 'public/css')
    .sass('resources/sass/login.scss', 'public/css')
    .options({
      processCssUrls: false,
      postCss: [ tailwindcss('./tailwind.config.js') ],
    })
    .copyDirectory('resources/images', 'public/images')
    .copyDirectory('resources/fonts', 'public/fonts');

if(BROWSERSYNC_ENABLED == 1) {
    mix.browserSync({
        proxy: BROWSERSYNC_URL,
        open: false,
        files: [
            "app/**/*",
            "config/**/*",
            "public/**/*",
            "resources/**/*",
            "routes/**/*",
        ],
    });
}

mix.sourceMaps(true, 'source-map');

mix.disableNotifications();

const ASSET_URL = process.env.ASSET_URL + "/";

mix.webpackConfig(webpack => {
    return {
        plugins: [
            new webpack.DefinePlugin({
                "process.env.ASSET_PATH": JSON.stringify(ASSET_URL)
            })
        ],
        output: {
            publicPath: ASSET_URL,
            chunkFilename: 'js/components/[name].js',
        }
    };
});


