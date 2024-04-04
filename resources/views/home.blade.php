@extends('layouts.in')
<style>
    .home h1 {
        color: #fff;

    }

    

.intro {
	position: relative;
	width: 100%;
	height: 80vh;
}
.left {
	float: left;
	height: 100%;
	width: 60%;
	padding: 3rem 3rem 3rem 5rem;
	display: table;
}
.left > div {
	display: table-cell;
	vertical-align: middle;
}
.intro span {
  color: #E8CA2B;
  font-size: 14px;
  font-weight: bold;
  letter-spacing: 2px;
  display: inline-block;
  text-transform: uppercase;
  font-family: sans-serif;
  margin-bottom: 4rem;
}
.intro h1 {
	font-size: 2rem;
	margin-bottom: 3rem;
}
.intro h1 + p {
  color: #949494;
  font-size: 1.6rem;
  margin-bottom: 4rem;
}
.intro p + a {
  font-size: 1.6rem;
  color: #00bbff;
}
.intro p + a:hover {
  font-size: 1.6rem;
  color: #ffffff;
}
.slider {
	float: right;
	position: relative;
	width: 40%;
	height: 100%;
    /* border-radius: 10px; */
}
.slider li {
	position: absolute;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
	background-size: cover;
	background-repeat: no-repeat;
	background-position: 50% 50%;
	transition: clip .7s ease-in-out, z-index 0s .7s;
	clip: rect(0, 100vw, 100vh, 100vw);
	display: table;
}
.center-y {
	display: table-cell;
	vertical-align: middle;
	text-align: center;
	color: #fff;
    width: 80%;
    /* border-radius: 10px; */
}
.intro h3 {
	font-size: 5rem;
	font-style: italic;
    color: #ffffff;
    -webkit-text-stroke: 3px black;
}
.intro h3 + a {
	font-size: 1.6rem;
	display: inline-block;
	color: #ffffff;
	margin-top: 2rem;
    -webkit-text-stroke: 2px #ffffff;
}
.intro h3, h3 + a {
	opacity: 0;
	transition: opacity .7s 0s, transform .5s .2s;
	transform: translate3d(0, 50%, 0);
}
.intro li.current h3, li.current h3 + a {
	opacity: 1;
	transition-delay: 1s;
	transform: translate3d(0, 0, 0);
}
.intro li.current {
	z-index: 1;
	clip: rect(0, 100vw, 100vh, 0);
}
.intro li.prev {
	clip: rect(0, 0, 100vh, 0);
}
.slider nav {
	position: absolute;
	bottom: 5%;
	left: 0;
	right: 0;
	text-align: center;
	z-index: 10;
}
.intro nav a {
	display: inline-block;
	border-radius: 50%;
	width: 1.2rem;
	height: 1.2rem;
  min-width: 12px;
  min-height: 12px;
	background: #fff;
	margin: 0 1rem;
  transition: transform .3s;
}
a.current_dot {
	transform: scale(1.4);
}

@media screen and (max-width: 700px) {
	.left {
		width: 100%;
		height: 30%;
	}
	.slider {
		width: 100%;
		height: 70%;
	}
}
</style>
@section('content')
    <main>
        <div class="cont">
            <div class="home">

                <h1>Welcome {{ Auth::user()->name }} !!</h1>

                <div class="intro">
                    <div class="left">
                        <div class="lefttext">
                            <h1>What's JaipongZ Generative?</h1>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos eveniet amet excepturi
                                voluptates dolorem totam ad quod hic, porro accusamus, repellat, corrupti at obcaecati
                                ducimus, dolor quibusdam sequi nemo inventore?</p>
                            <a href="{{route('logo')}}" >Let's try it out!!</a>
                        </div>
                    </div>

                    <div class="slider">
                        <ul>
                            <li
                                style="background-image:url({{asset('images/pattern/alllogo.png')}}">
                                <div class="center-y">
                                    <h3>Logo Generator</h3>
                                    {{-- <a href="{{route('logo')}}">View Project</a> --}}
                                </div>
                            </li>
                            <li
                                style="background-image:url({{asset('images/pattern/allpack.png')}})">
                                <div class="center-y">
                                    <h3>Packaging Generator</h3>
                                    {{-- <a href="{{route('package')}}">View Project</a> --}}
                                </div>
                            </li>
                            <li
                                style="background-image:url(https://i.pinimg.com/originals/96/dd/76/96dd76d35704327ab8ddc1999e3be677.gif)">
                                <div class="center-y">
                                    <h3>Albums Manage</h3>
                                    {{-- <a href="{{route('albums',['user_id'=>Auth::user()->id])}}">View Project</a> --}}
                                </div>
                            </li>
                        </ul>

                        <ul>
                            <nav>
                                <a href="#"></a>
                                <a href="#"></a>
                                <a href="#"></a>
                            </nav>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <script>
            {
                class SliderClip {
                    constructor(el) {
                        this.el = el;
                        this.Slides = Array.from(this.el.querySelectorAll('li'));
                        this.Nav = Array.from(this.el.querySelectorAll('nav a'));
                        this.totalSlides = this.Slides.length;
                        this.current = 0;
                        this.autoPlay = true; //true or false
                        this.timeTrans = 4000; //transition time in milliseconds
                        this.IndexElements = [];

                        for (let i = 0; i < this.totalSlides; i++) {
                            this.IndexElements.push(i);
                        }

                        this.setCurret();
                        this.initEvents();
                    }
                    setCurret() {
                        this.Slides[this.current].classList.add('current');
                        this.Nav[this.current].classList.add('current_dot');
                    }
                    initEvents() {
                        const self = this;

                        this.Nav.forEach((dot) => {
                            dot.addEventListener('click', (ele) => {
                                ele.preventDefault();
                                this.changeSlide(this.Nav.indexOf(dot));
                            })
                        })

                        this.el.addEventListener('mouseenter', () => self.autoPlay = false);
                        this.el.addEventListener('mouseleave', () => self.autoPlay = true);

                        setInterval(function() {
                            if (self.autoPlay) {
                                self.current = self.current < self.Slides.length - 1 ? self.current + 1 : 0;
                                self.changeSlide(self.current);
                            }
                        }, this.timeTrans);

                    }
                    changeSlide(index) {

                        this.Nav.forEach((allDot) => allDot.classList.remove('current_dot'));

                        this.Slides.forEach((allSlides) => allSlides.classList.remove('prev', 'current'));

                        const getAllPrev = value => value < index;

                        const prevElements = this.IndexElements.filter(getAllPrev);

                        prevElements.forEach((indexPrevEle) => this.Slides[indexPrevEle].classList.add('prev'));

                        this.Slides[index].classList.add('current');
                        this.Nav[index].classList.add('current_dot');
                    }
                }

                const slider = new SliderClip(document.querySelector('.slider'));
            }
        </script>
    </main>
@endsection
