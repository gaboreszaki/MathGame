import { resolve } from 'path'

export default {
    root: resolve(__dirname, 'src'),
    build: {
        outDir: __dirname + '/dist'
    },
    server: {
        port: 8080
    }
}
