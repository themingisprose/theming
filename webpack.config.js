const path = require('path');

module.export = {
	mode: 'development',
	entry: 'assets/src/js/app.js',
	output: {
		path: path.resolve(__dirname, './assets/dist/js/'),
		filename: 'app.js',
	}
};
