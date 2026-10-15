const sass = require('sass');

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
                    'style.css': 'assets/scss/style.scss',
                    'assets/css/admin.css': 'assets/scss/admin.scss' 
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
                src: 'assets/js/src/scripts.js',
                dest: 'assets/js/scripts.min.js'
            },
            admin: {
                src: 'assets/js/src/admin.js',
                dest: 'assets/js/admin.min.js'
            }
        },
    
        // grunt-banner
        usebanner: {
            taskName: {
                options: {
                    position: 'top',
                    banner: '/*\n'+
                            'Theme Name: UKM Twenty Seventeen\n'+
                            'Theme URI: https://github.com/mmUKM/ukm-twentyseventeen\n'+
                            'Version: <%= pkg.version %>\n'+
                            'Description: <%= pkg.description %>\n'+
                            'Author: <%= pkg.author %>\n'+
                            'Author URI: https://www.facebook.com/jrajalu\n'+
                            'Requires at least: 6.3\n'+
                            'Tested up to: 6.7\n'+
                            'Requires PHP: 8.0\n'+
                            'License: GNU General Public License v2\n'+
                            'License URI: http://www.gnu.org/licenses/gpl-2.0.html\n'+
                            'Text Domain: ukmtheme\n'+
                            '*/',
                    linebreak: true
                },
                files: {
                    src: [ 'style.css' ]
                }
            }
        },
    
        // grunt-cssbeautifier
        cssbeautifier: {
            files: ['style.css'],
            options: {
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
                    'assets/scss/style.scss',
                    'assets/scss/admin.scss',
                    'assets/scss/*.scss'
                ],
                tasks: ['sass', 'cssbeautifier', 'usebanner'],
                options: {
                    livereload: false,
                }
            },
            js: {
                files: ['assets/js/src/*.js'],
                tasks: ['uglify'],
                options: {
                    spawn: false
                }
            }
        }
    
    }); // end Project configuration

    // load grunt task
    grunt.loadNpmTasks('grunt-banner');
    grunt.loadNpmTasks('grunt-sass');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-cssbeautifier');

    // execute grunt task
    grunt.registerTask('default', ['sass', 'uglify', 'usebanner', 'cssbeautifier']);
    grunt.registerTask('watch', ['watch']);

};