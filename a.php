<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
<marquee bgcolor="orange" direction="left">Kanallar açılmıyorsa lüften bize bildiriniz.</marquee>

	<title>Canlı Yayın Oynatma</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
	<style>
		body {
			background-color: #f8f9fa;
		}

		.container {
			background-color: #ffffff;
			border-radius: 10px;
			box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);
			padding: 20px;
			margin-top: 50px;
		}

		#live-video {
			border-radius: 8px;
			box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);
		}

		#channels-dropdown {
			margin-top: 10px;
		}
	</style>
</head>
<body>
	<div class="container mt-5">
		<div class="row">
			<div class="col-md-8 mx-auto">
				<h1 class="text-center mb-4">Canlı Yayın <br> Şu an ki Kanal: <span id="currentChannel" style="color: red">Yok</span></h1>
				<div class="row">
					<div class="col-md-12">
						<video id="live-video" class="w-100" controls poster="https://anubhavthetaste.com/images/loading.png"></video>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 text-center">
						<h5>Kanallar</h5>
						<div class="dropdown" id="channels-dropdown">
							<button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
								Kanal Seç
							</button>
							<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton" id="myList" style="max-height: 200px; overflow-y: auto;">
								<li class="text-center">Yükleniyor..</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/hls.js@latest"></script>
	<script>
		function loadChannel(x, y, z) {
			var video = document.getElementById('live-video');
			
			var xhr = new XMLHttpRequest();
			xhr.open('GET', 'geturl.php?x=' + x + '&y=' + y, true);
			xhr.onreadystatechange = function () {
			  if (xhr.readyState == 4 && xhr.status == 200) {
			    var responseJson = JSON.parse(xhr.responseText);
    			var source = responseJson.link;
				if (Hls.isSupported()) {
					var hls = new Hls();
					hls.loadSource(source);
					hls.attachMedia(video);
					video.play();
				} else if (video.canPlayType('application/vnd.apple.mpegurl')) {
					video.src = source;
				}
			  }
			};
			xhr.send();

			document.getElementById("currentChannel").innerHTML = z;

			video.addEventListener('error', function () {
				alert('Canlı yayın oynatılamıyor.');
			});
		}

		function changeChannel(x, y, z) {
			loadChannel(x, y, z);
		}
	</script>
	<script type="text/javascript">
		document.addEventListener('DOMContentLoaded', function () {
			fetchData();
			setInterval(fetchData, 10 * 60 * 1000);
		});
		function fetchData() {
			fetch('list.php')
			.then(response => {
				if (!response.ok) {
					throw new Error('Network response was not ok');
				}
				return response.json();
			})
			.then(data => {
				document.getElementById('myList').innerHTML = '';
				data.forEach(item => {
					//console.log(item.tvtitle);
					var myElement = document.getElementById('myList');
					var htmlContent = `<li><a class="dropdown-item" onclick="changeChannel('` + item.x + `','` + item.y + `','` + item.name + `')">` + item.name + `</a></li>`;
					myElement.insertAdjacentHTML('beforeend', htmlContent);
				});
			})
			.catch(error => {
				console.error('Fetch error:', error);
			});
		}
	</script>
</body>
</html>
