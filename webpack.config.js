const path = require('path');
const VueLoaderPlugin = require('vue-loader/lib/plugin')

module.exports = {
    entry: {
        main : './resources/js/index.js',
        api : './resources/js/api.js'
    },
    output: {
        filename: '[name].js',
        path: path.resolve(__dirname, 'public'),
    },
    mode : "production",
    module: {
        rules: [
            {
                test: /\.vue$/,
                loader: 'vue-loader'
            },
            {
                test: /\.css$/,
                use: [
                    'style-loader',
                    'css-loader'
                ]
            }
        ]
    },
    plugins: [
        new VueLoaderPlugin()
    ]
};
