const config = {
    plugins: [
        require('postcss-import'),
        require('autoprefixer'),
        require('cssnano')({
            preset: 'default',
        })
    ]
}

module.exports = config