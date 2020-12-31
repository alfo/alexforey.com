<?php $title = 'Home'; include 'design/h.php'; ?>

<section class="fullwidth dark flushbottom" id="front-feature">
	<div class="container">
	
		<div class="heading">
			<h1>Hi, this is Alex Forey
				<small>Getting Excited and Making Things since 1997</small>
			</h1>
		</div>

		<div class="featured-project video fitvid">
			<iframe src="http://player.vimeo.com/video/83308624?title=0&amp;byline=0&amp;portrait=0&amp;color=da594c" width="500" height="281" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
		</div>
		
		<div class="see-more">
			<a class="arrow-btn" href="/portfolio">
				<div class="arrow left"><span></span></div>
				<span class="text">See more of my work</span>
				<div class="arrow right"><span></span></div>
			</a>
		</div>
		
	</div>
</section>

<section class="fullwidth flushbottom">
	<div class="container">
	
		<div class="heading">
			<h1>I make things</h1>
			<p>I make short films, design and develop websites, take photos, make timelapses and Little Printer Publications and film live events.</p>
		</div>
	
		<div id="somelinks">
			
			<a class="work-section" href="/portfolio#video">
				<div class="icon" id="video"></div>
				<h2>Video</h2>
				<p>I produce a lot of video content in the form of short films, timelapses and event videos. I've recently released Polaroid, a no-budget narrative short film.</p>
				
				<div class="arrow-btn white">
					<div class="arrow left"><span></span></div>
					<span class="text">Take a look</span>
					<div class="arrow right"><span></span></div>
				</div>
			</a>
			
			<a class="work-section" href="/portfolio#code">
				<div class="icon" id="code"></div>
				<h2>Code</h2>
				<p>I've started and contributed to many open source projects, varying from Ruby Gems to PHP frameworks and websites to embedded firmware projects.</p>
				
				<div class="arrow-btn white">
					<div class="arrow left"><span></span></div>
					<span class="text">Take a look</span>
					<div class="arrow right"><span></span></div>
				</div>
			</a>
			
			<a class="work-section" href="/portfolio#hardware">
				<div class="icon" id="hardware"></div>
				<h2>Hardware</h2>
				<p>I design hardware and circuit boards to solve problems I've encountered. I can use CAD and CAM to laser-cut, 3D print, and fabricate PCBs, with most of my projects involving Arduino.</p>
				
				<div class="arrow-btn white">
					<div class="arrow left"><span></span></div>
					<span class="text">Take a look</span>
					<div class="arrow right"><span></span></div>
				</div>
			</a>
			
			<a class="work-section" href="https://markpond.com">
				<div class="icon" id="markpond"></div>
				<h2>Markpond</h2>
				<p>A one-off project - a bookmarking website with offline archiving, a Little Printer publication and much more - written in Ruby on Rails, with a variety of stacks including Solr and job queues.</p>
				
				<div class="arrow-btn white">
					<div class="arrow left"><span></span></div>
					<span class="text">Take a look</span>
					<div class="arrow right"><span></span></div>
				</div>
			</a>
						
			<div class="clear"></div>
		</div>
	</div>
</section>

