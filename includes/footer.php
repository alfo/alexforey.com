    <section>
      <footer>
        <div class="info">
          <p><span>Website by me | Source on <a href="https://github.com/alfo/alexforey.com">GitHub</a></span></p>
          <p>&copy; Alex Forey 2011 - <?php echo date('Y'); ?></p>
        </div>
      </footer>
    </section>

    <script type="text/javascript">

      // Google Analytics

      var _gaq = _gaq || [];
      _gaq.push(['_setAccount', 'UA-28573924-1']);
      _gaq.push(['_setDomainName', 'alexforey.com']);
      _gaq.push(['_trackPageview']);

      (function() {
          var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
      })();

      // Livereload but only in development

      if (window.location.hostname == "alexforey.dev") {
        document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')
      }

    </script>

  </body>
</html>
