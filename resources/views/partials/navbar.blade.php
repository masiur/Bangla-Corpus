<div class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <a href="{{ route('index') }}" class="navbar-brand">Open Bangla Corpus</a>
          <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div class="navbar-collapse collapse" id="navbar-main">
          <!-- <ul class="nav navbar-nav">
            <li>
              <a href="http://bootswatch.com/help/">About</a>
            </li>
            <li>
              <a href="http://news.bootswatch.com/">Data</a>
            </li>
            <li>
              <a href="http://news.bootswatch.com/">Contribute</a>
            </li>
            
          </ul> -->

          <ul class="nav navbar-nav navbar-right">
           <!--  <li class="{{ Menu::isActiveRoute('index') }}">
              <a href="{{ route('index') }}">Home</a>
            </li> -->
            <li class="{{ Menu::isActiveRoute('about') }}">
              <a href="{{ route('about') }}">About</a>
            </li>
            <li class="{{ Menu::isActiveRoute('contact.index') }}">
              <a href="{{ route('contact.index') }}">Data</a>
            </li>
             <li class="{{ Menu::isActiveRoute('leaderboard') }}">
              <a href="{{ route('leaderboard') }}">Leaderboard</a>
            </li>
            <li class="{{ Menu::isActiveRoute('contribute.index') }}">
              <a href="{{ route('contribute.index') }}">Contribute</a>
            </li>

            @if(auth()->check())
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" id="download"  style="color: blue">{{ auth()->user()->name }}<span class="caret"></a>
              <ul class="dropdown-menu" aria-labelledby="download">
                <li><a href="{{ route('logout') }}">Logout</a></li>
              </ul>
            </li>
            @endif
          </ul>

        </div>
      </div>
    </div>



<!-- 

    <li class="">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="download" aria-expanded="false">Journal <span class="caret"></span></a>
              <ul class="dropdown-menu" aria-labelledby="download">
                <li><a href="http://jsfiddle.net/bootswatch/uyeaokyd/">Open Sandbox</a></li>
                <li class="divider"></li>
                <li><a href="./bootstrap.min.css">bootstrap.min.css</a></li>
                <li><a href="./bootstrap.css">bootstrap.css</a></li>
                <li class="divider"></li>
                <li><a href="./variables.less">variables.less</a></li>
                <li><a href="./bootswatch.less">bootswatch.less</a></li>
                <li class="divider"></li>
                <li><a href="./_variables.scss">_variables.scss</a></li>
                <li><a href="./_bootswatch.scss">_bootswatch.scss</a></li>
              </ul>
            </li> -->