module.exports = function(grunt) {

    grunt.loadNpmTasks('grunt-contrib-less');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-copy');
    grunt.loadNpmTasks('grunt-contrib-cssmin');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    
    //Liste des fichiers less a transformer
    var filesLess = {
        "web/css/style.css": "app/Resources/public/less/style.less"
    };

    // Configuration de Grunt
    grunt.initConfig({
        less: {
            bundles: {
                files: filesLess
            }
        },
        watch: {
            css: {
                files: ['app/Resources/public/less/*.less'],
                tasks: ['default']
            },
            options: {
                interval: 1000,
                livereload: true
            }
        },
        copy: {
            main: {
                files: [
                    // makes all src relative to cwd
                    {expand: true, cwd: 'bower/bootstrap/dist/fonts/', src: '**', dest: 'web/fonts/'},
                    {expand: true, cwd: 'bower/bootstrap/dist/js/', src: ['bootstrap.min.js'], dest: 'web/js/'},
                    {expand: true, cwd: 'bower/jquery/dist/', src: ['jquery.min.js'], dest: 'web/js/'},
                    {expand: true, cwd: 'bower/fontawesome/fonts/', src: '**', dest: 'web/fonts/'},
                    {expand: true, cwd: 'bower/fontawesome/css/', src: ['font-awesome.min.css'], dest: 'web/css/'},
                    {expand: true, cwd: 'bower/jquery-ui/', src: ['jquery-ui.min.js'], dest: 'web/js/'},
                    {expand: true, cwd: 'bower/magnific-popup/dist/', src: ['jquery.magnific-popup.min.js'], dest: 'web/js/'},
                    {expand: true, cwd: 'bower/magnific-popup/dist/', src: ['magnific-popup.css'], dest: 'web/css/'},
                    {expand: true, cwd: 'bower/hover/css/', src: ['hover-min.css'], dest: 'web/css/'}
                ]
            }
        },
        uglify: {
            options: {
                compress: {
                    drop_console: true
                }
            },
            minify: {
                files: {
                    'web/js/starter.min.js': ['bundles/sonatapage/sonata-page.front.js', 'web/js/jquery.min.js', 'web/js/jquery-ui.min.js', 'web/js/bootstrap.min.js', 'web/js/datepicker-trad.js', 'web/js/jquery.magnific-popup.min.js']
                }
            }
        },
        cssmin: {
            options: {
                shorthandCompacting: false,
                roundingPrecision: -1,
                keepSpecialComments: 0
            },
            minify: {
                src: ['web/css/style.css', 'web/css/magnific-popup.css', 'web/css/jquery-ui.min.css', 'web/css/hover-min.css', 'web/css/font-awesome.min.css'],
                dest: 'web/css/starter.min.css'
            }
        }
    });

    // Définition des tâches Grunt
    grunt.registerTask('default', ['css']);
    grunt.registerTask('css', ['less', 'cssmin']);
    grunt.registerTask('js', ['uglify']);
    grunt.registerTask('upgrade', ['copy:main']);
};