# Coinmedia24 WordPress Theme Framework

Website: [coinmedia24.com](https://coinmedia24.com)

## Installation
- Download and Activate the theme

### Running
To work with and compile your Sass and Javascript files on the fly start:

```bash
npm run watch
```

Or, to run with Browser-Sync:

First change the browser-sync options to reflect your environment in the file `/build/browser-sync.config.js` in the beginning of the file:
```javascript
module.exports = {
	"proxy": "localhost/", // Change here
	"notify": false,
	"files": ["./css/*.min.css", "./js/*.min.js", "./**/*.php"]
};
```

then run:

```bash
npm run watch-bs
```
