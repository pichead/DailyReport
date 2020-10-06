<nav class="navbar navbar-dark bg-dark navbar-expand-sm  py-3 ">
        <div class="container ">
            <a class="navbar-brand" href="{{asset('home')}}">PEC Daily Report</a>
            <button class="navbar-toggler collapsed" data-toggle="collapse" data-target="#navbarNav" aria-expanded="false">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse collapse" id="navbarNav" style="">
                <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a  class="nav-link" href="{{asset('/ReportHistory').'/'.Auth::user()->id.'/'}}">ประวัติรายงาน</a>    
                </li>
                <li class="nav-item">
                    <a  class="nav-link" href="{{asset('/createDailyReport')}}">สร้างรายงาน</a>
                </li>
                  
                    @guest
                        <li class="nav-item">
                            <a  class="nav-link navFont"  href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item ml-2">
                                <a  class="nav-link navFont"  href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
<br>
<br>
