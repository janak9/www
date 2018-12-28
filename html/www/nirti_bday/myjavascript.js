$(document).ready(function () {
	var i = 0,
		a = 1,
		j = 0,
		s = 1,
		t = 1;
	var song = document.getElementById('song');
	var video = document.getElementById('bday_video');
	song.src = '1.mp3';

	video.addEventListener("play", function () {
		song.pause();
	});
	video.addEventListener("pause", function () {
		song.play();
	});
	song.addEventListener("ended", function () {
		if (s == 1) {
			if (a == 1)
				song.src = "2.mp3";
			else
				song.src = "4.mp3";
			s = 0;
		} else {
			if (a == 1)
				song.src = "1.mp3";
			else
				song.src = "3.mp3";
			s = 1;
		}
	});
	song.play();
	$('.clickme').click(function () {
		if (t) {
			if (a == 0) {
				$('#bday_video').css("display", "block");
				$('.content').css("display", "none");
			}
			t = 0;
		} else {
			if (a == 0) {
				$('#bday_video').css("display", "none");
				$('.content').css("display", "block");
				video.pause();
			}
			t = 1;
		}
	});

	function blinker() {
		$('.blinking').fadeOut(1000);
		$('.blinking').fadeIn(1000);
	}
	setInterval(blinker, 2000);

	function slide() {
		i = 22;
		var w = 0,
			k = 3;
		var wishes = ["dil main me jinko bhi jagah deta huu khud 6 jyada main unka khyal rakhta huuu..jese kiii tumm my notankii bazz bestuduuuu",
			"for your birthday,i wanted to give you something that was both funny and charming, But then i remembered you already have me in your life.",
			"so many wishes So many smiles,<br>Tooo many crazyy memories,<br>Tooo few words with,<br>One small birthday...",
			"wish you a many many happy returns of the day.."
		];
		var wl = wish.length;
		var animate = ["animated bounce", "animated flash", "animated tada", "animated jello", "animated fadeInDown", "animated flip", "animated flipOutY", "animated lightSpeedIn", "animated rotateIn", "animated zoomInDown", "animated rollIn"];
		var l = animate.length;
		setInterval(function () {
			var wish = document.getElementById('wish');
			wish.innerHTML = wishes[w];
			$('#wish').removeClass();
			$('#wish').addClass(animate[k]);
			k++;
			if (k == 5)
				k = 3;
			w++;
			if (w == 4)
				w = 0;
		}, 13000);
		setInterval(function () {
			var bg = document.getElementById('pic').src = "photo/bday_pic/" + i + ".jpg";
			//bg.url=arr[i];
			$('#pic').removeClass();
			$('#pic').addClass(animate[j]);
			j++;
			if (j == l)
				j = 0;
			i++;
			if (i == 43)
				i = 22;
			//console.log(i);
		}, 4000);
	}
	setInterval(function () {
		var animate_name = ["animated fadeInUpBig", "animated flip", "animated zoomOutDown", "animated zoomOutLeft", "animated zoomOutRight", "animated zoomOutUp", "animated hinge", "animated rollIn", "animated rollOut"];
		var l = animate_name.length;
		$('#name' + a).removeClass();
		$('#name' + a).addClass("name_div " + animate_name[j]);
		j++;
		if (j == l)
			j = 0;
	}, 3000);
	var k = 1,
		m = 1;
	setInterval(function () {
		if (a == 1) {
			var bg = document.getElementById('back').style.backgroundImage = "url('photo/bday_pic/" + k + ".jpg')";
			m++;
			if (m > 3)
				k++;
			if (k == 21) {
				k = 1;
				m = 1;
			}
		}
	}, 3000);
	var year = new Date().getYear();
	if (year < 1900)
		year += 1900;
	if (!confirm("Can You Want To View Before B'day Page..!!"))
		year--;
	setInterval(function () {
		var deadline = new Date("Dec 27 " + year + " 23:59:59").getTime();
		var now = new Date().getTime();
		var dis = deadline - now;
		var d = Math.floor(dis / (1000 * 60 * 60 * 24));
		var h = Math.floor((dis % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
		var m = Math.floor((dis % (1000 * 60 * 60)) / (1000 * 60));
		var s = Math.floor((dis % (1000 * 60)) / (1000));
		document.getElementById("countdown").innerHTML = d + "d " + h + "h " + m + "m " + s + "s ";
		if (dis < 0 && a == 1) {
			$("#countdown").hide();
			$("#Wating").hide();
			$('#back').hide();
			$('#page-wrap').show();
			$('.clickme').css("display","block");
			var song = document.getElementById('song');
			song.src = '3.mp3';
			slide();
			a = 0;
		}
	}, 1000);
});