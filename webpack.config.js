const path = require('path');

module.exports = {
	mode: 'development',
	entry: './assets/src/js/app.js',
	output: {
		path: path.resolve(__dirname, 'assets/dist/js/'),
		filename: 'app.js',
	}
};
