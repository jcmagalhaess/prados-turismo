// Importação dos módulos
const gulp = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const cleanCSS = require('gulp-clean-css');
const uglify = require('gulp-uglify');
const rename = require('gulp-rename');
const sourcemaps = require('gulp-sourcemaps');
const browserSync = require('browser-sync').create();
const { spawn } = require('child_process');
const replace = require('gulp-replace');
require('dotenv').config();

// Caminhos dos arquivos
const paths = {
  scss: './assets/scss/**/*.scss',     // Diretório dos arquivos SCSS
  css: './dist/css',                   // Diretório de saída dos arquivos CSS compilados
  js: './dist/js/**/*.js',           // Diretório dos arquivos JavaScript
  jsDist: './dist/js',                 // Diretório de saída dos arquivos JS minificados
  layouts: './views/layouts/*.php',    // Todos os arquivos PHP dentro de `views`
  pages: './views/pages/**/*.php'         // Todos os arquivos PHP dentro de `views`
};

// Task: Compilar SCSS para CSS com Sourcemaps e Minificação
gulp.task('scss', function () {
  return gulp.src(paths.scss)
    .pipe(sourcemaps.init()) // Inicia os sourcemaps
    .pipe(sass().on('error', sass.logError)) // Compila SCSS para CSS
    .pipe(cleanCSS()) // Minifica o CSS
    .pipe(rename({ suffix: '.min' })) // Renomeia para .min.css
    .pipe(sourcemaps.write('./')) // Escreve o arquivo de sourcemaps
    .pipe(gulp.dest(paths.css)) // Salva o CSS minificado
    .pipe(browserSync.stream()); // Atualiza o navegador
});

gulp.task('inject-env', function () {
  return gulp.src(paths.js)
    .pipe(replace('__URL_API__', process.env.URL_API))
    .pipe(replace('__DEFAULT_USER__', process.env.DEFAULT_USER))
    .pipe(replace('__DEFAULT_PASSWORD__', process.env.DEFAULT_PASSWORD))
    .pipe(gulp.dest(paths.jsDist));
});

// Task: Minificar arquivos JavaScript
gulp.task('minify-js', function () {
  return gulp.src(paths.js)
    .pipe(sourcemaps.init()) // Inicia os sourcemaps
    .pipe(uglify()) // Minifica o JS
    .pipe(rename({ suffix: '.min' })) // Renomeia para .min.js
    .pipe(sourcemaps.write('./')) // Escreve o arquivo de sourcemaps
    .pipe(gulp.dest(paths.jsDist)) // Salva o JS minificado
    .pipe(browserSync.stream()); // Atualiza o navegador
});

// Task: Iniciar o servidor PHP
gulp.task('php-server', function (done) {
  const phpServer = spawn('php', ['-S', 'localhost:5000', '-t', '.']);

  phpServer.stdout.on('data', (data) => {
    console.log(`Servidor PHP: ${data}`);
  });

  phpServer.stderr.on('data', (data) => {
    console.error(`Erro no Servidor PHP: ${data}`);
  });

  phpServer.on('close', (code) => {
    console.log(`Servidor PHP encerrado com código: ${code}`);
    done();
  });

  done();
});

// Task: Iniciar o BrowserSync e observar mudanças
gulp.task('serve', gulp.series('php-server', function () {
  console.log("Starting BrowserSync...");

  browserSync.init({
    proxy: 'localhost:5000', // Proxy para o servidor PHP
    open: false // Mudar para 'true' se quiser abrir o navegador automaticamente
  });

  // Observa mudanças nos arquivos SCSS, JS, HTML e PHP
  gulp.watch(paths.scss, gulp.series('scss'));
  gulp.watch(paths.js, gulp.series('inject-env', 'minify-js'));
  gulp.watch([paths.layouts, paths.pages]).on('change', browserSync.reload); // Remove o uso de `done`
}));


// Task padrão
gulp.task('default', gulp.series('scss', 'inject-env', 'minify-js', 'serve'));
