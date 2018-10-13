// Load plugins
const gulp = require('gulp');

// CSS related plugins
const sass = require('gulp-sass');
const minifycss = require( 'gulp-uglifycss' ); // Minifies CSS files.
const mmq = require( 'gulp-merge-media-queries' ); // Combine matching media queries into one.

// Utility related plugins.
const rename = require( 'gulp-rename' ); // Renames files E.g. style.css -> style.min.css.
const filter = require( 'gulp-filter' ); // Enables you to work on a subset of the original files by filtering them using a glob.
const notify = require( 'gulp-notify' ); // Sends message notification to you.
const browserSync = require( 'browser-sync' ).create(); // Reloads browser and injects CSS. Time-saving synchronized browser testing.
const plumber = require( 'gulp-plumber' ); // Prevent pipe breaking caused by errors from gulp plugins.
const beep = require( 'beepbeep' );

// Custom Error Handler.
const errorHandler = r => {
	notify.onError( '\n\n❌  ===> ERROR: <%= error.message %>\n' )( r );
	beep();
};

/**
 * Task: `browser-sync`.
 *
 * Live Reloads, CSS injections, Localhost tunneling.
 * @link http://www.browsersync.io/docs/options/
 *
 * @param {Mixed} done Done.
 */
const browsersync = done => {
	browserSync.init({
		proxy: 'dev.devinmaeztri.com',
		open: './',
		injectChanges: true,
		watchEvents: [ 'change', 'add', 'unlink', 'addDir', 'unlinkDir' ]
	});
	done();
};

// Helper function to allow browser reload with Gulp 4.
const reload = done => {
	browserSync.reload();
	done();
};

gulp.task('styles', function(){
	return gulp.src('assets/**.scss')
		.pipe( plumber( errorHandler ) )
		.pipe( sass() )
		.pipe( filter( '**/*.css' ) )
		.pipe( mmq({ log: true }))
		.pipe( browserSync.stream() )
		.pipe( rename({ suffix: '.min' }) )
		.pipe( minifycss({ maxLineLen: 10 }) )
		.pipe( gulp.dest('css') )
		.pipe( browserSync.stream() )
		.pipe( notify({ message: '\n\n✅  ===> STYLES — completed!\n', onLast: true }) );
});

/**
 * Watch Tasks.
 *
 * Watches for file changes and runs specific tasks.
 */
gulp.task(
	'default',
	gulp.parallel( 'styles', browsersync, () => {
	// gulp.parallel( 'styles', 'vendorsJS', 'customJS', 'images', browsersync, () => {
		gulp.watch( './**/*.php', reload ); // Reload on PHP file changes.
		gulp.watch( 'assets/*.scss', gulp.parallel( 'styles' ) ); // Reload on SCSS file changes.
		// gulp.watch( config.watchJsVendor, gulp.series( 'vendorsJS', reload ) ); // Reload on vendorsJS file changes.
		// gulp.watch( config.watchJsCustom, gulp.series( 'customJS', reload ) ); // Reload on customJS file changes.
		// gulp.watch( config.imgSRC, gulp.series( 'images', reload ) ); // Reload on customJS file changes.
	})
);