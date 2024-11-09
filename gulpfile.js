// Importação dos módulos
const gulp = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const cleanCSS = require('gulp-clean-css');
const uglify = require('gulp-uglify');
const rename = require('gulp-rename');
const sourcemaps = require('gulp-sourcemaps');
const browserSync = require('browser-sync').create();

// Caminhos dos arquivos
const paths = {
  scss: './src/scss/**/*.scss', // Diretório dos arquivos SCSS
  css: './dist/css', // Diretório de saída dos arquivos CSS
  js: './src/js/**/*.js', // Diretório dos arquivos JavaScript
  jsDist: './dist/js' // Diretório de saída dos arquivos JS minificados
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

// Task: Iniciar o BrowserSync e observar mudanças
gulp.task('serve', function () {
  browserSync.init({
    server: {
      baseDir: './' // Define o diretório raiz do servidor
    }
  });

  // Observa mudanças nos arquivos SCSS, JS e HTML
  gulp.watch(paths.scss, gulp.series('scss'));
  gulp.watch(paths.js, gulp.series('minify-js'));
  gulp.watch('./*.html').on('change', browserSync.reload);
});

// Task padrão
gulp.task('default', gulp.series('scss', 'minify-js', 'serve'));
