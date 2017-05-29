<div class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand">Open Bangla Corpus</a>
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
<<<<<<< HEAD
            <li class="{{ Menu::isActiveRoute('index') }}">
              <a href="{{ route('index') }}">Home</a>
            </li>
            <li class="{{ Menu::isActiveRoute('') }}">
              <a href="">About</a>
=======
            <li>
              <a href="{{ route('home') }}">Home</a>
            </li>
            <li>
              <a href="{{ route('about.index') }}">About</a>
>>>>>>> bd-king
            </li>
            <li class="{{ Menu::isActiveRoute('') }}">
              <a href="">Data</a>
            </li>
            <li class="{{ Menu::isActiveRoute('contribute.index') }}">
              <a href="{{ route('contribute.index') }}">Contribute</a>
            </li>
            <li>
              <a href="{{ route('contact.index') }}">Contact</a>
            </li>
          </ul>

        </div>
      </div>
    </div>