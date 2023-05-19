<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dawasa WCAMS</title>
        <link rel="shortcut icon" href="{{ asset('backend/dist/img/AdminLTELogo.jpeg') }}">
        <link rel="stylesheet" href="{{ asset('jatu/css/jatu.css')}}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
        <div class="top">
            <a href="tel:255717810599"> <i class="fa fa-phone"></i> Call Us Now!</a>
            <div class="social">
                <p>Feel Free To Follow us</p>
                <div class="icons1">
                    <a href="#"><i class="fa fa-twitter" id="tw"></i></a>
                    <a href="#"><i class="fa fa-facebook" id="fb"></i></a>
                    <a href="#"><i class="fa fa-instagram" id="in"></i></a>
                    <a href="#"><i class="fa fa-youtube-play" id="you"></i></a>
                </div>
            </div>
        </div>
        <nav id="navbar">
            <div class="logo">
                <img src="{{ asset('backend/dist/img/AdminLTELogo.jpeg') }}" style="width: 70px; height: 50px" alt="">
                <h2>WATER CONNECTION APPLICATIONS MS</h2>
            </div>
            <div class="openMenu"><i class="fa fa-bars"></i></div>
            <ul class="mainMenu">
                @if (Route::has('login'))
                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right">
                    @auth
                        <li> <a href="{{ url('/home') }}"  id="active"><i class="fa fa-sign-in"></i> Nyumbani</a></li>
                    @else
                        <li> <a href="{{ route('login') }}"  id="active"><i class="fa fa-sign-in"></i> Ingia</a></li>
                        {{-- @if (Route::has('register'))
                            <li> </i> <a href="{{ route('register') }}"  id="active"><i class="fa fa-sign-in"></i> Log in</a></li>
                        @endif --}}
                    @endauth
                </div>
                @endif
                <div class="closeMenu"><i class="fa fa-close"></i></div>
                <span class="icons">
                    <a href="#"><i class="fa fa-twitter" id="tw"></i></a>
                    <a href="#"><i class="fa fa-facebook" id="fb"></i></a>
                    <a href="#"><i class="fa fa-instagram" id="in"></i></a>
                    <a href="#"><i class="fa fa-youtube-play" id="you"></i></a>
                    <a href="tel:255717810599"> <i class="fa fa-phone"></i></a>
                </span>
            </ul>
        </nav>

        <section>
            <div class="mySlides fade">
                <div class="sectionA">
                    <h2>Huduma ya Kuunganishiwa Maji</h2>
                    <div class="line"></div>
                    <p>
                        Okoa gharama za kuunganishiwa maji
                        kwa kupata barua ya mjumbe wa nyumba 10 na
                        kuendelea na maombi mtandaoni bila Kufika
                        serikali za mitaa wala DAWASA.
                        Taarifa zote ni nafuu kwa mfumo huu.
                    </p>
                    <h3> Jisajili Sasa Kutumia Mfumo Huu</h3>
                    <div class="download">
                       </i> <a style="text-decoration: none; padding: 10px 20px" href="{{ route('register') }}"  id="active"><i class="fa fa-user-plus"></i> Jisajili </a>
                    </div>
                </div>
                <div class="sectionB">
                    <img src="{{ asset('jatu/images/waterConnection.jpg')}}" alt="">
                </div>
            </div>
            <div class="mySlides fade">
                <div class="sectionA">
                    <h2>Ripoti Malalamiko kwa urahisi</h2>
                    <div class="line"></div>
                    <p>
                        Sasa unaweza kutuma malalamiko yako na kufika ofisi zetu za Karibu
                        kwa uboreshaji wa huduma zetu. Huna haja ya kufika ofisini kila wakati,
                        Malalamiko yako hushughulikiwa kwa haraka.
                    </p>
                    <h3> Jisajili Sasa Kutumia Mfumo Huu</h3>
                    <div class="download">
                       </i> <a style="text-decoration: none; padding: 10px 20px" href="{{ route('register') }}"  id="active"><i class="fa fa-user-plus"></i> Jisajili </a>
                    </div>
                </div>
                <div class="sectionB">
                    <img src="{{ asset('jatu/images/complaints.jpg')}}" alt="">
                </div>
            </div>
            <div class="mySlides fade">
                <div class="sectionA">
                    <h2>Shiriki Usomaji wa Mita Yako</h2>
                    <div class="line"></div>
                    <p>
                        JSasa Tumekusikia! Utaona na kufatilia usomaji wa 
                        Mita yako na kupata taarifa zako kwenye mfumo huu.
                        Kila usomaji utawekwa kwenye mfumo huu kwa wakati.
                    </p>
                    <h3> Jisajili Sasa Kutumia Mfumo Huu</h3>
                    <div class="download">
                       </i> <a style="text-decoration: none; padding: 10px 20px" href="{{ route('register') }}"  id="active"><i class="fa fa-user-plus"></i> Jisajili </a>
                    </div>
                </div>
                <div class="sectionB">
                    <img src="{{ asset('jatu/images/mita.jpg')}}" alt="">
                </div>
            </div>
        </section>
        <div style="text-align:center">
            <span class="dot"></span> 
            <span class="dot"></span> 
            <span class="dot"></span> 
          </div>

          {{-- <div class="apps">
              <div class="apps_content">
                  <div class="appA">
                      <img src="{{ asset('jatu/images/document.png')}}" alt="">
                      <h3>Pakia Hati tatu Muhimu</h3>
                      <p>
                          Kupitia Mfumo Wa Jatu Market 
                          Unaweza Kuagiza Bidhaa Zetu Zote
                          Na Kuletewa Mpaka Ulipo.
                          Pia Unaweza KufIka Katika Supermarket Zetu.
                      </p>
                  </div>
                  <div class="appA">
                    <img style="width: 100px; height: 100px" src="{{ asset('jatu/images/pending.png')}}" alt="" id="tv">
                    <h3>Fatilia Ombi Lako</h3>
                    <p>
                       Hii Ni Chaneli Inayopatikana Youtube
                       Ambayo Ina Wafuatiliaji
                       (5k+) Zaidi Ya Elfu Tano Ikiwa Na Video
                       Mbali Mbali Za Mafunzo Na Matukio Ya Jatu PLC.

                    </p>
                </div>
              </div>
              <div class="apps_content">
                <div class="appA">
                    <img src="{{ asset('jatu/images/BOX MOD (1).png')}}" alt="" id="tech">
                    <h3>Lipia Mtandaoni</h3>
                    <p>
                        Kupitia JATU PLC Unaweza Kupata Huduma Za
                        Tehama Zinazotolewa Na Wataalamu Kutoka Jatu
                        Tech. Huduma Kama Application And Website 
                        Development Utazipata Hapa.
                    </p>
                </div>
                <div class="appA">
                  <img src="{{ asset('jatu/images/jatu restaurant.png')}}" alt="">
                  <h3>Unganishiwa Maji</h3>
                  <p>
                    Huduma Ya Chakula Bora Kutoka
                    Jatu PLC Ambapo Unaweza Kufika Mgahawa
                    Wetu Posta Mpya Karibu Na Chuo Cha IFM 
                    Au Kuagiza Na Kuletewa Mpaka Ulipo
                    Kupitia App Ya Jatu Market.
                  </p>
              </div>
              </div>

          </div> --}}


          <div class="aboutUs">
              <h1>Kuhusu Sisi</h1>
              <div class="about_contents">
                  <div class="aboutA">
                      <div class="jenga">
                          <h3>DAWASA (Dar es Salaam Water Supply & Sanitation Authority)</h3>
                          <p>
                            
                            <b>MAADILI YA MSINGI</b> <br>

                            Ufanisi na ufanisi katika utoaji wa huduma. <br>
                            Integriteti na ubora katika utoaji wa huduma. <br>
                            Mazingira ya wateja. <br>
                            Ahadi kwa wateja. <br>
                            Kuzingatia maskini. <br>
                            Uwazi, uaminifu na ukweli. <br>
                            Uwajibikaji na jukumu.
                          </p>
                      </div>
                      <div class="vision">
                          <h3>Maono</h3>
                          <p>
                            Programu yenye huduma bora za usambazaji 
                            maji na usafi wa mazingira kwa ajili ya 
                            maendeleo ya kijamii na kiuchumi.
                          </p>
                      </div>
                      <div class="vision">
                        <h3>Misheni</h3>
                        <p>
                            Kutoa huduma bora, za kuaminika
                            na nafuu za maji na usafi wa mazingira
                            ambazo zinazidi matarajio ya wateja.
                        </p>
                    </div>
                  </div>
                  <div class="aboutB">
                      <img src="{{ ('jatu/images/dawasa.jpeg')}}" alt="">
                  </div>
              </div>
              <div class="patners">
                  <h3>Washiriki Wetu</h3>
                  <div class="logos">
                      <div class="logoA">
                          <img src="{{ ('jatu/images/vodacom-1024x496.png')}}" alt="">
                          <img src="{{ ('jatu/images/tigo-updated-1024x496.png')}}" alt="">
                      </div>
                      <div class="logoA">
                        <img src="{{ ('jatu/images/Dukani-1-1024x496.png')}}" alt="">
                        <img src="{{ ('jatu/images/infobip-1024x496.png')}}" alt="">
                    </div>
                    <div class="logoA">
                        <img src="{{ ('jatu/images/reseller-1024x496.png')}}" alt="">
                    </div>
                  </div>
              </div>
          </div>

          <div class="contact">
              <div class="text">
                  <h2>Tuachie Ujumbe</h2>
                  <label>Jina Kamili</label>
                  <input type="text" placeholder="Weka Jina Lako Kamili Hapa.">
                  <label>Barua Pepe</label>
                  <input type="email" placeholder="Andika Barua Pepe Hapa">
                  <label>Ujumbe Wako</label> <br>
                  <textarea cols="73" rows="8" placeholder="Weka Ujumbe Wako Hapa"></textarea>
                  <input type="submit" value="Tuma Ujumbe">
              </div>
              <div class="art">
                  <img src="{{ ('jatu/images/contact us.jpg')}}" alt="">
              </div>
          </div>

          <footer>
              <div class="footerA">
                  <div class="location">
                        <i class="fa fa-mobile-phone"></i>
                        <span>
                        <a href="tel:255717810599">+255 717 810 599</a>   <br>
                        <a href="mailto:info@jatu.co.tz">info@dawasa.co.tz</a>
                        </span>
                  </div>
                  <div class="location">
                        <i class="fa fa-home"></i>
                        <span>
                            DAWASA House, Dunga/ Malanga Street/ <br>
                             Mwananyamala P.O BOX 1573 DSM
                        </span>
                  </div>
                  <div class="staff">
                    <div class="socials">
                        <a href="#"><i class="fa fa-twitter" id="tw"></i></a>
                        <a href="#"><i class="fa fa-facebook" id="fb"></i></a>
                        <a href="#"><i class="fa fa-instagram" id="in"></i></a>
                        <a href="#"><i class="fa fa-youtube-play" id="you"></i></a>
                    </div>
                    <a href="{{ route('staff.login')}}">Staff Mail</a>
                    <a href="{{ route('lgo.login')}}">LGO Mail</a>
                  </div>
              </div>
              <hr>
              <div class="footerC">
                &phone;112  &copy;2023 – DAWASA. #Tunakuhitaji.
              </div>
          </footer>
    </body>
    <script src="{{ ('jatu/js/jatu.js')}}"></script>
</html>