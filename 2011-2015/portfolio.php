<?php $title = 'Portfolio'; include 'design/h.php'; ?>

<section class="fullwidth portfolio dark">
	<div class="container">

		<div class="heading black">
			<h1>Portfolio</h1>
			<h2 class="subheading">Featured Project</h2>
		</div>

		<div class="featured-project fitvid">
			<iframe src="//player.vimeo.com/video/104504079?title=0&amp;byline=0&amp;portrait=0&amp;color=da594c" width="500" height="213" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
			<div class="info">
				<h2>Glass Envelope - Short Film</h2>
				<p class="description">A narrative short film set in Cornwall about message in a bottle that helps a boy through an uncertain time in his life.</p>

				<p class="description">The film was over a weekend near Port Quin in Cornwall, using a Canon 5D mkIII and a 5D mkII, RØDE & Marantz sound equipment, an Atomos Ninja 2 and a variety of Canon lenses including the 50mm f/1.4, 50mm f/1.8 and 85mm f/1.8. The film was edited in Premiere and the grading was done in Davinci Resolve.</p>
				<h2 class="read-more"><a href="http://newfangled.me/glass-envelope">Read more</a></h2>
			</div>
		</div>
</section>

<section class="fullwidth portfolio" id="portfolio-list">
	<div class="container">
		<div class="portfolio-categories">
			<ul>

				<li><a href="#" data-filter="video">Video</a>
				<li><a href="#" data-filter="code">Code</a>
				<li><a href="#" data-filter="hardware">Hardware</a>
				<li><a href="#" data-filter="web">Websites</a>
				<li><a href="#" data-filter="theatre">Theatre</a>

			</ul>

			<hr class="double" />
		</div>

		<div class="porfolio-grid">

			<div class="project hardware code">
				<a class="image" href="https://github.com/alfo/door-sign">
					<img src="/img/portfolio/door-sign.jpg">
					<div class="overlay"></div>
				</a>
				<h4>Door Sign</h4><time>September 2014</time>
				<p>A sign for my bedroom door that shows what's currently happening in my calendar. Also in a <a href="http://newfangled.me/door-sign/">blog post</a>.</p>

			</div>

			<div class="project video">
				<a class="image" href="https://vimeo.com/cinematicmob/glassenvelope">
					<img src="/img/portfolio/glass-envelope.jpg">
					<div class="overlay"></div>
				</a>
				<h4>Glass Envelope</h4><time>June - August 2014</time>
				<p>A narrative short film set in Cornwall about message in a bottle that helps a boy through an uncertain time in his life.</p>


			</div>

			<div class="project video">
				<a class="image" href="https://vimeo.com/alexforey/dubrovnik">
					<img src="/img/portfolio/dubrovnik.jpg">
					<div class="overlay"></div>
				</a>
				<h4>Summer In Dubrovnik</h4><time>July 2014</time>
				<p>A travel video about my summer holiday in Dubrovnik, used as a test film to see how Magic Lantern RAW could be edited in Premiere and then graded in Resolve.</p>
			</div>

			<div class="project video">
				<a class="image" href="https://vimeo.com/cinematicmob/polaroid">
					<img src="/img/portfolio/polaroid.jpg">
					<div class="overlay"></div>
				</a>
				<h4>Polaroid - Short Film</h4><time>April - June 2014</time>
				<p>My latest short film, about a single remaining piece of evidence from a high school scandal. Shot in one day with my 5D mk III and Rode and Tascam sound equipment, edited over a week up to the My Rode Reel deadline.</p>
			</div>

			<div class="project hardware">
				<a class="image" href="http://www.thingiverse.com/thing:330031">
					<img src="/img/portfolio/atomos-evf.jpg">
					<div class="overlay"></div>
				</a>
				<h4>Atomos Ninja 2 EVF</h4><time>May 2014</time>
				<p>While filming Polaroid, I found the screen of the Ninja 2 too shiny to see properly outside, so I designed and 3D-printed an eyepiece for it. You can download and modify it from the Thingiverse page, under a CC-BY-SA license.</p>
			</div>

			<div class="project code">
				<a class="image" href="http://newfangled.me/arpm/">
					<img src="/img/portfolio/arpm.svg">
					<div class="overlay"></div>
				</a>
				<h4>Arduino Package Manager</h4><time>April 2014</time>
				<p>I wrote an Arduino package manager in Ruby based off Git to allow easy installation of libraries, and automatic installation of a all a project's dependencies, much like Bundler.</p>
			</div>

			<div class="project code">
				<a class="image" href="https://github.com/alfo/bergcloud">
					<img src="/img/portfolio/bergcloud.jpg">
					<div class="overlay"></div>
				</a>
				<h4>BERGCloud API Ruby Gem</h4><time>April 2014</time>
				<p>When BERG released their new cloud API, I couldn't wait to start using it in Wake, a project that'll be released soon-ish. It was a pain to make requests manually, however, so I wrote a gem for it.</p>
			</div>

			<div class="project video">
				<a class="image" href="https://vimeo.com/album/2850719">
					<img src="/img/portfolio/firefly-asia-2014.jpg">
					<div class="overlay"></div>
				</a>
				<h4>Firefly Asia Conference</h4><time>April 2014</time>
				<p>Firefly asked me to edit the raw footage from their Asia Conference into 12 videos, ranging from 15 minutes to an hour an 15 minutes, some of which are available on Vimeo.</p>
			</div>

			<div class="project theatre video photo">
				<div class="image" href="#">
					<img src="/img/portfolio/the-seagull.jpg">
				</div>
				<h4>The Seagull</h4><time>March 2014</time>
				<p>Another school play, another set of photos and video production - this time for a new adaptation of Chekov's <em>The Seagull</em>.</p>
			</div>

			<div class="project theatre video">
				<div class="image" href="#">
					<img src="/img/portfolio/clubdrama2013.jpg">
				</div>
				<h4>Club Drama 2013</h4><time>December 2013</time>
				<p>Once again I was involved with Club Drama, my school's student-run drama competition. This time, however, I filmed all eight shows, editing them live, and produced DVDs.</p>
			</div>

			<div class="project theatre video photo">
				<div class="image" href="#">
					<img src="/img/portfolio/julius-caesar.jpg">
				</div>
				<h4>Julius Caesar</h4><time>December 2013</time>
				<p>I took photos during the dress rehearsal for the school posters and archives, and filmed the play for DVD production.</p>
			</div>

			<div class="project code">
				<a class="image" href="http://remote.bergcloud.com/publications/347">
					<img src="/img/portfolio/no-context.jpg">
					<div class="overlay"></div>
				</a>
				<h4>No Context</h4><time>November 2013</time>
				<p>For some comic relief, and having just bought a Little Printer, I decided that it would be fun to make a publication that took a top post from <a href="http://www.reddit.com/r/nocontext">/r/nocontext</a> every day. Source on <a href="https://github.com/alfo/NoContext">GitHub</a>.</p>
			</div>

			<div class="project code">
				<a class="image" href="http://little-commits.alfo.im/">
					<img src="/img/portfolio/little-commits.jpg">
					<div class="overlay"></div>
				</a>
				<h4>Little Commits</h4><time>November 2013</time>
				<p>I made a Little Printer publication that allows you to subscribe to a print-out that arrives every time someone pushes to one of your repositories. Source on <a href="https://github.com/alfo/littlecommits">GitHub</a>.
			</div>

			<div class="project video">
				<a class="image" href="http://vimeo.com/alexforey/after-school">
					<img src="/img/portfolio/after-school.jpg">
					<div class="overlay"></div>
				</a>
				<h4>After School</h4><time>October 2013</time>
				<p>I made a short horror film trailer for my school's competition in which it came second and the <a href="http://shortshortsfilmfestival.com">Short Shorts</a> festival in which it won second in Sound Design and third in Best Director.</p>
			</div>

			<div class="project web code">
				<div class="image">
					<img src="/img/portfolio/firefly-maps.jpg">
				</div>
				<h4>Firefly Map System</h4><time>July - October 2013</time>
				<p>I worked with Firefly on an internal project to create a system that allowed their team to create dynamic maps of specific subsets of their clients. Useful for planning trips to their schools and giving a visual overview of their clients.</p>
			</div>

			<div class="project video">
				<a class="image" href="https://vimeo.com/73328773">
					<div class="overlay"></div>
					<img src="/img/portfolio/zermatt.jpg">
					</a>
				<h4>Summer in Zermatt</h4><time>August 2013</time>
				<p>I made a short film about my holiday in Zermatt including some of my first attempts at astrotimelapse and some Steadicam work.</p>
			</div>

			<div class="project video">
				<a class="image" href="https://vimeo.com/articheck/tour">
					<div class="overlay"></div>
					<img src="/img/portfolio/articheck-tour.jpg">
				</a>
				<h4>Articheck App Demo</h4><time>August 2013</time>
				<p>I edited a screenshot tour of the Articheck app, and placed it on a 3D model iPhone with music and titles.</p>
			</div>

			<div class="project web code">
				<a class="image" href="https://www.outdooradvertisingdirectory.com">
					<div class="overlay"></div>
					<img src="/img/portfolio/odad.jpg">
				</a>
				<h4>Outdoor Advertising Directory</h4><time>August 2013</time>
				<p>I developed the back end and designed the front end of The Outdoor Advertising Directory, a database of real adverts with a payment system powered by Stripe.</p>
			</div>

			<div class="project web code">
				<a href="http://fireflysolutions.co.uk/blog/the-firefly-little-printer-publication" class="image">
					<div class="overlay"></div>
					<img src="/img/portfolio/firefly-lp.jpg">
				</a>
				<h4>Firefly Little Printer Publication</h4><time>July 2013</time>
				<p>After seeing what I'd done with the Little Printer, Firefly asked me to make one for their task system, meaning you can get your homework (set through their system online) printed out for you after you get home from school every day.</p>
			</div>

			<div class="project video">
				<div class="image">
					<img src="/img/portfolio/sps-summer.jpg">
				</div>
				<h4>SPS Summer Events 2013</h4><time>June 2013</time>
				<p>I filmed and produced DVDs for St. Paul's School's three summer events - Junior and Senior Prize-giving and the Leavers' Ceremony, at a total of 69 DVDs.</p>
			</div>

			<div class="project video">
				<a class="image" href="https://vimeo.com/69827193">
					<div class="overlay"></div>
					<img src="/img/portfolio/fencing.jpg">
				</a>
				<h4>SPS Fencing Advert</h4><time>June 2013</time>
				<p>I DP'd and edited this advert for my school's fencing club.</p>
			</div>

			<div class="project video">
				<a href="http://vimeo.com/65402120" class="image">
					<div class="overlay"></div>
					<img src="/img/portfolio/fruush.jpg">
				</a>
				<h4>Fruush</h4><time>March 2013</time>
				<p>I directed, shot, edited and produced an advert for Fruush, a Young Enterprise product.</p>
			</div>

			<div class="project video">
				<a href="https://vimeo.com/61025267" class="image">
					<div class="overlay"></div>
					<img src="/img/portfolio/berg-hack.jpg">
				</a>
				<h4>BERG Hack Day Timelapse</h4><time>February 2013</time>
				<p>I attended BERG's second hack day, and took a timelapse of it along the way.</p>
			</div>

			<div class="project video">
				<a href="http://www.tedxsps.com/#!videos/c24jv" class="image">
					<div class="overlay"></div>
					<img src="/img/portfolio/tedxsps.jpg">
				</a>
				<h4>TEDxSPS</h4><time>February 2013</time>
				<p>I manned the primary camera for the filming of the TEDxSPS events that took part in my school. I also made a <a href="https://vimeo.com/59755662">timelapse</a> of the set-up.</p>
			</div>

			<div class="project video">
				<a href="http://vimeo.com/cinematicmob/perception" class="image">
					<div class="overlay"></div>
					<img src="/img/portfolio/perception.jpg">
				</a>
				<h4>Perception</h4><time>January 2013</time>
				<p>My biggest short film so far, with a cast of six, a crew of around ten, shot over four days and edited over three months.</p>
			</div>

			<div class="project code">
				<a href="https://github.com/alfo/php-littleprinter" class="image">
					<div class="overlay"></div>
					<img src="/img/portfolio/php-littleprinter.jpg">
				</a>
				<h4>php-littleprinter</h4><time>December 2012</time>
				<p>I wrote a little framework for making Little Printer publications easier to write in PHP.</p>
			</div>

			<div class="project video theatre">
				<a href="http://vimeo.com/55469257" class="image">
					<div class="overlay"></div>
					<img src="/img/portfolio/clubdrama2012.jpg">
				</a>
				<h4>Club Drama 2012</h4><time>December 2012</time>
				<p>The same as last year, except this time I headed up the video. We used two 600Ds (mine and <a href="http://amosjackson.com">Amos'</a>) and we edited it on my laptop over the afternoon. I lit the studio with some ARRIs and we used the school's FS100 to shoot the soundbites.</p>
			</div>

			<div class="project video">
				<a href="http://www.thishappened.org/events/london-13" class="image">
					<div class="overlay"></div>
					<img src="/img/portfolio/thishappened2.png">
				</a>
				<h4>This Happened</h4><time>October 2012</time>
				<p>I also filmed the talks for This Happened #13, with help from <a href="http://amosjackson.com">Amos Jackson</a>, this time using three cameras - two 600Ds and on XH A1.</p>
			</div>

			<div class="project code">
				<a href="http://little.alexforey.com/onthisday.php" class="image">
					<div class="overlay"></div>
					<img src="/img/portfolio/onthisday.jpg">
				</a>
				<h4>On This Day Little Printer Publication</h4><time>September 2012</time>
				<p>After making a Little Printer Publication for Markpond, I couldn't stop myself making another. The biggest thing that seemed to be missing from the lineup was an "On This Day"-style publication, and the next thing I knew it had over 300 subscribers.</p>
			</div>

			<div class="project web code">
				<a href="http://markpond.com" class="image">
					<div class="overlay"></div>
					<img src="/img/portfolio/markpond.jpg">
				</a>
				<h4>Markpond</h4><time>August 2012</time>
				<p>I wanted a place to collect links from around the internet into. I had two Raspberry Pis kicking about, and two weeks later I had something that worked. Four weeks after that, it could do offline archveing, had an API, and had a <a href="http://little.markpond.com">Little Printer publication</a>.</p>
			</div>

			<div class="project web">
				<div class="image">
					<img src="/img/portfolio/firefly.jpg">
				</div>
				<h4>Internship at Firefly</h4><time>July 2012</time>
				<p>I did a week of internship at <a href="http://fireflysolutions.co.uk">Firefly Solutions</a>, testing out their iPad app and writing documentation for their API.</p>
			</div>

			<div class="project hardware">
				<a href="http://newfangled.me/diy-home-server" class="image">
					<div class="overlay"></div>
					<img src="http://newfangled.me/images/diy-server-3.jpg">
				</a>
				<h4>DIY Server</h4><time>May 2012</time>
				<p>I built a small home web, FTP and media server in a few hours using an old broken HP Media Centre desktop from 2004.</p>
			</div>

			<div class="project video">
				<a href="http://vimeo.com/42799084" class="image">
					<div class="overlay"></div>
					<img src="/img/portfolio/sps-leavers.jpg">
				</a>
				<h4>SPS Leavers 2012</h4><time>May 2012</time>
				<p>Although I wasn't in the class that was leaving, I helped to make this commemorative video. I also made a full-length behind-the-scenes video of it.</p>
			</div>

			<div class="project video">
				<a href="http://www.thishappened.org/events/london-12" class="image">
					<div class="overlay"></div>
					<img src="/img/portfolio/thishappened1.jpg">
				</a>
				<h4>This Happened</h4><time>May 2012</time>
				<p>I filmed the talks for This Happened #12, with help from <a href="http://amosjackson.com">Amos Jackson</a>, for <a href="http://designswarm.com">Alexandra Deschamps-Sonsino</a>.</p>
			</div>

			<div class="project video">
				<a href="http://www.youtube.com/watch?v=54XnHmr_DUY" class="image">
					<div class="overlay"></div>
					<img src="/img/portfolio/flavourz.png">
				</a>
				<h4>Flavourz Advert</h4><time>April 2012</time>
				<p>I was the director of photography. It's very cheesy, I know. But at least the footage was decent. <a href='http://flavourzpencils.com' target='_blank'>Their site</a>.</p>
			</div>

			<div class="project video">
				<a href="http://vimeo.com/alexforey/tfl" class="image">
					<div class="overlay"></div>
					<img src="/img/portfolio/tfl.jpg">
				</a>
				<h4>Transport for London Timelapse</h4><time>April 2012</time>
				<p>This was the big one really - I spent over a month shooting and editing it. Shot in and around the centre of London and edited in Premiere Pro.</p>
			</div>

			<div class="project video">
				<a href="http://vimeo.com/alexforey/clouds" class="image">
					<div class="overlay"></div>
					<img src="/img/portfolio/clouds.jpg">
				</a>
				<h4>Clouds Timelapse</h4><time>April 2012</time>
				<p>Although I actually shot most of this after the Transport for London timelapse, it was released first. I made it on a family weekend to Wiltshire, as an antidote the previous one.</p>
			</div>

			<div class="project web">
				<a href="http://shwiing.co" class="image">
					<div class="overlay"></div>
					<img src="/img/portfolio/shwiing.jpg">
				</a>
				<h4>Shwiing</h4><time>March 2012</time>
				<p>I got interested in the Internet of Things and start my own IoT online data storage service.</p>
			</div>

			<div class="project theatre video">
				<a href="http://vimeo.com/alexforey/lie" class="image">
					<div class="overlay"></div>
					<img src="/img/portfolio/lie.jpg">
				</a>
				<h4>Laid in Earth</h4><time>February 2012</time>
				<p>I was one of the two live cameramen on this studio show. That's my feed on the screen in the background of the photo, which was taken by <a href="http://edwardconder.co.uk">Edward Conder</a>. Click it to watch the timelapse I also took.</p>
			</div>

			<div class="project video">
				<a href="http://vimeo.com/alexforey/bath" class="image">
					<div class="overlay"></div>
					<img src="/img/portfolio/bath.jpg">
				</a>
				<h4>Bath</h4><time>February 2012</time>
				<p>Shot during my family's weekend in Bath. Includes my first attempt at HDR timelapse and slow motion.</p>
			</div>

			<div class="project video">
				<a href="southbank" class="image">
					<div class="overlay"></div>
					<img src="/img/portfolio/southbank.jpg">
				</a>
				<h4>South Bank Timelapse</h4><time>January 2012</time>
				<p>The first of my timelapses, taken over the course of around 5 hours on London's South Bank.</p>
			</div>

			<div class="project video">
				<a href="https://vimeo.com/33740480" class="image">
					<div class="overlay"></div>
					<img src="/img/portfolio/clubdrama2011.jpg">
				</a>
				<h4>Club Drama 2011</h4><time>December 2011</time>
				<p>Every year at our school there is a day devoted to drama, where eight productions compete to win a competition. I helped a make this video, which is shot during the morning and lunch, edited in the afternoon and shown just after the end of school. It's always a lot of fun, and a good exercise as a filmmaker to get something started and finished quickly.</p>
			</div>

			<div class="project theatre">
				<div class="image">
					<img src="/img/portfolio/romeo.jpg">
				</div>
				<h4>Romeo and Juliet Stagehand</h4><time>December 2011</time>
				<p>27 hours in 6 days in 1 theatre. Fun fact: on the opening night I had to stand behind a set piece and hold it up for the dying scene because it hadn't been hooked in properly. The audience could hear me breathe. This image was created by <a href="http://direthoughts.com">Henry Dyer</a> and not condoned by the director.</p>
			</div>

			<div class="project video">
				<div class="image">
					<img src="/img/portfolio/smike2.jpg">
				</div>
				<h4>Second Round of DVD Production</h4><time>November 2011</time>
				<p>This time a school play called Smike, and only using 4 cameras, but over 100 DVDs, burned on some iMacs and MacBook Pros.</p>
			</div>

			<div class="project video">
				<div class="image">
					<img src="/img/portfolio/billybudd.jpg">
				</div>
				<h4>Helped Filming Billy Budd</h4><time>October 2011</time>
				<p>One of our school's studio shows, shot on an XH A1 and a DSLR(!).</p>
			</div>

			<div class="project video">
				<a class="image" href="http://www.youtube.com/watch?v=YWFnXteggq0">
					<div class="overlay"></div>
					<img src="/img/portfolio/corpseandcrucifix.png">
				</a>
				<h4>The Corpse and the Crucifix</h4><time>July 2011</time>
				<p>A short film I made on a summer film camp with <a href="http://dreamcatchermedia.co.uk">Dream Catcher Media</a>. From idea to finished product in a week, shot in a day, and edited in four hours.</p>
			</div>

			<div class="project video">
				<a class="image" href="http://vimeo.com/26567518">
					<div class="overlay"></div>
					<img src="/img/portfolio/hostages.png">
				</a>
				<h4>Hostages</h4><time>July 2011</time>
				<p>A short test film I made to see how many visual effects I could fit into two minutes. Shot in a day, edited over two weeks.</p>
			</div>

			<div class="project theatre">
				<div class="image" href="#">
					<img src="/img/portfolio/comingsoon.png">
				</div>
				<h4>Moving Lights Show</h4><time>June 2011</time>
				<p>For my last prep school show, I designed and operated moving lights for a dance piece that was being put on. I used three old <a href="http://www.martin.com/product/product.asp?product=mac250plus">Martin Mac 250s</a> - two above the audience and one on the stage. I also used my LED Parcans, as well as some <a href="http://en.wikipedia.org/wiki/Color_scroller">DMX Colour Scrollers</a>.</p>
			</div>

			<div class="project theatre">
				<div class="image" href="#">
					<img src="/img/portfolio/secondyrplay2.jpg">
				</div>
				<h4>Short Play Lighting Design</h4><time>May 2011</time>
				<p>As part of my school's annual short play writing competition, again. We used a small waterproof LED to create a glow in the bowl, and a tiny machine that turned the water in the bowl into fog.</p>
			</div>

			<div class="project video">
				<div class="image" href="#">
					<img src="/img/portfolio/ratz.jpg">
				</div>
				<h4>School Play DVD Production</h4><time>April 2011</time>
				<p>Produced more than 50 DVDs of the school play, using 5 cameras. Two manned cameras, one on each side of the proscenium arch, and one at the end of the thrust.</p>
			</div>

			<div class="project theatre">
				<div class="image" href="#">
					<img src="/img/portfolio/baronbolligrew.jpg">
				</div>
				<h4>Pyrotechnics for a school play</h4><time>December 2010</time>
				<p>Using two fog machines, a hazer and a huge dry ice cooler. Look at all that low lying smoke!</p>
			</div>

			<div class="project theatre">
				<div class="image" href="#">
					<img src="/img/portfolio/secondyrplay.jpg">
				</div>
				<h4>Short Play Lighting Design</h4><time>May 2010</time>
				<p>As part of my school's annual short play writing competition.</p>
			</div>

			<div class="project theatre">
				<div class="image" href="#">
					<img src="/img/portfolio/drake.jpg">
				</div>
				<h4>Followspotting Drake</h4><time>December 2009</time>
				<p>See the shadow on the stairs there? Yep, that's me.</p>
			</div>

			<div class="project theatre">
				<div class="image"><img src="/img/portfolio/ernie.jpg"></div>
				<h4>Lighting for Ernie</h4><time>April 2009</time>
				<p>My first technical theatre roll, run with an ETC Express.</p>
			</div>

			<div class="clear"></div>

		</div>
	</div>
</section>

<?php include 'design/f.php'; ?>