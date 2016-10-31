module.exports = function(grunt) {
  // Project configuration.
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    concat: {
      options: {
        separator: "\n"
      },
      // dist: {
      //   src: ['js/lib/*.js','js/main.js'],
      //   dest: 'js/script.js'
      // }
      basic_and_extras: {
        files: {
          'js/script.js': ['js/main.js'],
          // 'js/script.js': ['js/main.js', 'js/angular/app.js','js/angular/controllers.js','js/angular/app.config.js','js/angular/directives.js','js/angular/services.js','js/angular/filters.js'],
          'js/lib.js': ['js/lib/*.js']
        }
      }
    },
    sass: {
      dist: {
        options: {
          style: 'compressed'
        },
        files: {                                    // Dictionary of files
          'css/style.preprocessed.css': 'css/style.scss'         // 'destination': 'source'
        }
      }
    },
    postcss: {
      options: {
        map: {
          inline: false
        },
        processors: [
          require('autoprefixer')({browsers: '> 0.5%'}) // add vendor prefixes
        ]
      },
      dist: {
        src: 'css/style.preprocessed.css',
        dest : 'css/style.css'
      }
    },
    uglify: {
      options: {
        sourceMap : true,
        mangle : false
      },
      my_target: {
        files: {
          'js/script.min.js': ['js/script.js']
        }
      }
    },
    watch: {
      options: {
        livereload: true,
        files: ['css/style.css', 'js/script.js','*.php', '*.html'],
      },
      css: {
        files: ['css/*.scss','css/*/*.scss'],
        tasks: ['sass','postcss']
      },
      scripts: {
        files: ['js/lib/*.js','js/main.js'],
        tasks: ['concat', 'uglify']
      },
      livereloadFiles: {
        files: ['*.php', '*.html']
      },
      svgstore:{
        files:['img/svg-icons/*.svg'],
        tasks:['svgstore']
      }
    }
  });

  grunt.loadNpmTasks('grunt-contrib-concat');
  grunt.loadNpmTasks('grunt-contrib-sass');
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-postcss');
  grunt.loadNpmTasks('grunt-svgstore');

  // Default task(s).
  grunt.registerTask('default', ['watch']);
};