<section class="fullwidth red info">
	<div class="container">
		<p>I'm interested in making websites. In fact the one you're looking at now was made by me, with only Coda 2 for the code and Photoshop for the images and sprites.</p>
		<p>I'm a collector of things. I keep <a href="http://watched.alexforey.com">a log</a> of all the films I've watched, I use <a href="http://www.last.fm/user/alexforey">Last FM</a> to keep track of my favourite music, and I collect and save interesting articles and videos into my <a href="https://markpond.com/u/alex">Markpond account</a>, most of which are saved to disk in case the original goes offline.</p>
		<p>I'm also a creator of things. I love photography, and currently have around 1,200 photos on my <a href="http://www.flickr.com/photos/alexforey">Flickr account</a> and 7000 more in my Lightroom archive. I make films, which all go on my <a href="https://vimeo.com/alexforey/videos/all/sort:date">Vimeo page</a>. In my spare time I also contribute to open-source projects and put up my own source code on <a href="https://github.com/alfo">GitHub</a>.
		<p>I like the idea of things integrating with each other, and this is one of my main uses of the internet. I use <a href="http://ifttt.com">If This Then That</a> a lot to help me achieve this. Here's how just a little bit of my internet works: I take photos using Instagram or Flickr, depending on their privacy policies and my mood at any given time. Those are then sent to Flickr automatically, and every photo on my Flickr ends up on my Tumblr-run photos.alexforey.com. But that's only the tip of the iceberg. My GitHub account <a href="https:/twitter.com/alex_commits">tweets</a>, and my Pocket articles are auto-saved into my <a href="https://markpond.com/u/alex">Markpond account</a> when I've finished reading them.</p> 
		<p>If you're interested in how this site works, then keep reading. All the files are hosted on my own (shared) server, but the subdomain photos.alexforey.com is hosted with Tumblr, with a custom designed theme to work with the CSS files on my server. My CSS is actually SASS, which allows me to use variables for colours and fonts in my stylesheet, and nesting that means I can write more precise styles more quickly, to keep everything organised.</p>
	</div>
</section>

<section class="fullwidth dark">
	<div class="container">
		<div class="heading">
			<h1>Say Hello</h1>
			<p>Want to say hi? Pick a method:</p>
		</div>
		
		<div class="social">
			<ul>
				<span>
				<li><a id="twitter" href="https://twitter.com/alexforey" target="_blank" title="Twitter"></a></li>
				<li><a id="flickr" href="http://flickr.com/photos/alexforey" target="_blank" title="Flickr"></a></li>
				<li><a id="github" href="https://github.com/alfo" target="_blank" title="GitHub"></a></li>
				</span>
				<li><a id="markpond" href="https://markpond.com/u/alex" target="_blank" title="Markpond Bookmarks"></a></li>
				<li><a id="vimeo" href="https://vimeo.com/alexforey" target="_blank" title="Vimeo"></a></li>
				<li id="last">
					<script type="text/javascript">
					//<![CDATA[
					<!--
					var x="function f(x){var i,o=\"\",ol=x.length,l=ol;while(x.charCodeAt(l/13)!" +
					"=92){try{x+=x;l+=l;}catch(e){}}for(i=l-1;i>=0;i--){o+=x.charAt(i);}return o" +
					".substr(0,ol);}f(\")47,\\\"qysnd{%l~771\\\\bc100\\\\OY\\\\\\\\TLWN620\\\\PF" +
					"VE120\\\\E@Wr\\\\BNB^010\\\\CCVQ300\\\\WNY?ysusn9lv~a4aws}jch~+')dnghA!^<e2" +
					"20\\\\t\\\\520\\\\710\\\\Z[$430\\\\030\\\\420\\\\030\\\\120\\\\-S,R230\\\\0" +
					"10\\\\310\\\\130\\\\310\\\\530\\\\HE:n\\\\010\\\\710\\\\700\\\\)]+wvxse|1`c" +
					"h$pmuic|fn`@120\\\\120\\\\020\\\\630\\\\220\\\\C720\\\\300\\\\230\\\\430\\\\"+
					"520\\\\630\\\\P-Mt\\\\310\\\\730\\\\400\\\\KH5400\\\\610\\\\700\\\\010\\\\1" +
					"00\\\\A>\\\\\\\\400\\\\6~<`yr742\\\"\\\\<&$|%>*#8/$.\\\"(f};o nruter};))++y" +
					"(^)i(tAedoCrahc.x(edoCrahCmorf.gnirtS=+o;721=%y;i=+y)47==i(fi{)++i;l<i;0=i(" +
					"rof;htgnel.x=l,\\\"\\\"=o,i rav{)y,x(f noitcnuf\")"                          ;
					while(x=eval(x));
					//-->
					//]]>
					</script>
				</li>
			</ul>
		</div>
	</div>
</section>
	
<?php include 'design/f.php'; ?>