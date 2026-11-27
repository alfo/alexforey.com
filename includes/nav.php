<?php
  $links = [
    'portfolio' => 'Portfolio',
    'credits' => 'Credits',
    'about' => 'About',
    'press' => 'Press',
    'contact' => 'Contact'
  ];
?>
    <div class="nav-container">
      <nav aria-label="Main">
        <a id="home" href="/" aria-label="Alex Forey, home"><img src="/imgs/logo-small.png" alt="Alex Forey" width="90" height="48"></a>
        <ul>
          <?php foreach ($links as $id => $name) { ?>
            <li id="<?php echo $id; ?>"><a href="/<?php echo $id; ?>"<?php if ($page == $id) echo ' class="current" aria-current="page"'; ?>><?php echo $name; ?></a></li>
          <?php } ?>
          <li class="nav-underline" aria-hidden="true"></li>
        </ul>
      </nav>
    </div>

    <script>
      // The red line under the current page's nav link slides over from the link of the page you came from.
      // It runs here, before the page paints, so that the line never jumps.
      (function(){

        var list = document.querySelector("nav ul");
        var underline = list.querySelector(".nav-underline");
        var links = [].slice.call(list.querySelectorAll("a"));
        var current = list.querySelector("a.current");
        var reducedMotion = window.matchMedia("(prefers-reduced-motion: reduce)").matches;
        var moving = false;

        function position(link) {
          if (!link) return null;
          var item = link.parentNode;
          return { x: item.offsetLeft, y: item.offsetTop + item.offsetHeight - 2, width: item.offsetWidth };
        }

        function place(pos, animate, width) {
          if (animate && !reducedMotion) {
            underline.style.transition = "transform .55s cubic-bezier(.2,.7,.2,1), width .55s cubic-bezier(.2,.7,.2,1), opacity .35s ease";
          } else {
            underline.style.transition = "none";
          }
          if (!pos) {
            underline.style.opacity = 0;
            return;
          }
          underline.style.opacity = 1;
          underline.style.width = (width == null ? pos.width : width) + "px";
          underline.style.transform = "translate(" + pos.x + "px," + pos.y + "px)";
        }

        // The line is put where it starts before the first paint, and moves once the page is on screen
        function slide() {
          moving = true;
          var gone = false;

          function go() {
            if (gone) return;
            gone = true;
            underline.getBoundingClientRect();
            place(position(current), true);
            setTimeout(function(){ moving = false; }, 700);
          }

          if (reducedMotion) {
            go();
            return;
          }
          requestAnimationFrame(function(){ requestAnimationFrame(go); });
          // In case the browser is holding frames back
          setTimeout(go, 120);
        }

        function settle() {
          if (!moving) place(position(current), false);
        }

        // The nav position of the page you came from: -1 for Home, null when you arrived from elsewhere
        var previous = null;
        try {
          var saved = sessionStorage.getItem("nav");
          sessionStorage.removeItem("nav");
          if (saved != null) previous = +saved;
        } catch (err) {}

        list.classList.add("js");
        var from = previous == null ? null : links[previous] || null;

        if (from && from !== current) {
          place(position(from), false);
          slide();
        } else if (previous === -1 && current) {
          place(position(current), false, 0);
          slide();
        } else {
          place(position(current), false);
        }

        // Remember this page when a link on the site is followed, so the next page knows where the line starts
        document.addEventListener("click", function(e){
          var link = e.target.closest && e.target.closest("a[href]");
          if (!link || link.origin !== location.origin || link.target === "_blank") return;
          if (e.metaKey || e.ctrlKey || e.shiftKey || e.altKey || e.button) return;
          try {
            sessionStorage.setItem("nav", String(links.indexOf(current)));
          } catch (err) {}
        }, true);

        window.addEventListener("resize", settle);
        if (document.fonts && document.fonts.ready) {
          document.fonts.ready.then(function(){ setTimeout(settle, 800); });
        }
        // A page restored by the Back button shows its own link straight away
        window.addEventListener("pageshow", function(e){
          if (e.persisted) settle();
        });

      })();
    </script>
