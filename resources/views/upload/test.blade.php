<!DOCTYPE html>
<html>

<head>
	<title>Test Upload</title>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<script type="text/javascript" src="{{ asset('js/jquery.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/plupload.full.min.js') }}"></script>
</head>

<body>
	<h1>Test Upload</h1>
	<form method="post">
		{!! csrf_field() !!}
		<div id="filelist"></div>
		<div id="dropTarget" style="background-color: black; width: 200px; height: 200px;"></div>
		<button type="button" id="uploadBrowse">Browse</button>
		<button type="button" id="uploadfiles">Upload</button>
		<button type="button" onclick="pauseFun();">Pause</button>
	</form>
	<script type="text/javascript">
	var uploader = new plupload.Uploader({
		runtimes: 'html5,html4',

		browse_button: 'uploadBrowse', // you can pass in id...
		container: document.getElementById('dropTarget'), // ... or DOM Element itself

		url: "/upload",
		chunk_size: "500kb",
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		},

		filters: {
			max_file_size: '100mb',
			mime_types: [{
				title: "Video files",
				extensions: "mp4"
			}, {
				title: "Image files",
				extensions: "jpg,gif,png"
			}, {
				title: "Zip files",
				extensions: "zip"
			}]
		},

		init: {
			PostInit: function() {
				document.getElementById('filelist').innerHTML = '';

				document.getElementById('uploadfiles').onclick = function() {
					uploader.start();
					return false;
				};
			},

			FilesAdded: function(up, files) {
				plupload.each(files, function(file) {
					document.getElementById('filelist').innerHTML += '<div id="' + file.id + '">' + file.name + ' (' + plupload.formatSize(file.size) + ') <b></b></div>';
				});
			},

			UploadProgress: function(up, file) {
				document.getElementById(file.id).getElementsByTagName('b')[0].innerHTML = '<span>' + file.percent + "%</span>";
			},

			Error: function(up, err) {
				document.getElementById('console').innerHTML += "\nError #" + err.code + ": " + err.message;
			}
		}
	});

	uploader.init();
	</script>
</body>

</html>
