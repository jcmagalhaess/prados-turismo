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
  scss: './src/scss/**/*.scss',         // Diretório dos arquivos SCSS
  css: './public/assets/css',           // Diretório de saída dos arquivos CSS compilados
  js: './src/js/**/*.js',               // Diretório dos arquivos JavaScript
  jsDist: './public/assets/js',         // Diretório de saída dos arquivos JS minificados
  html: './public/**/*.html',           // Arquivos HTML dentro de `public`
  php: './public/**/*.php'              // Arquivos PHP dentro de `public`
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
  browserSync.init({
    proxy: 'localhost:8000', // Proxy para o servidor PHP
    baseDir: './public'
  });

  // Observa mudanças nos arquivos SCSS, JS, HTML e PHP
  gulp.watch(paths.scss, gulp.series('scss'));
  gulp.watch(paths.js, gulp.series('minify-js'));
  gulp.watch([paths.html, paths.php]).on('change', browserSync.reload);
}));

// Task padrão
gulp.task('default', gulp.series('scss', 'minify-js', 'serve'));
