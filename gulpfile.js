// Importação dos módulos
const gulp = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const cleanCSS = require('gulp-clean-css');
const uglify = require('gulp-uglify');
const rename = require('gulp-rename');
const sourcemaps = require('gulp-sourcemaps');
const browserSync = require('browser-sync').create();
const shell = require('gulp-shell');

// Caminhos dos arquivos
const paths = {
  scss: './public/assets/scss/**/*.scss',     // Diretório dos arquivos SCSS
  css: './public/dist/css',                   // Diretório de saída dos arquivos CSS compilados
  js: './public/assets/js/**/*.js',           // Diretório dos arquivos JavaScript
  jsDist: './public/dist/js',                 // Diretório de saída dos arquivos JS minificados
  layout: './public/views/layouts/*.php',             // Todos os arquivos PHP dentro de `views`
  pages: './public/views/pages/*.php'              // Todos os arquivos PHP dentro de `views`
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
gulp.task('php-server', shell.task([
  'php -S localhost:8000 -t public'
]));

// Task: Iniciar o BrowserSync e observar mudanças
gulp.task('serve', gulp.series('php-server', function () {
  console.log("Starting BrowserSync...");

  browserSync.init({
    proxy: 'localhost:8000', // Proxy para o servidor PHP
  });

  // Observa mudanças nos arquivos SCSS, JS, HTML e PHP
  gulp.watch(paths.scss, gulp.series('scss'));
  gulp.watch(paths.js, gulp.series('minify-js'));
  gulp.watch([paths.layout, paths.pages]).on('change', browserSync.reload);
}));

// Task padrão
gulp.task('default', gulp.series('scss', 'minify-js', 'serve'));
