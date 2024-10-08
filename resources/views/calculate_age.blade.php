<!DOCTYPE html>
<html dir="ltr" lang="en-US">
  <head>
    <meta charset="utf-8">
    <title>bootstrap-datepicker-thai demo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="//getbootstrap.com/2.3.2/assets/css/bootstrap.css" rel="stylesheet" media="screen">
    <link href="css/datepicker.css" rel="stylesheet" media="screen">
    <link href="//getbootstrap.com/2.3.2/assets/js/google-code-prettify/prettify.css" rel="stylesheet">
    <link href="//getbootstrap.com/2.3.2/assets/css/bootstrap-responsive.css" rel="stylesheet">
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

  </head>

  <body>
    <div class="container-fluid">
      <div class="row-fluid">
        <h1><a href="//jojosati.github.com/bootstrap-datepicker-thai">Bootstrap Datepicker Thai</a> <small>on <a href="//github.com/jojosati/bootstrap-datepicker-thai">github</a></small></h1>
      </div>
      <div class="row-fluid">
        <div class="span4">
          <h3>Demo</h3>
          <div id="example_html">
              <label>default(en)</label>
              <input class="input-medium" type="date" 
                data-provide="datepicker">

              <label>th</label>
              <input class="input-medium" type="date" 
                data-provide="datepicker" data-date-language="th">

              <label>th-th</label>
              <input class="input-medium" type="date" 
                data-provide="datepicker" data-date-language="th-th">

              <label>inline en-th</label>
              <div class="datepicker" data-date-language="en-th"></div>
          </div>
        </div>
        <div class="span8">
          <div>
            <h3>HTML</h3>
            <pre class="pre-scrollable prettyprint linenums" data-source="#example_html"></pre>
          </div>
          <div>
            <h3>SCRIPT</h3>
            <pre class="pre-scrollable prettyprint linenums" data-source="#example_script"></pre>
          </div>
        </div>
      </div>
      <div class="row-fluid">
        <hr>
        <footer>
          <p>maintained by <a href="//github.com/jojosati">jojosati</a></p>
        </footer>
      </div>
    </div>
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="//getbootstrap.com/2.3.2/assets/js/jquery.js"></script>
    <script src="//getbootstrap.com/2.3.2/assets/js/google-code-prettify/prettify.js"></script>

    <script src="js/bootstrap-datepicker.js"></script>
    <script src="js/bootstrap-datepicker-thai.js"></script>
    <script src="js/locales/bootstrap-datepicker.th.js"></script>

    <script id="example_script"  type="text/javascript">
      function demo() {
        $('.datepicker').datepicker();
      }
    </script>

    <script type="text/javascript">
      $(function(){
        $('pre[data-source]').each(function(){
          var $this = $(this),
            $source = $($this.data('source'));

          var text = [];
          $source.each(function(){
            var $s = $(this);
            if ($s.attr('type') == 'text/javascript'){
              text.push($s.html().replace(/(\n)*/, ''));
            } else {
              text.push($s.clone().wrap('<div>').parent().html()
                .replace(/(\"(?=[[{]))/g,'\'')
                .replace(/\]\"/g,']\'').replace(/\}\"/g,'\'') // javascript not support lookbehind
                .replace(/\&quot\;/g,'"'));
            }
          });
          
          $this.text(text.join('\n\n').replace(/\t/g, '    '));
        });

        prettyPrint();
        demo();
      });
    </script>
    
</body>
</html>