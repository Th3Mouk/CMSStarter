module.exports = function(grunt) {
    
//    grunt.loadNpmTasks('grunt-contrib-concat');
//    grunt.loadNpmTasks('grunt-contrib-uglify');
//    grunt.loadNpmTasks('grunt-contrib-symlink');
    grunt.loadNpmTasks('grunt-contrib-less');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-copy');
    
    //Au cas ou... car on en a besoin
//    grunt.file.mkdir('app/Resources/public/images/');
    
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
        symlink: {
            // app/Resources/public/ doit être disponible via web/bundles/app/
//            app: {
//                files: [{expand: true, cwd: 'app/Resources/public', src: '**', dest: 'web/bundles/app/'}]
//            }
//            bootstrap_glyphicons_white: {
//                relativeSrc: '../../../../bower/bootstrap/img/glyphicons-halflings-white.png',
//                dest: 'app/Resources/public/images/glyphicons-halflings-white.png',
//                options: {type: 'file'}
//            },
//            bootstrap_glyphicons: {
//                relativeSrc: '../../../../bower/bootstrap/img/glyphicons-halflings.png',
//                dest: 'app/Resources/public/images/glyphicons-halflings.png',
//                options: {type: 'file'}
//            }
        },
        concat: {
//            js: {
//                src: [
//                    'web/built/bower.js',
//                    'web/built/*/js/*.js',
//                    'web/built/*/js/*/*.js'
//                ],
//                dest: 'web/built/all.js'
//            },
//            css: {
//                src: [
//                    'web/built/bower.css',
//                    'web/built/*/css/*.css',
//                    'web/built/*/css/*/*.css'
//                ],
//                dest: 'web/built/all.css'
//            }
        },
        uglify: {
            dist: {
                files: {
//                    'web/built/app/js/wozbe.min.js': ['web/built/app/js/wozbe.js']
                }
            }
        },
        watch: {
            css: {
                files: ['app/Resources/public/less/*.less'],
                tasks: ['default']
            },
//            javascript: {
//                files: ['web/bundles/app/js/*.js'],
//                tasks: ['javascript']
//            },
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
                    {expand: true, cwd: 'bower/bootstrap/dist/js/', src: '**', dest: 'web/js/'},
                    {expand: true, cwd: 'bower/jquery/dist/', src: '**', dest: 'web/js/'},
                    {expand: true, cwd: 'bower/fontawesome/fonts/', src: '**', dest: 'web/fonts/'},
                    {expand: true, cwd: 'bower/fontawesome/css/', src: '**', dest: 'web/css/'},
                    {expand: true, cwd: 'bower/jquery-ui/', src: ['jquery-ui.min.js'], dest: 'web/js/'},
                    {expand: true, cwd: 'bower/magnific-popup/dist/', src: ['jquery.magnific-popup.min.js'], dest: 'web/js/'},
                    {expand: true, cwd: 'bower/magnific-popup/dist/', src: ['magnific-popup.css'], dest: 'web/css/'},
                    {expand: true, cwd: 'bower/hover/css/', src: ['hover-min.css'], dest: 'web/css/'}
                ]
            }
//            assets: {
//                files: [
//                    {expand: true, cwd: 'app/Resources/public/', src: '**', dest: 'web/bundles/app/'}
//                ]
//            } 
        }
    });

    // Définition des tâches Grunt
    grunt.registerTask('default', ['css']);
    grunt.registerTask('css', ['less']);
    grunt.registerTask('upgrade', ['copy:main']);
    
    
//    grunt.registerTask('less:discovering', 'This is a function', function() {
//        // LESS Files management
//        // Source LESS files are located inside : bundles/[bundle]/less/
//        // Destination CSS files are located inside : built/[bundle]/css/
//        var mappingFileLess = grunt.file.expandMapping(
//          ['*/less/*.less', '*/less/*/*.less'],
//          'web/built/', {
//            cwd: 'web/bundles/',
//            rename: function(dest, matchedSrcPath, options) {
//              return dest + matchedSrcPath.replace(/less/g, 'css');
//            }
//          });
//
//        grunt.util._.each(mappingFileLess, function(value) {
//          // Why value.src is an array ??
//          filesLess[value.dest] = value.src[0];
//        });
//    });

};