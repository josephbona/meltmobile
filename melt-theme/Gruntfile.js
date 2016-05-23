module.exports = function(grunt) {

  // Project configuration.
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    concat: {
    	build: {
    		src: [
    			'src/js/vendor/modernizr.js',
    			'src/js/vendor/bootstrap/jquery.js',
    			'src/js/vendor/bootstrap/transistion.js',
    			'src/js/vendor/bootstrap/button.js',
    			'src/js/vendor/bootstrap/carousel.js',
    			'src/js/vendor/bootstrap/collapse.js',
    			'src/js/vendor/bootstrap/dropdown.js',
    			'src/js/vendor/bootstrap/modal.js',
    			'src/js/vendor/bootstrap/tab.js',
          'src/js/vendor/matchheights.js',
          'src/js/vendor/slick.js',
          'src/js/vendor/classie.js',
          'src/js/vendor/mobilenav.js',
          'src/js/vendor/backstretch.js',
          'src/js/vendor/wow.js',
          'src/js/vendor/salvattore.js',
          'src/js/page-header.js',
    			'src/js/main.js',
    		],
    		dest: 'js/script.js',
    	},
    },
	uglify: {
		options: {
			banner: '/*! <%= pkg.name %> <%= grunt.template.today("yyyy-mm-dd") %> */\n'
		},
		build: {
			files: {
				'js/script.min.js': ['js/script.js'],
			},
		},
	},
  });

  // Load the plugins.
  grunt.loadNpmTasks('grunt-contrib-concat');
  grunt.loadNpmTasks('grunt-contrib-uglify');

  // Register task(s).
  grunt.registerTask('default', ['concat:build', 'uglify:build']);
  grunt.registerTask('dev', ['concat:build']);

};