$(document).ready(function(){
	var i=0,a=1,j=0,s=1,t=1;
	var year=new Date().getYear();
	if (year<1900)
            	year+=1900;	
	if (confirm("Can You Want To View Before B'day Page..!!")) {
    	        year++;
	} 
	setInterval(function(){
		var deadline=new Date("jan 26 "+year+" 23:59:59").getTime();
		var now=new Date().getTime();
		var dis=deadline-now;
		var d=Math.floor(dis/(1000*60*60*24));
		var h=Math.floor((dis%(1000*60*60*24))/(1000*60*60));
		var m=Math.floor((dis%(1000*60*60))/(1000*60));
		var s=Math.floor((dis%(1000*60))/(1000));
		document.getElementById("countdown").innerHTML=d+"d "+h+"h "+m+"m "+s+"s ";
			if(dis<0 && a==1){
				$('#back').css("display","none");
				$('.clickme').text("play video");
				$('.first').css("display","none");
				$('.main_div').css("margin-top","10px");
				$('#page-wrap').show();
				var song=document.getElementById('song');
				song.src='3.mp3';
				slide();
				a=0;
			}
	},1000);

	var song=document.getElementById('song');
	var video=document.getElementById('bday_video');
	song.src='1.mp3';
	
	video.addEventListener("play", function(){
         song.pause();
    });
    video.addEventListener("pause", function(){
         song.play();
    });
	song.addEventListener("ended", function(){
	     if(s==1){
	     	if(a==1)
	     		song.src="2.mp3";
	     	else
	     		song.src="4.mp3";
	     	s=0;
	     }
	     else{
	     	if(a==1)
	     		song.src="1.mp3";
	     	else
	     		song.src="3.mp3";
	     	s=1;	
	     }
	});
	song.play();
	$('.clickme').click(function(){
		if(t)
		{
			if(a==0){
				$('#bday_video').css("display","block");
				$('.content').css("display","none");
			}
			$('.container').css('perspective','150px');
			t=0;
		}
		else{
			if(a==0){
				$('#bday_video').css("display","none");
				$('.content').css("display","block");
				video.pause();
			}
			$('.container').css('perspective','800px');
			t=1;
		}
	});
	function blinker() {
		$('.blinking').fadeOut(2000);
		$('.blinking').fadeIn(1000);
	}
	setInterval(blinker, 2000);
	
	function slide(){
		i=42;
		var w=0,k=3;
		var wish = new Typed('.wish', {
			strings:["<img src='photo/26.png' class='emoji'/>Lovely Dii 6 tu marii...<br><img src='photo/6.png' class='emoji'/>rastoo nai, manjil 6 tu mari...<br><img src='photo/27.png' class='emoji'/> khushi nai, muskan 6 tu mari...<br><img src='photo/11.png' class='emoji'/> kismat nai, eebadat 6 tu marii...<br><img src='photo/18.png' class='emoji'/> khali alfaz nai, gajal 6 tu mari...<br><img src='photo/12.png' class='emoji'/> mannat nai, aakhri chah 6 tu mari...<br><img src='photo/3.png' class='emoji'/> svash nai, jindgi 6 tu mari...<br><img src='photo/5.png' class='emoji'/> chhelle to etlu jj kahish ke...<br><img src='photo/15.png' class='emoji'/> khali Diii nai, jan 6 tu mari..<br><img src='photo/25.png' class='emoji'/>Best diii 6 tu mari..",
				"Love you Diii...<img src='photo/15.png' class='emoji'/>",
				"You Will always be...<br>The sister of my soul,<br>The friend of my heart..<br>At the end you are my angel<br>Whom i love,care,fight,panchayt<img src='photo/8.png' class='emoji'/>...<br>",
				"<img src='photo/6.png' class='emoji'/>sryy for long lecture...<br>kyaa karuu dii aadat 6 majburr<img src='photo/11.png' class='emoji'/>..<br>Now no bak bak just say you..<br>Happy B'day Diii duu diii...",
				"<img src='photo/23.png' class='emoji'/>wish you a many many happy returns of the day..<img src='photo/20.png' class='emoji'/>"],
			typeSpeed: 100,
			backSpeed: 0,
			backDelay:1000,
			loop: true
		});
		var animate=["animated bounce","animated flash","animated tada","animated jello","animated fadeInDown","animated flip","animated flipOutY","animated lightSpeedIn","animated rotateIn","animated zoomInDown","animated rollIn"];
		var l=animate.length;
		setInterval(function(){
			var bg2= document.getElementById('back_img2');
			bg2.src="photo/bday_pic/"+i+".jpg";
			$(bg2).removeClass();
			$(bg2).addClass(animate[j]);
			j++;
			if(j==l)
				j=0;
			i--;
			if(i==1)
				i=42;
		},4000);
	}
	setInterval(function(){
		var animate_name=["animated fadeInUpBig","animated flip","animated rollIn"];
			var l=animate_name.length;
			$('#name0').removeClass();
			$('#name0').addClass("smitu "+animate_name[j]);
			j++;
			if(j==l)
				j=0;
	},5000);
	setInterval(function(){
		if(a==1){
			var arr =["s1.jpg","bday_pic/9.jpg","s6.jpg","bday_pic/11.jpg","s3.jpg","bday_pic/36.jpg","s2.jpg","s2.jpg","bday_pic/33.jpg","s5.jpg","bday_pic/39.jpg","s4.jpg","bday_pic/30.jpg"];
			var l=arr.length;
			var bg= document.getElementById('back_img')
			bg.src="photo/"+arr[i];
			//bg.url=arr[i];
			i++;
			if(i==l)
				i=0;
		}
	},3000);
	
});

var typed3 = new Typed('.waiting_type', {
	strings: [" Sweet Diii Duuu",
		" Princess",
		" Lovely Diii",
		" Simuu",
		" Best Diii",
		" Smituu",
		" Best Friend",
		" Balii"],
	typeSpeed: 20,
	backSpeed: 0,
	backDelay:1000,
	loop: true
});
