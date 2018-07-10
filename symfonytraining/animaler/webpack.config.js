var Encore = require('@symfony/webpack-encore');

Encore
    .setOutputPath('public/build/')
    // in dev mode, don't use the CDN
    .setPublicPath('/build');
    // ...
;


    Encore.setPublicPath('https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css');
    // guarantee that the keys in manifest.json are *still*
    // prefixed with build/
    // (e.g. "build/dashboard.js": "https://my-cool-app.com.global.prod.fastly.net/dashboard.js")
    Encore.setManifestKeyPrefix('build/');

module.exports = Encore.getWebpackConfig();
