const sass = require('sass');

//require('load-grunt-tasks')(grunt);

module.exports = function(grunt) {

    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),

        // grunt-contrib-sass

        'sass': {
            dist: {
                options: {
                    implementation: sass,
                    sourceMap: false
                },
                files: {
                    'style.css': 'scss/style.scss',
                    'css/admin.css': 'scss/admin.scss' 
                }
            }
        },

        // grunt-contrib-uglify

        uglify: {
            options: {
                banner: '/*! <%= pkg.name %> v<%= pkg.version %> by <%= pkg.author %> <%= grunt.template.today("yyyy-mm-dd") %> */\n',
                sourceMap: false
            },
            site: {
                src: 'js/src/scripts.js',
                dest: 'js/scripts.min.js'
            },
            admin: {
                src: 'js/src/admin.js',
                dest: 'js/admin.min.js'
            }
        },
    
        // grunt-banner

        usebanner: {
            taskName: {
                options: {
                    position: 'top',
                    banner: '/*\n'+
                            'Theme Name: UKM Twenty Seventeen\n'+
                            'Theme URI: https://github.com/mmUKM/ukm-twentyfifteen\n'+
                            'Version: <%= pkg.version %>\n'+
                            'Description: <%= pkg.description %>\n'+
                            'Author: <%= pkg.author %>\n'+
                            'Author URI: https://www.facebook.com/jrajalu\n'+
                            'License: GNU General Public License v2\n'+
                            'License URI: http://www.gnu.org/licenses/gpl-2.0.html\n'+
                            '*/',
                    linebreak: true
                },
                files: {
                    src: [ 'style.css' ]
                }
            }
        },
    
        // grunt-cssbeautifier
    
        cssbeautifier : {
            files : ['style.css'],
            options : {
                indent: '    ',
                openbrace: 'end-of-line',
                autosemicolon: false
            }
        },

        // grunt-contrib-watch

        watch: {
            configFiles: {
                files: ['Gruntfile.js']
            },
            css: {
                files: [
                    'scss/style.scss',
                    'scss/admin.scss',
                    'scss/*.scss'
                ],
                tasks: ['sass', 'cssbeautifier', 'usebanner'],
                    options: {
                        livereload: false,
                    }
            },
            js: {
                files: ['js/src/*.js'],
                tasks: ['uglify'],
                    options: {
                        spawn: false
                    }
            }
        },

        // grunt-contrib-clean

        clean: {
            dist: {
                src: ['packages/cmb2/languages/*']
            }
        },
    
    }); // end Project configuration

    // load grunt task

    grunt.loadNpmTasks('grunt-banner');
    grunt.loadNpmTasks('grunt-sass');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-cssbeautifier');
    grunt.loadNpmTasks('grunt-contrib-clean');

    // execute grunt task

    grunt.registerTask('default', ['sass', 'uglify', 'usebanner', 'cssbeautifier']);
    grunt.registerTask('watch', ['watch']);
    grunt.registerTask('clean', ['clean:dist']);

};